=== Simple Random Quotation ===
Contributors: muskie
Donate link: http://www.muschamp.ca/
Tags: random, quotation
Requires at least: 2.2.0
Tested up to: 3.2.1
Stable tag: trunk

This plugin displays a random quotation upon page load pulled from a simple .csv file.

== Description ==

This plugin displays a random quotation upon page load pulled from a simple .csv file.  You can provide any .csv file you like it should be
of the format:
source, "Quotation"  

There are token css classes/ids to allow you to style the quotations however you like.  The HTML outputed looks like this:

<h4 id="quoationSource">Dante Alighieri:</h4><blockquote id="randomQuotation">There is no greater sorrow than thinking back upon a happy time in misery.</blockquote>

You just need to add a #quotationSource and a #randomQuotation CSS rules or just let the chips fall where they may.

This is my first WordPress plugin it isn't terribly clever.  I eventually looked at the original plugin, hello.php and combined with my experience
writing mashups just cranked it out.

== Installation ==



1. Upload `simpleRandomQuotation` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Widget' menu in WordPress by dragging it to your Dynamic Sidebar
3. Then provide a file path or URL to the .csv file that contains your quotations

== Frequently Asked Questions ==


== Screenshots ==


== Changelog ==

= 0.2 =
Trying to widgetize the thing and get admin options working

= 0.1 =
This is the first attempt to get this working.
