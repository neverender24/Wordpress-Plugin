<?php
/**
 * Plugin Name: Custom
 * Plugin URI: http://www.mywebsite.com/my-first-plugin
 * Description: The very first plugin that I have ever created.
 * Version: 1.0
 * Author: George The Great
 * Author URI: http://www.mywebsite.com
 */
wp_enqueue_script('mainjs', plugins_url('app.js', __FILE__));

add_action('admin_menu', 'sample_admin_menu');
function sample_admin_menu() {
  add_menu_page('Add Group', 'Group Plugin', 'manage_options', 'group-plugin', 'group_form');
}

function group_form() {
  echo "
      <h3>Create group</h3>
      <form onsubmit='event.preventDefault();'>
        <input type='text' id='group_name' />
        <button id='go'>Go</button>
      </form>
  ";
}

add_action('wp_ajax_my_action', 'my_action');
function my_action() {
    store();
    count_group();

  wp_die();
}

function store() {
  global $wpdb;
  $wpdb->insert(
    'wp_groups',
    array(
      'name' => $_POST['group_name'],
    )
    );
}

function count_group() {
  global $wpdb;
  $group_count = $wpdb->get_var("SELECT COUNT('id') FROM wp_groups");
  return $group_count;
}

