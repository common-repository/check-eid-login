===  check-eid-login, check if eID login was used to login  ===
Tags: login, eid, eid-login, require eID login
Contributors: OLF
Requires at least: 5.2
Tested up to: 6.0.2
Stable tag: 1.0.0
Requires PHP: 7.0
License: GPLv2

Require an eID login for standard roles editor, author and contributor.

== Description ==

This simple and light weight plugin checks if eID-Login is active and ensures that users with roles for writing and editing posts require to use
the eID login.

### Why you should we require eID login? ###

eID enables you to have a unique identifier for users allowed to add and change content of your site.

### REQUIRED SEPARATE MODULE ###
In order to use this plugin you need to install eID_login

* [eID-Login – The eID-Login plugin allows to use the German eID-card and similar electronic identity documents for secure and privacy-friendly login to WordPress](https://wordpress.org/plugins/eidlogin/)


== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==

=Is the admin role forced to use eID-Login?=
No. The admin user can use username password authentication as well.

=How do I handle a new user with role editor, author, contributor?=
Create the user and assign subscriber roll only. Let the user assign an eid to her account.
Assign the new user role. Now the user must use eID.

== Changelog ==

= 1.0.0 =
* Plugin release
