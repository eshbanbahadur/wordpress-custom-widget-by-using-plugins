<?php

// This is a simple demonstration of making a custom widget in Wordpress
//By Using Plugins. Save Widget Data in Wordpress And Display it on Frontend
 
/*

Plugin Name: Eshban Custom Widget
Plugin URI: https://www.github.com/eshbanbahadur/
Description: A Custom Widget implemention by using plugin
Version: 1.0
Author: Eshban Bahadur
Author URI: https://www.github.com/eshbanbahadur/
License: GPLv2 or later
*/


if(!class_exists("EshbanCustomWidget")){

	class EshbanCustomWidget extends WP_Widget{
		
		//This Constructor function provides name to the widget
		public function __construct(){
			parent::WP_Widget(false,"Eshban Custom Widget");
		}
		
		// UI Section In Wordpress Widgets Area
		public function form($instance){
			if(!empty($instance)){
				$name = $instance['name'];
				$short_description = $instance['short_description'];
			}
			else{
				$name = "";
				$short_description="";
			}
		?>
		
		<label for="<?php echo $this->get_field_id('name'); ?>">Name:</label>
		<input type="text" name="<?php echo $this->get_field_name('name'); ?>" id="<?php echo $this->get_field_id('name'); ?>" value="<?php echo $name; ?>" />
		
		<label for="<?php echo $this->get_field_id('short_description'); ?>">Short Description:</label>
		<textarea name="<?php echo $this->get_field_name('short_description'); ?>" id="<?php echo $this->get_field_id('short_description'); ?>" ><?php echo $short_description; ?></textarea>
		
		<?php
		}
		
		//Overiding this method from WP_Widget Class.
		//It updates the value from the old instance to the new instance
		public function update($new_instance,$old_instance){
			$instance = $old_instance;
			$instance['name']=$new_instance['name'];
			$instance['short_description']=$new_instance['short_description'];
			return $instance;
		}
	
		//Overiding this method from WP_Widget Class to display values on frontend
		public function widget($args,$instance){
			echo "<strong>Name = ".$instance['name']."</strong>"."<br>";
			echo "<strong>Short Description = ".$instance['short_description']."<strong>";
			
		}
			
		
		
	}
	
	function register_eshban_widget(){
		register_widget("EshbanCustomWidget");
	}
	
	add_action("widgets_init","register_eshban_widget");
	
}

?>