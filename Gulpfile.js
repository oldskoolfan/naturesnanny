/*
    Gulp.js file for nature's nanny
    last modified: 1.31.15
*/

var gulp = require('gulp'),
    gulpif = require('gulp-if'),
    path = require('path'),
    args = require('minimist')(process.argv.slice(2))
    gutil = require('gulp-util'),
    plumber = require('gulp-plumber'),
    coffee = require('gulp-coffee'),
	sass = require('gulp-sass'),
	concat = require('gulp-concat'),
    wrap = require('gulp-wrap'),
    declare = require('gulp-declare'),
	uglify = require('gulp-uglify'),
	minifycss = require('gulp-minify-css'),
    prefix = require('gulp-autoprefixer'),
	livereload = require('gulp-livereload'),
	server = require('tiny-lr')(),
	watch = require('gulp-watch'),
	lrport = 35729,
	srcPaths = {
        coffee: 'coffee/**/*.coffee',
		scripts: 'assets/js/*.js', 
		sass: 'sass/**/*.scss',
        hbs: 'templates/**/*.hbs'
	},
    destPaths = {
        js: 'assets/js',
        css: 'assets/css'
    };

// error handler
var onError = function (err) {
    gutil.beep();
    console.log(err.toString());
    this.emit('end');
};

// default task -- if prod, watch won't happen
gulp.task('default', ['sass', 'coffee', 'watch']);

gulp.task('sass', function() {
    return gulp.src('sass/main.scss')
        .pipe(plumber({
            errorHandler: onError
        }))
        .pipe(sass())
        .pipe(prefix("last 2 versions", "> 1%", "ie 8"))
        .pipe(gulpif(!args.dev, minifycss()))
        .pipe(gulp.dest(destPaths.css))
        .pipe(gulpif(args.dev, livereload(server)));
});

// helper tasks
gulp.task('coffee', function () {
    return gulp.src(srcPaths.coffee)
        .pipe(plumber({
            errorHandler: onError
        }))
        .pipe(coffee({
            bare: true
        }))
        .pipe(concat('main.min.js'))
        .pipe(gulpif(!args.dev, uglify()))
        .pipe(gulp.dest(destPaths.js))
        .pipe(gulpif(args.dev, livereload(server)));
});

gulp.task('uglify', function() {
    return gulp.src(srcPaths.scripts)
    .pipe(concat('main.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(destPaths.js));
});

gulp.task('watch', function () {
    // only watch if in dev
    if (!args.dev) { return; }
    server.listen(lrport);    
    gulp.watch(srcPaths.sass, ['sass']);
    gulp.watch(srcPaths.coffee, ['coffee']);
});