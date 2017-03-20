<?php 

/*
Plugin Name: WpF Easy News Ticker
Plugin URI: http://wpfreeware.com/preview/wpf-easy-news-ticker/
Description: By using this news ticker, you can add unlimited horizontal news tickers into any posts/pages/widgets or theme templates.
Author: WpFreeware Team
Version: 1.0
Author URI: http://www.wpfreeware.com
*/


// loading scripts & styles

add_action('init', 'wpf_easy_news_ticker_scripts');			//wp_enqueue_scripts
function wpf_easy_news_ticker_scripts() {

	// scripts
	wp_enqueue_script('jquery');  
	wp_register_script( 'wpf_easy_news_ticker_js', plugins_url( '/js/jquery.wpf-ticker.1.0.js', __FILE__ ), false, 1.0, true );
	wp_enqueue_script( 'wpf_easy_news_ticker_js' );	
	
	// styles
	
	wp_register_style( 'wpf_easy_news_ticker_css', plugins_url( '/css/wpf-ticker-scroller.css', __FILE__ ),'all' );		
	wp_enqueue_style( 'wpf_easy_news_ticker_css' );

}


/////////////////////////////////////////////////
// news ticker shortcode
/////////////////////////////////////////////////

function wpf_easy_news_ticker_shortcode($atts){

	global $color,$bg_color,$link_color;
	
	extract( shortcode_atts( array(
		'post_type' => 'post',
		'category' => '',
		'taxonomy' => 'category_name',
		'id' => 'wpfticker',
		'text' => 'Latest News', 
		'count' => '-1',
		'color' => '#0099CC', // ticker text bg color
		'bg_color' => '#eeeeee', // ticker bg color
		'link_color' => '#222222' // link color
	), $atts, 'wpf_ticker' ) );
	
	
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => $post_type, $taxonomy => $category)
        );
	
	
		
$list = '
	
		<script type="text/javascript">
			jQuery(document).ready(function(){
			
				jQuery("ul#wpfticker'.$id.'").liScroll(); 
			
			});
		</script>	

		<div class="latest_newsarea" style="background-color: '.$bg_color.'">      
			<span style="color: #fff;background-color: '.$color.'">'.$text.'</span>
			<ul id="wpfticker'.$id.'" class="news_sticker">';

while($q->have_posts()) : $q->the_post();
     
    $list .= '
		
		
		<li><a style="color:'.$link_color.'" href="'.get_permalink().'">'.get_the_title().'</a></li> 
				

	';        
endwhile;
$list.= '</ul></div>';
wp_reset_query();
return $list;
}
add_shortcode('wpf_ticker', 'wpf_easy_news_ticker_shortcode');
		
?>