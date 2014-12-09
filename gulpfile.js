var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var minifyCSS = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');
var stripDebug = require('gulp-strip-debug');
var filesize = require('gulp-filesize');

// theme assets folder
var theme = 'src/themes/base/app/assets';

/**
 *----------------------
 * Assets to combine on global file
 */
var CSS_FILES = [
	//theme + '/css/bootstrap.css'
];

var JS_FILES = [
	//theme + '/js/bootstrap.min.js'
];


/**
 * ------------------------------------------
 * Assets tasks
 */
gulp.task('assets', ['scripts', 'styles', 'sizes']);

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
		.pipe(gulp.dest(theme + '/css'))
		.pipe(rename('_global.min.css'))
		.pipe(minifyCSS({keepBreaks: false}))
		.pipe(gulp.dest(theme + '/css'));
});

/**
 * ------------------------------------------
 * Scripts goes here
 */
gulp.task('lint', function () {
	return gulp.src(theme + '/js/**/*.js')
		.pipe(jshint())
		.pipe(jshint.reporter('default'));
});
gulp.task('scripts', function () {
	gulp.src(JS_FILES)
		.pipe(concat('_global.js'))
		.pipe(stripDebug())
		.pipe(gulp.dest(theme + '/js'))
		.pipe(rename('_global.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest(theme + '/js'));
});


/**
 * ----------------------------------------
 * Watch Files For Changes
 */
gulp.task('watch', function () {
	gulp.watch([
			theme + '/js/**/*.js',
			'!' + theme + '/js/_global*.js'
		],
		['lint', 'scripts']);
	gulp.watch([
			theme + '/css/*.css',
			'!' + theme + '/css/_global*.css'
		],
		['styles']);
});

/**
 * -------------------------------------------
 * Show the final size of minified versions
 */
gulp.task('sizes', function(){

	gulp.src(theme + '/css/_global.min.css').pipe(filesize());
	gulp.src(theme + '/js/_global.min.js').pipe(filesize());

});




gulp.task('default', ['lint', 'assets', 'watch']);