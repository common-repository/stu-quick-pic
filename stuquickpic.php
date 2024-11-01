<?php
    /*
		Plugin Name: Stu's Quick Pic
		Plugin URI: http://stu-in-flag.net/blog/
		Description: A simple plug-in widget to allow the display of a picture from its URL. Developed to allow existing webcam files to be displayed on the blog sidebar without actually modifying the file.
		Version: 0.5
		Author: Stu-in-Flag
		Author URI: http://stu-in-flag.net
		Author email: stu-in-flag@stu-in-flag.net
	*/
	
	/*  Copyright 2010  Stuart Broyles  (email : stubroyles@aol.com)

	    This program is free software; you can redistribute it and/or modify
	    it under the terms of the GNU General Public License as published by
	    the Free Software Foundation; either version 2 of the License, or
	    (at your option) any later version.
	
	    This program is distributed in the hope that it will be useful,
	    but WITHOUT ANY WARRANTY; without even the implied warranty of
	    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	    GNU General Public License for more details.
	
	    You should have received a copy of the GNU General Public License
	    along with this program; if not, write to the Free Software
	    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/
	
	/*	DISCLOSURE: I am not a professional programmer. I produced this widget when I couldn't 
	 	find one that allowed the combination of a URL based image and adjustments
	 	to the height and width of the image. So, I am sharing it because I think
	 	others would value it. While I would like to hear feedback on how the plugin
	 	is functioning for others, I am making no commitment to solving integration
	 	issues, providing updates, or any othersort of support that you would expect
	 	of a professional. I just don't have the knowledge to do that.
	 	
	 	I am using this widget on my own blog and intend to for the long-term. So, I
	 	think it is reasonably safe. There is no error trapping for entering the
	 	wrong values in the admin window on the widgets page. You are the error
	 	trap. If you enter goofy things, you will get goofy, possibly dangerous
	 	results. Still, you can just delete it manually and move along.
	 	
	 	With all those disclaimers, I hope this tool works for you. Please, let me
	 	if you have thoughts, questions or suggestions at stu-in-flag@stu-in-flag.net. 
	 	I'll see what I can do.
	 */

	//	Add function to widgets_init that'll load our widget.
	add_action( 'widgets_init', 'SQP_load_widget' );
	//  Register widget
	function SQP_load_widget() {
		register_widget('StuQuickPic_Widget');	
	}
	class StuQuickPic_Widget extends WP_Widget {
		function StuQuickPic_Widget() {
			/* Widget settings. */
			$widget_ops = array( 'classname' => 'quickpic', 'description' => 'A simple plug-in widget to allow the display of a picture from its URL. Developed to allow existing webcam files to be displayed on the blog sidebar without actually modifying the file.');
			/* Widget control settings. */
			$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'quickpic' );
			/* Create the widget. */
			$this->WP_Widget( 'quickpic', 'Stu Quick Pic', $widget_ops, $control_ops );
		}
		
		function form($instance) {
			/* outputs the options form on admin
				Variable list - Initialized to show my Shark Oil Barometer live webcam shot at http://stu-in-flag.net/sob.jpg
			 * 	sqptitle = title for picture
			 * 	sqpwidth = width for displayed image (initialized to 240 pixels)
			 * 	sqpheight = height for displayed image (initialized to 160 pixels)
			 * 	sqpurl = URL for image location
			 * 	sqpalttxt = alternate text for image
			 *  sqplink = text for making a link to a webpage from the image
			 */
			$defaults = array( 'sqptitle' => 'Shark Oil Barometer', 'sqpwidth' => '240', 'sqpheight' => '160', 'sqpurl' => 'http://stu-in-flag.net/weather/sob.jpg', 'sqpalttxt' => 'Shark Oil Barometer Live', 'sqplink' => 'http://stu-in-flag.net/barometer.php', 'sqpborder' => '5', 'sqpbordercolor' => 'black');
			$instance = wp_parse_args( (array) $instance, $defaults );
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'sqptitle' ); ?>">Title:</label>
				<input id="<?php echo $this->get_field_id( 'sqptitle' ); ?>" name="<?php echo $this->get_field_name( 'sqptitle' ); ?>" value="<?php echo $instance['sqptitle']; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'sqpwidth' ); ?>">Image Width (pixels only):</label>
				<input id="<?php echo $this->get_field_id( 'sqpwidth' ); ?>" name="<?php echo $this->get_field_name( 'sqpwidth' ); ?>" value="<?php echo $instance['sqpwidth']; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'sqpheight' ); ?>">Image Height (pixels only):</label>
				<input id="<?php echo $this->get_field_id( 'sqpheight' ); ?>" name="<?php echo $this->get_field_name( 'sqpheight' ); ?>" value="<?php echo $instance['sqpheight']; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'sqpurl' ); ?>">Image URL(with http://):</label>
				<input id="<?php echo $this->get_field_id( 'sqpurl' ); ?>" name="<?php echo $this->get_field_name( 'sqpurl' ); ?>" value="<?php echo $instance['sqpurl']; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'sqplink' ); ?>">Link URL(with http://):</label>
				<input id="<?php echo $this->get_field_id( 'sqplink' ); ?>" name="<?php echo $this->get_field_name( 'sqplink' ); ?>" value="<?php echo $instance['sqplink']; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'sqpalttxt' ); ?>">Image Alt. Text:</label>
				<input id="<?php echo $this->get_field_id( 'sqpalttxt' ); ?>" name="<?php echo $this->get_field_name( 'sqpalttxt' ); ?>" value="<?php echo $instance['sqpalttxt']; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'sqpborder' ); ?>">Pic Border(pixels, 0 = no border)</label>
				<input id="<?php echo $this->get_field_id( 'sqpborder' ); ?>" name="<?php echo $this->get_field_name( 'sqpborder' ); ?>" value="<?php echo $instance['sqpborder']; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'sqpbordercolor' ); ?>">Border Color (basic colors, red, black,etc)</label>
				<input id="<?php echo $this->get_field_id( 'sqpbordercolor' ); ?>" name="<?php echo $this->get_field_name( 'sqpbordercolor' ); ?>" value="<?php echo $instance['sqpbordercolor']; ?>" style="width:100%;" />
			</p>
			<?php
		}
		
		function update($new_instance, $old_instance) {
			// processes widget options to be saved
			
			$instance = $old_instance;
			$instance['sqptitle'] =  $new_instance['sqptitle'];
			$instance['sqpwidth'] =  $new_instance['sqpwidth'];
			$instance['sqpheight'] =  $new_instance['sqpheight'];
			$instance['sqpurl'] =  $new_instance['sqpurl'];
			$instance['sqpalttxt'] =  $new_instance['sqpalttxt'];
			$instance['sqplink'] =  $new_instance['sqplink'];
			$instance['sqpborder'] =  $new_instance['sqpborder'];
			$instance['sqpbordercolor'] =  $new_instance['sqpbordercolor'];
			return $instance;
	
		}
		
		function widget($args, $instance) {
			// Actual widget - displays a image file from a URL
			extract($args);
			echo $before_widget;
			echo $before_title.$instance['sqptitle'].$after_title;
			echo '<a href="'.$instance[sqplink].'" target="_blank"> <img alt="'.$instance['sqpalttxt'].'" src="'.$instance['sqpurl'].'" title="'.$instance['sqptitle'].'" width="'.$instance['sqpwidth'].'" height="'.$instance['sqpheight'].'" style="border: '.$instance['sqpborder'].'px solid '.$instance['sqpbordercolor'].';"/></a>';
			echo $instance['sqptitle'];
			echo $after_widget;
		}
}
?>
