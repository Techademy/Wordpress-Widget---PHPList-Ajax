=== Plugin Name ===
Contributors: jthijssen
Donate link: http://www.adayinthelifeof.nl/
Tags: mailing
Requires at least: 3
Tested up to: 3.2.1
Stable tag: trunk

A simple way to display the phplist.hosted ajax subscribe bar.

== Description ==

If you want your users to automatically subscribe to a newsletter by just having to
fill in their email address, this is the plugin for you.

== Installation ==

Setting up your subscription page on phplist:
* Login into the admin panel on your hosted.phplist.com account.
* Goto "configuration" and select "subscribe pages"
* Create a new subscribe page by clicking the "Add a new one" button.
* Make sure you have set the "HTML Email choice" to either default HTML or default TEXT
* Select the option "Don't display email confirmation"
* De-select all attributes that needs to be added
* Add the mailinglists you like the user to automatically subscribe to.
* Click on "save and activate"
* Remember the "subscribe pages id" in front of the newly added page. This is the ID we need to fill in later.
* Log out of the admin panel.


Installing the plugin:
* Copy the phplist-ajax directory into your wp-content/plugins directory
* Activate it
* Go to "Settings" -> "phplist"
* Set the ID of your subscribe page you just have created
* Set the optional submit button text
* Set the optional text you want to appear inside your input box
* Go to "Appearance" and drag the PHPList widget to wherever you want it on the page


Troubleshooting:
* When you enter your email address and gets redirected to the phplist.com site, it means there is still somewhere
a value that needs to be entered. Make sure this value is removed from the subscribe page.


