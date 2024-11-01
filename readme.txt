=== Plugin Name ===
Contributors: stu-in-flag
Donate link: http://stu-in-flag.net/sqp_plugin
Tags: webcam, photo, photograph, image, pic, picture, jpg, jpeg, png, gif, widget, plugin, url, 
Requires at least: 2.9.2
Tested up to: 2.9.2
Stable tag: 0.5

A simple plug-in widget to allow the display of a picture from its URL.

== Description ==

	*	A simple plug-in widget to allow the display of a picture from its URL. 
	Developed to allow existing webcam files to be displayed on a blog 
	sidebar without actually modifying the file. The title of the displayed
	widget, the image height and width, alternate text for the image and
	image URL can be modified on the widget admin page.
	*	The image is initialized to my webcam picture of a Shark Oil Barometer
	which is located in Switzer Canyon in Arizona, USA. The link for that
	page is http://stu-in-flag.net/barometer.php. But, this can be easily
	modified to another URL source.
	*	I am not a professional programmer. I produced this widget when I couldn't 
	find one that allowed the combination of a URL based image and adjustments
	to the height and width of the image. So, I am sharing it because I think
	others would value it. While I would like to hear feedback on how the plugin
	is functioning for others, I am making no commitment to solving integration
	issues, providing updates, or any othersort of support that you would expect
	of a professional. I just don't have the knowledge to do that.
	*	I am using this widget on my own blog (http://stu-in-flag.net/blog/) and 
	intend to for the long-term. So, I think it is reasonably safe. There is no 
	error trapping for entering the wrong values in the admin window on the 
	widgets page. You are the error trap. If you enter goofy things, you will
	get goofy, possibly irritating results. Still, you can just delete it 
	manually and move along.
	*	With all those disclaimers, I hope this tool works for you. It was fun learning
	while writing this tool. I am open to learning more to make it better. Please, 
	let me if you have thoughts, questions or suggestions at 
	
		stu-in-flag@stu-in-flag.net. 
	
		I'll see what I can do.

== Installation ==

1. 	Upload the unzipped `stuquickpic.php` to the `/wp-content/plugins/` directory
2. 	Activate the plugin through the 'Plugins' menu in WordPress
3. 	Include the widget on your sidebar, header or footer as allowed by your them.
	This is done on the 'Widgets' admin page which is found in the 'Appearance'
	section of the admin menu. See screenshot2.png. Drag the widget to the appro-
	priate section.
4.	Setup the widget to show your picture using the admin window. Adjust sizing
	to fit your theme. See Screenshot2.png When picking a border color, simply enter
	the internet name for the color(http://www.w3schools.com/HTML/html_colornames.asp).
	Custom colors can be entered with the hex code (i.e. #114488). There is no error
	checking of color names. Mispelled color names will result in no border appearing.

== Frequently Asked Questions ==

1.  How do I upload my webcam image to the internet?
	
	This is outside the scope of this widget, but I use YAWCAM 0.3. I found it at
	http://www.yawcam.com. I don't know about it's on-going availability
	
2.	How do I send you a question?

	As I am writing this before launching on WordPress, I have no real FAQs. My
	WordPress username is stu-in-flag. My email is Stu-in-flag@stu-in-flag.net.
	Please, send me questions or constructive comments

== Screenshots ==

screenshot1.png		This screenshot shows the output of the widget on my blog.
					It is in the upper right corner. (Shark Oil Barometer)

screenshot2.png		This screenshot shows the 'Widget' admin page in WordPress
					There are several useful parts. First, on the middle left
					side of the image, the location of the 'Widget' menu selection
					is located under the 'Appearance' tab. Secoond, it shows the
					widget in the sidebar location. Third, it shows the admin
					control window and the variables which can be altered.

== Changelog ==
0.1	Version 0.1 was used only by me. It was quite a learning experience.

0.2	Initial Public Release. Version 0.1 was used only by me.

0.3 Added link for image. Fixed typo in the variable initiation for sqplalttxt.
	Cleaned up readme.txt to look better on Wordpress.org

0.4 Added code for image link to open in new page.

0.5 Added border option

