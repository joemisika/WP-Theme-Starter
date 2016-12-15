=== Theme Starter ===
Contributors: Maverick Maven Co
Requires at least: WordPress 4.4
Tested up to: WordPress 4.5
Version: 1.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==
Theme Starter is a modernized theme starter pack using SASS, Twitter Bootstrap, Fontawesome etc and gulp to compile all into one file instead of having multiple css / js file. Doing this will give your WordPress theme a speed boost as it will mean loading a limited number of files instead of loading a fontawesome.css, bootstrap.css and a style.css.

== Installation ==
1. Create a folder - give it a name -  in your themes directory
2. Clone this repo into your folder(theme-folder-name) above
3. Change the name from Starter Theme in css/style.scss to your theme name or just run a search and replace for Starter Theme or Starter_Theme to your theme name.
4. In your admin panel, go to Appearance -> Themes and click the 'Add New' button.
5. Type in Theme Name in the search form and press the 'Enter' key on your keyboard.
3. Click on the 'Activate' button to use your new theme right away.
4. The theme doesn't come with much of a guide as its just barebones of using gulp with bootstrap & fontawesome
5. Code as desired.

== Copyright ==

Theme Starter WordPress Theme, Copyright 2016 http://maverickmaven.co
Theme Starter is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

Theme Starter uses the following third-party resources:

Twitter Bootstrap 3.3.7

Fontawesome 4.7.0

Image used in screenshot.png: A photo by Austin Schmid (https://unsplash.com/schmidy/), licensed under Creative Commons Zero(http://creativecommons.org/publicdomain/zero/1.0/)

== Changelog ==

= 1.0 =
* Released: December 15, 2015

Initial release

== Notes ==

Only the basics with notes on what to do with gulp.

Make sure you have npm & node installed on your machine - https://nodejs.org/en/download/package-manager. If you have issues about Permissions, please run commands as a super user.

$ npm install -g gulp gulp-cli

Switch to the folder with the theme:

$ cd theme-folder-name/wp-content/theme-name

Install gulp, gulp-concat(for concatenation) and gulp-sass locally, still inside the theme-name folder
$ npm install gulp gulp-concat gulp-sass --save-dev
-this will also create a node_modules folder - make sure you include it to your gitignore as its a big folder and we don't want it pushed up to the server. We can always get it for a new project by running npm install

Create a Gulpfile.js inside the theme-name

$ touch Gulpfile.js

New Folder/file structure
-theme-name-folder
--css(folder)
--js(folder)
--images(folder)
--node_modules(folder)
--fonts
--404.php
--about.php
--contact.php
--Gulpfile.js
--footer.php
--functions.php
--header.php
--index.php
--package.json
--style.css

In style.scss we then do an import of the bootstrap plus font-awesome sass files - they are already included in the node_modules folder, if they are not then just run:

$ npm install bootstrap-sass font-awesome --save-dev

styles.scss

@import "./node_modules/bootstrap-sass/assets/stylesheets/bootstrap"
@import "./node_modules/font-awesome/scss/font-awesome";

in your Gulpfile.js then put the following information:
NOTE: The plugins we downloaded when we ran npm install gulp gulp-sass gulp-concat --save-dev

var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');

gulp.task('sass', function() {
	return gulp.src('./css/style.scss')
		.pipe(sass({style: 'compressed'})
		.on('error', sass.logError))
		.pipe(gulp.dest('./'));
});

Task takes source file style.scss inside css folder, processes it and writes it to style.css. Check it you will see it has the comment we had in style.scss, bootstrap css and fontawesome css

Now instead of loading multiple css files in functions, we load only one - being styles.css

function theme-name_scripts() {
// Theme stylesheet.
wp_enqueue_style( 'ssb-style', get_stylesheet_uri() );

}
add_action('wp_enqueue_scripts', 'theme-name_scripts');

Next i will add the minifying our css bit and also concatenating our js files



