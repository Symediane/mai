'use strict';

import gulp from 'gulp';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import autoprefixer from 'gulp-autoprefixer';
import sourcemaps from 'gulp-sourcemaps';
import babel from 'gulp-babel';
import concat from 'gulp-concat';
import minify from 'gulp-minify';
import bulkSass from 'gulp-sass-bulk-import';
import plumber from 'gulp-plumber';
import notify from 'gulp-notify';
import imagemin from 'gulp-imagemin';
import cache from 'gulp-cache';

const sass = gulpSass(dartSass);

const onError = function(err) {
  notify({
    title: 'Gulp Task Error',
    message: 'Check the console.'
  }).write(err);

  console.log(err.toString());

  this.emit('end');
};

function scss(cb) {
  gulp.src('./scss/**/*.scss')
    .pipe(plumber({
      errorHandle: onError
    }))
    .pipe(bulkSass())
    .pipe(sourcemaps.init())
    .pipe(sass()).on('error', onError)
    .pipe(autoprefixer())
    .pipe(concat('style.css'))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('dist/css'));
  cb();
}

function fonts(cb) {
  gulp.src('./fonts/**/*.*')
    .pipe(gulp.dest('dist/fonts'));
  cb();
}

function images(cb) {
  gulp.src('./images/**/*.+(png|jpg|jpeg|gif|svg)')
    .pipe(cache(imagemin({
      interlaced: true
    })))
    .pipe(gulp.dest('dist/images'));
  cb();
}

function javascript(cb) {
  gulp.src('./js/**/*.js')
    .pipe(plumber({
      errorHandle: onError
    }))
    .pipe(babel({
      presets: ['@babel/env']
    }))
    .on('error', onError)
    .pipe(concat('app.js'))
    .pipe(minify({
      ext: {
        src: '.js',
        min: '.min.js'
      }
    }))
    .pipe(gulp.dest('dist/js'))
  cb();
}

export const build = gulp.parallel(scss, javascript, images, fonts);

export const watch = function() {
  gulp.watch('./scss/**/*.scss', scss);
  gulp.watch('./js/**/*.js', javascript);
};
