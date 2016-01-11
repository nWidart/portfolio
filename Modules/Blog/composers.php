<?php

view()->composer(['blog.*', 'home'], 'Modules\Blog\Composers\Frontend\LatestPostsComposer');
