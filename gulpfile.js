var gulp = require('gulp');
var watch = require ('gulp-watch');
var browserSync = require('browser-sync').create();
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var cssvars = require('postcss-simple-vars');
var nested = require('postcss-nested');
var cssImport = require('postcss-import');
var mixins = require('postcss-mixins');
var hexrgba = require('postcss-hexrgba');
var webpack = require ('webpack');
var del = require('del');
var cleanCSS = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var wpPot = require('gulp-wp-pot');
var rtlcss = require('gulp-rtlcss');
var rename = require('gulp-rename');

/* STYLES FUNCTIONS  */

//compiles public css from source
function cssPublicCompile() {
  return gulp.src('./_dev/public/css/rate-my-post.css') //source
  .pipe(postcss([cssImport, mixins, cssvars, nested, hexrgba, autoprefixer]))
  .on('error', function(errorInfo) {
    console.log(errorInfo.toString());
    this.emit('end');
  })
  .pipe(gulp.dest('./public/css/')) //save to destination
  .pipe(rtlcss()) // Convert to RTL.
  .pipe(rename({ suffix: '-rtl' })) // Append "-rtl" to the filename.
  .pipe(gulp.dest('./public/css/')); //save to destination
}

//compiles admin css from source
function cssAdminCompile() {
  return gulp.src('./_dev/admin/css/rate-my-post-admin.css') //source
  .pipe(postcss([cssImport, mixins, cssvars, nested, hexrgba, autoprefixer]))
  .on('error', function(errorInfo) {
    console.log(errorInfo.toString());
    this.emit('end');
  })
  .pipe(gulp.dest('./admin/css/')) //save to destination
  .pipe(rtlcss()) // Convert to RTL.
  .pipe(rename({ suffix: '-rtl' })) // Append "-rtl" to the filename.
  .pipe(gulp.dest('./admin/css/')); //save to destination
}

//injects public css from source
function cssPublicInject() {
  return gulp.src('./public/css/rate-my-post.css')
  .pipe(browserSync.stream());
}

//injects public css from source
function cssAdminInject() {
  return gulp.src('./admin/css/rate-my-post-admin.css')
  .pipe(browserSync.stream());
}

/* SCRIPTS FUNCTIONS  */

function jsCompile(callback) {
  webpack(require('./webpack.config.js'), function(err, stats) {
    if (err) {
      console.log(err.toString());
    }
    console.log(stats.toString());
    callback();
  });
}

function jsAdminCompile(callback) {
  webpack(require('./webpack.admin.config.js'), function(err, stats) {
    if (err) {
      console.log(err.toString());
    }
    console.log(stats.toString());
    callback();
  });
}

/* WATCH TASK */

//reload browser
function reload() {
	browserSync.reload();
}

//browser sync
function browser_sync() {
	browserSync.init({
		proxy: 'http://localhost/wordpress'
	});
}

//files to be watched
var publicStyleWatch   = './_dev/public/css/**/*.css';
var adminStyleWatch   = './_dev/admin/css/**/*.css';
var publicScriptsWatch   = './_dev/public/js/**/*.js';
var adminScriptsWatch   = './_dev/admin/js/**/*.js';
var phpWatch   = './**/*.php';

//watch files and do things on change
function watch_files() {
  //public - on css change compile css and inject in browser
	watch(publicStyleWatch, gulp.series(cssPublicCompile, cssPublicInject));
  watch(adminStyleWatch, gulp.series(cssAdminCompile, cssAdminInject));
  //reload on php file change
  watch(phpWatch, reload);
  //run webpack and babel on scripts change (admin and public - see webpack config)
  watch(publicScriptsWatch, gulp.series(jsCompile, reload));
  watch(adminScriptsWatch, gulp.series(jsAdminCompile, reload));
}

//define the watch task
gulp.task('watch', gulp.parallel(browser_sync, watch_files));

// CREATE A PRODUCTION VERSION

gulp.task('build', gulp.series(clean, copy_files, minify_css, minify_css_rtl, uglify_js, minify_admin_css, minify_admin_css_rtl, uglify_admin_js, create_pot_file));

function clean() {
  return del(['./rate-my-post/']);
}

function copy_files() {
  var pathsToCopy = [
    './**/*',
    '!./_dev/**',
    '!./node_modules/**',
    '!./.git/**',
    '!./gulpfile.js',
    '!./webpack.config.js',
    '!./webpack.production.config.js',
    '!./webpack.admin.config.js',
    '!./webpack.production.admin.config.js',
    '!./package.json',
    '!./package-lock.json',
    '!./.gitignore',
    '!./LICENSE.md',
    '!./README.md',
    '!./public/css/rate-my-post.css',
    '!./public/css/rate-my-post-rtl.css',
    '!./public/js/rate-my-post.js',
    '!./admin/css/rate-my-post-admin.css',
    '!./admin/css/rate-my-post-admin-rtl.css',
    '!./admin/js/rate-my-post-admin.js',
  ]

  return gulp.src(pathsToCopy) //source
  .pipe(gulp.dest('./rate-my-post/')); //save to destination
}

function minify_css() {
  return gulp.src('./public/css/rate-my-post.css') //source
  .pipe(cleanCSS({compatibility: 'ie8', debug: true}, (details) => {
      console.log(`${details.name}: ${details.stats.originalSize}`);
      console.log(`${details.name}: ${details.stats.minifiedSize}`);
    }))
  .pipe(gulp.dest('./rate-my-post/public/css/')); //save to destination
}

function minify_css_rtl() {
  return gulp.src('./public/css/rate-my-post-rtl.css') //source
  .pipe(cleanCSS({compatibility: 'ie8', debug: true}, (details) => {
      console.log(`${details.name}: ${details.stats.originalSize}`);
      console.log(`${details.name}: ${details.stats.minifiedSize}`);
    }))
  .pipe(gulp.dest('./rate-my-post/public/css/')); //save to destination
}

function minify_admin_css() {
  return gulp.src('./admin/css/rate-my-post-admin.css') //source
  .pipe(cleanCSS({compatibility: 'ie8', debug: true}, (details) => {
      console.log(`${details.name}: ${details.stats.originalSize}`);
      console.log(`${details.name}: ${details.stats.minifiedSize}`);
    }))
  .pipe(gulp.dest('./rate-my-post/admin/css/')); //save to destination
}

function minify_admin_css_rtl() {
  return gulp.src('./admin/css/rate-my-post-admin-rtl.css') //source
  .pipe(cleanCSS({compatibility: 'ie8', debug: true}, (details) => {
      console.log(`${details.name}: ${details.stats.originalSize}`);
      console.log(`${details.name}: ${details.stats.minifiedSize}`);
    }))
  .pipe(gulp.dest('./rate-my-post/admin/css/')); //save to destination
}

function uglify_js(callback) {
  webpack(require('./webpack.production.config.js'), function(err, stats) {
    if (err) {
      console.log(err.toString());
    }
    console.log(stats.toString());
    callback();
  });
}

function uglify_admin_js(callback) {
  webpack(require('./webpack.production.admin.config.js'), function(err, stats) {
    if (err) {
      console.log(err.toString());
    }
    console.log(stats.toString());
    callback();
  });
}

function create_pot_file() {
  return gulp.src('./**/*.php')
  .pipe(wpPot( {
      domain: 'rate-my-post'
  } ))
  .pipe(gulp.dest('./rate-my-post/languages/rate-my-post.pot'));
}
