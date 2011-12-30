<?php
/*
Plugin Name: PHPList.Ajax Widget
Plugin URI: http://www.adayinthelifeof.nl/
Description: Displays a sidebar submit bar for phplist.hosted
Version: 1.0.0
Author: Joshua Thijssen
License: New BSD
*/


class WP_Widget_PHPListAjax extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_phplistajax', 'description' => __( "A submission bar for phplist.hosted") );
        parent::__construct('PHPListAjax', __('PhpList Ajax'), $widget_ops);
    }

    function widget( $args, $instance ) {
        extract($args);
        $button = apply_filters('widget_button', $instance['button'], $instance, $this->id_base);
        $input = apply_filters('widget_title', $instance['input'], $instance, $this->id_base);
        $id = apply_filters('widget_id', $instance['id'], $instance, $this->id_base);

        if (!$button) {
            $button = __('Subscribe to our newsletter');
        }

        echo '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>';
        echo '<script type="text/javascript" src="https://s3.amazonaws.com/phplist/phplist-subscribe-0.2.min.js"></script>';

        echo '<script type="text/javascript">var pleaseEnter = "'.$input.'"; </script>';
        echo '<script type="text/javascript">var thanksForSubscribing = \'<div class="subscribed">Thanks for subscribing. Please check your inbox and click the link in the request for confirmation message.</div>\'; </script> ';

        echo '<div id="phplistsubscriberesult"></div>';
        echo '<form action="http://techademy.hosted.phplist.com/lists/?p=subscribe&id='.$id.'" method="post" id="phplistsubscribeform">';
        echo '<input type="text" name="email" value="" id="emailaddress" />';
        echo '<button type="submit" id="phplistsubscribe">'.$button.'</button>';
        echo '</form>';
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'id' => '', 'button' => '', 'input' => '') );
        $id = $instance['id'];
        $button = $instance['button'];
        $input = $instance['input'];

?>
        <p><label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Id:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo esc_attr($id); ?>" /></label></p>
        <p><label for="<?php echo $this->get_field_id('button'); ?>"><?php _e('Button text :'); ?> <input class="widefat" id="<?php echo $this->get_field_id('button'); ?>" name="<?php echo $this->get_field_name('button'); ?>" type="text" value="<?php echo esc_attr($button); ?>" /></label></p>
        <p><label for="<?php echo $this->get_field_id('input'); ?>"><?php _e('Input text :'); ?> <input class="widefat" id="<?php echo $this->get_field_id('input'); ?>" name="<?php echo $this->get_field_name('input'); ?>" type="text" value="<?php echo esc_attr($input); ?>" /></label></p>
<?php
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $new_instance = wp_parse_args((array) $new_instance, array( 'button' => '', 'input' => '', 'id' => ''));
        $instance['id'] = strip_tags($new_instance['id']);
        $instance['button'] = strip_tags($new_instance['button']);
        $instance['input'] = strip_tags($new_instance['input']);
        return $instance;
    }

}


add_action('widgets_init', create_function('', 'return register_widget("WP_Widget_PHPListAjax");'));


