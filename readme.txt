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

NOTE: remember to ignore the node modules folder in your git files as this is a very large folder with lots of different components. Create a .gitignore and add the following:

node_modules
.DS_Store

I am on a Mac and it create .DS_Store folders in every folder, so just ignore it if you are on Linux or Windows. Save, Commit and push it to your environment.

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

Task takes source file style.scss inside css folder, processes it and writes it to style.css.

Now instead of loading multiple css files in functions, we load only one - being styles.css

function theme-name_scripts() {
// Theme stylesheet.
wp_enqueue_style( 'theme-name-style', get_stylesheet_uri() );

}
add_action('wp_enqueue_scripts', 'theme-name_scripts');

Before we run our sass to make sure its doing the right thing, we need to tweak two things inside:

node_modules/bootstrap-sass/assets/stylesheets/_variables.scss

Change this line:

$icon-font-path: if($bootstrap-sass-asset-helper, "bootstrap/", "../fonts/bootstrap/") !default;

to:

$icon-font-path: if($bootstrap-sass-asset-helper, "bootstrap/", "./fonts/bootstrap/") !default;

so that it looks for the fonts folder in the current directory instead of it going one folder up.

And do the same for font-awesome fonts:

node_modules/font-awesome/scss/_variables.scss

change this line:

$fa-font-path:        "../fonts" !default;

to:

$fa-font-path:        "./fonts" !default;

Remember to do the above instructions after everytime time you have run npm install.

Run gulp sass from your command line

$gulp sass
[13:58:37] Using gulpfile ~/Code/themestarter/wp-content/themes/themestarter/gulpfile.js
[13:58:38] Starting 'sass'...
[13:58:39] Finished 'sass' after 1.41 s

the output should be similar to the one above if there are no errors. Please note that your gulpfile might be in a different path location than the one shown above.

We also need to copy fonts(fontawesome plus glyphicons that come with Bootstrap 3.*) from node_modules folder to our fonts folder which we create inside our theme(themestarter) folder.

create a new array to hold all the locations for the fonts to be moved:
var fontsToMove = [
	'./node_modules/font-awesome/fonts/**.*',
	'./node_modules/bootstrap-sass/assets/fonts/*/**.*'
];

Create a new gulp task which we will call fonts in this case:

gulp.task('fonts', function() {
	return gulp.src(fontsToMove, {})
	.pipe(gulp.dest('./fonts'));
});

The task takes whatever we have defined on fontsToMove and copies it to our destination folder called fonts inside our theme(themestarter) folder.

We now need to run

$gulp fonts

Next i will add the minifying our css bit and also concatenating our js files




