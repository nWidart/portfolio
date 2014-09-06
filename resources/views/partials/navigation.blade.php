<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::to('/'); }}">Nicolas Widart</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : ''}}"><a href="{{ URL::to('/'); }}">Home</a></li>
                <li class="{{ Request::is('about') ? 'active' : ''}}"><a href="#">About</a></li>
                <li class="{{ Request::is('blog*') ? 'active' : ''}}"><a href="{{ URL::route('blog.index'); }}">Blog</a></li>
                <li class="{{ Request::is('projects') ? 'active' : ''}}"><a href="#">Projects</a></li>
            </ul>
        </div>
    </div>
</nav>