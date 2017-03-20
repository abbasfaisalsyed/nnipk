<?php
$tickername = "T4B News Ticker";
$ticker_categories = get_categories('hide_empty=0');
$categories = array();
foreach ($ticker_categories as $category) {
	$categories[$category->cat_ID] = $category->category_nicename;
}
$categories_tmp = array_unshift($categories, "Select a category:");
$news_ticker_link = 
$news_ticker = array (
	array( 	"name" => $tickername,
			"type" => "title"),
	array(  "name" => "T4B News Ticker",
			"type" => "section",
			"desc" => "Enables or Disables News Ticker."),
	array(  "type" => "open"),
	array(  "name" => "Enable",
			"desc" => "Select if you want to show News Ticker.",
			"id" => "ticker_news",
			"type" => "checkbox",		
			"std" => "true"),	
	array(	"name" => "Show in Homepage Only",
			"desc" => "Select if you want to show the News Ticker only in homepage.",
			"id" => "ticker_home",
			"type" => "checkbox",
			"std" => "true"),
	array(	"name" => "News Ticker Title",
			"desc" => "Enter the title of the News Ticker",
			"id" => "ticker_title",
			"type" => "text",
			"std" => "News Ticker"),
	array(	"name" => "Animation Effect",
			"id" => "ticker_effect",
			"type" => "anim-select",
			"options" => array( 'fade' => 'Fade',
								'slide' => 'Slide',
								'ticker' => 'Ticker',
								'scroll' => 'Scroll')),
	array(	"name" => "Animation Speed",
			"id" => "ticker_speed",
			"type" => "slider",
			"unit" => "ms",
			"max" => 40000,
			"min" => 100,
			"std" => 750),
	array(	"name" => "Time between the fades",
			"id" => "ticker_fadetime",
			"type" => "slider",
			"unit" => "ms",
			"max" => 40000,
			"min" => 100,
			"std" => 3500),
	array(	"name" => "News Ticker Type",
			"id" => "ticker_type",
			"options" => array( "category" => "Categories" ,
								"tag" => "Tags",
								"custom" =>	"Custom Text"),
			"type" => "radio"),
	array(	"name" => "Number Of Posts To Show",
			"id" => "ticker_postno",
			"type" => "short-text",
			"std" => 5),
	array( 	"name" => "News Ticker Categories",
			"desc" => "Select the category of News Ticker.",
			"id" => "ticker_cat",
			"std" => "Select a category:",
			"type" => "select",
			"options" => $categories),
	array(	"name" => "News Ticker Tags",
			"desc" => "Enter tag names seprated by comma.",
			"id" => "ticker_tag",
			"type" => "text",
			"std" => ""),
	array( 	"name" => "News Ticker Custom Text",
			"desc" => "Enter the Text for your News Ticker.",
			"id" => "ticker_custom",
			"type" => "c-text",
			"std" => ""),
	array( 	"type" => "close")
);
add_action('admin_menu', 'register_t4bnt_menu');
function register_t4bnt_menu() {
	global $tickername, $news_ticker;
	if ( isset($_GET['page']) && $_GET['page'] == plugin_basename( __FILE__ ) ) {
		if ( isset($_REQUEST['action']) && 'save' == $_REQUEST['action'] ) {
			foreach ($news_ticker as $value) { update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
			foreach ($news_ticker as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) {
					update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
				} else {
					delete_option( $value['id'] );
				}
			}
			header("Location: options-general.php?page=t4b-news-ticker/t4b_admin.php&saved=true");
			die;
		} else if( isset($_REQUEST['action']) && 'reset' == $_REQUEST['action'] ) {
			foreach ($news_ticker as $value) {
				delete_option( $value['id'] ); 
				update_option( $value['id'], $value['std'] );
			}
			header("Location: options-general.php?page=t4b-news-ticker/t4b_admin.php&reset=true");
			die;
		}
	}
	add_options_page('T4B News Ticker', 'Ticker Settings', 'manage_options', __FILE__, 't4bnt_plugin_menu');
}
function t4bnt_plugin_menu() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	global $tickername, $news_ticker;
	$i=0;
	if ( isset($_REQUEST['saved']) ) echo '<div id="message" class="updated fade"><p><strong>'.$tickername.' settings saved.</strong></p></div>';
	if ( isset($_REQUEST['reset']) ) echo '<div id="message" class="updated fade"><p><strong>'.$tickername.' settings reset.</strong></p></div>';
?>
	<div class="wrap">
		<h2 class="t4bwraphead"><?php echo $tickername; ?> Settings</h2>
		<div class="t4b_ticker_wrap">
			<div class="t4bnt_opts">
				<form method="post" enctype="multipart/form-data">
				<?php
				foreach ($news_ticker as $value) {
					switch ( $value['type'] ) {
						case "open":
						break;
						case "close":
				?>
			</div>
		</div><br />
		<?php
						break;
						case "title":
		?>
		<p>To easily configure the <?php echo $tickername;?>, you can use the menu below.</p>
		<?php
						break;
						case 'text': ?>
			<div class="t4bnt_input t4bnt_text" id="<?php echo $value['id'] ?>-item">
				<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
				<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
				<?php
				if( $value['id']=="ticker_tag") {
					$tags = get_tags('orderby=count&order=desc&number=50');
				?>
					<a style="cursor:pointer" title="Choose from the most used tags" onclick="toggleVisibility('<?php echo $value['id']; ?>_tags');"><img src="<?php echo WP_PLUGIN_URL; ?>/t4b-news-ticker/images/expand.png" alt="expand" /></a>
					<span class="tags-list" id="<?php echo $value['id']; ?>_tags">
						<?php foreach ($tags as $tag) { ?>
							<a style="cursor:pointer" onclick="if(<?php echo $value['id'] ?>.value != ''){ var sep = ' , '}else{var sep = ''} <?php echo $value['id'] ?>.value=<?php echo $value['id'] ?>.value+sep+(this.rel);" rel="<?php echo $tag->name ?>"><?php echo $tag->name ?></a>
						<?php } ?>
					</span>
				<?php } ?>
				<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
			</div>
		<?php
						break;
						case 'short-text': ?>
			<div class="t4bnt_input t4bnt_text" id="<?php echo $value['id'] ?>-item">
				<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
				<input style="width:50px" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
				<div class="clearfix"></div>
			</div>
		<?php
						break;
						case 'c-text': ?>
			<div class="t4bnt_input t4bnt_text" id="<?php echo $value['id'] ?>-item">
				<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
				<span class="t4bnt_label">Text</span>
				<input id="custom_text" type="text" size="56" class="t4bnt_custom" name="custom_text" value="" />
				<span class="t4bnt_label">Link</span>
				<input id="custom_link" type="text" size="56" class="t4bnt_custom" name="custom_link" value="" />
				<input id="TextAdd"  class="small_button" type="button" value="Add" />
				<ul id="customList" style="margin-top:15px;">
					<?php
					$ticker_custom = get_option( $value['id'] );
					$custom_count = 0 ;
					if($ticker_custom) {
						foreach ($ticker_custom as $custom_text) { $custom_count++; ?>
					<li>
						<div class="widget-head">
							<a href="<?php echo $custom_text['link'] ?>" target="_blank"><?php echo $custom_text['text'] ?></a>
							<input name="ticker_custom[<?php echo $custom_count ?>][link]" type="hidden" value="<?php echo $custom_text['link'] ?>" />
							<input name="ticker_custom[<?php echo $custom_count ?>][text]" type="hidden" value="<?php echo $custom_text['text'] ?>" />
							<a class="del-custom-text"></a>
						</div>
					</li>
					<?php
						}
					}
					?>
				</ul>
				<script>var customnext = <?php echo $custom_count+1 ?> ;</script>
			</div>
		<?php
						break;
						case 'select': ?>
			<div class="t4bnt_input t4bnt_select" id="<?php echo $value['id'] ?>-item">
				<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
				<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php foreach ($value['options'] as $option) { ?>
						<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
					<?php } ?>
				</select>
				<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
			</div>
		<?php
						break;
						case 'anim-select': ?>
			<div class="t4bnt_input t4bnt_select" id="<?php echo $value['id'] ?>-item">
				<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
				<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
					<?php foreach ($value['options'] as $key => $option) { ?>
						<option value="<?php echo $key ?>" <?php if ( get_option( $value['id'] ) == $key) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
					<?php } ?>
				</select>
				<div class="clearfix"></div>
			</div>
		<?php
						break;
						case "checkbox": ?>
			<div class="t4bnt_input t4bnt_checkbox" id="<?php echo $value['id'] ?>-item">
				<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
				<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
				<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
				<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
			</div>
		<?php
						break;
						case 'radio': ?>
			<div class="t4bnt_input t4bnt_radio" id="<?php echo $value['id'] ?>-item">
				<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
				<?php foreach ($value['options'] as $key => $option) { ?>
					<label><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="radio" value="<?php echo $key ?>" <?php if (get_option( $value['id'] ) == $key) { echo ' checked="checked"' ; } ?>> <?php echo $option; ?></label>
				<?php } ?>
				<div class="clearfix"></div>
			</div>
		<?php
						break;
						case 'slider': ?>
			<div class="t4bnt_input t4bnt_slider" id="<?php echo $value['id'] ?>-item">
				<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
				<div id="<?php echo $value['id']; ?>-slider"></div>
				<input type="text" id="<?php echo $value['id']; ?>" value="<?php echo get_option($value['id']); ?>" name="<?php echo $value['id']; ?>" style="width:100px;" /> <?php echo $value['unit']; ?>
				<script>
					jQuery(document).ready(function() {
						jQuery("#<?php echo $value['id']; ?>-slider").slider({
							range: "min",
							min: <?php echo $value['min']; ?>,
							max: <?php echo $value['max']; ?>,
							value: <?php if( get_option($value['id']) ) echo get_option($value['id']); else echo 0; ?>,
							slide: function(event, ui) {
								jQuery('#<?php echo $value['id']; ?>').attr('value', ui.value );
							}
						});
					});
				</script>
			</div>
		<?php
						break;
						case "section": $i++; ?>
			<div class="t4bnt_section">
				<div class="t4bnt_title">
					<h3><img src="<?php echo WP_PLUGIN_URL; ?>/t4b-news-ticker/images/trans.png" class="inactive" alt="" /><?php echo $value['name']; ?></h3>
					<span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" /></span>
					<div class="clearfix"></div>
				</div>
				<div class="t4bnt_options">
		<?php
						break;
					}
				}
		?>
				<input type="hidden" name="action" value="save" />
				</form>
				<form method="post">
					<p class="submit">
						<input name="reset" type="submit" value="Reset" />
						<input type="hidden" name="action" value="reset" />
					</p>
				</form>
				</div>
			</div>
			<div class="postbox-container" style="width: 75%;">
				<div id="poststuff">
					<div class="postbox" style="padding-bottom: 44px;">
						<h3>Code Usage Instruction</h3>
						<div class="inside">
							<p><b>Put the below code snippet in your blog posts/pages, where you want to show News Ticker:</b><br/><br />
								<code><span style="color: #0000BB">   &#60;&#63;php if&#40;get_option&#40;&#39;ticker_news&#39;&#41;&#41;&#123; if&#40;function_exists&#40;t4b_show_news_ticker&#40;&#41;&#41;&#41; &#123; t4b_show_news_ticker&#40;&#41;&#59; &#125; &#125; &#63;&#62;</span></code></p>
							<p><b>You can also put the below Shortcode in your blog posts/pages to show News Ticker:</b><br/><br />
								<code><span style="color: #0000BB">
									&#60;&#63;php do_shortcode&#40;&#39;&#91;t4b_ticker&#93;&#39;&#41;&#59; &#63;&#62;
								</span></code>
							</p>
						</div>
					</div>
				</div><!-- End poststuff -->
			</div>
			<div class="postbox-container" style="width: 25%;">
				<div id="poststuff" style="min-width: 25%;">
					<div class="postbox">
						<h3>Plugin Info</h3>
						<div class="inside">
							<p>Version: 1.0<br/>
							Scripts: PHP + CSS + JS.<br/>
							Requires: Wordpress 3.0+<br/>
							First release: 29-Dec-2014<br/>
							Developer: <a href="http://facebook.com/IKIAlam" target="_blank">Iftekhar</a><br/>
							Website: <a href="http://www.tips4blog.com/" target="_blank">www.tips4blog.com</a><br/>
							Published under: <a href="http://www.gnu.org/licenses/gpl.txt">GNU General Public License</a><br/>
							<a href="http://wordpress.org/plugins/t4b-news-ticker/faq/">FAQ</a> | <a href="http://wordpress.org/plugins/t4b-news-ticker/changelog/">Changelog</a><br/></p>
						</div>
					</div>
				</div><!-- End poststuff -->
			</div>
			<p align="right" style="font-size:9px; margin-bottom:10px;">WordPress News Ticker by <a href="http://www.tips4blog.com/" target="_blank">TiPS4BLOG</a></p>
	</div>
<?php
}
?>