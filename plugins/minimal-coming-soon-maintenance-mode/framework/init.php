<?php
if (!defined('WPINC')) {
	die;
}

class CSMM {
  static function init() {
    if (is_admin()) {
      add_action('admin_action_csmm_change_status', array(__CLASS__, 'change_status'));
    }

    // admin bar notice for frontend & backend
    add_action('wp_before_admin_bar_render', array(__CLASS__, 'admin_bar'));
    add_action('wp_head', array(__CLASS__, 'admin_bar_style'));
    add_action('admin_head', array(__CLASS__, 'admin_bar_style'));
  }

  static function admin_bar_style() {
    $options = csmm_get_options();

    if (isset($_POST['signals_csmm_submit'])) {
      $options['disable_adminbar'] = isset($_POST['signals_csmm_disable_adminbar']);
    }

    // admin bar has to be anabled, user an admin and custom filter true
    if ($options['disable_adminbar'] || false === is_admin_bar_showing() || false === current_user_can('administrator') || false === apply_filters('csmm_show_admin_bar', true)) {
      return;
    }

    // no sense in loading a new CSS file for 2 lines of CSS
    $custom_css = '<style type="text/css">#wpadminbar i.csmm-status-dot { font-size: 17px; margin-top: -7px; color: #02ca02; height: 17px; display: inline-block; } #wpadminbar i.csmm-status-dot-enabled { color: #64bd63; } #wpadminbar i.csmm-status-dot-disabled { color: #FE2D2D; } #wpadminbar #csmm-status-wrapper { display: inline; border: 1px solid rgba(240,245,250,0.7); padding: 0; margin: 0 0 0 5px; background: rgb(35, 40, 45); } #wpadminbar .csmm-status-btn { padding: 0 7px; color: #fff; } #wpadminbar #csmm-status-wrapper.off #csmm-status-off { background: #FE2D2D;} #wpadminbar #csmm-status-wrapper.on #csmm-status-on { background: #64bd63; }#wp-admin-bar-csmm img.logo { height: 17px; margin-bottom: 4px; padding-right: 3px; } #wp-admin-bar-csmm a img { height: 18px; margin-bottom: -4px; padding-right: 3px; } #wpadminbar #wp-admin-bar-csmm-status .ab-empty-item { margin-bottom: 2px; }</style>';

    echo $custom_css;
  } // admin_bar_style


  // add admin bar menu and status
  static function admin_bar() {
    global $wp_admin_bar;
    $options = csmm_get_options();

    if (isset($_POST['signals_csmm_submit'])) {
      $options['disable_adminbar'] = isset($_POST['signals_csmm_disable_adminbar']);
    }

    // only show to admins
    if ($options['disable_adminbar'] || false === current_user_can('administrator') || false === apply_filters('csmm_show_admin_bar', true)) {
      return;
    }

    $options = csmm_get_options();

    if (isset($_POST['signals_csmm_submit'])) {
      $options['status'] = (string) (int) !empty($_POST['signals_csmm_status']);
    }

    if ($options['status'] == '1') {
      $main_label = '<img src="' . CSMM_URL . '/framework/admin/img/mm-icon.png" alt="' . __('Maintenance mode is enabled', 'signals') . '" title="' . __('Maintenance mode is enabled', 'signals') . '"> <span class="ab-label">' . __('Maintenance Mode', 'signals') . ' <i class="csmm-status-dot csmm-status-dot-enabled">&#9679;</i></span>';
      $class = 'csmm-enabled';
      $action_url = add_query_arg(array('action' => 'csmm_change_status', 'new_status' => 'disabled', 'redirect' => urlencode($_SERVER['REQUEST_URI'])), admin_url('admin.php'));
      $action_url = wp_nonce_url($action_url, 'csmm_change_status');
      $action = __('Maintenance mode', 'signals');
      $action .= '<a href="' . $action_url . '" id="csmm-status-wrapper" class="on"><span id="csmm-status-off" class="csmm-status-btn">OFF</span><span id="csmm-status-on" class="csmm-status-btn">ON</span></a>';
    } else {
      $main_label = '<img src="' . CSMM_URL . '/framework/admin/img/mm-icon.png" alt="' . __('Maintenance mode is disabled', 'signals') . '" title="' . __('Maintenance mode is disabled', 'signals') . '"> <span class="ab-label">' . __('Maintenance Mode', 'signals') . ' <i class="csmm-status-dot csmm-status-dot-disabled">&#9679;</i></span>';
      $class = 'csmm-disabled';
      $action_url = add_query_arg(array('action' => 'csmm_change_status', 'new_status' => 'enabled', 'redirect' => urlencode($_SERVER['REQUEST_URI'])), admin_url('admin.php'));
      $action_url = wp_nonce_url($action_url, 'csmm_change_status');
      $action = __('Maintenance mode', 'signals');
      $action .= '<a href="' . $action_url . '" id="csmm-status-wrapper" class="off"><span id="csmm-status-off" class="csmm-status-btn">OFF</span><span id="csmm-status-on" class="csmm-status-btn">ON</span></a>';
    }

    $wp_admin_bar->add_menu(array(
      'parent' => '',
      'id'     => 'csmm',
      'title'  => $main_label,
      'href'   => admin_url('options-general.php?page=maintenance_mode_options'),
      'meta'   => array('class' => $class)
    ));
    $wp_admin_bar->add_node( array(
      'id'    => 'csmm-status',
      'title' => $action,
      'href'  => false,
      'parent'=> 'csmm'
    ));
    $wp_admin_bar->add_node( array(
      'id'     => 'csmm-preview',
      'title'  => 'Preview',
      'href'   => home_url() . '/?preview_coming_soon',
      'parent' => 'csmm',
      'meta'   => array('target' => '_blank')
    ));
    $wp_admin_bar->add_node( array(
      'id'     => 'csmm-settings',
      'title'  => 'Settings',
      'href'   => admin_url('options-general.php?page=maintenance_mode_options'),
      'parent' => 'csmm'
    ));
  } // admin_bar


  // change status via admin bar
  static function change_status() {
    check_admin_referer('csmm_change_status');

    if (empty($_GET['new_status'])) {
      wp_safe_redirect(admin_url());
      exit;
    }

    $options = csmm_get_options();

    if (sanitize_key($_GET['new_status']) == 'enabled') {
      $options['status'] = '1';
    } else {
      $options['status'] = '2';
    }

    update_option('signals_csmm_options', $options);

    if (!empty($_GET['redirect'])) {
      wp_safe_redirect(esc_url($_GET['redirect']));
    } else {
      wp_safe_redirect(admin_url());
    }

    exit;
  } // change_status
} // class csmm

add_action('init', array('CSMM', 'init'));


  // helper function to generate tagged buy links
  function csmm_generate_web_link($placement = '', $page = '/', $params = array(), $anchor = '') {
    $base_url = 'https://comingsoonwp.com';

    if ('/' != $page) {
      $page = '/' . trim($page, '/') . '/';
    }
    if ($page == '//') {
      $page = '/';
    }

    if ($placement) {
      $placement = trim($placement, '-');
      $placement = '-' . $placement;
    }

    $parts = array_merge(array('ref' => 'csmm-free' . $placement), $params);

    if (!empty($anchor)) {
      $anchor = '#' . trim($anchor, '#');
    }

    $out = $base_url . $page . '?' . http_build_query($parts, '', '&amp;') . $anchor;

    return $out;
  } // generate_web_link
