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

			<ul id="ntbne_five" >
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

	<?php if ($ntb_disa_img_n_scrollup == 'disable_img_n_scrollup') { ?>	
    #next-button-ntb,#prev-button-ntb {display:none;}
	<?php } ?>	

<?php if ($ntb_disable_in_screen_max_width) { ?>
@media only screen and (max-width: <?php echo $ntb_v_screen_max_width; ?>px) {
	.news-ticker-ntb {
		display:none;
	}
}
<?php } ?>
	#ntbne_five {
		<?php if ($dir == 'auto') { ?>
		<?php if (is_rtl()) { ?>
		float: right;
		margin-right: 0;
		<?php } else { ?>
		direction:ltr;
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
	   
	#ntbne_five {width:98%;}
}
@media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) {
<?php } ?>
	.news-ticker-ntb span {
		color:<?php echo $f_ntb_color_text_title; ?>;
		background-color:<?php echo $f_ntb_color_back_title; ?>;
    	font-size:<?php echo $ntb_font_size_title; ?>px;
		display:block;
		<?php if ($dir == 'auto') { ?>
		<?php if (is_rtl()) { ?>
		float:right;
		margin-left: <?php echo $ntb_dist_from_left_right_scrollup; ?>px;
		<?php } else { ?>
		float:left;
		margin-right: <?php echo $ntb_dist_from_left_right_scrollup; ?>px;
		<?php } ?>
		<?php } elseif ($dir == 'ltr') { ?>
		float:left;
		margin-right: <?php echo $ntb_dist_from_left_right_scrollup; ?>px;
		<?php } elseif ($dir == 'rtl') { ?>
		float:right;
		margin-left: <?php echo $ntb_dist_from_left_right_scrollup; ?>px;
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
	
    #next-button-ntb {
    position:absolute;
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
<?php if ($ntb_enable_style_mobile) { ?>
@media only screen and (max-width: <?php echo $ntb_screen_max_width; ?>px) {
	#ntbne_five {
    	min-height:<?php echo $ntb_min_height_mobile; ?>px;
	}
	#ntbne_five li {
		list-style: none;
		margin-top:0px;
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
    #next-button-ntb,#prev-button-ntb {display:none;}
}
@media only screen and (min-width: <?php echo $ntb_screen_min_width; ?>px) {
<?php } ?>
	#ntbne_five li {
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

</style>

<?php if (!is_admin() && $ntb_enable_jquerymin_slide_up_down == 'enable_jquery_min_sud')
	{ ?><script <?php echo 'src="' . plugins_url( 'js/min-ben-old.js', dirname(__FILE__) ) . '"'; ?>></script><?php } ?>

<script>
(function($, window, document, undefined) {
        'use strict';
        var pluginName = 'news_ticker_benaceur',
                defaults = {
                        row_height: 20,
                        max_rows: 3,
                        speed: <?php echo $ntb_speed_slide_up_down; ?>,
                        duration: 2500,
<?php if( $ntb_updown_slide_up_down == 'up_slide_u_d') { ?>
                        direction: 'up',
<?php } elseif( $ntb_updown_slide_up_down == 'down_slide_u_d') { ?>
                        direction: 'down',
<?php } ?>
                        autostart: <?php if( !empty($ntb_autostart_slide_up_down)) { echo 0; } else { echo 1; } ?>,
                        pauseOnHover: 1,
                        nextButton: null,
                        prevButton: null,
                        startButton: null,
                        stopButton: null,
                        hasMoved: function() {},
                        movingUp: function() {},
                        movingDown: function() {},
                        start: function() {},
                        stop: function() {},
                        pause: function() {},
                        unpause: function() {}
                };

        function Plugin(element, options) {
                this.element = element;
                this.$el = $(element);
                this.options = $.extend({}, defaults, options);
                this._defaults = defaults;
                this._name = pluginName;
                this.moveInterval;
                this.state = 0;
                this.paused = 0;
                this.moving = 0;
                if (this.$el.is('ul')) {
                        this.init();
                }
        }

        Plugin.prototype = {
                init: function() {
                        this.$el.height(this.options.row_height * this.options.max_rows)
                                .css({overflow : 'hidden'});

                        this.checkSpeed();

                        if(this.options.nextButton && typeof(this.options.nextButton[0]) !== 'undefined')
                                this.options.nextButton.click(function(e) {
                                        this.moveNext();
                                        this.resetInterval();
                                }.bind(this));
                        if(this.options.prevButton && typeof(this.options.prevButton[0]) !== 'undefined')
                                this.options.prevButton.click(function(e) {
                                        this.movePrev();
                                        this.resetInterval();
                                }.bind(this));
                        if(this.options.stopButton && typeof(this.options.stopButton[0]) !== 'undefined')
                                this.options.stopButton.click(function(e) {
                                        this.stop()
                                }.bind(this));
                        if(this.options.startButton && typeof(this.options.startButton[0]) !== 'undefined')
                                this.options.startButton.click(function(e) {
                                        this.start()
                                }.bind(this));
                        
                        if(this.options.pauseOnHover) {
                                this.$el.hover(function() {
                                        if (this.state)
                                                this.pause();
                                }.bind(this), function() {
                                        if (this.state)
                                                this.unpause();
                                }.bind(this));
                        }

                        if(this.options.autostart)
                                this.start();
                },

                start: function() {
                        if (!this.state) {
                                this.state = 1;
                                this.resetInterval();
                                this.options.start();
                        }
                },

                stop: function() {
                        if (this.state) {
                                clearInterval(this.moveInterval);
                                this.state = 0;
                                this.options.stop();
                        }
                },

                resetInterval: function() {
                        if (this.state) {
                                clearInterval(this.moveInterval);
                                this.moveInterval = setInterval(function() {this.move()}.bind(this), this.options.duration);
                        }
                },

                move: function() {
                         if (!this.paused) this.moveNext();
                },

                moveNext: function() {
                        if (this.options.direction === 'down')
                                this.moveDown();
                        else if (this.options.direction === 'up')
                                this.moveUp();
                },

                movePrev: function() {
                        if (this.options.direction === 'down')
                                this.moveUp();
                        else if (this.options.direction === 'up')
                                this.moveDown();
                },

                pause: function() {
                        if (!this.paused) this.paused = 1;
                        this.options.pause();
                },

                unpause: function() {
                        if (this.paused) this.paused = 0;
                        this.options.unpause();
                },

                moveDown: function() {
                        if (!this.moving) {
                                this.moving = 1;
                                this.options.movingDown();
                                this.$el.children('li:last').detach().prependTo(this.$el).css('marginTop', '-' + this.options.row_height + 'px')
                                        .animate({marginTop: '0px'}, this.options.speed, function(){
                                                this.moving = 0;
                                                this.options.hasMoved();
                                        }.bind(this));
                        }
                },

                moveUp: function() {
                        if (!this.moving) {
                                this.moving = 1;
                                this.options.movingUp();
                                var element = this.$el.children('li:first');
                                element.animate({marginTop: '-' + this.options.row_height + 'px'}, this.options.speed,
                                        function(){
                                                element.detach().css('marginTop', '0').appendTo(this.$el);
                                                this.moving = 0;
                                                this.options.hasMoved();
                                        }.bind(this));
                        }
                },

                updateOption: function(option, value) {
                        if (typeof(this.options[option]) !== 'undefined'){
                                this.options[option] = value;
                                if (option == 'duration' || option == 'speed'){
                                    this.checkSpeed();
                                    this.resetInterval();
                                }
                        }
                },

                getState: function() {
                        if (paused) return 2 // 2 = paused
                        else return this.state;// 0 = stopped, 1 = started
                },

                checkSpeed: function() {
                        if (this.options.duration < (this.options.speed + 25))
                                this.options.speed = this.options.duration - 25;
                },

                destroy: function() {
                        this._destroy(); // or this.delete; depends on jQuery version
                }
        };

        $.fn[pluginName] = function(option) {
                var args = arguments;
                
                return this.each(function() {
                        var $this = $(this),
                                data = $.data(this, 'plugin_' + pluginName),
                                options = typeof option === 'object' && option;
                        if (!data) {
                                $this.data('plugin_' + pluginName, (data = new Plugin(this, options)));
                        }
                        // if first argument is a string, call silimarly named function
                        if (typeof option === 'string') {
                                data[option].apply(data, Array.prototype.slice.call(args, 1));
                        }
                });
        };
})(jQuery, window, document);

//two
	
    		$('a[href*=#]').click(function(e) {
			    var href = $.attr(this, 'href');
			    if (href != "#") {
				    $('html, body').animate({
				        scrollTop: $(href).offset().top - 81
				    }, 500);
				}
				else {
					$('html, body').animate({
				        scrollTop: 0
				    }, 500);
				}
			    return false;
			});

    		$(window).load(function(){
	            $('code.language-javascript').mCustomScrollbar();
	        });
            var ntbne_five = $('#ntbne_five').news_ticker_benaceur({
                row_height: <?php echo $ntb_height; ?>,
                max_rows: 1,
                duration: <?php echo $ntb_timeout_slide_up_down; ?>,
                pauseOnHover: <?php if( !empty($ntb_pause_slide_up_down)) { echo 1; } else { echo 0; } ?>,
	        	<?php if ($dir == 'auto') { ?>
	        	<?php if (is_rtl()) { ?>
				prevButton:  $('#next-button-ntb'),
                nextButton:  $('#prev-button-ntb')
	        	<?php } else { ?>
				prevButton:  $('#prev-button-ntb'),
                nextButton:  $('#next-button-ntb')
		        <?php } ?>
			    <?php } elseif ($dir == 'ltr') { ?>	
				prevButton:  $('#prev-button-ntb'),
                nextButton:  $('#next-button-ntb')
				<?php } elseif ($dir == 'rtl') { ?>	
				prevButton:  $('#next-button-ntb'),
                nextButton:  $('#prev-button-ntb')
				<?php } ?>	
            });
        </script>
