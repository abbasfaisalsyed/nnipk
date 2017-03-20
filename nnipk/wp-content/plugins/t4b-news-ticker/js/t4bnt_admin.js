jQuery(document).ready(function(){
	jQuery('.t4bnt_options').slideUp();
	jQuery('.t4bnt_section h3').click(function(){		
		if(jQuery(this).parent().next('.t4bnt_options').css('display')=='none') {
			jQuery(this).removeClass('inactive');
			jQuery(this).addClass('active');
			jQuery(this).children('img').removeClass('inactive');
			jQuery(this).children('img').addClass('active');
		}
		else {
			jQuery(this).removeClass('active');
			jQuery(this).addClass('inactive');		
			jQuery(this).children('img').removeClass('active');			
			jQuery(this).children('img').addClass('inactive');
		}
		jQuery(this).parent().next('.t4bnt_options').slideToggle('slow');	
	});
	var selected_breaking = jQuery("input[name='ticker_type']:checked").val();
	jQuery('#ticker_cat-item , #ticker_tag-item , #ticker_custom-item , #ticker_postno-item').hide();
	if (selected_breaking == 'category') {jQuery('#ticker_cat-item , #ticker_postno-item').show();}
	if (selected_breaking == 'tag') {jQuery('#ticker_tag-item , #ticker_postno-item').show();}
	if (selected_breaking == 'custom') { jQuery('#ticker_custom-item').show(); }
	jQuery("input[name='ticker_type']").change(function(){
		var selected_breaking = jQuery("input[name='ticker_type']:checked").val();
		if (selected_breaking == 'category') {
			jQuery('#ticker_tag-item , #ticker_custom-item').hide();
			jQuery('#ticker_cat-item , #ticker_postno-item').fadeIn();
		}
		if (selected_breaking == 'tag') {
			jQuery('#ticker_cat-item , #ticker_custom-item').hide();
			jQuery('#ticker_tag-item , #ticker_postno-item').fadeIn();
		}
		if (selected_breaking == 'custom') {
			jQuery('#ticker_cat-item , #ticker_tag-item , #ticker_postno-item').hide();
			jQuery('#ticker_custom-item').fadeIn();
		}
	});
	// Delete Custom Text Icon
	jQuery(document).on("click", ".del-custom-text" , function(){
		var option = jQuery(this).parent().find('input').val();
		jQuery(this).parent().parent().addClass('removered').fadeOut(function() {
			jQuery(this).remove();
		});
	});	
	// Custom Breaking News Text
	jQuery("#TextAdd").click(function() {
		var customlink = jQuery('#custom_link').val();
		var customtext = jQuery('#custom_text').val();
		if( customtext.length > 0 && customlink.length > 0  ){
			jQuery('#customList').append('<li><div class="widget-head"><a href="'+customlink+'" target="_blank">'+customtext+'</a> <input name="ticker_custom['+customnext+'][link]" type="hidden" value="'+customlink+'" /> <input name="ticker_custom['+customnext+'][text]" type="hidden" value="'+customtext+'" /><a class="del-custom-text"></a></div></li>');
		}
		customnext ++ ;
		jQuery('#custom_link , #custom_text').val('');
	});
});
function toggleVisibility(id) {
	var e = document.getElementById(id);
    if(e.style.display == 'block')
		e.style.display = 'none';
	else
		e.style.display = 'block';
}