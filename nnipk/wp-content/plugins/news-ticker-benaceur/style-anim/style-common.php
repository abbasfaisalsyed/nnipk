<style>
	<?php if ($ntb_st != 'TickerNTB') { ?>
	<?php if (is_rtl()) { ?>
	#next-button-ntb:before {content: "\003C";}
	#prev-button-ntb:before {content: "\003E";}
    <?php } else { ?>	
	#next-button-ntb:before {content: "\003E";}
	#prev-button-ntb:before {content: "\003C";}
    <?php } ?>	
	<?php } else { ?>
	<?php if (is_rtl() && $dir != 'ltr' || !is_rtl() && $dir == 'rtl') { ?>
	#next-button-ntb:before {content: "\003C";}
	#prev-button-ntb:before {content: "\003E";}
    <?php } else { ?>	
	#next-button-ntb:before {content: "\003E";}
	#prev-button-ntb:before {content: "\003C";}
    <?php } ?>	
	<?php } ?>
	
    #next-button-ntb, #prev-button-ntb {
	font-weight: <?php echo $ntb_PrevNext_weight;?>;
	top:<?php echo $ntb_PrevNext_top;?>px;
    font-size:<?php echo $ntb_PrevNext_font_size; ?>px;
	color:<?php echo $ntb_PrevNext_color; ?>;
	}
	.news-ticker-ntb span { font-family:<?php echo $ntb_title_font_family; ?>; }
	
	.news-ticker-ntb a { text-decoration:none; }

</style>
