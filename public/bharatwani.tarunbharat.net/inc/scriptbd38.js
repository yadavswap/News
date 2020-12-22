//Copy Mappings
function copyMappings(x){
	$(x).addClass('btn_load');

	var date    = $('#date_selector').val();
	var from 	= $('#copy_mappings_container .thumbnails .from img').attr('src');
	var current = $('#copy_mappings_container .thumbnails .current img').attr('src');

	// console.log({date, from, current});

	$.post('val.php', {copyMappingDate:date, copyMappingFrom:from, copyMappingCurrent:current}, function(data){
		console.log(data);
		$(x).removeClass('btn_load');
		
		if(data != 'success'){
			alert('No Croppings Found on Selected Page');
			$(x).removeClass('btn_load');
			// console.log(data);
		}else{
			$(x).removeClass('btn_load');
			load_image_maps();
			hideCopyMappings();
		}
	});
}

//Load Thumbnails (Copy Mappings)
function loadThumbnails(refresh=true){
	var date      	 = $('#date_selector').val();
	
	//Selected Article
	var edition_from = $('#copy_from').val();
	var page_from 	 = $('#copy_from_page').val();
	var total_pages;

	if(refresh == true){
		$('#copy_from option').each(function(){
			if($(this).is(':checked')){
				$('#copy_from_page').html('');
				total_pages = $(this).attr('data-pages');
				for (var i = 1; i <= total_pages; i++) {
					$('#copy_from_page').append('<option>'+i+'</option>');
				}
			}
		});
	}

	//Current Article
	var edition_to   = $('#edition_selector').val();
	var page_to;

	$('#thumbnails_container .item').each(function(count){
		if($(this).hasClass('selected')){
			page_to  = count+1;
		}
	});

	// console.log({date});
	// console.log({edition_from, page_from});
	// console.log({edition_to, page_to});

	//Update Thumbnails
	$.post('val.php', {getThumbForCopyDate:date, getThumbForCopyEdition:edition_from, getThumbForCopyPage:page_from}, function(data){
		// console.log(data);
		if(data == 'not found' || data == ''){
			$('#copyMappingsBtn').attr('disabled','disabled').css('opacity','0.6');
		}else{
			$('#copy_mappings_container .thumbnails .from img').attr('src',data);
			if(edition_from == edition_to && page_from == page_to){
				$('#copyMappingsBtn').attr('disabled','disabled').css('opacity','0.6');
			}else{
				$('#copyMappingsBtn').removeAttr('disabled').css('opacity','1');
			}
		}
	});
}

//Hide Copy Mappings Container
function hideCopyMappings(){
	$('#copy_mappings_container, #copy_mappings_container .buttons').css('left','-400px');
	$('#copy_mappings_overlay').fadeOut();
}

//Show Copy Mappings Container
function showCopyMappings(){
	var thumb;
	$('#thumbnails_container .item').each(function(count){
		if($(this).hasClass('selected')){
			loadThumbnails();
			thumb = $(this).find('img').attr('src');
			$('#copy_mappings_container .thumbnails .current img').attr('src',thumb);
			$('#copy_mappings_container, #copy_mappings_container .buttons').css('left','0px');
			$('#copy_mappings_overlay').fadeIn();
		}
	});
}

//Delay
function delay(callback, ms) {
	var timer = 0;
	return function() {
	var context = this, args = arguments;
	clearTimeout(timer);
	timer = setTimeout(function () {
		  callback.apply(context, args);
		}, ms || 0);
	};
}

//Set PDF Link
function set_pdf_link(){
	var site = $(location).attr('host').replace('www.','');
	var pdf  = $('.preview_container .slices_container img').attr('data-src');
	if(pdf != 'images/not_found.png'){
		pdf  = pdf.replace('.jpg','.pdf');
		pdf  = pdf.replace('idocuments.s3.ap-south-1.amazonaws.com',site);
		$('#pdf_link').attr('href', pdf).attr('target','_blank');
	}

	var prefix = $('#edition_selector').val();
	var date   = $('#date_selector').val();

	$.post('../val.php', {check_pdf_link_prefix:prefix, check_pdf_link_date:date}, function(data){
		if(data != ''){
			if(data == 'login'){
				$('#pdf_link').attr('href', '/dashboard/login.php').removeAttr('target');
			}else{
				$('#pdf_link').attr('href', data).attr('target','_blank');
			}
		}
	});
}

// Fix Dates (Dashboard)
function fix_dates(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');

	$.post('../val.php',{fix_dates:1},function(data){
		$(x).removeClass('btn_load');
		console.log(data);
		// if(data != 'success'){
		// 	if(data == 'error'){
		// 		window.location.reload();
		// 	}else{
		// 		$('.top_error_container a').text(data);
		// 		$('.top_error_container').fadeIn();
		// 	}
		// }else{
		// 	$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
		// 	$('.top_error_container').fadeIn();
		// 	setTimeout(function(){
		// 		$('.top_error_container').fadeOut();
		// 	},4000);
		// }	
	});
}

// New Zoom In 2
function zoom_in2(){
	var width = parseInt($('.preview_container .slices_container img').width());
	var newWidth = width + 50;
	$('.preview_container .slices_container img').css('width',newWidth+'px');
	$('.main_container .preview_container .paper').css('overflow','auto');
	$(".preview_container .paper").swipe("disable");
}

// New Zoom Out 2
function zoom_out2(reset=false){
	var width  	 = parseInt($('.preview_container .slices_container img').width());
	var cWidth   = parseInt($('.preview_container .paper').width());
	var newWidth = width - 50;

	if(reset == false){
		if(newWidth <= cWidth){
			$('.preview_container .slices_container img').css('width','100%');
			$('.main_container .preview_container .paper').css('overflow','hidden');
			$(".preview_container .paper").swipe("enable");
		}else{
			$('.preview_container .slices_container img').css('width',newWidth+'px');
		}
	}else{
		$('.preview_container .slices_container img').css('width','100%');
		$('.main_container .preview_container .paper').css('overflow','hidden');
	}
}

//Show Zoom Popup
function show_zoom_popup(){
	var img = $('.preview_container .slices_container img').attr('data-src');
	$('.new_zoom_popup .image_container').html('<img src="'+img+'">');
	$('.new_zoom_popup .image_container img').css('width','100%');
	$('.new_zoom_popup .image_container img').draggable();
	$('.new_zoom_popup').fadeIn();
}

// Close Zoom Popup
function zoom_close(){
	$('#zoom_btn').removeClass('selected');
	$('.new_zoom_popup').fadeOut();
	$('.new_zoom_popup .image_container img').draggable('destroy');
}

// New Zoom In
function zoom_in(){
	var width = parseInt($('.new_zoom_popup .image_container img').width());
	var newWidth = width + 50;
	$('.new_zoom_popup .image_container img').css('width',newWidth+'px');
}

// New Zoom Out
function zoom_out(){
	var width  	 = parseInt($('.new_zoom_popup .image_container img').width());
	var cWidth   = parseInt($('.new_zoom_popup .image_container').width());
	var newWidth = width - 50;

	if(newWidth <= cWidth){
		$('.new_zoom_popup .image_container img').css('width','100%');
	}else{
		$('.new_zoom_popup .image_container img').css('width',newWidth+'px');
	}
}

// Change Publish Date
function change_publish_date(x){
	$(x).addClass('btn_load');
	var name 	= $(x).attr('data-name');
	var prefix  = $(x).attr('data-prefix');
	var type 	= $('#edit_publish_date_type').val();
	var weekday	= $('#edit_publish_date_weekday').val();
	var day		= $('#edit_publish_date_day').val();
	var day2	= $('#edit_publish_date_day2').val();

	$.post('../val.php', {change_publish_date_name:name, change_publish_date_prefix:prefix, change_publish_date_type:type, change_publish_date_weekday:weekday, change_publish_date_day:day, change_publish_date_day2:day2}, function(data){
		//console.log(data);
		window.location.reload();
	});
}

//Load Image Maps
function load_image_maps(){
	//Hide Overlay
	// $('.map.maphilighted').hide();

	//Prevent loading on mobile devices
	if($(window).width() < 900){
		//return false;
	}

	var page   = 1;
	$('#thumbnails_container .item').each(function(count){
		if($(this).hasClass('selected')){
			page = count+1;
		}
	});
	var prefix = $('#edition_selector').val();
	var selected_date 	= $('#date_selector').val();
    var len = $('.slices_container img').length;
    var src = $('.preview_container .slices_container img').attr('data-src');

    if(src != 'images/not_found.png'){
    	var width  	= $('.preview_container .paper .slices_container img').prop('naturalWidth');
    	var height  = $('.preview_container .paper .slices_container img').prop('naturalHeight');
    	height 		= height*len;
	    // $('.preview_container .slices_container img').each(function(x){
	    // 	height += $(this).prop('naturalHeight');
	    //     $(this).on('load', function(){
	    //         if(x == (len-1)){
        $.post('val.php',{get_mapping_wrapper:1, get_mapping_wrapper_width:width, get_mapping_wrapper_height:height},function(data){
			if(data == 'false'){
				//Mapping wrapper created
				window.location.reload();
			}	
        });
	    //         }
	    //     });
	    // });
    }

	//Empty Coordinates
	$('#ImageMapContainer').html('');
    //Get Mapping Coordinates
	if(src != 'images/not_found.png'){
		$.post('val.php',{get_mapping_coords:src, get_mapping_coords_date:selected_date, get_mapping_coords_prefix:prefix,get_mapping_coords_page:page},function(data){
			if(data != ''){
				$('#ImageMapContainer').html(data);

				setTimeout(function(){
					$.fn.maphilight.defaults = {
						fill: true,
						fillColor: '000000',
						fillOpacity: 0.2,
						stroke: true,
						strokeColor: '000000',
						strokeOpacity: 1,
						strokeWidth: 1,
						fade: true,
						alwaysOn: false,
						neverOn: false,
						groupBy: false,
						wrapClass: true,
						shadow: false,
						shadowX: 0,
						shadowY: 0,
						shadowRadius: 6,
						shadowColor: '000000',
						shadowOpacity: 0.8,
						shadowPosition: 'outside',
						shadowFrom: false
					};
					
					$('.preview_container .paper .map').maphilight();
					$('.preview_container .paper .map').rwdImageMaps();
				},0);

				//Bind Event on Mouse Move
				$(document).mousemove(function(){
					$(document).unbind('mousemove');
					setTimeout(function(){
						$('.preview_container .paper .map').maphilight();
						$('.preview_container .paper .map').rwdImageMaps();
					});
				});
			}
		});
	}
}

//Save Ad Space Content
function save_ad_space_content(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load').attr('disabled','disabled');

	var name  = $(x).data('name');
	var value = '';
	if(name == 'ad_space_1'){ value = $('#HiddenAdSpace1').val(); }
	if(name == 'ad_space_2'){ value = $('#HiddenAdSpace2').val(); }
	if(name == 'ad_space_3'){ value = $('#HiddenAdSpace3').val(); }
	if(name == 'ad_space_4'){ value = $('#HiddenAdSpace4').val(); }

	$.post('../val.php',{save_ad_content_name:name, save_ad_content_value:value},function(data){
		$(x).removeClass('btn_load').removeAttr('disabled');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
			$('.ad_space_popup_container').fadeOut();
		}
	});
}

//Change Ad STatus
function change_ad_status(x){
	NProgress.start();

	var name  = $(x).attr('name');
	var value = 'disable';
	if($(x).is(':checked')){
		value = 'enable';
	}	

	$.post('../val.php',{save_ad_status_name:name, save_ad_status_value:value},function(data){
		if(data != 'success'){
			window.location.reload();
		}else{
			NProgress.done();
		}
	});
}

//Reset Password (Set New Password)
function reset_new_pass(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load').attr('disabled','disabled');
	var pass1 = $('#reset_new_pass').val();
	var pass2 = $('#reset_conf_pass').val();
	var email = $('#reset_pass_email').val();
	var code  = $('#reset_pass_code').val();

	$.post('../val.php',{reset_new_pass:pass1,reset_conf_pass:pass2,reset_pass_email:email,reset_pass_code:code},function(data){
		$(x).removeClass('btn_load').removeAttr('disabled');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			window.location.reload();
		}
	});
}

//Reset Password (Send Email)
function reset_password(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load').attr('disabled','disabled');
	var email = $('#fp_email').val();

	$.post('../val.php',{reset_password:email},function(data){
		$(x).removeClass('btn_load').removeAttr('disabled');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			cancel_forgot_password();
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">We have sent you an email. Check your spam folder as well.</b>');
			$('.top_error_container').fadeIn();
		}
	});
}

//save News Ticker
function save_news_ticker(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');
	var status;
	var headlines 	= $('.widget_news_ticker_add_headlines div').html();

	if($('#news_ticker_enable').is(':checked')){
		status = 1;
	}else{
		status = 0;
	}

	$.post('../val.php',{save_news_ticker_status:status, save_news_ticker_headlines:headlines},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
		}	
	});
}

//Save Theme Settings
function save_theme_settings(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');
	var layout 	= $('#ts_website_layout').val();

	$.post('../val.php',{save_theme_settings_layout:layout},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
		}	
	});
}

//Change Page STatus
function change_page_status(x){
	NProgress.start();

	var page  = $(x).attr('name');
	var value = $(x).val();

	$.post('../val.php',{save_page_status_name:page, save_page_status_value:value},function(data){
		if(data != 'success'){
			window.location.reload();
		}else{
			NProgress.done();
		}
	});
}

//save Custom Page 2
function save_custom_page2(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');
	var name 	= $('#custom_page2_name').val();
	var code 	= $('#custom_page2_editor').val();

	$.post('../val.php',{save_custom_page2:code, save_custom_page2_name:name},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
		}	
	});
}

//save Custom Page 1
function save_custom_page1(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');
	var name 	= $('#custom_page1_name').val();
	var code 	= $('#custom_page1_editor').val();

	$.post('../val.php',{save_custom_page1:code, save_custom_page1_name:name},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
		}	
	});
}

//save Advertisement
function save_advertisement(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');
	var name 	= $('#advertisement_page_name').val();
	var code 	= $('#advertisement_editor').val();

	$.post('../val.php',{save_advertisement:code, save_advertisement_name:name},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
		}	
	});
}


//save Contact us
function save_contact_us(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');
	var name 	= $('#contact_us_page_name').val();
	var code 	= $('#contact_us_editor').val();

	$.post('../val.php',{save_contact_us:code, save_contact_us_name:name},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
		}	
	});
}

//save about us
function save_about_us(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');
	var name 	= $('#about_us_page_name').val();
	var code 	= $('#about_us_editor').val();

	$.post('../val.php',{save_about_us:code, save_about_us_name:name},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
		}	
	});
}

//Save Meta Tags
function save_meta_tags(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');
	var code 	= $('#HiddenMetaTags').val();

	$.post('../val.php',{save_meta_tags:code},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
		}	
	});
}

//Pay via PayU Money
function pay_via_payu(x){
	$(x).css('height','35px').text('').addClass('btn_load');
	var mid 	= $('#payu_key').val();
	var pid 	= $(x).data('plan-id');
	var pname 	= $(x).data('plan-name');
	var price 	= $(x).data('plan-price');
	$.post('val.php',{payu_merchent:mid, payu_plan_id:pid, payu_plan_name:pname, payu_price:price},function(data){
		$(x).removeClass('btn_load');
		$(x).css('height','auto').text('Subscribe');

		var data  = data.split(',');
		var data1 = data[0].trim();
		var data2 = data[1].trim();

		if(data1 != 'success'){
			if(data2 == 'login'){
				prompt_login();
			}else{
				if(data2 == 'error'){
					window.location.reload();
				}
			}
		}else{
			var txn_id  = data[2].trim();
			var amount  = data[3].trim();
			var pinfo   = data[4].trim();
			var fname   = data[5].trim();
			var email   = data[6].trim();
			var hash    = data[7].trim();
			$('#payu_surl').val(data2);
			$('#payu_txnid').val(txn_id);
			$('#payu_amount').val(amount);
			$('#payu_pinfo').val(pinfo);
			$('#payu_fname').val(fname);
			$('#payu_email').val(email);
			$('#payu_hash').val(hash);
			launchBOLT();
		}	
	});
}

//Pay via CCAvenue
function pay_via_ccavenue(x){
	$(x).css('height','35px').text('').addClass('btn_load');
	var mid 	= $('#ccavenue_merchent').val();
	var pid 	= $(x).data('plan-id');
	var price 	= $(x).data('plan-price');
	$.post('val.php',{ccavenue_merchent:mid, ccavenue_plan_id:pid, ccavenue_price:price},function(data){
		$(x).removeClass('btn_load');
		$(x).css('height','auto').text('Subscribe');

		var data  = data.split(',');
		var data1 = data[0].trim();
		var data2 = data[1].trim();

		if(data1 != 'success'){
			if(data2 == 'login'){
				prompt_login();
			}else{
				if(data2 == 'error'){
					window.location.reload();
				}
			}
		}else{
			$('#ccavenue_url').val(data2);
			$('#ccavenue_form').submit();
		}	
	});
}

//Change Gateway Type
function change_gateway_type(x){
	NProgress.start();
	var x = $(x).val();

	$.post('../val.php',{change_gateway_type:x},function(data){
		if(data != 'success'){
			window.location.reload();
		}else{
			NProgress.done();
			if(x == 'ccavenue'){
				$('#payu_container').hide();
				$('#ccavenue_container').fadeIn();
			}else{
				if(x == 'payu'){
					$('#ccavenue_container').hide();
					$('#payu_container').fadeIn();
				}
			}
		}
	});
}

//Save Payment Gateway (PayU Money)
function save_payu_gateway(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');
	var mid 	= $('#payu_mid').val();
	var salt 	= $('#payu_salt').val();

	$.post('../val.php',{payu_mid:mid,payu_salt:salt},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
		}	
	});
}

//Save Payment Gateway (CC Avenue)
function save_ccavenue_gateway(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');
	var mid 	= $('#ccavenue_mid').val();
	var key 	= $('#ccavenue_key').val();

	$.post('../val.php',{ccavenue_mid:mid,ccavenue_key:key},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
		}	
	});
}

//Delete Plan
function del_article(x){
	$(x).addClass('btn_load');
	var id = $(x).attr('data-id');

	$.post('../val.php',{del_article:id},function(data){
		if(data != 'success'){
			window.location.reload();
		}else{
			$(x).removeClass('btn_load');
			window.location.reload();
		}	
	});
}

//Change Password (Account Settings)
function change_password(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');
	var cp_oldpass 	= $('#cp_oldpass').val();
	var cp_newpass 	= $('#cp_newpass').val();
	var cp_confpass = $('#cp_confpass').val();

	$.post('../val.php',{cp_oldpass:cp_oldpass,cp_newpass:cp_newpass,cp_confpass:cp_confpass},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Password Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
		}	
	});
}

//Save Basic Details (Account Settings)
function save_basic_details(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');
	var name 	= $('#as_name').val();
	var email 	= $('#as_email').val();
	var pass 	= $('#as_pass').val();

	$.post('../val.php',{basic_details_name:name,basic_details_email:email,basic_details_pass:pass},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
		}	
	});
}

//Save Google Analytics
function save_google_analytics(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');
	var code 	= $('#HiddenAnalytics').val();

	$.post('../val.php',{save_google_analytics:code},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
		}	
	});
}

//Number Formatter
function num_formatter(num) {
	if(num > 999999){
    	return num > 999999 ? (num/1000000).toFixed(1) + 'm' : num
	}else{
		return num > 999 ? (num/1000).toFixed(1) + 'k' : num
	}
}
/* 
Usage
var x = num_formatter(150000).replace('.0k','k').replace('.0m','m');
console.log(num_formatter(x));
*/

//Save General Settings
function save_general_settings(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');
	var title 		= $('#gs_site_title').val();
	var mode 		= $('#gs_website_mode').val();
	var company 	= $('#gs_company').val();
	var days 		= $('#gs_allowed_days').val();
	var time 		= $('#gs_allowed_time').val();
	var highlight 	= $('#gs_highlight_cropped_articles').val();
	var auto_crop 	= $('#gs_auto_crop').val();
	var restriction	= $('#gs_restriction_type').val();
	var admin_email	= $('#gs_admin_email').val();

	$.post('../val.php',{gs_site_title:title,gs_website_mode:mode,gs_company:company,gs_allowed_days:days,gs_allowed_time:time,gs_highlight:highlight,gs_auto_crop:auto_crop,gs_restriction_type:restriction,gs_admin_email:admin_email},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
		}	
	});
}

//Change Subscription Type
function change_of_plans(x){
	NProgress.start();
	var x = $(x).val();

	$.post('../val.php',{change_subscription_type:x},function(data){
		if(data != 'success'){
			window.location.reload();
		}else{
			NProgress.done();
			if(x == 'free'){
				$('#subscription_plans_container').fadeOut();
			}else{
				$('#subscription_plans_container').fadeIn();
			}
		}
	});
}

//Delete Plan
function delete_plan(x){
	$(x).addClass('btn_load');
	var id = $(x).attr('data-id');

	$.post('../val.php',{delete_plan:id},function(data){
		if(data != 'success'){
			window.location.reload();
		}else{
			$(x).removeClass('btn_load');
			cancel_delete_plan();
			show_plans(); 
		}	
	});
}

//Edit Plan
function edit_plan(x){
	$(x).addClass('btn_load');
	$('.top_error_container').hide();
	var id  	 = $('#edit_plan_id').val();
	var name  	 = $('#edit_plan_name').val();
	var validity = $('#edit_plan_validity').val();
	var price  	 = $('#edit_plan_price').val();
	var popular  = 0;
	if($('#edit_plan_popular').is(':checked')){
		popular  = 1;
	}

	$.post('../val.php',{edit_plan_id:id, edit_plan_name:name, edit_plan_validity:validity, edit_plan_price:price, edit_plan_popular:popular},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			$('.top_error_container a').text(data);
			$('.top_error_container').fadeIn();
		}else{
			$('#edit_plan_name').val('');
			$('#edit_plan_validity').val('');
			$('#edit_plan_price').val('');
			$('#edit_plan_popular').prop('checked', false);
			$('#edit_plan_form_container').hide();
			$('#add_plan_form_container').fadeIn();
			show_plans();
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
		}
	});
}

//Add Plan
function add_plan(x){
	$(x).addClass('btn_load');
	$('.top_error_container').hide();
	var name  	 = $('#add_plan_name').val();
	var validity = $('#add_plan_validity').val();
	var price  	 = $('#add_plan_price').val();
	var popular  = 0;
	if($('#add_plan_popular').is(':checked')){
		popular = 1;
	}

	$.post('../val.php',{add_plan_name:name, add_plan_validity:validity, add_plan_price:price, add_plan_popular:popular},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			$('.top_error_container a').text(data);
			$('.top_error_container').fadeIn();
		}else{
			$('.top_error_container').hide();
			$('#add_plan_name').val('');
			$('#add_plan_validity').val('');
			$('#add_plan_price').val('');
			$('#add_plan_popular').removeAttr('checked');
			show_plans();
		}
	});
}

//Show Plans
function show_plans(){
	$('#subscription_plans_container .plans_container').html('<img src="../images/loading3.gif" style="display:block; width:50px; margin:75px auto auto;">')
	$.post('../val.php',{show_plans:1},function(data){
		$('#subscription_plans_container .plans_container').html('').hide();;
		if(data != 'error' && data != ''){
			$('#subscription_plans_container .plans_container').append(data).fadeIn();
		}
	});
}

//Save Login Back
function save_login_back(x){
	$('.top_error_container').hide();
	$(x).addClass('btn_load');
	var image_id = '';
	$('.dashboard_container .login_page_settings input[type="radio"]').each(function(){
		if($(this).is(':checked')){
			image_id = $(this).val();
		}
	});

	$.post('../val.php',{save_login_back:image_id},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			if(data == 'error'){
				window.location.reload();
			}else{
				$('.top_error_container a').text(data);
				$('.top_error_container').fadeIn();
			}
		}else{
			$('.top_error_container a').html('<b style="color:#AED581; font-size: 11px;">Successfully Updated</b>');
			$('.top_error_container').fadeIn();
			setTimeout(function(){
				$('.top_error_container').fadeOut();
			},4000);
		}	
	});
}

//Delete User
function delete_user(x){
	$(x).addClass('btn_load');
	var id = $(x).attr('data-id');

	$.post('../val.php',{delete_user:id},function(data){
		if(data != 'success1' && data != 'success2' && data != 'success3'){
			window.location.reload();
		}else{
			$(x).removeClass('btn_load');
			cancel_delete_user();
			if(data == 'success1'){ show_admins(); }
			if(data == 'success2'){ show_editors(); }
			if(data == 'success3'){ show_subscribers(); }
		}	
	});
}

//Add User
function add_user(x){
	$(x).addClass('btn_load');
	$('.top_error_container').hide();
	var name  = $('#add_user_name').val();
	var email = $('#add_user_email').val();
	var pass  = $('#add_user_pass').val();
	var level = $('#add_user_level').val();

	$.post('../val.php',{add_user_name:name, add_user_email:email, add_user_pass:pass, add_user_level:level},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success1' && data != 'success2' && data != 'success3'){
			$('.top_error_container a').text(data);
			$('.top_error_container').fadeIn();
		}else{
			$('.top_error_container').hide();
			$('#add_user_name').val('');
			$('#add_user_email').val('');
			$('#add_user_pass').val('');
			if(data == 'success1'){ show_admins(); }
			if(data == 'success2'){ show_editors(); }
			if(data == 'success3'){ show_subscribers(); }
		}
	});
}

//Show Admin Users
function show_admins(){
	$('#user_management_container .tab_container a').each(function(count){
		$(this).removeClass('active');
		if(count == 0){
			$(this).addClass('active');
		}
	});

	$('#user_management_container .users_container').html('<img src="../images/loading3.gif" style="display:block; width:50px; margin:100px auto auto;">')
	$.post('../val.php',{show_admins:1},function(data){
		$('#user_management_container .users_container').html('').hide();;
		if(data != 'error' && data != ''){
			$('#user_management_container .users_container').append(data).fadeIn();
		}
	});
}

//Show Editor Users
function show_editors(){
	$('#user_management_container .tab_container a').each(function(count){
		$(this).removeClass('active');
		if(count == 1){
			$(this).addClass('active');
		}
	});

	$('#user_management_container .users_container').html('<img src="../images/loading3.gif" style="display:block; width:50px; margin:100px auto auto;">')
	$.post('../val.php',{show_editors:1},function(data){
		$('#user_management_container .users_container').html('').hide();;
		if(data != 'error' && data != ''){
			$('#user_management_container .users_container').append(data).fadeIn();
		}
	});
}

//Show Subcriber Users
function show_subscribers(){
	$('#user_management_container .tab_container a').each(function(count){
		$(this).removeClass('active');
		if(count == 2){
			$(this).addClass('active');
		}
	});

	$('#user_management_container .users_container').html('<img src="../images/loading3.gif" style="display:block; width:50px; margin:100px auto auto;">')
	$.post('../val.php',{show_subscribers:1},function(data){
		$('#user_management_container .users_container').html('').hide();;
		if(data != 'error' && data != ''){
			$('#user_management_container .users_container').append(data).fadeIn();
		}
	});
}

//Sign Up
function val_signup(x){
	$(x).addClass('btn_load');
	$('.admin_login_container .form .error').hide();
	var name  	= $('#signup_name').val();
	var email 	= $('#signup_email').val();
	var pass  	= $('#signup_pass').val();

	$.post('../val.php',{signup_name:name, signup_email:email, signup_pass:pass},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success'){
			$('.admin_login_container .form .error').text(data).fadeIn();
		}else{
			location.href = '../index.php';
		}
	});
}

//Login
function val_login(x){
	$(x).addClass('btn_load');
	$('.admin_login_container .form .error').hide();
	var email   = $('#login_email').val();
	var pass    = $('#login_pass').val();

	$.post('../val.php',{login_email:email, login_pass:pass},function(data){
		$(x).removeClass('btn_load');
		if(data != 'success' && data != 'success1'){
			$('.admin_login_container .form .error').text(data).fadeIn();
		}else{
			if(data == 'success'){
				location.href = '../index.php';
			}else{
				if(data == 'success1'){
					location.href = 'index.php';
				}
			}
		}
	});
}

function destroy_jcrop(){
	//Mapping Wrapper
	var host 			= $(location).attr('host').replace('www.',''); 
	var org_id 			= $('body').attr('data-org-id'); 
	var mapping 		= '<img src="images/mapping_wrapper_'+org_id+'.png" alt="" class="map" usemap="#mapping">';

	if($('#allow_reporting').val() == 'allowed'){
		var mapping_overlay = `<a class="mapping_overlay" id="mapping_overlay" href="#" target="_blank" onmouseleave="$('#mapping_overlay').hide()">
							    	<div>
								    	<span class="report"><i class="fa fa-trash"></i></span>
								    	<span class="mark_as_ad"><i class="fa fa-bullhorn"></i></span>
									</div>
							    </a>`;
	}else{
		var mapping_overlay = `<a class="mapping_overlay" id="mapping_overlay" href="#" target="_blank" onmouseleave="$('#mapping_overlay').hide()">
							    	<div></div>
							    </a>`;
	}

	var src;
	var slices;
	//Get Sequence Number & Push History
	$('#thumbnails_container .item').each(function(index){
		if($(this).hasClass('selected')){
			src 	= $(this).find('img').attr('data-src')
			slices  = $(this).attr('data-slices')
		}
	});

	//Change Preview Image
	if(src != ''){
		//check if slices are available
		if(slices == 'true'){
			//Show Slices
			$('.preview_container .paper').html(mapping_overlay+mapping+'<div class="slices_container"></div>');
			for (var count = 1; count <= 14; count++) {
				var slice_src = src.replace('.jpg','_slice'+count+'.jpg');
				$('.preview_container .paper .slices_container').append('<img src="'+slice_src+'" data-src="'+src+'">');
			}
		}else{
			$('.preview_container .paper').html(mapping_overlay+mapping+'<div class="slices_container"><img src="'+src+'" data-src="'+src+'"></div>');
		}

		$('.preview_container .paper .map').show();
		$('.preview_container .paper .map').maphilight();
		$('.preview_container .paper .map').rwdImageMaps();
	}

}

function share_url(slide=0){
	var url 	= window.location.href;
	var date 	= $('#date_selector').val();
	var edition = $('#edition_selector').val();
	if(slide == 0){
		var img = $('.preview_container .paper .slices_container img').attr('data-src');
	}else{
		var img = $('.preview_container .paper img').attr('src');
	}
	var site 	= $('body').attr('data-page-url');

	if(img != 'images/not_found.png' & img != ''){
		$('#facebook2').attr('href','https://www.facebook.com/sharer/sharer.php?u='+url);
		$('#twitter2').attr('href','https://twitter.com/share?url='+encodeURIComponent(url));
		//$('#pinterest2').attr('href','https://pinterest.com/pin/create/button/?url='+encodeURIComponent(url)+'&media='+img+'&description='+edition+' | '+date);
		// $('#whatsapp2').attr('href','https://wa.me/?text='+encodeURIComponent(url));

		if(screen.width > 600){
			$('#whatsapp2').attr('href','https://web.whatsapp.com/send?text='+encodeURIComponent(url));
		}else{
			$('#whatsapp2').attr('href','whatsapp://send?text='+encodeURIComponent(url));
		}

		// $('#linkedin2').attr('href','https://www.linkedin.com/shareArticle?mini=true&url='+encodeURIComponent(url)+'&title='+edition+' | '+date+'&summary=&source=');
		$('#email2').attr('href','mailto:?&subject=Shared News&body='+encodeURIComponent(url));
		
		if(slide == 0){
			$('#download2').attr('onclick','download_file("'+img+'","'+edition+'_'+date+'")');
			// $('#download2').attr('href',site+'download.php?file='+img);
		}else{
			$('#download2').attr('onclick','download_file("'+img+'","download")');
			// $('#download2').attr('href',site+'download.php?file='+img);
		}
		$('#print2').attr('onclick','window.print()');

		if(slide == 0){
			$('.top_share_icon_container').slideDown();
		}
	}
}

function download_file(fileURL, fileName) {
    // for non-IE
    if (!window.ActiveXObject) {
		var save = document.createElement('a');
		save.href = fileURL;
		save.target = '_blank';
		var filename = fileURL.substring(fileURL.lastIndexOf('/')+1);
		save.download = fileName || filename;
		if ( navigator.userAgent.toLowerCase().match(/(ipad|iphone|safari)/) && navigator.userAgent.search("Chrome") < 0) {
			document.location = save.href; 
		}else{
			var evt = new MouseEvent('click', {
			    'view': window,
			    'bubbles': true,
			    'cancelable': false
			});
			save.dispatchEvent(evt);
			(window.URL || window.webkitURL).revokeObjectURL(save.href);
		}	
    }

    // for IE < 11
    else if ( !! window.ActiveXObject && document.execCommand)     {
        var _window = window.open(fileURL, '_blank');
        _window.document.close();
        _window.document.execCommand('SaveAs', true, fileName || fileURL)
        _window.close();
    }
}

function copy_clipboard(text) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(text).select();
    document.execCommand("copy");
    $temp.remove();
}

function set_valid_date(selected_date = '', pageno=0){
	$('#edition_selector option').each(function(){
		if($(this).is(':checked')){
			var edition_name   = $(this).text();
			var edition_prefix = $(this).val();
			var last_date 	   = $(this).attr('data-date');
			var last_date_max  = $(this).attr('data-date');
			if(selected_date != ''){
				last_date = selected_date;
			}
			
			$.post('val.php',{date_settings_edition_name:edition_name, date_settings_edition_prefix:edition_prefix}, function(data){
				if(data == 'not found'){
					flatpickr("#date_selector", {
						dateFormat: "Y-m-d",
						maxDate: "today"
					}).setDate(last_date);
					show_epaper(pageno);
				}else{
					var x 		= data.split('|');
					var type 	= x[0];

					//Set Variables for Daily, Weekly, Monthly & Fortnighly 
					if(type == 'weekly' || type == 'monthly' || type == 'fortnightly' || type == 'daily'){
						var month 	= parseInt(x[1]);
						var day 	= parseInt(x[2]);
						var day2 	= parseInt(x[4]);
						var weekday	= parseInt(x[3]);
					}

					//Weekly
					if(type == 'weekly'){
						flatpickr("#date_selector", {
							dateFormat: "Y-m-d",
							"enable": [
						        function(date) {
						            return (date.getDay() === weekday);
						        }
						    ],
						    "locale": {
						        "firstDayOfWeek": 1 
						    },
							maxDate: "today"
						}).setDate(last_date);
					}else{
						//Monthly
						if(type == 'monthly'){
							//Daily View
							flatpickr("#date_selector", {
								dateFormat: "Y-m-d",
								"enable": [
							        function(date) {
							            return (date.getDate() === day);
							        }
							    ],
							    "locale": {
							        "firstDayOfWeek": 1 
							    },
								maxDate: "today"
							}).setDate(last_date);

							//Monthly View
							//Get Day from Date 
							// var day = last_date.split('-');

							// var calendar = flatpickr("#date_selector", {
							//     plugins: [
							//         new monthSelectPlugin({
							//           shorthand: true, //defaults to false
							//           dateFormat: "Y-m-d", //defaults to "F Y"
							//           altFormat: "F Y", //defaults to "F Y"
							//           theme: "light" // defaults to "light",
							//         })
							//     ],
							//     defaultDate:last_date,
							//     maxDate: last_date_max,
							//     onClose: function(selectedDates, dateStr, instance){
							//     	//console.log(dateStr);
							//     	var date = dateStr.split('-');
							//     	var date = date[0]+'-'+date[1]+'-'+day[2];
							//     	//console.log(date);
							//     	this.setDate(date, true);
							//     }
							// });
						}else{
							//Fortnightly
							if(type == 'fortnightly'){
								flatpickr("#date_selector", {
									dateFormat: "Y-m-d",
									"enable": [
								        function(date) {
								            return (date.getDate() === day || date.getDate() === day2);
								        }
								    ],
								    "locale": {
								        "firstDayOfWeek": 1 
								    },
									maxDate: "today"
								}).setDate(last_date);
							}else{
								//Daily
								if(type == 'daily'){
									flatpickr("#date_selector", {
										dateFormat: "Y-m-d",
										maxDate: "today"
									}).setDate(last_date);
								}else{
									//Set only valid dates
									if(type == 'enable_specific'){
										console.log('enable_specific');
										var dates = $.parseJSON(x[1]);

										flatpickr("#date_selector", {
											dateFormat: "Y-m-d",
											"enable": dates,
										    "locale": {
										        "firstDayOfWeek": 1 
										    },
											maxDate: "today"
										}).setDate(dates[0]);
									}else{
										flatpickr("#date_selector", {
											dateFormat: "Y-m-d",
											maxDate: "today"
										}).setDate(last_date);
									}
								}
							}
						}
					}
					show_epaper(pageno);
				}
			});
		}
	});
}

function show_epaper(pageno=0){
	var selected_date 		= $('#date_selector').val();
	var selected_edition 	= $('#edition_selector').val();
	var total_pages			= 0;

	$('#edition_selector option').each(function(){
		if($(this).is(':selected')){
			total_pages = $(this).attr('data-pages');
		}
	});

	$.post('val.php',{selected_date:selected_date, selected_edition:selected_edition, total_pages:total_pages}, function(data){
		if(data == 'error' || data == 'files not found'){
			NProgress.done();
		}else{
			if(data == 'prompt login'){
				NProgress.done();
				prompt_login();
			}else{
				if(data == 'prompt pricing'){
					location.href = 'pricing.php';
				}else{
					NProgress.done();
					$('#thumbnails_container').html(data);
					if($('.side_thumbnails_container').length){
						$('.side_thumbnails_container .side_thumbnails').html(data);
					}
					set_thumbnails();
					
					//Slider
					$('.options_container .thumbnails').owlCarousel('destroy');
					enable_slider();

					//Trigger Preview
					$('#thumbnails_container .item').each(function(index){
						if(index == pageno){
							$(this).click();
						}
					});
				}
			}
		}
	});	
}

function preview(x){
	NProgress.start();
	var sidethumbs_pos = 0;
	if($(window).width() > 1000){
		if($('.preview_container_2 .grid .side_thumbnails').length){
			sidethumbs_pos = $('.preview_container_2 .grid .side_thumbnails').scrollTop();
		}
	}

	//Highlight Selected Thumbnail
	$('#thumbnails_container .item').each(function(){
		if($(this).hasClass('selected')){
			$(this).removeClass('selected');
		}
		if($(this).find('img').attr('src') == $(x).find('img').attr('src')){
			$(this).addClass('selected');
		}
	});

	//Get Sequence Number & Push History
	$('#thumbnails_container .item').each(function(index){
		if($(this).hasClass('selected')){
			index++;
			var selected_date 		= $('#date_selector').val();
			var selected_edition 	= $('#edition_selector').val();
			//Push History
			window.history.pushState('edition_and_date',null,'index.php?edition='+selected_edition+'&date='+selected_date+'&page='+index);
			NProgress.done();
		}
	});

	//Check if slices are available
	var slices = $(x).attr('data-slices');

	//Change Preview Image
	var src = $(x).find('img').attr('data-src');
	if(src != '' && src != 'images/not_found.png'){
		if(slices == 'true'){
			//Show Slices
			$('.preview_container .paper .slices_container').html('');
			for (var count = 1; count <= 14; count++) {
				var slice_src = src.replace('.jpg','_slice'+count+'.jpg');
				if(count == 1){
					$('.preview_container .paper .slices_container').append('<img src="'+slice_src+'" data-src="'+src+'" data-step="8" data-intro="And select the part you want to crop">');
				}else{
					$('.preview_container .paper .slices_container').append('<img src="'+slice_src+'" data-src="'+src+'">');

					if(count == 14){
						load_image_maps();
					}
				}
			}
		}else{
			$('.preview_container .paper .slices_container').html('<img src="'+src+'" data-src="'+src+'" data-step="8" data-intro="And select the part you want to crop">');
			load_image_maps();
		}
	}else{
		$('.preview_container .paper .slices_container').html('<img src="'+src+'" data-src="'+src+'">');
	}

	//Remove jCrop
	if($('#crop_btn').hasClass('selected')){
		$('#crop_btn').removeClass('selected');
		$('.preview_container .paper .slices_container').data('Jcrop').destroy();
		destroy_jcrop();
	}

	//Fix sticky element
	if($(window).width() > 1000){
		if($('.preview_container_2 .grid .side_thumbnails').length){
			var pos  = $('html, body').scrollTop();
			$('html, body').animate({
				scrollTop: 0
			},500);

			setTimeout(function(){
				$('.preview_container_2 .grid .side_thumbnails').scrollTop(sidethumbs_pos);
			},10);
		}
	}

	//Set PDF Download Link
	set_pdf_link();
}

function set_thumbnails(){
	$('.main_container .thumbnails .item').each(function(){
    	$(this).find('img').hide();
    	var src = $(this).find('img').attr('src');
    	$(this).css('background-image','url('+src+')');
    	$(this).css('background-size','cover');
    	$(this).css('background-position','center');
    });
}

function enable_slider(){
	//Check number of pages
	var total_pages	= 0;
	var items_desk  = 7;
	var items_mob   = 3;
	$('#edition_selector option').each(function(){
		if($(this).is(':selected')){
			total_pages = $(this).attr('data-pages');
		}
	});
	if(total_pages == 4){
		items_desk = 4;
		items_mob  = 4;
	}

	$('.options_container .thumbnails').owlCarousel({
        items: items_desk,
        autoPlay: false,
        loop: false,
        margin:10,
        stopOnHover: true,
        navigation: false,
        dots: false,
        itemsDesktop : [1400,items_desk], // betweem 900px and 601px
        itemsDesktopSmall : [1000,items_desk], // betweem 900px and 601px
        itemsTablet: [700,items_desk], //2 items between 700 and 0
        itemsMobile : [450, items_mob] // itemsMobile disabled - inherit from itemsTablet option
    });
}

function screenshot(){
	$('.popup_container .cropped_image_container .header').show();
	$('.cropped_image_container .image img').load(function() {
		html2canvas($('.cropped_image_container')[0]).then(function(canvas) {
		    var screenshot_src 	= $('.cropped_image_container .image img').attr('src');
		    var screenshot_data = canvas.toDataURL("image/png");

	        $.post('val.php',{screenshot_data:screenshot_data, screenshot_src:screenshot_src},function(data){
	        	if(data != 'error'){
	        		$('.popup_container .share_icon_container .loading').hide();
	        		$('.popup_container .share_icon_container a').css('display','inline-block');
	        		$('.popup_container .cropped_image_container .header').hide();
	        		$('.popup_container .cropped_image_container .footer').hide();
	        		$('.cropped_image_container .image img').attr('src',data);
	        	}
	        });
		});
	});
}

function crop_image(){
	var crop_src = $('#crop_src').val();
    var crop_x 	 = $('#crop_x').val();
    var crop_y 	 = $('#crop_y').val();
    var crop_w 	 = $('#crop_w').val();
    var crop_h 	 = $('#crop_h').val();
    var date 	 = $('#date_selector').val();
	var edition  = '';
	var edition2 = '';

	$('#edition_selector option').each(function(){
		if($(this).is(':checked')){
			edition = $(this).text();
		}
	});
	$('#edition_selector option').each(function(){
		if($(this).is(':checked')){
			edition2 = $(this).val();
		}
	});

	//Show Loading & Clear Previous Images
	$('.popup_container .share_icon_container .loading').show();
	$('.popup_container .share_icon_container a').css('display','none');
	$('.popup_container .cropped_image_container .footer').show();
	$('.popup_container .cropped_image_container .image img').attr('src','');

	//Don't show popup to user who is Auto Cropping
	if($('#allow_reporting').val() != 'allowed'){
		$('.popup_container').fadeIn();
	}
	
    $.post('val.php',{crop_date:date, crop_edition:edition, crop_edition2:edition2, crop_src:crop_src, crop_x:crop_x, crop_y:crop_y, crop_w:crop_w, crop_h:crop_h},function(data){
    	if(data != '' || data != 'error'){
    		//Remove jCrop
			if($('#crop_btn').hasClass('selected')){
				$('#crop_btn').removeClass('selected');
				$('.preview_container .paper .slices_container').data('Jcrop').destroy();
				destroy_jcrop();
			}

    		$('.popup_container .cropped_image_container .image img').attr('src',data);

    		//Set Share Links, Edition & Date
    		var split 	= data.split('/');
    		var image 	= split[1].replace('.jpg','');
    		split		= split[1].split('_');
    		//var edition = split[0];
    		//edition 	= edition.replace('-',' ');
    		var date 	= split[1];
    		var url 	= $('body').attr('data-page-url')+'article.php?id='+image;
    		var random  = Math.floor((Math.random() * 1000000) + 1);
    		var pin_img = $('body').attr('data-page-url')+data+'?ver='+random;
    		var site 	= $('body').attr('data-page-url');

    		//Page Number
    		var page_no;
    		$('#thumbnails_container .item').each(function(count){
    			if($(this).hasClass('selected')){
    				page_no = count+1;
    			}
    		});

    		$('#facebook').attr('href','https://www.facebook.com/sharer/sharer.php?u='+url);
    		$('#twitter').attr('href','https://twitter.com/share?url='+encodeURIComponent(url));
    		//$('#pinterest').attr('href','https://pinterest.com/pin/create/button/?url='+encodeURIComponent(url)+'&media='+pin_img+'&description='+edition+' | '+date);
			// $('#whatsapp').attr('href','https://wa.me/?text='+encodeURIComponent(url));

			if(screen.width > 600){
				$('#whatsapp').attr('href','https://web.whatsapp.com/send?text='+encodeURIComponent(url));
			}else{
				$('#whatsapp').attr('href','whatsapp://send?text='+encodeURIComponent(url));
			}

    		// $('#linkedin').attr('href','https://www.linkedin.com/shareArticle?mini=true&url='+encodeURIComponent(url)+'&title='+edition+' | '+date+'&summary=&source=');
    		$('#link').attr('onclick','copy_clipboard("'+url+'")');
    		$('#email').attr('href','mailto:?&subject='+edition+' | '+date+'&body='+url);
    		$('#download').attr('onclick','download_file("'+pin_img+'","'+edition+'_'+date+'")');
    		// $('#download').attr('href',site+'download.php?file='+pin_img);
    		$('#print').attr('onclick','window.print()');
    		
    		$('.popup_container .cropped_image_container .edition_date').text(edition+' | '+date+' | Page- '+page_no);

    		//Don't show popup to user who is Auto Cropping
    		if($('#allow_reporting').val() != 'allowed'){
	    		$('.popup_container').fadeIn();
	    		$('.popup_container .share_icon_container .loading').hide();
	        	$('.popup_container .share_icon_container a').css('display','inline-block');
	    		// screenshot();
    		}else{
    			load_image_maps();
    		}
    	}
    });
}

function updateCoords(c){
	$('.jcrop-tracker').each(function(index){
		if(index == 0){
			$(this).html('<button type="button" class="shadow-lg" onmouseup="crop_image()" ontouchstart="crop_image()"><i class="fa fa-share-alt" aria-hidden="true"></i></button>');
		}
	});
    $('#crop_src').val($('.preview_container .slices_container img').attr('data-src'));
    $('#crop_x').val(c.x);
    $('#crop_y').val(c.y);
    $('#crop_w').val(c.w);
    $('#crop_h').val(c.h);
}

function enable_crop(x){
	//Disbale Zoom
	zoom_out2(true);

	var scroll_pos = $('html').scrollTop();

	$('.main_container .preview_container .paper .slices_container').removeClass('zoom_out');
	if($(x).hasClass('selected')){
		$(x).removeClass('selected');
		$('.preview_container .paper .slices_container').data('Jcrop').destroy();
		//Show slices again
		destroy_jcrop();
		$(".preview_container .paper").swipe("enable");
	}else{
		$(".preview_container .paper").swipe("disable");
		$(x).addClass('selected');

		var width  = $('.preview_container .paper .slices_container img').prop('naturalWidth');
		var height = 0;
		$('.preview_container .paper .slices_container img').each(function(){
			height += $(this).prop('naturalHeight');
		});

		$('.preview_container .paper .slices_container').Jcrop({
			aspectRatio: 0,
			onSelect: updateCoords,
			trueSize: [width,height]
			//setSelect:   [ 0, 0, 550, 350 ]
		});
	}

	$('html').scrollTop(scroll_pos);
}

function view_pdf(){
	var src = $('.preview_container .slices_container img').attr('data-src');
	if(src != 'images/not_found.png'){
		src = src.replace('.jpg','.pdf');
		window.open(src,'_blank');
	}
}

function flipbook(x){
	if($(x).hasClass('selected')){
		//Disable FlipBook
		$(x).removeClass('selected');
	}else{
		//Enable FlipBook
		$('.flipbook_container').fadeIn();
		$('#thumbnails_container .item').each(function(index){
			src = $(this).find('img').attr('data-src')
			if(src != 'images/not_found.png' & src != ''){
				$('#flipbook_container .flipbook').append('<div><img src="'+src+'"></div>');
			}
		});
		$(x).addClass('selected');
		enable_flipbook();
	}
}

function highlight_article(x){
	var status = '';
	if($(x).hasClass('selected')){
		$(x).removeClass('selected');
		status = 'disable';
		$('#ImageMapContainer').html('');
	}else{
		$(x).addClass('selected');
		status = 'enable';
	}

	$.post('val.php', {highlight_article:status}, function(data){
		if(data == 'enable'){
			load_image_maps();
		}
	});
}

function enable_zoom(x){
	if($(x).hasClass('selected')){
		$('.preview_container .paper .map').show();
		$(x).removeClass('selected');
		$('.preview_container .slices_container').trigger('zoom.destroy');
		$('.main_container .preview_container .paper .slices_container').removeClass('zoom_out');
		$('.preview_container .slices_container').css('cursor','default');
		$('.main_container .preview_container .paper .slices_container').removeAttr('style');

		//Disable Zoom (Mobile)
		$('.main_container .preview_container .paper .slices_container').draggable('destroy');
		$('.main_container .preview_container .paper').css('overflow','hidden');
		$('.main_container .preview_container .paper .slices_container img').css('width','100%');

		//Enable Swipe
		$(".preview_container .paper").swipe("enable");
	}else{
		//Remove jCrop
		if($('#crop_btn').hasClass('selected')){
			$('#crop_btn').removeClass('selected');
			$('.preview_container .paper .slices_container').data('Jcrop').destroy();
			destroy_jcrop();
		}

		//Disable Swipe
		$(".preview_container .paper").swipe("disable");
		
		$(x).addClass('selected');
		
		//Enable Zoom (Desktop)
		if($(window).width() > 700){
			// $('.preview_container .slices_container').zoom();
			// $('.preview_container .slices_container').css('cursor','zoom-in');
			// $('.preview_container .paper .map').hide();
			$('.main_container .preview_container .paper').css('overflow','visible');
			$('.main_container .preview_container .paper .slices_container').css('overflow','visible');
			$('.main_container .preview_container .paper .slices_container').addClass('zoom_out');
			$('.preview_container .paper .map').hide();
		}else{
			//Enable Zoom (Mobile)
			// $('.main_container .preview_container .paper .slices_container').draggable();
			// $('.main_container .preview_container .paper').css('overflow','auto');
			// $('.main_container .preview_container .paper .slices_container img').css('width','auto');
			show_zoom_popup();
		}
	}
}