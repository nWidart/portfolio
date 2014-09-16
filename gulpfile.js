'use strict';
var gulp = require('gulp'),
    less = require('gulp-less'),
    notify = require('gulp-notify'),
    path = require('path'),
    minifyCSS = require('gulp-minify-css'),
    rename = require("gulp-rename"),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    sourcemaps = require('gulp-sourcemaps');

// Less handling
var less_path = './public/assets/less/**/*.less';
gulp.task('less', function () {
    gulp.src('./public/assets/less/bootswatch.less')
        .pipe(less({
            paths: [ path.join(__dirname, 'less', 'includes') ]
        }))
        .pipe(gulp.dest('./public/assets/css'))
        .pipe(notify({
            'title' : 'Css',
            'message' : 'Less compiled'
        }))
        .pipe(minifyCSS({keepBreaks:false}))
        .pipe(rename(function (path) {
            path.basename += ".min";
            path.extname = ".css"
        }))
        .pipe(gulp.dest('./public/assets/css/dist/'))
        .pipe(notify({
            'title' : 'Css',
            'message' : 'Css Minified!'
        }));
});

gulp.task('concat-css', ['less'] ,function() {
    return gulp.src([
        './public/assets/css/dist/bootstrap.min.css',
        './public/assets/css/dist/*.css',
        './public/assets/css/prism.css',
    ])
        .pipe(concat('all.min.css'))
        .pipe(gulp.dest('./public/assets/css/dist'))
        .pipe(notify({
            'title' : 'Css',
            'message' : 'Css files concatenated'
        }));
});

// Minify and copy all JavaScript (except vendor scripts)
var js_path = './public/assets/js/*.js';
gulp.task('scripts', function() {
    return gulp.src(['./public/assets/js/jquery.js', './public/assets/js/*.js'])
        .pipe(uglify())
        .pipe(concat('all.min.js'))
        .pipe(gulp.dest('./public/assets/js/dist'))
        .pipe(notify({
            'title' : 'Scripts',
            'message' : 'Js combined and minified'
        }));
});

// File watchers
gulp.task('watch-less', function() {
    gulp.watch(less_path, ['less', 'concat-css']);
});
gulp.task('watch-js', function() {
    gulp.watch(js_path, ['scripts']);
});

gulp.task('default', ['watch-less', 'watch-js']);