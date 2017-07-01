'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');

gulp.task('sass', function () {
  return gulp.src('./resources/assets/sass/app.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./public/css/'));
});

gulp.task('sass:watch', function () {
  gulp.watch('./resources/assets/sass/**/*.scss', ['sass']);
});

gulp.task('js', function() {
    return gulp.src('./resources/assets/js/app.js')
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./public/js/'));
});

gulp.task('vendor_js', function() {
    return gulp.src(['./node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', './node_modules/jquery/dist/jquery.min.js'])
        .pipe(gulp.dest('./public/js/'));
});

gulp.task('vendor_fonts', function() {
    return gulp.src('./node_modules/bootstrap-sass/assets/fonts/**/*')
        .pipe(gulp.dest('./public/fonts/'));
});

gulp.task('compile', ['sass', 'vendor_fonts', 'vendor_js']);
