var gulp = require("gulp");
var shell = require('gulp-shell');
var elixir = require('laravel-elixir');
var themeInfo = require('./theme.json');

// elixir.extend("stylistPublish", function() {
//     gulp.task("stylistPublish", function() {
//         gulp.src("").pipe(shell("php ../../artisan stylist:publish "+themeInfo.name));
//     });
//
//     this.registerWatcher("stylistPublish", "**/*.less");
//
//     return this.queueTask("stylistPublish");
// });
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {

    /**
     * Compile less
     */
    mix.less([
        "main.less"
    ], 'assets/css/main.css');

    /**
     * Concat scripts
     */
    mix.scripts([
        './node_modules/jquery/dist/jquery.min.js',
        './node_modules/bootstrap-less/js/bootstrap.min.js',
        './node_modules/prismjs/prism.js',
        '/js/bootswatch.js'
    ], null, 'resources');

    /**
     * Copy Bootstrap fonts
     */
    mix.copy(
        'resources/vendor/bootstrap/fonts',
        'assets/fonts'
    );

    /**
     * Copy Fontawesome fonts
     */
    mix.copy(
        'resources/vendor/font-awesome/fonts',
        'assets/fonts'
    );
});
