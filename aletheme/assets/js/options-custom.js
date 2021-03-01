/**
 * Prints out the inline javascript needed for the colorpicker and choosing
 * the tabs in the panel.
 */

jQuery(document).ready(function($) {
	
	// Fade out the save message
	$('.fade').delay(1000).fadeOut(1000);
	
	// Color Picker
	$('.colorSelector').each(function(){
		var Othis = this; //cache a copy of the this variable for use inside nested function
		var initialColor = $(Othis).next('input').attr('value');
		$(this).ColorPicker({
		color: initialColor,
		onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
		},
		onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
		},
		onChange: function (hsb, hex, rgb) {
		$(Othis).children('div').css('backgroundColor', '#' + hex);
		$(Othis).next('input').attr('value','#' + hex);
	}
	});
	}); //end color picker
	
	// Switches option sections
	$('.group').hide();
	var activetab = '';
	if (typeof(localStorage) != 'undefined' ) {
		activetab = localStorage.getItem("activetab");
	}
	if (activetab != '' && $(activetab).length ) {
		$(activetab).fadeIn();
	} else {
		$('.group:first').fadeIn();
	}
	$('.group .collapsed').each(function(){
		$(this).find('input:checked').parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).hasClass('last')) {
					$(this).removeClass('hidden');
						return false;
					}
				$(this).filter('.hidden').removeClass('hidden');
			});
	});
	
	if (activetab != '' && $(activetab + '-tab').length ) {
		$(activetab + '-tab').addClass('nav-tab-active');
	}
	else {
		$('.nav-tab-wrapper a:first').addClass('nav-tab-active');
	}
	$('.nav-tab-wrapper a').click(function(evt) {
		$('.nav-tab-wrapper a').removeClass('nav-tab-active');
		$(this).addClass('nav-tab-active').blur();
		var clicked_group = $(this).attr('href');
		if (typeof(localStorage) != 'undefined' ) {
			localStorage.setItem("activetab", $(this).attr('href'));
		}
		$('.group').hide();
		$(clicked_group).fadeIn();
		evt.preventDefault();
	});
           					
	$('.group .collapsed input:checkbox').click(unhideHidden);
				
	function unhideHidden(){
		if ($(this).attr('checked')) {
			$(this).parent().parent().parent().nextAll().removeClass('hidden');
		}
		else {
			$(this).parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).filter('.last').length) {
					$(this).addClass('hidden');
					return false;		
					}
				$(this).addClass('hidden');
			});
           					
		}
	}
	
	// Image Options
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');		
	});
		
	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();



	//Hide Footer Options based on selection
	//======================================
	var ale_footer_style = $('#ale_footer_variant').val();

	if(ale_footer_style == 'default'){
		$('#section-ale_footer_callnumber').show();
		$('#section-ale_footer_email_address').show();
	} else {
		$('#section-ale_footer_callnumber').hide();
		$('#section-ale_footer_email_address').hide();
	}

	//Also do the trick on select change
	$('#ale_footer_variant').on('change',function(){
		var ale_footer_style = $('#ale_footer_variant').val();

		if(ale_footer_style == 'default'){
			$('#section-ale_footer_callnumber').show();
			$('#section-ale_footer_email_address').show();
		} else {
			$('#section-ale_footer_callnumber').hide();
			$('#section-ale_footer_email_address').hide();
		}
	});



	//Hide Header Settings based on selection
	//======================================
	var ale_header_style = $('#ale_header_custom_styles').val();

	//Disable by Default
	$('#section-ale_header_styles').hide();
	$('#section-ale_menu_first_level').hide();
	$('#section-ale_menu_second_level').hide();
	$('#section-ale_menu_third_level').hide();

	if(ale_header_style == 'yes'){
		$('#section-ale_header_styles').show();
		$('#section-ale_menu_first_level').show();
		$('#section-ale_menu_second_level').show();
		$('#section-ale_menu_third_level').show();
	} else {
		$('#section-ale_header_styles').hide();
		$('#section-ale_menu_first_level').hide();
		$('#section-ale_menu_second_level').hide();
		$('#section-ale_menu_third_level').hide();
	}

	//Also do the trick on select change
    $('#ale_header_custom_styles').on('change',function(){
        var ale_header_style = $('#ale_header_custom_styles').val();

        if(ale_header_style == 'yes'){
            $('#section-ale_header_styles').show();
            $('#section-ale_menu_first_level').show();
            $('#section-ale_menu_second_level').show();
            $('#section-ale_menu_third_level').show();
        } else {
            $('#section-ale_header_styles').hide();
            $('#section-ale_menu_first_level').hide();
            $('#section-ale_menu_second_level').hide();
            $('#section-ale_menu_third_level').hide();
        }
    });




	//Hide Header Settings based on selection
	//======================================
	var ale_custom_blog_styles = $('#ale_blog_custom_styles').val();

	if(ale_custom_blog_styles == 'yes'){
		$('#section-ale_custom_blog_title').show();
		$('#section-ale_custom_blog_title_margin').show();
		$('#section-ale_custom_blog_desc').show();
		$('#section-ale_custom_blog_desc_margin').show();
		$('#section-ale_custom_blog_infoline').show();
		$('#section-ale_custom_blog_info_margin').show();
		$('#section-ale_custom_blog_share_color').show();
		$('#section-ale_custom_blog_share_size').show();
		$('#ale_overwritepaginationinfo').show();
		$('#section-ale_pag_button_color').show();
		$('#section-ale_pag_button_color_font').show();
		$('#section-ale_pag_button_hover').show();
		$('#section-ale_pag_button_hover_font').show();
		$('#section-ale_pag_button_border').show();
		$('#section-ale_pag_button_border_hover').show();
	} else {
		$('#section-ale_custom_blog_title').hide();
		$('#section-ale_custom_blog_title_margin').hide();
		$('#section-ale_custom_blog_desc').hide();
		$('#section-ale_custom_blog_desc_margin').hide();
		$('#section-ale_custom_blog_infoline').hide();
		$('#section-ale_custom_blog_info_margin').hide();
		$('#section-ale_custom_blog_share_color').hide();
		$('#section-ale_custom_blog_share_size').hide();
		$('#ale_overwritepaginationinfo').hide();
		$('#section-ale_pag_button_color').hide();
		$('#section-ale_pag_button_color_font').hide();
		$('#section-ale_pag_button_hover').hide();
		$('#section-ale_pag_button_hover_font').hide();
		$('#section-ale_pag_button_border').hide();
		$('#section-ale_pag_button_border_hover').hide();
	}

	//Also do the trick on select change
	$('#ale_blog_custom_styles').on('change',function(){
		var ale_custom_blog_styles = $('#ale_blog_custom_styles').val();

		if(ale_custom_blog_styles == 'yes'){
			$('#section-ale_custom_blog_title').show();
			$('#section-ale_custom_blog_title_margin').show();
			$('#section-ale_custom_blog_desc').show();
			$('#section-ale_custom_blog_desc_margin').show();
			$('#section-ale_custom_blog_infoline').show();
			$('#section-ale_custom_blog_info_margin').show();
			$('#section-ale_custom_blog_share_color').show();
			$('#section-ale_custom_blog_share_size').show();
			$('#ale_overwritepaginationinfo').show();
			$('#section-ale_pag_button_color').show();
			$('#section-ale_pag_button_color_font').show();
			$('#section-ale_pag_button_hover').show();
			$('#section-ale_pag_button_hover_font').show();
			$('#section-ale_pag_button_border').show();
			$('#section-ale_pag_button_border_hover').show();
		} else {
			$('#section-ale_custom_blog_title').hide();
			$('#section-ale_custom_blog_title_margin').hide();
			$('#section-ale_custom_blog_desc').hide();
			$('#section-ale_custom_blog_desc_margin').hide();
			$('#section-ale_custom_blog_infoline').hide();
			$('#section-ale_custom_blog_info_margin').hide();
			$('#section-ale_custom_blog_share_color').hide();
			$('#section-ale_custom_blog_share_size').hide();
			$('#ale_overwritepaginationinfo').hide();
			$('#section-ale_pag_button_color').hide();
			$('#section-ale_pag_button_color_font').hide();
			$('#section-ale_pag_button_hover').hide();
			$('#section-ale_pag_button_hover_font').hide();
			$('#section-ale_pag_button_border').hide();
			$('#section-ale_pag_button_border_hover').hide();
		}
	});


	//Hide Instagram Feed Options based on selection
	//==============================================
	var ale_instagram_style = $('#ale_instagram_feed_footer').val();

	if(ale_instagram_style == 'enable'){
		$('#section-ale_instagram_login').show();
		$('#section-ale_instagram_token').show();
		$('#section-ale_instagram_count').show();
		$('#section-ale_instagram_thumb').show();
	} else {
		$('#section-ale_instagram_login').hide();
		$('#section-ale_instagram_token').hide();
		$('#section-ale_instagram_count').hide();
		$('#section-ale_instagram_thumb').hide();
	}

	//Also do the trick on select change
	$('#ale_instagram_feed_footer').on('change',function(){
		var ale_instagram_style = $('#ale_instagram_feed_footer').val();

		if(ale_instagram_style == 'enable'){
			$('#section-ale_instagram_login').show();
			$('#section-ale_instagram_token').show();
			$('#section-ale_instagram_count').show();
			$('#section-ale_instagram_thumb').show();
		} else {
			$('#section-ale_instagram_login').hide();
			$('#section-ale_instagram_token').hide();
			$('#section-ale_instagram_count').hide();
			$('#section-ale_instagram_thumb').hide();
		}
	});


	//Hide Works Extra Heading Options based on selection
	//==============================================
	var ale_extraheading_style = $('#ale_works_extra_heading').val();

	if(ale_extraheading_style == '2'){
		$('#section-ale_work_extra_line1').show();
		$('#section-ale_work_extra_line2').show();
		$('#section-ale_work_extra_bg').show();
	} else {
		$('#section-ale_work_extra_line1').hide();
		$('#section-ale_work_extra_line2').hide();
		$('#section-ale_work_extra_bg').hide();
	}

	//Also do the trick on select change
	$('#ale_works_extra_heading').on('change',function(){
		var ale_extraheading_style = $('#ale_works_extra_heading').val();

		if(ale_extraheading_style == '2'){
			$('#section-ale_work_extra_line1').show();
			$('#section-ale_work_extra_line2').show();
			$('#section-ale_work_extra_bg').show();
		} else {
			$('#section-ale_work_extra_line1').hide();
			$('#section-ale_work_extra_line2').hide();
			$('#section-ale_work_extra_bg').hide();
		}
	});


	//Hide Preloader Animation Options based on selection
	//==============================================
	var ale_preloader_style = $('#ale_preloder').val();

	if(ale_preloader_style == 'enable'){
		$('#section-ale_preloder_style').show();
		$('#section-ale_loader_bg').show();
		$('#section-ale_loader_animation').show();
	} else {
		$('#section-ale_preloder_style').hide();
		$('#section-ale_loader_bg').hide();
		$('#section-ale_loader_animation').hide();
	}

	//Also do the trick on select change
	$('#ale_preloder').on('change',function(){
		var ale_preloader_style = $('#ale_preloder').val();

		if(ale_preloader_style == 'enable'){
			$('#section-ale_preloder_style').show();
			$('#section-ale_loader_bg').show();
			$('#section-ale_loader_animation').show();
		} else {
			$('#section-ale_preloder_style').hide();
			$('#section-ale_loader_bg').hide();
			$('#section-ale_loader_animation').hide();
		}
	});


	//Hide Single Post Options based on selection
	//==============================================
	var ale_single_style = $('#ale_single_blog_custom_styles').val();

	if(ale_single_style == 'yes'){
		$('#section-ale_custom_single_blog_title').show();
		$('#section-ale_custom_single_blog_title_margin').show();
		$('#section-ale_custom_single_blog_infoline').show();
		$('#section-ale_custom_single_blog_info_margin').show();
		$('#section-ale_default_single_blog_text_align').show();
	} else {
		$('#section-ale_custom_single_blog_title').hide();
		$('#section-ale_custom_single_blog_title_margin').hide();
		$('#section-ale_custom_single_blog_infoline').hide();
		$('#section-ale_custom_single_blog_info_margin').hide();
		$('#section-ale_default_single_blog_text_align').hide();
	}

	//Also do the trick on select change
	$('#ale_single_blog_custom_styles').on('change',function(){
		var ale_single_style = $('#ale_single_blog_custom_styles').val();

		if(ale_single_style == 'yes'){
			$('#section-ale_custom_single_blog_title').show();
			$('#section-ale_custom_single_blog_title_margin').show();
			$('#section-ale_custom_single_blog_infoline').show();
			$('#section-ale_custom_single_blog_info_margin').show();
			$('#section-ale_default_single_blog_text_align').show();
		} else {
			$('#section-ale_custom_single_blog_title').hide();
			$('#section-ale_custom_single_blog_title_margin').hide();
			$('#section-ale_custom_single_blog_infoline').hide();
			$('#section-ale_custom_single_blog_info_margin').hide();
			$('#section-ale_default_single_blog_text_align').hide();
		}
	});
});	