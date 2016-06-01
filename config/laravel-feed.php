<?php

return [

    'feeds' => [
        [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * '\App\Model@getAllFeedItems'
             */
            'items' => '\Modules\Blog\Entities\Post@getFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => '/rss',

            'title' => 'Blog Posts of NicolasWidart.com',
        ],
    ],

];
