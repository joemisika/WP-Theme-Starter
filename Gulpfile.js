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

gulp.task('copy-files', function() {
	return gulp.src(['./node_modules/bootstrap-sass/assets/stylesheets/bootstrap.scss', './node_modules/font-awesome/scss/font-awesome.scss'])
		.pipe(gulp.dest('./css/'))
});