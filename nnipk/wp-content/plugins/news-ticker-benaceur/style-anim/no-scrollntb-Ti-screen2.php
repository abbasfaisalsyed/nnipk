
						<ul id="ntbne" >
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
<script>
if( window.innerWidth < <?php echo $ntb_screen_max_width; ?> ) {
			document.write('</div>');
}	
</script>
<style>

@media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) { 

   #ntbne {display:none;}
}

<?php if ($ntb_disable_in_screen_max_width) { ?>
@media only screen and (max-width: <?php echo $ntb_v_screen_max_width; ?>px) {
	.news-ticker-ntb {
		display:none;
	}
}
<?php } ?>

@media only screen and (max-width: <?php echo $ntb_screen_max_width; ?>px) { 

	#ntbne {
		<?php if ($dir == 'auto') { ?>
		<?php if (is_rtl()) { ?>
		float: right;
		margin-right: 0;
		<?php } else { ?>
		float: left;
		margin-left: 0;
		<?php } ?>
		<?php } elseif ($dir == 'ltr') { ?>
		direction:ltr;	
		float: left;
		margin-left: 0;
		<?php } elseif ($dir == 'rtl') { ?>
		direction:rtl;	
		float: right;
		margin-right: 0;
		<?php } ?>
	    color:<?php echo $f_ntb_color_text_back; ?>;
		padding:<?php echo $ntb_padding_top; ?>px 0 <?php echo $ntb_padding_bottom; ?>px 0;
	}
	#ntbne li {
		list-style: none;
		margin-top:0px;
		display: block;
	}
	.news-ticker-ntb ul a {
		display:block;
	    color:<?php echo $f_ntb_color_text_back; ?>;
		text-decoration: none!important;
	   -webkit-transition: all 0.5s ease-out;
	   -moz-transition: all 0.5s ease-out;
	   -o-transition: all 0.5s ease-out;
	    transition: all 0.5s ease-out;
	}
		 .news-ticker-ntb ul a:hover {
		color:<?php echo $ntb_a_hover; ?>;
		text-decoration: none!important;
	   -webkit-transition: all 0.5s ease-out;
	   -moz-transition: all 0.5s ease-out;
	   -o-transition: all 0.5s ease-out;
	    transition: all 0.5s ease-out;
	}

	.news-ticker-ntb ul a {
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
	position:relative;	
	}

	.news-ticker-ntb {
	height:<?php echo $ntb_height_mobile; ?>px;
	line-height:<?php echo $ntb_line_height_mobile; ?>px;
	overflow:hidden;
	word-wrap: break-word;
	}
	.news-ticker-ntb ul a {
		white-space:normal;
	}
	#ntbne {width:98%;}


    #next-button-ntb,#prev-button-ntb {display:none;}

}

</style>

<script type="text/javascript">
if( window.innerWidth < <?php echo $ntb_screen_max_width; ?> ) {

function createTickerNTB() {
    var a = jQuery(".news-ticker-ntb ul").children();
    tickerItems = new Array, a.each(function() {
        tickerItems.push(jQuery(this).html())
    }), i = 0, rotateTicker()
};

function typetext() {
    var a = tickerText.substr(c, 1);
    "<" == a && (isInTag = !0), ">" == a && (isInTag = !1), jQuery(".news-ticker-ntb ul").html(tickerText.substr(0, c++)), c < tickerText.length + 1 ? isInTag ? typetext() : setTimeout("typetext()", 40) : (c = 1, tickerText = "")
};

}
</script>

<script type="text/javascript">
if( window.innerWidth < <?php echo $ntb_screen_max_width; ?> ) {

jQuery(document).ready(function(){
createTickerNTB();
});

function rotateTicker() {
    i == tickerItems.length && (i = 0), tickerText = tickerItems[i], c = 0, typetext(), setTimeout("rotateTicker()", <?php echo $ntb_timeout_tickerntb; ?>), i++
}

}
</script>

