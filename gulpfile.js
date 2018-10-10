'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var inject = require('gulp-inject');
var minify = require('gulp-minify');


gulp.task('styles', function(done) {
    gulp.src('./scss/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./css/'));
    done();
});

// maybe comment later?
gulp.task('minify-css', function() {
  return gulp.src('./css/*.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('./css/'));
});

//Watch task
gulp.task('default', gulp.series('styles', function() {
  gulp.watch('scss/*.scss');
}));

//Distribution task
gulp.task('css', gulp.series('styles', 'minify-css'));

