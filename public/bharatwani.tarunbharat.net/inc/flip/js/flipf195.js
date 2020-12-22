function zoomout_prev(){
	$('.flipbook').turn("previous");
}

function zoomout_next(){
	$('.flipbook').turn("next");
}

function zoomin_flipbook(){
	$(".flipbook").turn("zoom", 2.0);
	$('.flipbook_container').scrollLeft(450, screen.height/2);
	//window.scrollTo(screen.width/2, screen.height/2);
}

function zoomout_flipbook(){
	$(".flipbook").turn("zoom", 1.0);
	$('.flipbook_container').scrollLeft(0, screen.height/2);
}

function disable_flipbook(){
	// location.reload();
	$(".flipbook").turn('destroy').remove();
	$('.flipbook_container').fadeOut();
	$('.flipbook_container').html(`<div class="close" onclick="disable_flipbook()"><i class="fa fa-times"></i></div>
		<div class="zoom_in" onclick="zoomin_flipbook()"><i class="fa fa-search-plus"></i></div>
		<div class="zoom_out" onclick="zoomout_flipbook()"><i class="fa fa-search-minus"></i></div>
		<div class="prev" onclick="zoomout_prev()"><i class="fa fa-chevron-left"></i></div>
		<div class="next" onclick="zoomout_next()"><i class="fa fa-chevron-right"></i></div>
		<div class="flipbook-viewport">
			<div class="container">
				<div class="flipbook"></div>
			</div>
		</div>`);
	$('#flipbook_btn').removeClass('selected');
	$('body').css('overflow','auto');
}

function loadApp(){
	if(window.location.href.indexOf('annualreport.dnsbank.in') != -1){
		// Create the flipbook
		$('.flipbook').turn({
			// Width
			width:922,
			// Height
			height:600,
			// Elevation
			elevation: 50,
			// Enable gradients
			gradients: true,
			// Auto center this flipbook
			autoCenter: true
		});
	}else{
	 	// Create the flipbook
		$('.flipbook').turn({
			'display':'single',
			// Width
			width:922,
			// Height
			height:600,
			// Elevation
			elevation: 50,
			// Enable gradients
			gradients: true,
			// Auto center this flipbook
			autoCenter: true
		});
	}
}

function enable_flipbook(){
	// Load the HTML4 version if there's not CSS transform
	yepnope({
		test : Modernizr.csstransforms,
		yep: ['inc/flip/js/turn.js'],
		nope: ['inc/flip/js/turn.html4.min.js'],
		both: ['inc/flip/css/basic.css'],
		complete: loadApp
	});
	loadApp();
}