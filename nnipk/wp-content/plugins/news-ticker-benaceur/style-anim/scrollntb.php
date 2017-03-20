
				  <div class="n_t_ntb_b"><div class="n_t_ntb_b2">
	   <?php if (!$ntb_disable_title) { ?>			  
       <span class="n_t_ntb_b-name"><?php if (!empty($ntb_title_ltr) && !is_rtl()) { echo $ntb_title_ltr; } elseif (!empty($ntb_title_rtl) && is_rtl()) { echo $ntb_title_rtl; } else { if (!is_rtl()) { echo 'Latest news'; } else { echo 'آخر الأخبار'; } } ?></span>
	   <?php } ?>
        <div id="scroll-ntb">
         <div>
			      	<?php
			if($ntb_latest_p_c == 'latest_posts'){
			$recent_posts_ntb = wp_get_recent_posts( $lp );	
			foreach( $recent_posts_ntb as $recent_ntb ) : // foreach
												?>
			<img border="0" src="<?php echo '' . plugins_url('img/topics.gif',dirname(__FILE__)) . ''; ?>" width="10" height="11" <?php if ($dir == 'auto') { if (is_rtl()) { ?> style="margin:0 30px 0 5px;" <?php } else { ?> style="margin:0 5px 0 30px;" <?php } } elseif ($dir == 'ltr')  { ?> style="margin:0 5px 0 30px;" <?php } elseif ($dir == 'rtl') { ?> style="margin:0 30px 0 5px;" <?php } ?>><a href="<?php echo get_permalink($recent_ntb["ID"]); ?>" title="<?php echo $recent_ntb["post_title"]; ?>"><?php echo $recent_ntb["post_title"]; ?></a>
		 <?php endforeach; // end foreach 
			} elseif ($ntb_latest_p_c == 'latest_comments') {
if ( count( $comments_list ) > 0 ) {
$date_format = 'j F Y';
 foreach ( $comments_list as $comment ) {
 echo ' التعليق: <a href="'.esc_url(get_permalink($comment->comment_post_ID)).'#comment-'.$comment->comment_ID.'">'.wp_html_excerpt( $comment->comment_content, 52 ).'</a>... في: '.date_i18n( $date_format, strtotime( $comment->comment_date ) ).' على: <a href="'.esc_url(get_permalink( $comment->comment_post_ID )).'">'.get_the_title( $comment->comment_post_ID ).'</a>&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;';
 }
} else {
	echo '<p>';
   _e("No comments",'news-ticker-benaceur');
	echo '</p>';
}
			}	
		 ?>
         </div>
        </div>
      </div></div>
	  
<style>
<?php if ($ntb_disable_in_screen_max_width) { ?>
@media only screen and (max-width: <?php echo $ntb_v_screen_max_width; ?>px) {
	.n_t_ntb_b {
		display:none;
	}
}
<?php } ?>
	.n_t_ntb_b {
		font-family:<?php echo $ntb_font_family; ?>;
		font-size:<?php echo $ntb_font_size; ?>px;
		font-weight:<?php echo $ntb_font_weight ;?>;
		background:<?php echo $ntb_color_back; ?>;
	    border-top:<?php echo $ntb_border_top; ?>px solid <?php echo $f_ntb_color_border; ?>;
    	border-bottom:<?php echo $ntb_border_bottom; ?>px solid <?php echo $f_ntb_color_border; ?>;
    	border-right:<?php echo $ntb_border_right; ?>px solid <?php echo $f_ntb_color_border; ?>;
    	border-left:<?php echo $ntb_border_left; ?>px solid <?php echo $f_ntb_color_border; ?>;
        border-radius:<?php echo $ntb_border_radius; ?>px;
       -moz-border-radius:<?php echo $ntb_border_radius; ?>px;
       -webkit-border-radius:<?php echo $ntb_border_radius; ?>px;
    	box-shadow:<?php echo $ntb_box_shadow; ?> <?php echo $ntb_box_shadow_v; ?>px <?php echo $ntb_box_shadow_color; ?>;
    	-moz-box-shadow:<?php echo $ntb_box_shadow; ?> <?php echo $ntb_box_shadow_v; ?>px <?php echo $ntb_box_shadow_color; ?>;
    	-webkit-box-shadow:<?php echo $ntb_box_shadow; ?> <?php echo $ntb_box_shadow_v; ?>px <?php echo $ntb_box_shadow_color; ?>;
    	text-shadow:<?php echo $ntb_text_shadow; ?> <?php echo $ntb_text_shadow_color; ?>;
		width:<?php echo $ntb_width; ?>;
		height:<?php echo $ntb_height; ?>px;
    	margin-top:<?php echo $ntb_margin_top; ?>px;
    	margin-bottom:<?php echo $ntb_margin_bottom; ?>px;
    	opacity:<?php echo $ntb_opacity; ?>;
		overflow:hidden;
		position:relative;	
        line-height:<?php echo $ntb_height; ?>px;
	}
	#scroll-ntb {
        <?php if (!is_rtl() && $dir == 'rtl') { ?>
		direction:rtl;
        <?php } elseif (is_rtl() && $dir == 'ltr') { ?>
		direction:ltr;
        <?php } ?>
		color:<?php echo $f_ntb_color_text_back; ?>!important;
		height:<?php echo $ntb_height; ?>px;
	}
	#scroll-ntb a {
		color:<?php echo $f_ntb_color_text_back; ?>!important;
		text-decoration: none!important;
	   -webkit-transition: all 0.5s ease-out;
	   -moz-transition: all 0.5s ease-out;
	   -o-transition: all 0.5s ease-out;
	    transition: all 0.5s ease-out;
	}
	#scroll-ntb a:hover {
		color:<?php echo $ntb_a_hover; ?>!important;
		text-decoration: none!important;
	   -webkit-transition: all 0.5s ease-out;
	   -moz-transition: all 0.5s ease-out;
	   -o-transition: all 0.5s ease-out;
	    transition: all 0.5s ease-out;
		}
	.n_t_ntb_b .n_t_ntb_b-name {
		color:<?php echo $f_ntb_color_text_title; ?>;
		background-color:<?php echo $f_ntb_color_back_title; ?>;
    	font-size:<?php echo $ntb_font_size_title; ?>px;
		<?php if ($dir == 'auto') { ?>
		<?php if (is_rtl()) { ?>
		float:right;
		margin-left: <?php echo $ntb_dist_from_left_right_scrollntb; ?>px;
		<?php } else { ?>
		float:left;
		margin-right: <?php echo $ntb_dist_from_left_right_scrollntb; ?>px;
		<?php } ?>
	    <?php } elseif ($dir == 'ltr') { ?>
		float:left;
		margin-right: <?php echo $ntb_dist_from_left_right_scrollntb; ?>px;
		<?php } elseif ($dir == 'rtl') { ?>
		float:right;
		margin-left: <?php echo $ntb_dist_from_left_right_scrollntb; ?>px;
		<?php } ?>
		padding:<?php echo $ntb_padding_top_title; ?>px 10px 2px;
		height:<?php echo $ntb_height; ?>px;
		min-width:<?php echo $ntb_width_title_background; ?>px;
		text-align:center;
		<?php if ($ntb_title_anim_pulsate) {  ?>
        animation: pulsateNTB 1.2s linear infinite;
		-webkit-animation: pulsateNTB 1.2s linear infinite;
        <?php } ?>
    	line-height:<?php echo $ntb_line_height_title; ?>px;
	    border:<?php echo $ntb_border_title; ?>px solid <?php echo $ntb_color_border_title; ?>;
	    box-sizing:border-box;
        -moz-box-sizing:border-box;
        -webkit-box-sizing:border-box;
		
<?php if ($ntb_title_styles == 'radiusTileSt') { ?>	
<?php if (!is_rtl() && $dir != 'rtl' || is_rtl() && $dir == 'ltr') { ?>
-moz-border-radius-topleft: <?php echo $ntb_title_styles_topleft_le; ?>px;
-webkit-border-top-left-radius: <?php echo $ntb_title_styles_topleft_le; ?>px;
 border-top-left-radius: <?php echo $ntb_title_styles_topleft_le; ?>px;
-moz-border-radius-topright: <?php echo $ntb_title_styles_topright_le; ?>px;
-webkit-border-top-right-radius: <?php echo $ntb_title_styles_topright_le; ?>px;
border-top-right-radius: <?php echo $ntb_title_styles_topright_le; ?>px;
<?php } else { ?>	
-moz-border-radius-topleft: <?php echo $ntb_title_styles_topleft_ri; ?>px;
-webkit-border-top-left-radius: <?php echo $ntb_title_styles_topleft_ri; ?>px;
 border-top-left-radius: <?php echo $ntb_title_styles_topleft_ri; ?>px;
-moz-border-radius-topright: <?php echo $ntb_title_styles_topright_ri; ?>px;
-webkit-border-top-right-radius: <?php echo $ntb_title_styles_topright_ri; ?>px;
border-top-right-radius: <?php echo $ntb_title_styles_topright_ri; ?>px;
<?php } ?>	
-moz-border-radius-bottomright: <?php echo $ntb_title_styles_bottomright; ?>px;
-webkit-border-bottom-right-radius: <?php echo $ntb_title_styles_bottomright; ?>px;
border-bottom-right-radius: <?php echo $ntb_title_styles_bottomright; ?>px;
-moz-border-radius-bottomleft: <?php echo $ntb_title_styles_bottomleft; ?>px;
-webkit-border-bottom-left-radius: <?php echo $ntb_title_styles_bottomleft; ?>px;
border-bottom-left-radius: <?php echo $ntb_title_styles_bottomleft; ?>px;
<?php } ?>	

	}
    @-webkit-keyframes pulsateNTB
    {
	0%   { color: #ddd; text-shadow: 0 -1px 0 #000; }
	50%  { color: #fff; text-shadow: 0 -1px 0 #444, 0 0 5px #ffd, 0 0 8px #fff; }
	100% { color: #ddd; text-shadow: 0 -1px 0 #000; }
    }
    @keyframes pulsateNTB
    {
	0%   { color: #ddd; text-shadow: 0 -1px 0 #000; }
	50%  { color: #fff; text-shadow: 0 -1px 0 #444, 0 0 5px #ffd, 0 0 8px #fff; }
	100% { color: #ddd; text-shadow: 0 -1px 0 #000; }
    }

	#scroll-ntb div {
		padding-top:<?php echo $ntb_padding_top; ?>px;
        padding-bottom:<?php echo $ntb_padding_bottom; ?>;
		<?php if ($dir == 'auto') { ?>
		<?php if (is_rtl()) { ?>
		margin-left: 10px;
		<?php } else { ?>
		margin-right: 10px;
		<?php } ?>
	    <?php } elseif ($dir == 'ltr') { ?>
		margin-right: 10px;
		<?php } elseif ($dir == 'rtl') { ?>
		margin-left: 10px;
		<?php } ?>
	}
	
		<?php if ($dir == 'auto') { ?>
		<?php if (is_rtl()) { ?>
	.n_t_ntb_b2 { padding-left:10px;
	 <?php if ($ntb_disable_title) {echo "padding-right: 10px;";} ?>
	}
		<?php } else { ?>
	.n_t_ntb_b2 { padding-right:10px;
	 <?php if ($ntb_disable_title) {echo "padding-left: 10px;";} ?>
	}
		<?php } ?>
    <?php } elseif ($dir == 'ltr') { ?>					
	.n_t_ntb_b2 { padding-right:10px;
	 <?php if ($ntb_disable_title) {echo "padding-left: 10px;";} ?>
	}
    <?php } elseif ($dir == 'rtl') { ?>
	.n_t_ntb_b2 { padding-left:10px;
	 <?php if ($ntb_disable_title) {echo "padding-right: 10px;";} ?>
	}
<?php } ?>
</style>

<script type="text/javascript">
function divScroll_onMouseOver(a) {
    var b = new getObj(a);
    b.obj.pause = <?php if ($ntb_pause_scrollntb) { ?> !0 <?php } else { ?> false <?php } ?>
}

function divScroll_onMouseOut(a) {
    var b = new getObj(a);
    b.obj.pause = <?php if ($ntb_pause_scrollntb) { ?> !1 <?php } else { ?> false <?php } ?>
}

	divScrollerNTB("scroll-ntb", "ntb-hor", <?php echo $ntb_speed_scrollntb; ?>, 6000);
</script>
