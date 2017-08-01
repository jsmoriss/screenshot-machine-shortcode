=== JSM's Screenshot Machine Shortcode ===
Plugin Name: JSM's Screenshot Machine Shortcode
Plugin Slug: screenshot-machine-shortcode
Text Domain: screenshot-machine-shortcode
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://jsmoriss.github.io/screenshot-machine-shortcode/assets/
Tags: screenshot, machine, shortcode
Contributors: jsmoriss
Requires At Least: 3.7
Tested Up To: 4.8.1
Stable Tag: 1.1.3

Shortcode to include images from Screenshot Machine in your content.

== Description ==

Use the `ssm` shortcode in your content with the following arguments:

* key="{account key}"
* url="{website url}"
* size="{size letter}" (default=T)
* format="{jpg|png|gif}" (default=jpg)
* days="{cache expiration}" (default=14)
* wait="{wait in ms}" (default=200)
* title="{href title}"
* link="{yes|no}" (default=yes)
* target="{link target}" (default=_blank)
* refresh="{yes|no}" (default=yes)

<!--more-->

You can find the {account key} on [your Screenshot Machine account/settings page](https://www.screenshotmachine.com/account.php).

The {website url} is the web page URL to capture into a screenshot.

Valid {size letter} values are:

* T = Width 120 x Height 90
* S = Width 200 x Height 150
* E = Width 320 x Height 240
* N = Width 400 x Height 300
* M = Width 640 x Height 480
* L = Width 800 x Height 600
* X = Width 1024 x Height 768

{jpeg|png|gif} is the image format to use (default is jpg).

{cache expiration} is the number of days a screenshot should be used before a new one is created.

{wait in ms} is the number of milliseconds to wait before capturing the screenshot.

{href title} is the title text for the image alt and link title.

The link yes/no value will determine if the image is linked to the web page URL or not.

The {link target} default will open links in a new window/tab. An empty string, '_self', '_top', '_parent', and a framename are also valid.

The refresh parameter includes javascript to retry the image every second until it's available (for a maximum of 10 seconds).

Example:

<pre>
&#91;ssm key="abc123" url="https://surniaulula.com/extend/plugins/screenshot-machine-shortcode/" size="S"&#93;
</pre>

== Installation ==

= Automated Install =

1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. In the *Search* box, enter the plugin name.
1. Click the *Search Plugins* button.
1. Click the *Install Now* link for the plugin.
1. Click the *Activate Plugin* link.

= Semi-Automated Install =

1. Download the plugin archive file.
1. Go to the wp-admin/ section of your website.
1. Select the *Plugins* menu item.
1. Select the *Add New* sub-menu item.
1. Click on *Upload* link (just under the Install Plugins page title).
1. Click the *Browse...* button.
1. Navigate your local folders / directories and choose the zip file you downloaded previously.
1. Click on the *Install Now* button.
1. Click the *Activate Plugin* link.

== Frequently Asked Questions ==

= Frequently Asked Questions =

* None

== Other Notes ==

= Additional Documentation =

* None

== Screenshots ==

== Changelog ==

= Repositories =

* [GitHub](https://jsmoriss.github.io/screenshot-machine-shortcode/)
* [WordPress.org](https://wordpress.org/plugins/screenshot-machine-shortcode/developers/)

= Version Numbering =

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes / re-writes or incompatible API changes.
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

= Changelog / Release Notes =

**Version 1.1.3 (2017/04/08)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Maintenance release - update to version numbering scheme.
	* Dropped the package number from the production version string.

== Upgrade Notice ==

= 1.1.3 =

(2017/04/08) Maintenance release - update to version numbering scheme.

