//Get all the plugins we downloaded when we ran npm install gulp gulp-sass gulp-concat --save-dev
//For every plugin you need, you will have to install it e.g gulp-minify or gulp-clean-css - http://gulpjs.com/plugins/
var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');

var config = {
	//define the sass path, where we want to copy our sass files
	sassPath: './css',
	//define node modules directory
	npmDir: './node_modules'
}

gulp.task('sass', function() {
	return gulp.src('./css/style.scss')
		.pipe(sass({style: 'compressed'})
		.on('error', sass.logError))
		.pipe(gulp.dest('./'));
});