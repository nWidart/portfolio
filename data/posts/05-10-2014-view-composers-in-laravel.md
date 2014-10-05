title: View composers and view creators in Laravel
slug: view-composers-and-view-creators-in-laravel
status: published
date: 5 oct 2014
tags: laravel,navigation
meta-description: An explanation on how to use View Creators and View Composers to create an decoupled navigation system.

-------

This article will go over how I used the view creators and [view composers](http://laravel.com/docs/4.2/responses#view-composers) in Laravel to create a decoupled navigation system.

To explain the context a bit, I'm building re-useable parts of an application, to give me the ability to quickly create an administration interface for clients. To achieve this I'm using the   [Pingpong/Modules](https://github.com/pingpong-labs/modules) package. You can go over the modules I'm building over at my dedicated organisation on [github](https://github.com/nWidart-Modules). 

The basic difference between a View Creator and a View Composer is when it's called. A View Creator is called directly when the view is instantiated. Compared to a View Composer, is called when the view is rendered. We can take adventage of this to create a menu items using Laravals Collection class.

**The goal** was to give the ability to each module to send what navigation items it needs to a '[Core](https://github.com/nWidart-Modules/Core)' module. This way to core module doens't care about what other modules there are.

Here is what my navigation looks like:

![navigation](https://i.cloudup.com/WMOrVW8ABc-1200x1200.png)

As you can see there are currently a *Dashboard*, *Workshop*, *Users & Roles*, *Blog* module.

So how did I do it? I used one **View Creator** and each module has its **View Composer**. The navigation is a Laravel Collection, with sub-collection if the module needs sub-lists. The View creator lives in the Core Module, and basically just initialises the collection. 

It looks like this:

``` {.language-php}
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

class SidebarViewCreator
{
    public function create($view)
    {
        $view->prefix = Config::get('core::core.admin-prefix');
        $view->items = new Collection;
    }
}

```

This View Creator and the other View Composers are all attached to the `navigation.blade` partial view. 

Then every module has its own View composer that adds one item to this Collection. For instance, in its simplest form, the Dashboard module has this View Composer:

``` {.language-php}
class SidebarViewComposer
{
    public function compose($view)
    {
        $view->items->put('dashboard', [
            'weight' => 0,
            'request' => "*/$view->prefix",
            'route' => 'dashboard.index',
            'icon-class' => 'fa fa-dashboard',
            'title' => 'Dashboard',
        ]);
    }
}

```

The weight key is the one that'll be used to sort my menu. As you can see, this View Composer just puts an item in the previously created Laravel Collection.

If a module needs a sub menu, I just put a new Laravel Collection, as an item of the initial Collection. This is what it looks like:

``` {.language-php}
<?php namespace Modules\User\Composers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;

class SidebarViewComposer
{
    public function compose($view)
    {
        $view->items->put('user', Collection::make([
            [
                'weight' => '1',
                'request' => Request::is("*/{$view->prefix}/users*") or Request::is("*/{$view->prefix}/roles*"),
                'route' => '#',
                'icon-class' => 'fa fa-user',
                'title' => 'Users & Roles',
            ],
            [
                'request' => "*/{$view->prefix}/users*",
                'route' => 'dashboard.user.index',
                'icon-class' => 'fa fa-user',
                'title' => 'Users',
            ],
            [
                'request' => "*/{$view->prefix}/roles*",
                'route' => 'dashboard.role.index',
                'icon-class' => 'fa fa-flag-o',
                'title' => 'Roles',
            ]
        ]));
    }
}

```
In this case I use the first item of the sub Collection to set its weight. 

Now when every module is done sending its navigation item(s) to the Core module, I send the items to a `Navigation Ordener` which will re-order the menu items based on its defined *weight* key.

This is what that class looks like, it's basically very simple:

``` {.language-php}
<?php namespace Modules\Core\Navigation;

use Illuminate\Support\Collection;

class NavigationOrdener
{
    public static function order(Collection $items)
    {
        return $items->sort(
            function ($item1, $item2) {
                $item1 = self::getItem($item1);
                $item2 = self::getItem($item2);

                if ($item1['weight'] > $item2['weight']) {
                    return 1;
                }
                if ($item1['weight'] < $item2['weight']) {
                    return -1;
                }
                return 0;
            }
        );
    }

    /**
     * @param $item
     * @return mixed
     */
    public static function getItem($item)
    {
        return isset($item['weight']) ? $item : $item->first();
    }
}

```

And as a final step, I loop over every item in the view to display it.


``` {.language-php}

<ul class="sidebar-menu">
    <?php $items = \Modules\Core\Navigation\NavigationOrdener::order($items); ?>
    <?php foreach($items as $i => $item): ?>
        <?php if (is_object($item)): ?>
            <li class="treeview {{ $item[0]['request'] ? 'active' : ''}}">
                <a href="#">
                    <i class="{{ $item[0]['icon-class'] }}"></i> <span>{{ $item[0]['title'] }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <?php $item->shift(); ?>
                <ul class="treeview-menu">
                    <?php foreach($item as $subItem): ?>
                        <li class="{{ Request::is($subItem['request']) ? 'active' : ''}}">
                            <a href="{{ URL::route($subItem['route']) }}"><i class="{{$subItem['icon-class']}}"></i> {{ $subItem['title'] }}</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php else: ?>
        <li class="{{ Request::is($item['request']) ? 'active' : ''}}">
            <a href="{{ URL::route($item['route']) }}">
                <i class="{{ $item['icon-class'] }}"></i> <span>{{ $item['title'] }}</span>
            </a>
        </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

```

And voilà. Now every module can independently send its navigation and it'll be display as it should, in the correct order.

