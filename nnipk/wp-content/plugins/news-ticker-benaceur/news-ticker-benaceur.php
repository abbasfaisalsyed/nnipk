<?php
/** 
Plugin Name: news ticker benaceur
Plugin URI: http://benaceur-php.com/
Description: This plugin allow you to display the latest posts or latest comments in a bar with twenty five beautiful animations and effects...
Version: 2.5
Author: benaceur
Author URI: http://benaceur-php.com/
License: GPL2
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define("NSTR_BEN", "news-ticker-benaceur");
define("NS_TR_BEN", "news_ticker_benaceur");
define("O_G", "options-general.php");
define("NTB_P_PHP", "news-ticker-benaceur-page.php");

function news_ticker_benaceur_action_links($links){
	$links[] = '<a href="'.get_admin_url(null, ''.O_G.'?page='.NS_TR_BEN.'').'">'.__("Settings", 'news-ticker-benaceur').'</a>';
	return $links;
}
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'news_ticker_benaceur_action_links');


load_plugin_textdomain( 'news-ticker-benaceur', false, basename( dirname( __FILE__ ) ) . '/lang/' );

add_action('admin_init', 'news_ticker_benaceur_register_options');

  add_action('admin_menu', 'menu_news_ticker_benaceur');
  function menu_news_ticker_benaceur() {
  if (function_exists('add_options_page')) :
  $filter_cap_manage_ntb = apply_filters( 'ntb_manage_options_cap', 'manage_options' );
  $plugin_page_options = add_options_page('news-ticker-benaceur', 'News-Ticker-Benaceur', $filter_cap_manage_ntb, ''.NS_TR_BEN.'', 'news_ticker_benaceur_page_options');
  endif;
  }

  function news_ticker_benaceur_register_options() { 
	
  register_setting('news_ticker_benaceur_group_op', 'news_ticker_benaceur_delete_all_options');
  register_setting('news_ticker_benaceur_group_op', 'news_ticker_benaceur_ntb_st_code');
  register_setting('news_ticker_benaceur_all_reset', 'ntb_all_reset');

  global $AllOptionsNTB;	
  $AllOptionsNTB = array(
  'news_ticker_benaceur_for_visitors',
  'news_ticker_benaceur_links_admin_bar_front',
  'news_ticker_benaceur_links_admin_bar_admin',  
  'news_ticker_benaceur_enable_plug',
  'news_ticker_benaceur_for_users',
  'news_ticker_benaceur_for_role_x',
  'news_ticker_benaceur_for_user_id',
  'news_ticker_benaceur_links_admin_bar_menu',
  'news_ticker_benaceur_dir',
  'news_ticker_benaceur_for_cat',
  'news_ticker_benaceur_for_all_expt_admin',
  'news_ticker_benaceur_in_home',
  'news_ticker_benaceur_in_single',
  'news_ticker_benaceur_in_page',
  'news_ticker_benaceur_in_category',
  'news_ticker_benaceur_in_author',
  'news_ticker_benaceur_in_search',
  'news_ticker_benaceur_in_page_id',
  'news_ticker_benaceur_in_single_id',
  'news_ticker_benaceur_title_ltr',
  'news_ticker_benaceur_title_rtl',
  'news_ticker_benaceur_num_posts',
  'news_ticker_benaceur_disable_title',
  'news_ticker_benaceur_latest_p_c',
  'news_ticker_benaceur_include_exclude_id',
  'news_ticker_benaceur_expt_txt_title',
  'news_ticker_benaceur_expt_txt_comm',
  'news_ticker_benaceur_title_anim_pulsate',
  'news_ticker_benaceur_title_styles',
  'news_ticker_benaceur_title_styles_topleft_le',
  'news_ticker_benaceur_title_styles_topright_le',
  'news_ticker_benaceur_title_styles_topleft_ri',
  'news_ticker_benaceur_title_styles_topright_ri',
  'news_ticker_benaceur_title_styles_bottomright',
  'news_ticker_benaceur_title_styles_bottomleft',
  'ntb_group_reset'
   );
  foreach($AllOptionsNTB as $optionN_NTB) {
    register_setting('news_ticker_benaceur_group', $optionN_NTB);
}	

  global $AllOptionssNTB;	
  $AllOptionssNTB = array(
  'news_ticker_benaceur_color_back_',
  'news_ticker_benaceur_color_back_title',
  'news_ticker_benaceur_color_text_back',
  'news_ticker_benaceur_color_text_title',
  'news_ticker_benaceur_color_border',
  'news_ticker_benaceur_border_top',
  'news_ticker_benaceur_border_bottom',
  'news_ticker_benaceur_border_right',
  'news_ticker_benaceur_border_left',
  'news_ticker_benaceur_border_radius',
  'news_ticker_benaceur_opacity',
  'news_ticker_benaceur_font_family',
  'news_ticker_benaceur_font_size',
  'news_ticker_benaceur_font_size_title',
  'news_ticker_benaceur_width',
  'news_ticker_benaceur_padding_top',
  'news_ticker_benaceur_padding_bottom',
  'news_ticker_benaceur_margin_top',
  'news_ticker_benaceur_margin_bottom',
  'news_ticker_benaceur_font_weight',
  'news_ticker_benaceur_text_shadow',
  'news_ticker_benaceur_text_shadow_color',
  'news_ticker_benaceur_box_shadow',
  'news_ticker_benaceur_box_shadow_color',
  'news_ticker_benaceur_box_shadow_v',
  'news_ticker_benaceur_PrevNext_color',
  'news_ticker_benaceur_PrevNext_font_size',
  'news_ticker_benaceur_title_font_family',
  'news_ticker_benaceur_PrevNext_weight',
  'news_ticker_benaceur_PrevNext_top',
  'news_ticker_benaceur_enable_style_mobile',
  'news_ticker_benaceur_screen_max_width',
  'news_ticker_benaceur_screen_min_width',
  'news_ticker_benaceur_height_mobile',
  'news_ticker_benaceur_padding_top_mobile',
  'news_ticker_benaceur_padding_right_left_mobile',
  'news_ticker_benaceur_min_height_mobile',
  'news_ticker_benaceur_line_height_mobile',
  'news_ticker_benaceur_disable_in_screen_max_width',
  'news_ticker_benaceur_v_screen_max_width',
  'news_ticker_benaceur_disable_this_font',
  'news_ticker_benaceur_padding_top_title',
  'news_ticker_benaceur_default',
  'news_ticker_benaceur_height',
  'news_ticker_benaceur_a_hover',
  'news_ticker_benaceur_styles_options_p',
  'news_ticker_benaceur_cust_color_back',
  'news_ticker_benaceur_cust_color_font',
  'news_ticker_benaceur_cust_color_back_input',
  'news_ticker_benaceur_cust_color_back_msg',
  'news_ticker_benaceur_cust_color_switch_input',
  'news_ticker_benaceur_hide_icon_evol_plug',
  'news_ticker_benaceur_time_export_sett_gmt',
  'news_ticker_benaceur_color_border_title',
  'news_ticker_benaceur_border_title',
  'news_ticker_benaceur_line_height_title',
  'news_ticker_benaceur_width_title_background',
  'ntb_group_sty_reset'
   );
  foreach($AllOptionssNTB as $optionS_NTB ) {
    register_setting('news_ticker_benaceur_group_sty', $optionS_NTB);
}

  global $AllOptions_anim_NTB;	
  $AllOptions_anim_NTB = array(
  'news_ticker_benaceur_timeout_tickerntb',
  'news_ticker_benaceur_speedIn_typing_2',
  'news_ticker_benaceur_anim_speed_anms_two',
  'news_ticker_benaceur_anim_timeout_anms_two',
  'news_ticker_benaceur_anim_timeout_typing_2',
  'news_ticker_benaceur_speed_scrollntb',
  'news_ticker_benaceur_pause_scrollntb',
  'news_ticker_benaceur_enable_jquerymin_slide_up_down',
  'news_ticker_benaceur_enable_jquerymin_fadein',
  'news_ticker_benaceur_disa_img_n_scrollup',
  'news_ticker_benaceur_disa_img_n_fadein',
  'news_ticker_benaceur_style',
  'news_ticker_benaceur_timeout_slide_up_down',
  'news_ticker_benaceur_speed_slide_up_down',
  'news_ticker_benaceur_updown_slide_up_down',
  'news_ticker_benaceur_pause_slide_up_down',
  'news_ticker_benaceur_autostart_slide_up_down',
  'news_ticker_benaceur_timeout_fadein',
  'news_ticker_benaceur_pause_fadein',
  'news_ticker_benaceur_pause_typing',
  'news_ticker_benaceur_autostart_fadein',
  'news_ticker_benaceur_width_anms_two',
  'news_ticker_benaceur_width_rtl_from_ri_anms_two',
  'news_ticker_benaceur_width_typing_2',
  'news_ticker_benaceur_timeout_no_scr_typ',
  'news_ticker_benaceur_speed_no_scr_typ',
  'news_ticker_benaceur_margin_top_no_scr_typ',
  'news_ticker_benaceur_margin_left_ltr_no_scr_typ',
  'news_ticker_benaceur_margin_right_ltr_no_scr_typ',
  'news_ticker_benaceur_cursor_no_scr_typ',
  'news_ticker_benaceur_cursor_top_no_scr_typ_',
  'news_ticker_benaceur_cursor_margin_left_right_no_scr_typ',
  'news_ticker_benaceur_NP_img_no_scr_typ',
  'news_ticker_benaceur_NP_img_anms_two',
  'news_ticker_benaceur_NP_img_typing_2',
  'news_ticker_benaceur_pause_anms_two',
  'news_ticker_benaceur_pause_typing_2',
  'news_ticker_benaceur_ENABLE_curs_no_scr_typ',
  'news_ticker_benaceur_dist_from_left_right_fadein',
  'news_ticker_benaceur_dist_from_left_right_scrollup',
  'news_ticker_benaceur_dist_from_left_right_scrollntb',
  'ntb_group_anim_reset'
   );
  foreach($AllOptions_anim_NTB as $optionN_anim_NTB) {
    register_setting('news_ticker_benaceur_group_anim', $optionN_anim_NTB);
}	
	
	    if ($GLOBALS['pagenow'] == O_G && $_GET['page'] == NS_TR_BEN){
		wp_enqueue_script ('jquery');
		wp_enqueue_script('farbtastic');
		wp_enqueue_script('news-ticker-benaceur-admin',plugins_url('admin/news-ticker-benaceur-admin.js',__FILE__), array('jquery'), '1.0.0');
		wp_enqueue_style('farbtastic');	
	}
}
// add_option
     add_action('init', 'NTB_group_options_default');
     function NTB_group_options_default() {
      add_option( 'news_ticker_benaceur_title_ltr', 'Latest news');
      add_option( 'news_ticker_benaceur_title_rtl', 'آخر الأخبار');
      add_option( 'news_ticker_benaceur_enable_plug', '1');
      add_option('news_ticker_benaceur_links_admin_bar_menu', 'menu');
      add_option('news_ticker_benaceur_dir', 'auto');
      add_option('news_ticker_benaceur_num_posts', '10');
      add_option('news_ticker_benaceur_latest_p_c', 'latest_posts');
      add_option('news_ticker_benaceur_include_exclude_id', 'include_id');
      add_option('news_ticker_benaceur_expt_txt_title', '70');
      add_option('news_ticker_benaceur_expt_txt_comm', '62');
      add_option('news_ticker_benaceur_title_styles_topleft_le', '0');
      add_option('news_ticker_benaceur_title_styles_topright_le', '34');
      add_option('news_ticker_benaceur_title_styles_topleft_ri', '34');
      add_option('news_ticker_benaceur_title_styles_topright_ri', '0');
      add_option('news_ticker_benaceur_title_styles_bottomright', '0');
      add_option('news_ticker_benaceur_title_styles_bottomleft', '0');
	 }
	 
     add_action('init', 'NTB_group_anim_options_default');
     function NTB_group_anim_options_default() {
      add_option('news_ticker_benaceur_style', 'fadein');
      add_option('news_ticker_benaceur_timeout_tickerntb', '5000');
      add_option('news_ticker_benaceur_speedIn_typing_2', '4000');
      add_option('news_ticker_benaceur_anim_speed_anms_two', '1000');
      add_option('news_ticker_benaceur_anim_timeout_anms_two', '2000');
      add_option('news_ticker_benaceur_anim_timeout_typing_2', '2000');
      add_option('news_ticker_benaceur_speed_scrollntb', '17');
      add_option('news_ticker_benaceur_pause_scrollntb', 'checked');
      add_option('news_ticker_benaceur_enable_jquerymin_slide_up_down', 'enable_jquery_min_sud');
      add_option('news_ticker_benaceur_enable_jquerymin_fadein', 'enable_jquery_min_fa');
      add_option('news_ticker_benaceur_disa_img_n_scrollup', 'enable_img_n_scrollup');
      add_option('news_ticker_benaceur_disa_img_n_fadein', 'enable_img_n_fadein');
      add_option('news_ticker_benaceur_timeout_slide_up_down', '4000');
      add_option('news_ticker_benaceur_speed_slide_up_down', '450');
      add_option('news_ticker_benaceur_updown_slide_up_down', 'up_slide_u_d');
      add_option('news_ticker_benaceur_timeout_fadein', '4000');
      add_option('news_ticker_benaceur_width_anms_two', '95');
      add_option('news_ticker_benaceur_width_rtl_from_ri_anms_two', '30');
      add_option('news_ticker_benaceur_width_typing_2', '95');
      add_option('news_ticker_benaceur_timeout_no_scr_typ', '3000');
      add_option('news_ticker_benaceur_speed_no_scr_typ', '10');
      add_option('news_ticker_benaceur_margin_top_no_scr_typ', '12');
      add_option('news_ticker_benaceur_margin_left_ltr_no_scr_typ', '-12');
      add_option('news_ticker_benaceur_margin_right_ltr_no_scr_typ', '-12');
      add_option('news_ticker_benaceur_cursor_no_scr_typ', '15');
      add_option('news_ticker_benaceur_cursor_top_no_scr_typ_', '10');
      add_option('news_ticker_benaceur_cursor_margin_left_right_no_scr_typ', '8');
      add_option('news_ticker_benaceur_NP_img_no_scr_typ', 'enable');
      add_option('news_ticker_benaceur_ENABLE_curs_no_scr_typ', 'enable');
      add_option('news_ticker_benaceur_NP_img_anms_two', 'enable');
      add_option('news_ticker_benaceur_NP_img_typing_2', 'enable');
      add_option('news_ticker_benaceur_pause_anms_two', 'checked');
      add_option('news_ticker_benaceur_pause_typing_2', 'checked');
      add_option('news_ticker_benaceur_pause_slide_up_down', 'checked');
      add_option('news_ticker_benaceur_pause_fadein', 'checked');
      add_option('news_ticker_benaceur_pause_typing', 'checked');
      add_option('news_ticker_benaceur_dist_from_left_right_fadein', '5');
      add_option('news_ticker_benaceur_dist_from_left_right_scrollup', '5');
      add_option('news_ticker_benaceur_dist_from_left_right_scrollntb', '5');
	 }
	 
     add_action('init', 'NTB_group_sty_options_default');
     function NTB_group_sty_options_default() {
      add_option('news_ticker_benaceur_color_back_', '#FFFFFF');
      add_option('news_ticker_benaceur_color_back_title', '#CE0000');
      add_option('news_ticker_benaceur_color_text_back', '#000000');
      add_option('news_ticker_benaceur_color_text_title', '#FFFFFF');
      add_option('news_ticker_benaceur_color_border', '#CE1031');
      add_option('news_ticker_benaceur_border_top', '0');
      add_option('news_ticker_benaceur_border_bottom', '2');
      add_option('news_ticker_benaceur_border_right', '0');
      add_option('news_ticker_benaceur_border_left', '0');
      add_option('news_ticker_benaceur_border_radius', '1');
      add_option('news_ticker_benaceur_opacity', '1');
      add_option('news_ticker_benaceur_font_family', 'DroidKufi_Ben, Arial');
      add_option('news_ticker_benaceur_font_size', '14');
      add_option('news_ticker_benaceur_font_size_title', '14');
      add_option('news_ticker_benaceur_width', '100%');
      add_option('news_ticker_benaceur_padding_top', '1');
      add_option('news_ticker_benaceur_padding_bottom', '0');
      add_option('news_ticker_benaceur_margin_top', '0');
      add_option('news_ticker_benaceur_margin_bottom', '25');
      add_option('news_ticker_benaceur_font_weight', 'normal');
      add_option('news_ticker_benaceur_text_shadow', 'no');
      add_option('news_ticker_benaceur_text_shadow_color', '#000000');
      add_option('news_ticker_benaceur_box_shadow', 'no');
      add_option('news_ticker_benaceur_box_shadow_color', '#B5B5B5');
      add_option('news_ticker_benaceur_box_shadow_v', '1');
      add_option('news_ticker_benaceur_PrevNext_color', '#8F8F8F');
      add_option('news_ticker_benaceur_PrevNext_font_size', '26');
      add_option('news_ticker_benaceur_PrevNext_weight', 'normal');
      add_option('news_ticker_benaceur_PrevNext_top', '0');
      add_option('news_ticker_benaceur_title_font_family', 'DroidKufi_Ben, Arial');
      add_option('news_ticker_benaceur_screen_max_width', '1019');
      add_option('news_ticker_benaceur_screen_min_width', '1020');
      add_option('news_ticker_benaceur_screen_min_width', '1020');
      add_option('news_ticker_benaceur_height_mobile', '65');
      add_option('news_ticker_benaceur_padding_top_mobile', '10');
      add_option('news_ticker_benaceur_padding_right_left_mobile', '10');
      add_option('news_ticker_benaceur_min_height_mobile', '56');
      add_option('news_ticker_benaceur_line_height_mobile', '24');
      add_option('news_ticker_benaceur_v_screen_max_width', '1019');
      add_option('news_ticker_benaceur_height', '42');
      add_option('news_ticker_benaceur_a_hover', '#847c7c');
      add_option('news_ticker_benaceur_styles_options_p', 'theme_one');
      add_option('news_ticker_benaceur_cust_color_back', '#7A0049');
      add_option('news_ticker_benaceur_cust_color_font', '#FFFFFF');
      add_option('news_ticker_benaceur_cust_color_back_input', '#9B005E');
      add_option('news_ticker_benaceur_cust_color_back_msg', '#B3006B');
      add_option('news_ticker_benaceur_cust_color_switch_input', '#9B005E');
      add_option('news_ticker_benaceur_width_title_background', '90');
      add_option('news_ticker_benaceur_color_border_title', '#FFFFFF');
      add_option('news_ticker_benaceur_border_title', '0');
      add_option('news_ticker_benaceur_line_height_title', '42');
      add_option('news_ticker_benaceur_time_export_sett_gmt', '1');
	 }
	 
     add_action('init', 'NTB_group_op_options_default');
     function NTB_group_op_options_default() {
      add_option('news_ticker_benaceur_delete_all_options', 'no_delete_opt');
      add_option('news_ticker_benaceur_ntb_st_code', 'not_remove');
	 }
// add_option

    // var
	require_once ('includes/news-ticker-benaceur-var.php');
    // var
	
     register_activation_hook( __FILE__, 'NTB_up_options' );
	 add_action('admin_init', 'ntb_activ_redir');
     function NTB_up_options(){
     if ( version_compare( get_bloginfo('version'), '3.0', '<') )  { 
        deactivate_plugins( basename( __FILE__ ) ); 
			die(__('<strong>Core Control:</strong> Sorry, This plugin requires WordPress 3.0+', 'core-control'));
	 } else {
	    add_option('ntb_do_activation_redi', true);	 
	 }
	 }

     function ntb_activ_redir() {
     if (get_option('ntb_do_activation_redi', false)) {
        delete_option('ntb_do_activation_redi');
		if(!isset($_GET['activate-multi'])) {
        wp_redirect( admin_url( 'options-general.php?page='.NS_TR_BEN.'' ) ) ;
		}
     }
     }
	 
	if( is_admin() && $GLOBALS['pagenow'] == O_G && $_GET['page'] == NS_TR_BEN ) {	
	add_action('admin_enqueue_scripts','news_ticker_benaceur_js_page_panel');
    function news_ticker_benaceur_js_page_panel(){	
	wp_enqueue_script ('js-page-panel', plugins_url('admin/js-page-panel.js',__FILE__), array(), '1.0.0', true);
	wp_enqueue_style( 'style-NTB', plugin_dir_url( __FILE__ ) . 'admin/style.css', '', '1.0.0' );
    }
	}

    function wp_news_ticker_benaceur_() {  
        do_action('wp_news_ticker_benaceur');
    }
	
	function shortcode_ntb_func($atts){
		global $ntb_enable_plug;
		if ($ntb_enable_plug) {
		ob_start();
		wp_news_ticker_benaceur_();
		$content = ob_get_contents();
		ob_end_clean();

	    return $content;
		}
    }
	add_shortcode( 'wp_news_ticker_benaceur_short_code', 'shortcode_ntb_func' );
	
if ($ntb_enable_plug):

	function NTB_pagePHP() { 
        require_once(NTB_P_PHP);
    }
   
if(!function_exists('expt_title_text_NTB')) {
	function expt_title_text_NTB($text, $length = 0) {
		if (defined('MB_OVERLOAD_STRING')) {
		  $text = @html_entity_decode($text, ENT_QUOTES, get_option('blog_charset'));
		 	if (mb_strlen($text) > $length) {
				return htmlentities(mb_substr($text,0,$length), ENT_COMPAT, get_option('blog_charset')).'...';
		 	} else {
				return htmlentities($text, ENT_COMPAT, get_option('blog_charset'));
		 	}
		} else {
			$text = @html_entity_decode($text, ENT_QUOTES, get_option('blog_charset'));
		 	if (strlen($text) > $length) {
				return htmlentities(substr($text,0,$length), ENT_COMPAT, get_option('blog_charset')).'...';
		 	} else {
				return htmlentities($text, ENT_COMPAT, get_option('blog_charset'));
		 	}
		}
	}
}

  add_action('wp_head', 'wp_rest_news_ticker_benaceur');
  function wp_rest_news_ticker_benaceur() { 
  global $go_ea,$ntb_in_home,$ntb_in_single,$ntb_in_author,$ntb_in_page,$ntb_in_category,$ntb_in_search,$ntb_in_page_id,$ntb_in_single_id;
  $admin_ntb = current_user_can( 'administrator' ); 
  $ntb_in_page_id_arr = explode(',', $ntb_in_page_id); 
  $ntb_in_single_id_arr = explode(',', $ntb_in_single_id);  

	if ( ( role_cap_ntb() && all_users_ntb() && id_user_ntb() && is_user_logged_in() )  || ( visitors_ntb() && !is_user_logged_in() ) || $go_ea )
    {
    if (!$go_ea || $admin_ntb) {
    if (!$ntb_in_home && is_home() || !$ntb_in_home && is_front_page()) {
		NTB_pagePHP();
    } elseif (!$ntb_in_category && is_category()) {
		NTB_pagePHP();
    } elseif (!$ntb_in_author && is_author()) {
		NTB_pagePHP();
    } elseif (!$ntb_in_search && is_search()) {
		NTB_pagePHP();
    } elseif (!$ntb_in_single && is_single($ntb_in_single_id_arr)) {
		NTB_pagePHP();
    } elseif (!$ntb_in_single && is_single()) {
		NTB_pagePHP();
    } elseif (!$ntb_in_page && is_page($ntb_in_page_id_arr)) {
		NTB_pagePHP();
    } elseif (!$ntb_in_page && is_page()) {
		NTB_pagePHP();
    } elseif ($ntb_in_home && is_home() || $ntb_in_home && is_front_page() ||
          $ntb_in_category && is_category() || $ntb_in_author && is_author() || $ntb_in_search && is_search() ||
		  $ntb_in_page && is_page() && empty($ntb_in_page_id) ||
		  $ntb_in_single && is_single() && empty($ntb_in_single_id)) {
	    return NULL;
    } elseif ($ntb_in_single && is_single($ntb_in_single_id_arr)) {
	    return NULL;
    } elseif ($ntb_in_page && is_page($ntb_in_page_id_arr)) {
	    return NULL;
    } else {
		NTB_pagePHP();
}
}		
    } 
}

    function news_ticker_benaceur_scripts_() {
	global $dir, $ntb_st;
	if ( !is_admin() && $ntb_st == 'ScrollNTB' ) {
			if ($dir == 'auto'){
			if (is_rtl()) {
			wp_register_script('jquery.ntb-r', plugins_url('js/jquery.ntb-rit.js',__FILE__), '', '1.0.0' );
			wp_enqueue_script('jquery.ntb-r');
			} else {
			wp_register_script('jquery.ntb-l', plugins_url('js/jquery.ntb-lef.js',__FILE__), '', '1.0.0' );
			wp_enqueue_script('jquery.ntb-l');
			}
			} elseif ($dir == 'ltr'){
			wp_register_script('jquery.ntb-l', plugins_url('js/jquery.ntb-lef.js',__FILE__), '', '1.0.0' );
			wp_enqueue_script('jquery.ntb-l');
			} elseif ( $dir == 'rtl') {
			wp_register_script('jquery.ntb-r', plugins_url('js/jquery.ntb-rit.js',__FILE__), '', '1.0.0' );
			wp_enqueue_script('jquery.ntb-r');
			}	
	}
}
    add_action('wp_enqueue_scripts', 'news_ticker_benaceur_scripts_');
	
	$anim_two_if = preg_split('/,/', $array_anim_two, -1, PREG_SPLIT_NO_EMPTY);
	if( !in_array($ntb_st, $anim_two_if) && !is_admin() ) {	
	add_action('wp_print_scripts','news_ticker_benaceur_anim_two');
    function news_ticker_benaceur_anim_two(){	
	wp_enqueue_script ('jquery');	
	wp_enqueue_script ('ben_anim_two', plugins_url('js/ben-anim_two.js',__FILE__), array('jquery'), '1.0.0');
    }
	}
	
		if ($ntb_enable_jquerymin_fadein == 'enable_jquery_min_fa' && $ntb_st == 'fadein' && !is_admin()) {
        function ntb_add_jquery() {
        wp_deregister_script('jquery');
        wp_register_script('jquery', plugins_url('js/min-ben.js',__FILE__), false, '1.0.0', true);
        wp_enqueue_script('jquery');
        }
        add_action('init', 'ntb_add_jquery');
		}

endif; // $ntb_enable_plug	

	function get_settings_ntb( $inherit = false ) {

		$settings = array( 
			'rolexcap_ntb' => (array) get_option( 'news_ticker_benaceur_for_role_x', array() )
		);

		$settings[ 'rolexcap_ntb' ] = array_map( 'trim', array_unique( array_filter( $settings[ 'rolexcap_ntb' ] ) ) );
		
		return $settings;
		
	}

    function id_user_ntb() {

	$current_user = wp_get_current_user();
	$user_id = get_current_user_id();
	
	$iduser_ntb = explode(',', get_option('news_ticker_benaceur_for_user_id'));
	
	if(is_array($iduser_ntb)) {
		
		foreach($iduser_ntb as $user_id) {
			
			if( $current_user->ID == $user_id ) {
				
			return false;
			}
		}
	}
	
			return true;
}

    function role_cap_ntb() {

        $settings = get_settings_ntb( true );	
		$rolexcap_ntb = $settings[ 'rolexcap_ntb' ];

		if ( !empty( $rolexcap_ntb ) ) {
			if ( !is_array( $rolexcap_ntb ) ) {
				$rolexcap_ntb = array( $rolexcap_ntb );
			}

			foreach ( $rolexcap_ntb as $role ) {
			
			if ( current_user_can( $role ) ) {
				
	return false;
			}
		}
	}
	
	return true;
}

    function all_users_ntb() {
	
	$loggedin_ntb = get_option('news_ticker_benaceur_for_users');
	
	if($loggedin_ntb) {
		
		if(is_user_logged_in()) {
			
			return false;
		}
	}
	
	return true;
}

    function visitors_ntb() {
	
	$visitorsntb = get_option('news_ticker_benaceur_for_visitors');
	
	if($visitorsntb ) {
			
			return false;
	}
	
	return true;
}

    add_action( 'admin_bar_menu', 'ntb_links_on_admin_bar', 10155 );
    function ntb_links_on_admin_bar($wp_admin_bar) {
    global $ntb_links_admin_bar_front,$ntb_links_admin_bar_menu,$ntb_links_admin_bar_admin,$ntb_enable_plug;

    if (current_user_can( 'manage_options' ) && $ntb_links_admin_bar_front && !is_admin() && $ntb_enable_plug) {
    if ($ntb_links_admin_bar_menu == 'menu') {
    $wp_admin_bar->add_menu( array( 'id' => 'PLB_ntb5', 'title' => __('News Ticker Benaceur'), 'href' => admin_url('/'.O_G.'?page=news_ticker_benaceur' ) ) );
    } elseif ($ntb_links_admin_bar_menu == 'submenu' ) { 
    $wp_admin_bar->add_menu( array( 'parent' => 'appearance', 'id' => 'PLB_ntb6', 'title' => __('News Ticker Benaceur'), 'href' => admin_url('/'.O_G.'?page=news_ticker_benaceur' ) ) );
    }
	} elseif (current_user_can( 'manage_options' ) && $ntb_links_admin_bar_admin && is_admin() && $ntb_enable_plug)  {
    if ($ntb_links_admin_bar_menu == 'menu') {
    $wp_admin_bar->add_menu( array( 'id' => 'PLB_ntb7', 'title' => __('News Ticker Benaceur'), 'href' => admin_url('/'.O_G.'?page=news_ticker_benaceur' ) ) );
    } elseif ($ntb_links_admin_bar_menu == 'submenu') { 
    $wp_admin_bar->add_menu( array( 'parent' => 'site-name', 'id' => 'PLB_ntb8', 'title' => __('News Ticker Benaceur'), 'href' => admin_url('/'.O_G.'?page=news_ticker_benaceur' ) ) );
    }
		}	
    }

    add_action( 'admin_init', 'news_ticker_benaceur_admin_notices' );
    function news_ticker_benaceur_admin_notices() {
    $ntb_notice_admin = false;
    if ( $ntb_notice_admin && $GLOBALS['pagenow'] == O_G && $_GET['page'] == NS_TR_BEN ) {
    include ('includes/notices-ntb.php');
    }
	}

        require_once ('news-ticker-benaceur-panel-page.php');

  register_deactivation_hook( __FILE__, 'NTB_plugin_deactivation' );
  function NTB_plugin_deactivation() {
  global $ntb_delete_all_options,$NTB_st_code;

  if ( $ntb_delete_all_options == 'delete_opt') {
  global $AllOptionsNTB;	
  foreach($AllOptionsNTB as $optionN_NTB) {
     delete_option($optionN_NTB);
}

  global $AllOptionssNTB;	
  foreach($AllOptionssNTB as $optionS_NTB ) {
     delete_option($optionS_NTB);
}

  global $AllOptions_anim_NTB;	
  foreach($AllOptions_anim_NTB as $optionN_anim_NTB ) {
     delete_option($optionN_anim_NTB);
}
     delete_option('news_ticker_benaceur_delete_all_options');
     delete_option('ntb_all_reset');
  }
  
  if ( $NTB_st_code == 'remove') {
    global $wpdb,$NTB_sht_code;
    $wpdb->get_results( "UPDATE $wpdb->posts SET post_content = replace(post_content, '$NTB_sht_code', '') " );
    delete_option('news_ticker_benaceur_ntb_st_code');
  }
  
}
  
// reset group
  if ($ntb_group_reset) :
  add_action('admin_init', 'ntb_group_reset_AllOptions');
  function ntb_group_reset_AllOptions() {
	  
  global $AllOptionsNTB;	
  foreach($AllOptionsNTB as $optionN_NTB) {
  delete_option($optionN_NTB);
}	
  NTB_group_options_default();
  }  
  endif; // $ntb_group_reset	
// reset group

// reset group anim
  if ($ntb_group_anim_reset) :
  add_action('admin_init', 'ntb_group_anim_reset_AllOptions');
  function ntb_group_anim_reset_AllOptions() {
	  
  global $AllOptions_anim_NTB;	
  foreach($AllOptions_anim_NTB as $optionN_anim_NTB ) {
     delete_option($optionN_anim_NTB);
}
  NTB_group_anim_options_default();
  }  
  endif; // $ntb_group_anim_reset
// reset group anim

// reset group sty
  if ($ntb_group_sty_reset) :
  add_action('admin_init', 'ntb_group_sty_reset_AllOptions');
  function ntb_group_sty_reset_AllOptions() {
	  
  global $AllOptionssNTB;	
  foreach($AllOptionssNTB as $optionS_NTB ) {
     delete_option($optionS_NTB);
  }
  NTB_group_sty_options_default();
  }  
  endif; // $ntb_group_sty_reset
// reset group sty


// reset all
  if ($ntb_all_reset) :
  add_action('admin_init', 'ntb_all_reset_AllOptions');
  function ntb_all_reset_AllOptions() {
	  
  global $AllOptionsNTB;	
  foreach($AllOptionsNTB as $optionN_NTB) {
     delete_option($optionN_NTB);
  }

  global $AllOptionssNTB;	
  foreach($AllOptionssNTB as $optionS_NTB ) {
     delete_option($optionS_NTB);
  }

  global $AllOptions_anim_NTB;	
  foreach($AllOptions_anim_NTB as $optionN_anim_NTB ) {
     delete_option($optionN_anim_NTB);
  }
     delete_option('news_ticker_benaceur_delete_all_options');
     delete_option('ntb_all_reset');
	 
      NTB_group_options_default();
      NTB_group_anim_options_default();
      NTB_group_sty_options_default();
	  NTB_group_op_options_default();
	  
  }  
  endif; // $ntb_all_reset
// reset all

function ntb_version() {
    $plugin_data = get_plugin_data( __FILE__ );
    $plugin_version = $plugin_data['Version'];
    return $plugin_version;
}

function ntb_latest_version($name){

        $readme_file="http://plugins.svn.wordpress.org/$name/trunk/readme.txt";
		
    $response = wp_remote_get( $readme_file );

    if( is_wp_error( $response ) ) {
        $readme_text="";
    } else {
        $readme_text=file_get_contents($readme_file);
	}

        $lines=explode("\n",$readme_text);

        $needle="Stable tag:";

        foreach($lines as $line ){
                if( strpos($line,$needle) > -1 ){

                        $version= trim(str_replace($needle,"",$line));
                        break;
                }
        }
        return $version;
}

function ntbVerPlug(){
    $ntb_plugin = "".NSTR_BEN."/".NSTR_BEN.".php";

    // $update_plugins = get_site_transient('update_plugins');
    // if ( isset( $update_plugins->response[ $ntb_plugin ] ) ) { 
			
                $update_file = $ntb_plugin;
                $url = wp_nonce_url(self_admin_url('update.php?action=upgrade-plugin&plugin=' . $update_file), 'upgrade-plugin_' . $update_file);
if (ntb_version() < ntb_latest_version("news-ticker-benaceur")) {
echo "<div class='ntb-mm411112'><div id='ntb-mm411112-divtoBlink'>". __("You are using Version",'news-ticker-benaceur').' '.ntb_version().", ". __("There is a newer version, it's recommended to",'news-ticker-benaceur')." <a href=".$url.">". __("update now",'news-ticker-benaceur')."</a>.</div></div>";
echo "
<script>
 $(document).ready(function(){
    $('.ntb-mm4111172p').delay(400).slideToggle('slow');
}); 
</script>";
}
    // } 
}

require_once ('includes/ie-setts.php');
