                        <?php if ($dir == 'auto') { ?>
		                <?php if (is_rtl()) { ?>
						<a title="<?php _e("prev",'news-ticker-benaceur'); ?>" href="#"><div id="next-button-ntb"></div></a>
						<a title="<?php _e("next",'news-ticker-benaceur'); ?>" href="#"><div id="prev-button-ntb"></div></a>
						<?php } else { ?>
						<a title="<?php _e("next",'news-ticker-benaceur'); ?>" href="#"><div id="next-button-ntb"></div></a>
						<a title="<?php _e("prev",'news-ticker-benaceur'); ?>" href="#"><div id="prev-button-ntb"></div></a>
						<?php } ?>
						<?php } elseif ($dir == 'ltr') { ?>
						<a title="<?php _e("next",'news-ticker-benaceur'); ?>" href="#"><div id="next-button-ntb"></div></a>
						<a title="<?php _e("prev",'news-ticker-benaceur'); ?>" href="#"><div id="prev-button-ntb"></div></a>
						<?php } elseif ($dir == 'rtl') { ?>	
						<a title="<?php _e("prev",'news-ticker-benaceur'); ?>" href="#"><div id="next-button-ntb"></div></a>
						<a title="<?php _e("next",'news-ticker-benaceur'); ?>" href="#"><div id="prev-button-ntb"></div></a>
						<?php } ?>	
        <div id="r-l-z-ntb"></div>

			<ul id="ntbne_five">
			<?php
			if($ntb_latest_p_c == 'latest_posts'){
			$recent_posts_ntb = wp_get_recent_posts( $lp );	
			foreach( $recent_posts_ntb as $recent_ntb ) : // foreach
			?>
				<li><a href="<?php echo get_permalink($recent_ntb["ID"]); ?>" title="<?php echo $recent_ntb["post_title"]; ?>">
				<?php
                if (!empty($ntb_expt_txt_title)) { 	 
				echo expt_title_text_NTB($recent_ntb["post_title"], $ntb_expt_txt_title); 
                } else {
				echo expt_title_text_NTB($recent_ntb["post_title"], 70); 
                }
				?>
				</a></li>
			<?php endforeach; // end foreach
			} elseif ($ntb_latest_p_c == 'latest_comments') {
if ( count( $comments_list ) > 0 ) {
$date_format = 'j F Y';
 foreach ( $comments_list as $comment ) {
if (!empty($ntb_expt_txt_comm)) { 	 
 echo '<li><a href="'.esc_url(get_permalink($comment->comment_post_ID)).'#comment-'.$comment->comment_ID.'">'.wp_html_excerpt( $comment->comment_content, $ntb_expt_txt_comm ).' ...</a></li>';
} else {
 echo '<li><a href="'.esc_url(get_permalink($comment->comment_post_ID)).'#comment-'.$comment->comment_ID.'">'.wp_html_excerpt( $comment->comment_content, 62 ).' ...</a></li>';
}
 }
} else {
	echo '<p>';
   _e("No comments",'news-ticker-benaceur');
	echo '</p>';
}
	
			}	
			?>
</ul>
			</div>	
			
<style>

	<?php if ($ntb_NP_img_anms_two == 'disable') { ?>	
    #next-button-ntb,#prev-button-ntb {display:none;}
	<?php } ?>	
	
	<?php if ($ntb_st != 'slideX') { ?>
	<?php if ($ntb_enable_style_mobile) { ?>
    @media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) { #ntbne_five li{min-width:98%;} }
		<?php } else { ?>
	#ntbne_five li{min-width:98%;}
		<?php } } ?>

	#ntbne_five li {
		padding:<?php echo $ntb_padding_top; ?>px 0 <?php echo $ntb_padding_bottom; ?>px 0;
		position:relative;
	<?php if (is_rtl() && $dir != 'ltr') { ?>	
		<?php if (!$ntb_enable_style_mobile && !$ntb_disable_title) { ?>
		right: <?php echo $ntb_width_anms_two; ?>px;
		<?php } elseif ($ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	    right: <?php echo $ntb_width_anms_two; ?>px; 
	    <?php } else { ?>
		right: 0px; 
	<?php }
	} elseif (is_rtl() && $dir == 'ltr') {
	    echo"width:98%;";	
	    if (!$ntb_enable_style_mobile && !$ntb_disable_title) { ?>
		margin-left: <?php echo $ntb_width_anms_two; ?>px;
		<?php } elseif ($ntb_enable_style_mobile && !$ntb_disable_title) { ?>
		margin-left: <?php echo $ntb_width_anms_two; ?>px;
	    <?php } else { ?>
		margin-left: 0px;
	<?php }
	 } 
	 
    	if (!is_rtl() && $dir != 'rtl') { ?>	
		<?php if (!$ntb_enable_style_mobile && !$ntb_disable_title) { ?>
		margin-left: <?php echo $ntb_width_anms_two; ?>px;
		<?php } elseif ($ntb_enable_style_mobile && !$ntb_disable_title) { ?>
		margin-left: <?php echo $ntb_width_anms_two; ?>px;
	    <?php } else { ?>
		margin-left: 0px;
	<?php }
	} elseif (!is_rtl() && $dir == 'rtl') {
	    echo"width:98%;";	
		if (!$ntb_enable_style_mobile && !$ntb_disable_title) { ?>
		right: <?php echo $ntb_width_anms_two; ?>px;
		<?php } elseif ($ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	    right: <?php echo $ntb_width_anms_two; ?>px; 
	    <?php } else { ?>
		right: 0px; 
	<?php }
	 } ?>
		}
		
<?php if ($ntb_disable_in_screen_max_width) { ?>
@media only screen and (max-width: <?php echo $ntb_v_screen_max_width; ?>px) {
	.news-ticker-ntb {
		display:none;
	}
}
<?php } ?>
	#ntbne_five {
	    <?php if (!is_rtl() && $dir == 'rtl') { ?>	
		direction:rtl;
	    <?php } ?>	
		
		<?php if ($dir == 'auto') { ?>
		<?php if (!is_rtl()) { ?>
		direction:ltr;
		margin-left: 0px;
		<?php } else {?>
		margin-right: 0px;
		<?php } ?>
	    <?php } elseif ($dir == 'ltr') { ?>
		margin-left: 0px;
		left: 0px;
		direction:ltr;
        <?php } elseif ($dir == 'rtl') { ?>
		margin-right: 0px;
		<?php } ?>
	    color:<?php echo $f_ntb_color_text_back; ?>;
	}
	.news-ticker-ntb ul a {		
		display:block;
	    color:<?php echo $f_ntb_color_text_back; ?>;
		text-decoration: none!important;
	}
<?php if ($ntb_enable_style_mobile) { ?>
@media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) {
<?php } ?>
	.news-ticker-ntb ul a {
		<?php if ($dir == 'auto') { 
		 if (is_rtl()) { 
		 if ($ntb_disable_title) {echo "padding-right: 10px;";}
         } else { 
		 if ($ntb_disable_title) {echo "padding-left: 10px;";}
		 }
	     } elseif ($dir == 'ltr') { 
		 if ($ntb_disable_title) {echo "padding-left: 10px;";}
		 } elseif ($dir == 'rtl') { 
		 if ($ntb_disable_title) {echo "padding-right: 10px;";}
		 } ?>
	}
<?php if ($ntb_enable_style_mobile) { ?>
}
<?php } ?>

	.news-ticker-ntb ul a:hover {
		color:<?php echo $ntb_a_hover; ?>;
		text-decoration: none!important;
	   -webkit-transition: all 0.5s ease-out;
	   -moz-transition: all 0.5s ease-out;
	   -o-transition: all 0.5s ease-out;
	    transition: all 0.5s ease-out;
	}
<?php if ($ntb_enable_style_mobile) { ?>
@media only screen and (max-width: <?php echo $ntb_screen_max_width; ?>px) { 
    .news-ticker-ntb span {display:none;}

	.news-ticker-ntb ul a{
		padding-top: <?php echo $ntb_padding_top_mobile; ?>px;
		<?php if ($dir == 'auto') { ?>
		<?php if (is_rtl()) { ?>
		padding-right: <?php echo $ntb_padding_right_left_mobile ?>px;
		<?php } else { ?>
		padding-left: <?php echo $ntb_padding_right_left_mobile ?>px;
		<?php } ?>
		<?php } elseif ($dir == 'ltr') { ?>
		padding-left: <?php echo $ntb_padding_right_left_mobile ?>px;
		<?php } elseif ($dir == 'rtl') { ?>
		padding-right: <?php echo $ntb_padding_right_left_mobile ?>px;
		<?php } ?>
       }
}
@media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) {
<?php } ?>
	.news-ticker-ntb span {
		position:absolute;
		z-index:2;
		color:<?php echo $f_ntb_color_text_title; ?>;
		background-color:<?php echo $f_ntb_color_back_title; ?>;
    	font-size:<?php echo $ntb_font_size_title; ?>px;
		display:block;
		<?php if ($dir == 'auto') { ?>
		<?php if (is_rtl()) { ?>
		right:0px;
		margin-left: 5px;
		<?php } else { ?>
		margin-right: 5px;
		left: 0px;
		<?php } ?>
		<?php } elseif ($dir == 'ltr') { ?>
		left:0px;
		margin-right: 5px;
		<?php } elseif ($dir == 'rtl') { ?>
		right:0px;
		margin-left: 5px;
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

<?php if ($ntb_enable_style_mobile) { ?>
}	
<?php } ?>
	.news-ticker-ntb {
	font-family:<?php echo $ntb_font_family; ?>;
	font-size:<?php echo $ntb_font_size; ?>px;
	font-weight:<?php echo $ntb_font_weight ;?>;
	background:<?php echo $ntb_color_back;  ?>;
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
	text-shadow:<?php echo $ntb_text_shadow; ?> <?php echo $ntb_text_shadow_color ; ?>;
	width:<?php echo $ntb_width; ?>;
	margin-top:<?php echo $ntb_margin_top; ?>px;
	margin-bottom:<?php echo $ntb_margin_bottom; ?>px;
	opacity:<?php echo $ntb_opacity; ?>;
	overflow:hidden;
	position:relative;	
	}
	
<?php if ($ntb_enable_style_mobile) { ?>
@media only screen and (max-width: <?php echo $ntb_screen_max_width; ?>px) {
	#ntbne_five {
    	min-height:<?php echo $ntb_min_height_mobile; ?>px;
<?php if (is_rtl() && $dir != 'ltr') { ?>
		margin-right: 0px;
<?php } ?>
	}
	

	#ntbne_five li {
		width:99%;
	    <?php if (is_rtl() && $dir == 'ltr') { ?>	
		margin-left: <?php echo $ntb_width_rtl_from_ri_anms_two; ?>px;
	    <?php } ?>	
		overflow:hidden;
		list-style: none;
		margin-top:0px;
<?php if (is_rtl() && $dir != 'ltr') { ?>
		right: 0px;
<?php } else { ?>
	    <?php if (is_rtl() && $dir != 'ltr') { ?>	
		margin-left: 0px;
	    <?php } ?>	
	    <?php if (!is_rtl() && $dir != 'rtl') { ?>	
		margin-left: 0px;
	    <?php } else if (!is_rtl() && $dir == 'rtl') { ?>	
		right: <?php echo $ntb_width_rtl_from_ri_anms_two; ?>px;
	    <?php } ?>	
<?php } ?>
		display: block;
    	height:<?php echo $ntb_height_mobile; ?>px;
	}
	.news-ticker-ntb {
	height:<?php echo $ntb_height_mobile; ?>px;
	line-height:<?php echo $ntb_line_height_mobile; ?>px;
	}
	.news-ticker-ntb ul a {
		white-space:normal;
	}
	#ntbne_five  {
	width:99%;
	}
    #next-button-ntb,#prev-button-ntb {display:none;}
}
@media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) {
<?php } ?>
	#ntbne_five li {
		overflow:hidden;
		list-style: none;
		margin-top:0px;
		display: block;
	}
	.news-ticker-ntb ul a {
		white-space:nowrap;
	}
	.news-ticker-ntb {
	height:<?php echo $ntb_height; ?>px;
	line-height:<?php echo $ntb_height; ?>px;
	}
<?php if ($ntb_enable_style_mobile) { ?>
}
<?php } ?>

    #next-button-ntb {
    position:absolute;
	z-index:99;
    cursor:pointer;
    -webkit-transition: opacity 1s ease-in-out;
    -moz-transition: opacity 0.3s ease-in-out;
    -ms-transition: opacity 0.3s ease-in-out;
    -o-transition: opacity 0.3s ease-in-out;
    transition: opacity 0.3s ease-in-out; 
	filter: alpha(opacity=70);
    opacity: 0.7;
	<?php if ($dir == 'auto') { ?>
	<?php if (is_rtl()) { ?>
    left:30px;
	<?php } else { ?>
    right:6px;
	<?php } ?>
    <?php } elseif ($dir == 'ltr') { ?>	
    right:6px;
    <?php } elseif ($dir == 'rtl') { ?>	
    left:30px;
    <?php } ?>	
}
    #next-button-ntb:hover {
    filter: alpha(opacity=100);
    opacity: 1;
}
	
    #prev-button-ntb {
    position:absolute;
	z-index:99;
    cursor:pointer;
    -webkit-transition: opacity 1s ease-in-out;
    -moz-transition: opacity 0.3s ease-in-out;
    -ms-transition: opacity 0.3s ease-in-out;
    -o-transition: opacity 0.3s ease-in-out;
    transition: opacity 0.3s ease-in-out; 
	filter: alpha(opacity=70);
    opacity: 0.7;
	<?php if ($dir == 'auto') { ?>
	<?php if (is_rtl()) { ?>
    left:6px;
	<?php } else { ?>
    right:30px;
	<?php } ?>
    <?php } elseif ($dir == 'ltr') { ?>	
    right:30px;
    <?php } elseif ($dir == 'rtl') { ?>	
    left:6px;
    <?php } ?>	
}
    #prev-button-ntb:hover {
    filter: alpha(opacity=100);
    opacity: 1;
}

<?php if (!$ntb_enable_style_mobile) { ?>
   #r-l-z-ntb {
    position:absolute;
	z-index:98;
	background:<?php echo $ntb_color_back;  ?>;
    <?php if ($ntb_NP_img_anms_two == 'enable') {echo"min-width:47px;";} else {echo"min-width:10px;";} ?>
	min-height:98%;
	max-height:98%;
	top:1px;
	<?php if ($dir == 'auto') { ?>
	<?php if (is_rtl()) { ?>
    left:0px;
	<?php } else { ?>
    right:0px;
	<?php } ?>
    <?php } elseif ($dir == 'ltr') { ?>	
    right:0px;
    <?php } elseif ($dir == 'rtl') { ?>	
    left:0px;
    <?php } ?>	scrollLeft
   }
<?php } elseif ($ntb_enable_style_mobile && $ntb_st == 'blindZ' || $ntb_st == 'scrollLeft' || $ntb_st == 'scrollRight') { ?>
@media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) {
   #r-l-z-ntb {<?php if ($ntb_NP_img_anms_two == 'enable') {echo"min-width:47px;";} else {echo"min-width:10px;";} ?>}
}
@media only screen and (max-width: <?php echo $ntb_screen_max_width; ?>px) {
   #r-l-z-ntb {min-width:8px;}
}
   #r-l-z-ntb {
    position:absolute;
	z-index:98;
	background:<?php echo $ntb_color_back;  ?>;
	min-height:98%;
	max-height:98%;
	top:1px;
	<?php if ($dir == 'auto') { ?>
	<?php if (is_rtl()) { ?>
    left:0px;
	<?php } else { ?>
    right:0px;
	<?php } ?>
    <?php } elseif ($dir == 'ltr') { ?>	
    right:0px;
    <?php } elseif ($dir == 'rtl') { ?>	
    left:0px;
    <?php } ?>	
   }
<?php } elseif ($ntb_enable_style_mobile) { ?>
@media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) {
   #r-l-z-ntb {
    position:absolute;
	z-index:98;
	background:<?php echo $ntb_color_back;  ?>;
    <?php if ($ntb_NP_img_anms_two == 'enable') {echo"min-width:47px;";} else {echo"min-width:10px;";} ?>
	min-height:98%;
	max-height:98%;
	top:1px;
	<?php if ($dir == 'auto') { ?>
	<?php if (is_rtl()) { ?>
    left:0px;
	<?php } else { ?>
    right:0px;
	<?php } ?>
    <?php } elseif ($dir == 'ltr') { ?>	
    right:0px;
    <?php } elseif ($dir == 'rtl') { ?>	
    left:0px;
    <?php } ?>	
   }
}
<?php } ?>

</style>

<script type="text/javascript" language="javascript">
jQuery(document).ready(function(){
  jQuery('.news-ticker-ntb ul').cycle({ 
	 speed: <?php echo $ntb_anim_speed_anms_two; ?>,
	 timeout: <?php echo $ntb_anim_timeout_anms_two; ?>,
	 height: 'auto',		 
	 fx: '<?php echo $ntb_st; ?>',
	 pause: <?php $ntb_pause_anms_two ? print 1 : print 0 ; ?>,
	 containerResize: 1,
	 <?php if (is_rtl() && $dir != 'ltr') { ?> 
	 next: '#prev-button-ntb',
     prev: '#next-button-ntb'
	 <?php } else { ?> 
	 next: '#next-button-ntb',
     prev: '#prev-button-ntb'
	 <?php } ?> 
  });
});
</script>

<script>
(function($) {
"use strict";

$.fn.cycle.transitions.simple = function($cont, $slides, opts) {
	opts.fxFn = function(curr,next,opts,after){
		$(next).show();
		$(curr).hide();
		after();
	};
};

// scrollLeft/Right
$.fn.cycle.transitions.scrollLeft = function($cont, $slides, opts) {
	$cont.css('z-index','1');
	opts.before.push($.fn.cycle.commonReset);
	var w = $cont.width();
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
	opts.cssBefore.left = w;
	opts.animOut.left = 0-w;
	<?php } else { ?>
	opts.cssBefore.right = w;
	opts.animOut.right = 0-w;
	<?php } ?>
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
	opts.cssFirst.left = 0;
	opts.animIn.left = 0;
	<?php } elseif (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
	<?php if (!$ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	opts.cssFirst.right = <?php echo $ntb_width_anms_two; ?>;
	opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
	<?php } elseif (!$ntb_enable_style_mobile && $ntb_disable_title) { ?>
	opts.cssFirst.right = 0;
	opts.animIn.right = 0;
	<?php } elseif ($ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
	opts.cssFirst.right = <?php echo $ntb_width_anms_two; ?>;
	opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
	} else {
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	opts.cssFirst.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	<?php } else { ?>
	opts.cssFirst.right = 0;
	opts.animIn.right = 0;
	<?php } ?>
	}
	<?php } elseif ($ntb_enable_style_mobile && $ntb_disable_title) { ?>
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
	opts.cssFirst.right = 0;
	opts.animIn.right = 0;
	} else {
	opts.cssFirst.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	}
	<?php } else { ?>
	opts.cssFirst.right = 0;
	opts.animIn.right = 0;
	<?php } ?>
	<?php } ?>
	<?php } ?>
	opts.cssBefore.top = 0;
};
$.fn.cycle.transitions.scrollRight = function($cont, $slides, opts) {
	$cont.css('z-index','1');
	opts.before.push($.fn.cycle.commonReset);
	var w = $cont.width();
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
	opts.cssBefore.left = -w;
	opts.animOut.left = w;
	<?php } else { ?>
	opts.cssBefore.right = -w;
	opts.animOut.right = w;
	<?php } ?>
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
	opts.cssFirst.left = 0;
	opts.animIn.left = 0;
	<?php } elseif (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
	<?php if (!$ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	opts.cssFirst.right = <?php echo $ntb_width_anms_two; ?>;
	opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
	<?php } elseif (!$ntb_enable_style_mobile && $ntb_disable_title) { ?>
	opts.cssFirst.right = 0;
	opts.animIn.right = 0;
	<?php } elseif ($ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
	opts.cssFirst.right = <?php echo $ntb_width_anms_two; ?>;
	opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
	} else {
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	opts.cssFirst.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	<?php } else { ?>
	opts.cssFirst.right = 0;
	opts.animIn.right = 0;
	<?php } ?>
	}
	<?php } elseif ($ntb_enable_style_mobile && $ntb_disable_title) { ?>
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
	opts.cssFirst.right = 0;
	opts.animIn.right = 0;
	} else {
	opts.cssFirst.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	}
	<?php } else { ?>
	opts.cssFirst.right = 0;
	opts.animIn.right = 0;
	<?php } ?>
	<?php } ?>
	<?php } ?>
	opts.cssBefore.top = 0;
};

// slideX/slideY
$.fn.cycle.transitions.slideX = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$(opts.elements).not(curr).hide();
		$.fn.cycle.commonReset(curr,next,opts,false,true);
		opts.animIn.width = next.cycleW;
	});
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
	opts.animIn.width = 'show';
	opts.animOut.width = 0;
};
$.fn.cycle.transitions.slideY = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$(opts.elements).not(curr).hide();
		$.fn.cycle.commonReset(curr,next,opts,true,false);
		opts.animIn.height = next.cycleH;
	});
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.height = 0;
	opts.animIn.height = 'show';
	opts.animOut.height = 0;
};

// shuffle
$.fn.cycle.transitions.shuffle = function($cont, $slides, opts) {
	var i, w = $cont.css('overflow', 'visible').width();
	$slides.css({left: 0, top: 0});
	opts.before.push(function(curr,next,opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,true,true);
	});
	// only adjust speed once!
	if (!opts.speedAdjusted) {
		opts.speed = opts.speed / 2; // shuffle has 2 transitions
		opts.speedAdjusted = true;
	}
	opts.random = 0;
	opts.shuffle = opts.shuffle || {left:0, top:15};
	opts.els = [];
	for (i=0; i < $slides.length; i++)
		opts.els.push($slides[i]);

	for (i=0; i < opts.currSlide; i++)
		opts.els.push(opts.els.shift());

	// custom transition fn (hat tip to Benjamin Sterling for this bit of sweetness!)
	opts.fxFn = function(curr, next, opts, cb, fwd) {
		if (opts.rev)
			fwd = !fwd;
		var $el = fwd ? $(curr) : $(next);
		$(next).css(opts.cssBefore);
		var count = opts.slideCount;
		$el.animate(opts.shuffle, opts.speedIn, opts.easeIn, function() {
			var hops = $.fn.cycle.hopsFromLast(opts, fwd);
			for (var k=0; k < hops; k++) {
				if (fwd)
					opts.els.push(opts.els.shift());
				else
					opts.els.unshift(opts.els.pop());
			}
			if (fwd) {
				for (var i=0, len=opts.els.length; i < len; i++)
					$(opts.els[i]).css('z-index', len-i+count);
			}
			else {
				var z = $(curr).css('z-index');
				$el.css('z-index', parseInt(z,10)+1+count);
			}
			$el.animate({left:0, top:0}, opts.speedOut, opts.easeOut, function() {
				$(fwd ? this : curr).hide();
				if (cb) cb();
			});
		});
	};
	$.extend(opts.cssBefore, { display: 'block', opacity: 1, top: 0, left: 0 });
};

// turnUp/Down/Left/Right
$.fn.cycle.transitions.turnUp = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,false);
		opts.cssBefore.top = next.cycleH;
		opts.animIn.height = next.cycleH;
		opts.animOut.width = next.cycleW;
	});
	opts.cssFirst.top = 0;
	opts.cssBefore.left = 0;
	opts.cssBefore.height = 0;
	opts.animIn.top = 0;
	opts.animOut.height = 0;
};
$.fn.cycle.transitions.turnDown = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,false);
		opts.animIn.height = next.cycleH;
		opts.animOut.top   = curr.cycleH;
	});
	opts.cssFirst.top = 0;
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.cssBefore.height = 0;
	opts.animOut.height = 0;
};
$.fn.cycle.transitions.turnLeft = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,true);
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
		opts.cssBefore.left = next.cycleW;
	<?php } else { ?>
		opts.cssBefore.right = next.cycleW;
	<?php } ?>
		opts.animIn.width = next.cycleW;
	});
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
	opts.animIn.left = 0;
	<?php } elseif (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
	<?php if (!$ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
	<?php } elseif (!$ntb_enable_style_mobile && $ntb_disable_title) { ?>
	opts.animIn.right = 0;
	<?php } elseif ($ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
	opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
	} else {
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	<?php } else { ?>
	opts.animIn.right = 0;
	<?php } ?>
	}
	<?php } elseif ($ntb_enable_style_mobile && $ntb_disable_title) { ?>
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
	opts.animIn.right = 0;
	} else {
	opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	}
	<?php } else { ?>
	opts.animIn.right = 0;
	<?php } ?>
	<?php } ?>
	<?php } ?>
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
	opts.animOut.width = 0;
};
$.fn.cycle.transitions.turnRight = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,true);
		opts.animIn.width = next.cycleW;
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
		opts.animOut.left = curr.cycleW;
	<?php } else { ?>
		opts.animOut.right = curr.cycleW;
	<?php } ?>
	});
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
	$.extend(opts.cssBefore, { top: 0, left: 0, width: 0 });
	opts.animIn.left = 0;
	<?php } elseif (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
	<?php if (!$ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	$.extend(opts.cssBefore, { top: 0, right: <?php echo $ntb_width_anms_two; ?>, width: 0 });
	opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
	<?php } elseif (!$ntb_enable_style_mobile && $ntb_disable_title) { ?>
	$.extend(opts.cssBefore, { top: 0, right: 0, width: 0 });
	opts.animIn.right = 0;
	<?php } elseif ($ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
	$.extend(opts.cssBefore, { top: 0, right: <?php echo $ntb_width_anms_two; ?>, width: 0 });
	opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
	} else {
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	$.extend(opts.cssBefore, { top: 0, right: <?php echo $ntb_width_rtl_from_ri_anms_two; ?>, width: 0 });
	opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	<?php } else { ?>
	$.extend(opts.cssBefore, { top: 0, right: 0, width: 0 });
	opts.animIn.right = 0;
	<?php } ?>
	}
	<?php } elseif ($ntb_enable_style_mobile && $ntb_disable_title) { ?>
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
	$.extend(opts.cssBefore, { top: 0, right: 0, width: 0 });
	opts.animIn.right = 0;
	} else {
	$.extend(opts.cssBefore, { top: 0, right: <?php echo $ntb_width_rtl_from_ri_anms_two; ?>, width: 0 });
	opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	}
	<?php } else { ?>
	$.extend(opts.cssBefore, { top: 0, right: 0, width: 0 });
	opts.animIn.right = 0;
	<?php } ?>
	<?php } ?>
	<?php } ?>
	opts.animOut.width = 0;
};

// zoom
$.fn.cycle.transitions.zoom = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,false,true);
		opts.cssBefore.top = next.cycleH/2;
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
		opts.cssBefore.left = next.cycleW/2;
		$.extend(opts.animOut, { width: 0, height: 0, top: curr.cycleH/2, left: curr.cycleW/2 });
	<?php } else { ?>
		opts.cssBefore.right = next.cycleW/2;
		$.extend(opts.animOut, { width: 0, height: 0, top: curr.cycleH/2, right: curr.cycleW/2 });
	<?php } ?>
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
		$.extend(opts.animIn, { top: 0, left: 0, width: next.cycleW, height: next.cycleH });
	<?php } elseif (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
	<?php if (!$ntb_enable_style_mobile && !$ntb_disable_title) { ?>
		$.extend(opts.animIn, { top: 0, right: <?php echo $ntb_width_anms_two; ?>, width: next.cycleW, height: next.cycleH });
	<?php } elseif (!$ntb_enable_style_mobile && $ntb_disable_title) { ?>
		$.extend(opts.animIn, { top: 0, right: 0, width: next.cycleW, height: next.cycleH });
	<?php } elseif ($ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
		$.extend(opts.animIn, { top: 0, right: <?php echo $ntb_width_anms_two; ?>, width: next.cycleW, height: next.cycleH });
	} else {
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
		$.extend(opts.animIn, { top: 0, right: <?php echo $ntb_width_rtl_from_ri_anms_two; ?>, width: next.cycleW, height: next.cycleH });
	<?php } else { ?>
		$.extend(opts.animIn, { top: 0, right: 0, width: next.cycleW, height: next.cycleH });
	<?php } ?>
	}
	<?php } elseif ($ntb_enable_style_mobile && $ntb_disable_title) { ?>
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
		$.extend(opts.animIn, { top: 0, right: 0, width: next.cycleW, height: next.cycleH });
	} else {
		$.extend(opts.animIn, { top: 0, right: <?php echo $ntb_width_rtl_from_ri_anms_two; ?>, width: next.cycleW, height: next.cycleH });
	}
	<?php } else { ?>
		$.extend(opts.animIn, { top: 0, right: 0, width: next.cycleW, height: next.cycleH });
	<?php } ?>
	<?php } ?>
	<?php } ?>
	});
	opts.cssFirst.top = 0;
	opts.cssBefore.width = 0;
	opts.cssBefore.height = 0;
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
	opts.cssFirst.left = 0;
	<?php } elseif (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
	<?php if (!$ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	opts.cssFirst.right = <?php echo $ntb_width_anms_two; ?>;
	<?php } elseif (!$ntb_enable_style_mobile && $ntb_disable_title) { ?>
	opts.cssFirst.right = 0;
	<?php } elseif ($ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
	opts.cssFirst.right = <?php echo $ntb_width_anms_two; ?>;
	} else {
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	opts.cssFirst.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	<?php } else { ?>
	opts.cssFirst.right = 0;
	<?php } ?>
	}
	<?php } elseif ($ntb_enable_style_mobile && $ntb_disable_title) { ?>
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
	opts.cssFirst.right = 0;
	} else {
	opts.cssFirst.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	}
	<?php } else { ?>
	opts.cssFirst.right = 0;
	<?php } ?>
	<?php } ?>
	<?php } ?>
};

// fadeZoom
$.fn.cycle.transitions.fadeZoom = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,false);
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
		opts.cssBefore.left = next.cycleW/2;
	<?php } else { ?>
		opts.cssBefore.right = next.cycleW/2;
	<?php } ?>
		opts.cssBefore.top = next.cycleH/2;
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
		$.extend(opts.animIn, { top: 0, left: 0, width: next.cycleW, height: next.cycleH });
	<?php } elseif (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
	<?php if (!$ntb_enable_style_mobile && !$ntb_disable_title) { ?>
		$.extend(opts.animIn, { top: 0, right: <?php echo $ntb_width_anms_two; ?>, width: next.cycleW, height: next.cycleH });
	<?php } elseif (!$ntb_enable_style_mobile && $ntb_disable_title) { ?>
		$.extend(opts.animIn, { top: 0, right: 0, width: next.cycleW, height: next.cycleH });
	<?php } elseif ($ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
		$.extend(opts.animIn, { top: 0, right: <?php echo $ntb_width_anms_two; ?>, width: next.cycleW, height: next.cycleH });
	} else {
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
		$.extend(opts.animIn, { top: 0, right: <?php echo $ntb_width_rtl_from_ri_anms_two; ?>, width: next.cycleW, height: next.cycleH });
	<?php } else { ?>
		$.extend(opts.animIn, { top: 0, right: 0, width: next.cycleW, height: next.cycleH });
	<?php } ?>
	}
	<?php } elseif ($ntb_enable_style_mobile && $ntb_disable_title) { ?>
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
		$.extend(opts.animIn, { top: 0, right: 0, width: next.cycleW, height: next.cycleH });
	} else {
		$.extend(opts.animIn, { top: 0, right: <?php echo $ntb_width_rtl_from_ri_anms_two; ?>, width: next.cycleW, height: next.cycleH });
	}
	<?php } else { ?>
		$.extend(opts.animIn, { top: 0, right: 0, width: next.cycleW, height: next.cycleH });
	<?php } ?>
	<?php } ?>
	<?php } ?>
	});
	opts.cssBefore.width = 0;
	opts.cssBefore.height = 0;
	opts.animOut.opacity = 0;
};

// blindZ
$.fn.cycle.transitions.blindZ = function($cont, $slides, opts) {
	var h = $cont.css('','').height();
	var w = $cont.width();
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts);
		opts.animIn.height = next.cycleH;
		opts.animOut.top   = curr.cycleH;
	});
	opts.cssBefore.top = h;
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
	opts.cssBefore.left = w;
	opts.animOut.left = w;
	<?php } else { ?>
	opts.cssBefore.right = w;
	opts.animOut.right = w;
	<?php } ?>
	opts.animIn.top = 0;
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
	opts.animIn.left = 0;
	<?php } elseif (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
	<?php if (!$ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
	<?php } elseif (!$ntb_enable_style_mobile && $ntb_disable_title) { ?>
	opts.animIn.right = 0;
	<?php } elseif ($ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
	opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
	} else {
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	<?php } else { ?>
	opts.animIn.right = 0;
	<?php } ?>
	}
	<?php } elseif ($ntb_enable_style_mobile && $ntb_disable_title) { ?>
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
	opts.animIn.right = 0;
	} else {
	opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	}
	<?php } else { ?>
	opts.animIn.right = 0;
	<?php } ?>
	<?php } ?>
	<?php } ?>
	opts.animOut.top = h;
};

// growX - grow horizontally from centered 0 width
$.fn.cycle.transitions.growX = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,true);
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
		opts.cssBefore.left = this.cycleW/2;
	<?php } else { ?>
		opts.cssBefore.right = this.cycleW/2;
	<?php } ?>
		opts.animIn.width = this.cycleW;
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
		opts.animIn.left = 0;
		opts.animOut.left = 0;
	<?php } elseif (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
	<?php if (!$ntb_enable_style_mobile && !$ntb_disable_title) { ?>
		opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
		opts.animOut.right = <?php echo $ntb_width_anms_two; ?>;
	<?php } elseif (!$ntb_enable_style_mobile && $ntb_disable_title) { ?>
		opts.animIn.right = 0;
		opts.animOut.right = 0;
	<?php } elseif ($ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
		opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
		opts.animOut.right = <?php echo $ntb_width_anms_two; ?>;
	} else {
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
		opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
		opts.animOut.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	<?php } else { ?>
		opts.animIn.right = 0;
		opts.animOut.right = 0;
	<?php } ?>
	}
	<?php } elseif ($ntb_enable_style_mobile && $ntb_disable_title) { ?>
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
		opts.animIn.right = 0;
		opts.animOut.right = 0;
	} else {
		opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
		opts.animOut.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	}
	<?php } else { ?>
		opts.animIn.right = 0;
		opts.animOut.right = 0;
	<?php } ?>
	<?php } ?>
	<?php } ?>
	});
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
};
// growY - grow vertically from centered 0 height
$.fn.cycle.transitions.growY = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,false);
		opts.cssBefore.top = this.cycleH/2;
		opts.animIn.top = 0;
		opts.animIn.height = this.cycleH;
		opts.animOut.top = 0;
	});
	opts.cssBefore.height = 0;
	opts.cssBefore.left = 0;
};

// curtainX - squeeze in both edges horizontally
$.fn.cycle.transitions.curtainX = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,false,true,true);
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
		opts.cssBefore.left = next.cycleW/2;
		opts.animOut.left = curr.cycleW/2;
	<?php } else { ?>
		opts.cssBefore.right = next.cycleW/2;
		opts.animOut.right = curr.cycleW/2;
	<?php } ?>
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
		opts.animIn.left = 0;
	<?php } elseif (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
	<?php if (!$ntb_enable_style_mobile && !$ntb_disable_title) { ?>
		opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
	<?php } elseif (!$ntb_enable_style_mobile && $ntb_disable_title) { ?>
		opts.animIn.right = 0;
	<?php } elseif ($ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
		opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
	} else {
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
		opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	<?php } else { ?>
		opts.animIn.right = 0;
	<?php } ?>
	}
	<?php } elseif ($ntb_enable_style_mobile && $ntb_disable_title) { ?>
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
		opts.animIn.right = 0;
	} else {
		opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	}
	<?php } else { ?>
		opts.animIn.right = 0;
	<?php } ?>
	<?php } ?>
	<?php } ?>
		opts.animIn.width = this.cycleW;
		opts.animOut.width = 0;
	});
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
};
// curtainY - squeeze in both edges vertically
$.fn.cycle.transitions.curtainY = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,false,true);
		opts.cssBefore.top = next.cycleH/2;
		opts.animIn.top = 0;
		opts.animIn.height = next.cycleH;
		opts.animOut.top = curr.cycleH/2;
		opts.animOut.height = 0;
	});
	opts.cssBefore.height = 0;
	opts.cssBefore.left = 0;
};

// uncover - curr slide moves off next slide
$.fn.cycle.transitions.uncover = function($cont, $slides, opts) {
	var w = $cont.css('z-index','1').width();
	var h = $cont.height();
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,true,true);
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
			opts.animOut.left = -w;
	<?php } else { ?>
			opts.animOut.right = -w;
	<?php } ?>
	});
	opts.animIn.top = 0;
	opts.cssBefore.top = 0;
	<?php if (is_rtl() && $dir == 'ltr' || !is_rtl() && $dir != 'rtl') { ?>
	opts.animIn.left = 0;
	opts.cssBefore.left = 0;
	<?php } elseif (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
	<?php if (!$ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
	opts.cssBefore.right = <?php echo $ntb_width_anms_two; ?>;
	<?php } elseif (!$ntb_enable_style_mobile && $ntb_disable_title) { ?>
	opts.animIn.right = 0;
	opts.cssBefore.right = 0;
	<?php } elseif ($ntb_enable_style_mobile && !$ntb_disable_title) { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
	opts.animIn.right = <?php echo $ntb_width_anms_two; ?>;
	opts.cssBefore.right = <?php echo $ntb_width_anms_two; ?>;
	} else {
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	opts.cssBefore.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	<?php } else { ?>
	opts.animIn.right = 0;
	opts.cssBefore.right = 0;
	<?php } ?>
	}
	<?php } elseif ($ntb_enable_style_mobile && $ntb_disable_title) { ?>
	<?php if (!is_rtl() && $dir == 'rtl') { ?>
	if( window.innerWidth > <?php echo $ntb_screen_min_width; ?> ) {
	opts.animIn.right = 0;
	opts.cssBefore.right = 0;
	} else {
	opts.animIn.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	opts.cssBefore.right = <?php echo $ntb_width_rtl_from_ri_anms_two; ?>;
	}
	<?php } else { ?>
	opts.animIn.right = 0;
	opts.cssBefore.right = 0;
	<?php } ?>
	<?php } ?>
	<?php } ?>
};

// toss - move top slide and fade away
$.fn.cycle.transitions.toss = function($cont, $slides, opts) {
	var w = $cont.css('overflow','visible').width();
	var h = $cont.height();
	opts.before.push(function(curr, next, opts) {
		$.fn.cycle.commonReset(curr,next,opts,true,true,true);
		// provide default toss settings if animOut not provided
		if (!opts.animOut.left && !opts.animOut.top)
			$.extend(opts.animOut, { left: 0, top: 0, opacity: 0 });
		else
			opts.animOut.opacity = 0;
	});
	opts.cssBefore.left = 0;
	opts.cssBefore.top = 0;
	opts.animIn.left = 0;
};

})(jQuery);
</script>
