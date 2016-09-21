var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();
var runSequence = require('run-sequence');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'expanded'
};

var productionFiles = ''

gulp.task('browser-sync', function() {

	var files = [
		'**/*.php',
		'assets/**/*.+(svg|jpg|jpeg|png|php)'
	];

	browserSync.init(files, {
	proxy: {
		target: 'localhost',
		ws: true
	}
	});
});

gulp.task('laura', function() {
	console.log('laura');
});

gulp.task('scripts', function() {
	return gulp.src('js/src/*.js')
	.pipe(concat('scripts.js'))
	.pipe(gulp.dest('./js/'))
	.pipe(browserSync.reload({stream: true}));
});

gulp.task('sass', function() {
	return gulp.src('sass/**/*.scss')
		.pipe(sass(sassOptions).on('error', sass.logError))
		.pipe(sourcemaps.write('.'))
		.pipe(autoprefixer())
		.pipe(gulp.dest('./css/'))
		.pipe(browserSync.reload({stream: true}));
});

gulp.task('php', function() {
	return gulp.src('**/*.php')
		.pipe(browserSync.reload({stream: true}));
});

gulp.task('watch', ['browser-sync', 'sass', 'scripts', 'laura'], function() {
	gulp.watch('sass/**/*.scss', ['sass']);
	gulp.watch('**/*.js', ['scripts']);
});

gulp.task('default', ['watch']);

// production

gulp.task('rootfiles', function() {
	return gulp.src('*.+(php|png|css)')
	.pipe(gulp.dest('./dist/tuomas'));
});

gulp.task('inc', function() {
	return gulp.src('inc/*.php')
	.pipe(gulp.dest('./dist/tuomas/inc'));
});

gulp.task('template-parts', function() {
	return gulp.src('template-parts/*.php')
	.pipe(gulp.dest('./dist/tuomas/template-parts'));
});

gulp.task('page-templates', function() {
	return gulp.src('page-templates/*.php')
	.pipe(gulp.dest('./dist/tuomas/template-parts'));
});

gulp.task('js', function() {
	return gulp.src('js/*.js')
	//.pipe(rename('scripts.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('./dist/tuomas/js'));
});

gulp.task('css', function() {
	return gulp.src('css/*.css')
	.pipe(gulp.dest('./dist/tuomas/css'));
});

gulp.task('icons', function() {
	return gulp.src('assets/icons/*.+(svg|php)')
	.pipe(gulp.dest('./dist/tuomas/assets/icons'));
});

gulp.task('images', function() {
	return gulp.src('assets/images/*.+(svg|png|jpeg|jpg)')
	.pipe(gulp.dest('./dist/tuomas/assets/images'));
});

gulp.task('build', function(callback) {
	runSequence('sass', 'scripts', ['rootfiles', 'inc', 'template-parts', 'page-templates', 'js', 'css', 'icons', 'images']), callback
});
