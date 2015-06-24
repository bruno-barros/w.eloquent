var gulp = require('gulp');
var fs = require('fs');
var pkg = JSON.parse(fs.readFileSync('./package.json'));
// Include Our Plugins
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var minifyCSS = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');
var stripDebug = require('gulp-strip-debug');
var browserify = require('browserify');
var notify = require("gulp-notify");
var watchify = require('watchify');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');
var argv = require('yargs').argv;
var browserSync = require('browser-sync').create();

// theme assets folder
var assets = 'src/themes/base/app/assets';

/**
 *----------------------
 * Assets to combine on global file
 */
var CSS_FILES = [
	//assets + '/css/bootstrap.css'
];

var JS_FILES = [
	//assets + '/js/bootstrap.min.js'
];



/**
 * -------------------------------------------
 * Styles goes here
 */
gulp.task('styles', function () {
	gulp.src(CSS_FILES)
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(concat('_global.css'))
		.pipe(gulp.dest(assets + '/css'))
		.pipe(rename('_global.min.css'))
		.pipe(minifyCSS({keepBreaks: false}))
		.pipe(gulp.dest(assets + '/css'));
});

/**
 * ------------------------------------------
 * Scripts goes here
 */
gulp.task('lint', function () {
	return gulp.src(assets + '/js/**/*.js')
		.pipe(jshint())
		.pipe(jshint.reporter('default'));
});

gulp.task('scripts', function () {
	gulp.src(JS_FILES)
		.pipe(concat('_global.js'))
		.pipe(stripDebug())
		.pipe(gulp.dest(assets + '/js'))
		.pipe(rename('_global.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest(assets + '/js'));
});


/**
 * ----------------------------------------------
 * Example of scripts loaded with browserify
 * run> gulp app-js -w
 */
gulp.task('app-js', ['browser-sync'], function () {

	var nameIn = 'apps/app.js',
		nameOut = '_app.js',
		b = browserify(assets + '/js/' + nameIn);

	function bundle() {
		return b.bundle()
			.pipe(source(nameOut))
			.pipe(buffer())
			.pipe(uglify())
			.pipe(gulp.dest(assets + '/js'));
	}

	if (argv.w || argv.watch) {

		b = watchify(b);
		// Rebundle on update
		b.on('update', bundle);
		b.on('update', browserSync.reload);
	}

	return bundle();

});


/**
 * ----------------------------------------
 * Browser sync
 * ----------------------------------------
 * Add ['browser-sync'] as dependency task
 * to reload the browser.
 * @see package.json to configure local url
 */
gulp.task('browser-sync', function () {
	browserSync.init({
		proxy: pkg.localUrl,
		port: 80
	});
});

/**
 * ----------------------------------------
 * Watch Files For Changes
 */
gulp.task('watch', function () {
	gulp.watch([
			assets + '/js/**/*.js',
			'!' + assets + '/js/_*.js'
		],
		['lint', 'scripts']);
	gulp.watch([
			assets + '/css/*.css',
			'!' + assets + '/css/_*.css'
		],
		['styles']);
});



/**
 * ------------------------------------------
 * Assets tasks
 */
gulp.task('assets', ['scripts', 'styles']);


gulp.task('default', ['assets', 'watch']);