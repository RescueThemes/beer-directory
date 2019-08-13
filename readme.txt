=== Beer Directory ===
Contributors: rescuethemes
Tags: beer, directory, brewery, homebrew, brew, hops, malt, yeast
Stable tag: 1.1
Requires at least: 4.0
Tested up to: 5.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Enables a beer post type and beer list shortcode.

== Description ==

This plugin allows home brewers, professional breweries, and beer afficianadoes to enter individual beer, beer categories, and beer details. It provides a shortcode that will allow for display management.

**Features include:**

* Easily categorize and group your beer with a configurable shortcode.
* Enter details for your beer that include: ABV, IBU, OG, FG, SRM/Color, Malts, Hops, and Yeast.

**New features**
We want to improve the Beer Directory plugin based on your feedback! Please let us know via the plugin's support tab and [subscribe to our mailing list](http://rescuethemes.us6.list-manage.com/subscribe?u=e996b9d9a5&id=a41af7345e) to get notified of new developments.

== Installation ==

1. Install Beer Directory either via the WordPress.org plugin directory, or by uploading the files to your server.
2. After activating the plugin, a new menu item named "Beer" will be added to your WordPress dashboard. Select the "Add Beer" menu and start inputing your individual beer.
3. To display your beer, paste the beer shortcode anywhere you'd like to display them and adjust the shortcode attributes to your liking:

`[beer count="5" orderby="title" category="american-ale" id="34"]`

4. That's it. Your beer is ready for the world!

== Frequently Asked Questions ==

= How to display a single beer? =

Paste the beer shortcode and enter the post id of the beer you want to display:

`[beer id="34"]`

= How to display all of the beer posts? =

You can use the shortcode without any attributes and it will display all of the beer posts as a list:

`[beer]`

= What are all of the shortcode attributes? =

The shortcode can be adjusted to display the following:

* __count__ - Enter the number of beer to display. To display all of the beer posts, enter -1 (negative one).
* __orberby__ - Enter any of the WP_Query orderby strings. A complete list can be viewed at [Order & Orderby Parameters](http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters).
* __category__ - Enter the name of the beer category to display. Leave blank to show all beer regardless of category.
* __id__ - To display an individual beer, enter the beer post's id number.

`[beer count="5" orderby="title" category="american-ale" id="34"]`

= How to add an image to the beer post? =

The image assigned as the "featured image" in the beer post will automatically display.

== Credit ==

team-post-type - ​https://github.com/devinsays/team-post-type
License: GPL-2.0+ - http://www.gnu.org/licenses/gpl-2.0.html
Copyright: Devin Price, @devinsays  

Dashboard Glancer - http://gamajo.com/dashboard-glancer
License: GPL-2.0+ - http://www.gnu.org/licenses/gpl-2.0.html
Copyright: Gary Jones, Gamajo Tech

== Changelog ==

= 1.1, August 13, 2019 =
* Added Availability attribute
* Tested with WordPress 5.2.2

= 1.0, April 5, 2019 =
* Tested with WordPress 5.1.1

= 0.0.5 = June 23, 2016
* Updated text domain hook so translations work

= 0.0.4 = June 23, 2015
* Updated text domain to 'beer-directory'
* Updated .pot translation file

= 0.0.3 = May 15, 2015
* Updated text domain to 'beer-post-type'
* Updated .pot translation file

= 0.0.2 = April 20, 2015
* Added .pot translation file

= 0.0.1 = March 31, 2015
* Initial release