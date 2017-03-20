<?php
/*
Plugin Name: T4B News Ticker
Plugin URI: http://wordpress.org/plugins/t4b-news-ticker/
Description: 'T4B News Ticker' is a flexible and easy to use WordPress plugin that allows you to make horizontal News Ticker.
Author: Iftekhar
Author URI: http://profiles.wordpress.org/moviehour/
Version: 1.0
*/

/*  Copyright 2014  Iftekhar  (email : moviehour@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('T4B_TICKER_PATH', plugin_dir_path( __FILE__ ));
if(is_admin()) { include ( T4B_TICKER_PATH . 't4b_admin.php' ); }
function news_ticker_enqueue_scripts() {
	wp_enqueue_script('t4bnt_script', WP_PLUGIN_URL .'/t4b-news-ticker/js/t4bnt_admin.js', array('jquery'), '1.0');
	wp_enqueue_style('t4bnt_style', WP_PLUGIN_URL .'/t4b-news-ticker/css/t4bnt_admin.css?v=1.0');
}
add_action('admin_init', 'news_ticker_enqueue_scripts');
function t4bnt_enqueue_scripts() {
	if(get_option('ticker_news')) {
		wp_enqueue_script('jquery');
		wp_register_script('t4bnt_front_js', WP_PLUGIN_URL .'/t4b-news-ticker/js/t4bnt-front.js', array('jquery'), '1.0');
		wp_enqueue_script('t4bnt_front_js');
		wp_enqueue_style('t4bnt_front_css', WP_PLUGIN_URL .'/t4b-news-ticker/css/t4bnt_front.css?v=1.0');
	}
}
add_action('wp_enqueue_scripts', 't4bnt_enqueue_scripts');
function t4b_show_news_ticker() {
	if( get_option('ticker_news') && (  !get_option('ticker_home') || ( get_option('ticker_home') && is_home() ) ) ):
		$query = get_option('ticker_type');
		$cat = get_option('ticker_cat');
		$tag = get_option('ticker_tag');
		$ticker_custom = get_option('ticker_custom');
		$title = get_option('ticker_title');
		$number = get_option('ticker_postno');
		$effect = get_option('ticker_effect');
		$speed =  get_option('ticker_speed') ;
		$timeout = get_option('ticker_fadetime') ;

		if( !$number || $number == ' ' || !is_numeric($number) )	$number = 5;
		if( !$effect )	$effect = 'fade';
		if( !$speed || $speed == ' ' || !is_numeric($speed))	$speed = 750 ;
		if( !$timeout || $timeout == ' ' || !is_numeric($timeout))	$timeout = 3500;
?>
		<div class="ticker-news">
			<span><?php if( $title ) echo $title; else _e('News Ticker') ; ?></span>
			<?php
			global $post;
			$orig_post = $post;
			if( $query != 'custom' ):
				if( $query == 'tag' ) {
					$tags = explode (',' , $tag );
					foreach ($tags as $tag) {
						$theTagId = get_term_by( 'name', $tag, 'post_tag' );
						if($fea_tags) $sep = ' , ';
						$fea_tags .=  $sep . $theTagId->slug;
					}
					$args=array('tag' => $fea_tags ,'posts_per_page'=> $number);
				} else {
					$args=array('category_name' => $cat,'posts_per_page'=> $number);
				}
				$ticker_query = new wp_query( $args );
				if( $ticker_query->have_posts() ) : $count=0; ?>
					<ul id="ticker">
					<?php while( $ticker_query->have_posts() ) : $ticker_query->the_post();	$count++; ?>
						<li><a href="<?php the_permalink()?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			<?php else: ?>
				<?php if( is_array( $ticker_custom ) ){ ?>
					<ul id="ticker">
						<?php foreach ($ticker_custom as $custom_text) { ?>
							<li><a href="<?php echo $custom_text['link'] ?>" title="<?php echo $custom_text['text'] ?>" target="_blank"><?php echo $custom_text['text'] ?></a></li>
						<?php } ?>
					</ul>
				<?php }	?>
			<?php endif; ?>
			<?php $post = $orig_post; ?>
			<script type="text/javascript">
				jQuery(document).ready(function() {
					<?php if( $effect == 'ticker' ): ?>
						createTicker();
					<?php elseif( $effect == 'scroll' ): ?>
						jQuery("ul#ticker").liScroll({travelocity: 0.1});
					<?php else: ?>
						jQuery('.ticker-news ul').innerfade({animationtype: '<?php echo $effect ?>', speed: <?php echo $speed ?> , timeout: <?php echo $timeout ?>});
					<?php endif; ?>
				});
			</script>
		</div> <!-- .ticker-news -->
	<?php endif; ?>
<?php
}
add_shortcode('t4b_ticker', 't4b_show_news_ticker');
?>