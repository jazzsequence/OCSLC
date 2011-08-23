OCSLC WordPress Theme Project

Please refer to this readme for any updates to the files.

The goal of this project is to create a child theme of Darren Hoyt's Mimbo theme (http://www.darrenhoyt.com/2007/08/05/wordpress-magazine-theme-released/) that uses custom menus and an alternate method for post thumbnails, among other cosmetic changes.

The most recent version of Mimbo can be found in this repository in the /mimbo directory.  Please note that this is *not* the way it would be in an actual WordPress environment...Mimbo would be in its' own directory -- this is just for convenience so people can have the same versions of the files for development purposes.


Changelog

-- 08/10/2011 --
-- Version 0.1 --
* initial commit
* renamed theme from My Awesome Child Theme to OCSLC
* changed Theme URI
* updated description slightly
* copied mimbo theme into ocslc directory for git repository
* reset background color to default

-- 08/19/2011 --
-- Version 0.1.1 --
* created images directory
* added OC logo and xmission credit to images directory
* added logo to header.php (needs work) and changed h1 style
* fixed logo positioning
* added additional h1 styling
* moved description to the right side
* cleaned up search bar position
* updated footer and added xmission credit
* added new function to create a meta box on pages for featured content (for the home page)
* created new home page template, keeping the mimbo layout but ripping out the custom loop stuff

-- Version 0.2.1 -- 
* added widgetized sidebar for home page layout
* changed p and ul styling
* removed category title in sidebar
* added page.php template without comment block
* added webfont
* added desryl.css to main css
* moved mimbo dropdown.js script to functions.php with wp_register_script
* used automatic-feed-links instead of old fashioned feed links
* ded droid sans import via wp_register_style

-- Version 0.2.2 --
* fixed typo
* changed position of title
* changed #masthead padding
* changed #description margins
* updated version to 0.5

-- 08/23/2011 --
-- Version 0.5.1 --
* moved search box to the sidebar
* some css resets and adjustments to accomodate new search box position
* added some h3 styles for home page headings