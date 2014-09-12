'use strict';
var gulp = require('gulp'),
    less = require('gulp-less'),
    notify = require('gulp-notify'),
    path = require('path'),
    minifyCSS = require('gulp-minify-css'),
    rename = require("gulp-rename"),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat');

// Less handling
var less_path = './public/assets/less/**/*.less';
gulp.task('less', function () {
    gulp.src('./public/assets/less/bootswatch.less')
        .pipe(less({
            paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(gulp.dest('./public/assets/css'))
        .pipe(notify("Less compiled"))
        .pipe(minifyCSS({keepBreaks:false}))
        .pipe(rename(function (path) {
            path.basename += ".min";
            path.extname = ".css"
        }))
        .pipe(gulp.dest('./public/assets/css/dist/'))
        .pipe(notify("Css Minified!"));
});

// Minify and copy all JavaScript (except vendor scripts)
var js_path = './public/assets/js/**/*.js';
gulp.task('scripts', function() {
    return gulp.src(['./public/assets/js/dist/jquery.min.js', './public/assets/js/*.js', '!./public/assets/js/dist/jquery.min.js'])
        .pipe(uglify())
        .pipe(concat('all.min.js'))
        .pipe(gulp.dest('./public/assets/js/dist'))
        .pipe(notify("Js combined and minified"));
});

// File watchers
gulp.task('watch-less', function() {
    gulp.watch(less_path, ['less']);
});
gulp.task('watch-js', function() {
    gulp.watch(js_path, ['scripts']);
});

gulp.task('default', ['watch-less', 'watch-js']);