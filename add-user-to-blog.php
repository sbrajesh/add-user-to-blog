<?php 
 /**
  * Plugin Name: Add User to blog
  * Version:1.0
  * Network:True
  * Author: Brajesh Singh
  * Description: Automatically add logged in user to the current blog on a WordPress Multisite Install
  * Plugin URI: http://buddydev.com
  * License: GPL
  */
add_action('wp','bpdev_add_user_to_blog',10);//hook our function
 
/*add logged in user to current blog*/
function bpdev_add_user_to_blog(){
if(!is_user_logged_in())
    return false;//do not do anything

$blog_id=get_current_blog_id();
$user_id=get_current_user_id();
 $role="subscriber";//the role you want to assign to the user
if(!is_user_member_of_blog( $user_id, $blog_id ))//check for current membership
    add_user_to_blog($blog_id, $user_id, $role);
 
}
?>