<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('homepage') }}">{{ Setting::get('core::site-name') }}</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ on_route('homepage') ? 'active' : '' }}">
                    <a href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="{{ Request::is('about') ? 'active' : '' }}">
                    <a href="{{ route('page', ['about']) }}">About</a>
                </li>
                <li class="{{ Request::is('blog*') ? 'active' : '' }}">
                    <a href="{{ route('en.blog') }}">Blog</a>
                </li>
                <li class="{{ Request::is('projects') ? 'active' : '' }}">
                    <a href="{{ route('page', ['projects']) }}">Projects</a>
                </li>
                <li class="{{ Request::is('books') ? 'active' : '' }}">
                    <a href="{{ route('books.index') }}">Book Library</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
