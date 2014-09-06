<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <li class="pull-right"><a href="#top">Back to top</a></li>
                    <li>&copy; {{ date('Y') }} Nicolas Widart</li>
                    <li class="{{ Request::is('/') ? 'active' : ''}}"><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="{{ Request::is('about') ? 'active' : ''}}"><a href="{{ URL::route('about') }}">About</a></li>
                    <li class="{{ Request::is('blog*') ? 'active' : ''}}"><a href="{{ URL::route('blog.index'); }}">Blog</a></li>
                    <li class="{{ Request::is('projects') ? 'active' : ''}}"><a href="{{ URL::route('projects') }}">Projects</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>