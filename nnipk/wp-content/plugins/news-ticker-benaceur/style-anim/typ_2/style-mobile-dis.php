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

	<?php if ($ntb_NP_img_typing_2 == 'disable') { ?>	
    #next-button-ntb,#prev-button-ntb {display:none;}
	<?php } ?>	

	#ntbne_five li {
		padding:<?php echo $ntb_padding_top; ?>px 0 <?php echo $ntb_padding_bottom; ?>px 0;
		position:relative;
		width:98%;
	<?php if (is_rtl() && $dir != 'ltr') { ?>	
		<?php if (!$ntb_disable_title) { ?>
		right: <?php echo $ntb_width_typing_2; ?>px;
	    <?php } else { ?>
		right: 0px; 
	<?php }
	} elseif (is_rtl() && $dir == 'ltr') {
	  echo"width:98%;";	
	  if (!$ntb_disable_title) { ?>
		margin-left: <?php echo $ntb_width_typing_2; ?>px;
	    <?php } else { ?>
		margin-left: 0px;
	<?php }
	} ?>
	
	<?php if (!is_rtl() && $dir != 'rtl') { ?>	
		<?php if (!$ntb_disable_title) { ?>
		margin-left: <?php echo $ntb_width_typing_2; ?>px;
	    <?php } else { ?>
		margin-left: 0px;
	<?php }
    } elseif (!is_rtl() && $dir == 'rtl') {
		if (!$ntb_disable_title) { ?>
		right: <?php echo $ntb_width_typing_2; ?>px;
	    <?php } else { ?>
		right: 0px; 
	<?php }
	}
	?>
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
        <?php if (is_rtl() && $dir == 'rtl') { ?>
        margin-right: 0px;
        <?php } ?>
        right: 0px;
		<?php } ?>
	    color:<?php echo $f_ntb_color_text_back; ?>;
	}
	.news-ticker-ntb ul a {		
		display:block;
	    color:<?php echo $f_ntb_color_text_back; ?>;
		text-decoration: none!important;
	}
	

	.news-ticker-ntb ul a {		
		<?php if ($dir == 'auto') { ?>
		<?php if (is_rtl()) { 
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

	.news-ticker-ntb ul a:hover {
		color:<?php echo $ntb_a_hover; ?>;
		text-decoration: none!important;
	   -webkit-transition: all 0.5s ease-out;
	   -moz-transition: all 0.5s ease-out;
	   -o-transition: all 0.5s ease-out;
	    transition: all 0.5s ease-out;
	}
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

</style>

<script type="text/javascript" language="javascript">
jQuery(document).ready(function(){
  jQuery('.news-ticker-ntb ul').cycle({ 
	 speedIn: <?php echo $ntb_speedIn_typing_2; ?>,
	 timeout: <?php echo $ntb_anim_timeout_typing_2; ?>,
	 height: 'auto',		 
	 fx: '<?php echo $ntb_st; ?>',
	 pause: <?php $ntb_pause_typing_2 ? print 1 : print 0 ; ?>,
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

// typing_2/Benaceur
$.fn.cycle.transitions.typing_2 = function($cont, $slides, opts) {
	opts.before.push(function(curr, next, opts) {
		$(opts.elements).not(curr).hide();
		$.fn.cycle.commonReset(curr,next,opts,false,true);
		opts.animIn.width = next.cycleW;
	});
	opts.cssBefore.top = 0;
	opts.cssBefore.width = 0;
	opts.animIn.width = 'show';
};

})(jQuery);
</script>
