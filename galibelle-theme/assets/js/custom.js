var map, term_id;

jQuery(document).ready(function($){
	
	// mobilmenu
	$( '#dl-menu' ).dlmenu();

	// slider home
	$('.carousel').carousel({
	  interval: false
	});
	$('.carousel').bcSwipe({ threshold: 50 });

	// small carousel
	$('.highlights-carousel').flickity({
			arrowShape: { 
			  x0: 10,
			  x1: 60, y1: 50,
			  x2: 55, y2: 40,
			  x3: 15
			},
			wrapAround    : true, 
            pageDots      : false,
            //adaptiveHeight: true,
	});


	/**
	 *
	 * accordion & search
	 */
	if ($(".contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .elements").exists()) {
		var resultslist = "";
		$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .elements li').each(function () {
			resultslist = $("<li />").append($(this).clone()).html() + resultslist;
		});
		$(".contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .contacts_elements").accordion({
			heightStyle: "content",
			//collapsible: true,
			autoHeight : false,
			//active     : 2
		});
		$(".contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .spravka_elements").accordion({
			heightStyle: "content",
			collapsible: true,
			autoHeight : false,
			active     : false
		});
	}

	// search
	if ($(".contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .sidebar .townfilter").exists()) {
		var delay = (function () {
			var timer = 0;
			return function (callback, ms) {
				clearTimeout(timer);
				timer = setTimeout(callback, ms);
			};
		})();
		var searchresultsbox = 0;
		var searchinputval;
		var searchinputvalcount = 0;

		$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .sidebar .townfilter').keyup(function () {
			searchinputval = $(this).val();
			if ($.trim($(this).val().length) >= 1) {
				if ($(this).val() == "") {
					$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .elements').removeClass('hide');
				} else {
					$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .elements').addClass('hide');
					if (searchresultsbox == 0) {
						$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .sidebar').append('<div class="searchresults" />');
						searchresultsbox = 1;
					}
					$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .sidebar .searchresults').html('<p class="search-results-label">Wait...</p>');
					delay(function () {
						if ($.trim($('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .sidebar .townfilter').val().length) >= 1) {
							if ($('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .sidebar .townfilter').val() != "") {
								$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .sidebar .searchresults').html('<p class="search-results-label">Search results:</p><ul></ul>');
								$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .sidebar .searchresults ul').html(resultslist);
								$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .sidebar .searchresults ul li').each(function () {
									if ($(this).children("a").text().toLowerCase().indexOf(searchinputval.toLowerCase()) >= 0) {
										$(this).addClass("show");
										searchinputvalcount = searchinputvalcount + 1;
									}
								});
								if (searchinputvalcount == 0) {
									$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .sidebar .searchresults').html('<p class="search-results-label">Nothing found</p>');
								}
								searchinputvalcount = 0;
							}
						}
					}, 500);
				}
			} else {
				$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .elements').removeClass('hide');
				$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .sidebar .searchresults').remove();
				searchresultsbox = 0;
			}
		});

	} // end search



	/**
	 * Клик на заголовок адреса и переход на вкладку карты
	 */
	// $(document).on('click', '.adres a', function () {

	// 	$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .content .list').removeClass('active');
	// 	$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .content .gmap').addClass('active');
	// 	$('.map_office').parents('ul').find('li').removeClass('active');
	// 	$('.map_office').parents('ul').find('li:first').addClass('active');

	// 	var fl = $('.contacts_elements');
	// 	fl.find('a').each(function(){
	// 		var a = $(this),
	// 			da = a.data('map-url');
	// 		a.attr('href',da);
	// 	});

	// 	var el = $(this),
	// 		Lat = el.data('lat') !== '' ? parseFloat(el.data('lat')) : '',
	// 		Long = el.data('lng') !== '' ? parseFloat(el.data('lng')) : '',
	// 		hash = '#gmap_'+Lat+'_'+Long+'_'+ el.parents('.box').attr('id');

	// 	var myLatlng = new google.maps.LatLng(Lat, Long);
	// 	map.panTo(myLatlng);
	// 	map.setZoom(15);

	// 	//window.location.hash = hash;
	// });
	
	/**
	 *
	 *  map
	 *
	 */

	// var places = [
	// 	['Киев', 50.4020355, 30.5326905, '<span class="gmap_point"></span>', 6],
	// 	['Не киев', 50.4220355, 30.5526905, '<span class="gmap_point"></span>', 6],
	// 	['Не киев', 50.3820355, 30.5026905, '<span class="gmap_point"></span>', 6]
	// ];

	var places = [];
	//window.map;

	if ($(".gmap").exists()) {
		function initialize() {
			//var term_id = $('.map_office').attr('data-term-id');
			//console.log("init term = " + term_id);
			
			// var beginmap = $('#gmap_portugal');
			// beginmap_Lat = beginmap.data('lat') !== '' ? parseFloat(beginmap.data('lat')) : '';
			// console.log(beginmap_Lat);
			// beginmap_Long = beginmap.data('lng') !== '' ? parseFloat(beginmap.data('lng')) : '';
			$portugal_Lat = '38.747592';
			$portugal_Long = '-9.145054399999935';

			var blueOceanStyles = [
			  {
			    featureType: "all",
			    stylers: [
			      { saturation: -80 }
			    ]
			  },{
			    featureType: "road.arterial",
			    elementType: "geometry",
			    stylers: [
			      { hue: "#00ffee" },
			      { saturation: 50 }
			    ]
			  },{
			    featureType: "poi.business",
			    elementType: "labels",
			    stylers: [
			      { visibility: "off" }
			    ]
			  }
			];
			
			var mapOptions = {
				zoom            : 12,
				center          : new google.maps.LatLng($portugal_Lat, $portugal_Long),
				disableDefaultUI: false,
				scaleControl    : false,
				scrollwheel     : false
			}
			//var map = new google.maps.Map(document.getElementById('g_map'), mapOptions);
			//setMarkers(map, places);
			if (document.getElementById("g_map")) {
				map = new google.maps.Map(document.getElementById("g_map"),
					mapOptions);
				map.setOptions({styles: blueOceanStyles});

				jQuery.ajax({
					url     : '/wp-admin/admin-ajax.php',
					type    : 'POST',
					dataType: 'json',
					data    : {
						'action': 'get_firms_places',
						//'term_id': term_id
					},
					success : function (response) {
						//console.log(response);
						places = response;
						setMarkers(map, places);
					}


				});
			}

			var map_marker;
			var markers_location = [];

			function Label2(opt_options) {
				this.setValues(opt_options);
				var div = this.div_ = document.createElement('div');
				div.style.cssText = 'position: absolute; display: none';
			}
			;
			Label2.prototype = new google.maps.OverlayView;
			Label2.prototype.onAdd = function () {
				var pane = this.getPanes();
				pane.overlayImage.appendChild(this.div_);
				var me = this;
				this.listeners_ = [
					google.maps.event.addListener(this, 'position_changed',
						function () {
							me.draw();
						}),
					google.maps.event.addListener(this, 'text_changed',
						function () {
							me.draw();
						})
				];
			};
			Label2.prototype.onRemove = function () {
				this.div_.parentNode.removeChild(this.div_);
				for (var i = 0, I = this.listeners_.length; i < I; ++i) {
					google.maps.event.removeListener(this.listeners_[i]);
				}
			};
			Label2.prototype.draw = function () {
				var projection = this.getProjection();
				var position = projection.fromLatLngToDivPixel(this.get('position'));
				var div = this.div_;
				div.className = 'gm_i_thumb';
				div.style.left = position.x + 'px';
				div.style.top = position.y + 'px';
				div.style.display = 'block';
				div.style.background = 'transparent';
				div.style.position = 'absolute';
				div.style.paddingLeft = '0px';
				div.style.cursor = 'pointer';
				div.style.width = '28px';
				div.style.height = '38px';
				div.style.marginTop = '-38px';
				div.style.marginLeft = '-14px';
				div.style.zIndex = '999';
				if (this.get('text')) {
					this.div_.innerHTML = this.get('text').toString();
				}
			};


			function setMarkers(map, locations) {
				var latlngbounds = new google.maps.LatLngBounds();
				// var image = new google.maps.MarkerImage('',
				// 	new google.maps.Size(72, 72),
				// 	new google.maps.Point(0, 0),
				// 	new google.maps.Point(0, 37));
				var image = {
			        url: js_url.imgurl+'marker.png', 
			    };
			    
				for (var i = 0; i < places.length; i++) {
					var myLatLng = new google.maps.LatLng(locations[i][1], locations[i][2], locations[i][3]);
					latlngbounds.extend(myLatLng);
					var marker = new google.maps.Marker({
						position : myLatLng,
						map      : map,
						icon     : image,
						draggable: false,
						img      : locations[i][3]
					});
					marker.setAnimation(google.maps.Animation.DROP);
					var label2 = new Label2({
						map: map
					});
					label2.bindTo('position', marker, 'position');
					label2.bindTo('text', marker, 'img');
				}
			}

			if (window.location.href.match(/\#gmap_/)) {

				var wlh = window.location.hash,
					wlhs = wlh.split('_'),
					s = wlhs.length;

				$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .content .list').removeClass('active');
				$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .content .gmap').addClass('active');
				$('.map_office').parents('ul').find('li').removeClass('active');
				$('.map_office').parent().addClass('active');


				var fl = $('.contacts_elements');
				fl.find('a').each(function(){
					var a = $(this),
						da = a.data('map-url');
					a.attr('href',da);
				});

				if(s === 2){
					if(!$(wlh).parents('.ui-accordion-content').hasClass('ui-accordion-content-active')){
						$(wlh).parents('.ui-accordion-content').prev().click();
					}
					$(wlh).trigger('click');
					setTimeout(function(){
						map.setZoom(17);
					},200);

				} else if(s === 4) {
					var x = wlhs[1],
						y = wlhs[2],
						t = wlhs[3];


					console.log(x);
					console.log(y);
					console.log(t);

					if(!$('#gmap_'+t).parents('.ui-accordion-content').hasClass('ui-accordion-content-active')){
						$('#gmap_'+t).parents('.ui-accordion-content').prev().click();
					}

					$('#gmap_'+t).trigger('click');

					var latlngbounds = new google.maps.LatLngBounds();
					var myLatLng = new google.maps.LatLng(x, y);
					map.panTo(myLatLng);
					map.setZoom(17);
					$('body,html').animate({scrollTop: $('.content').offset().top - 50}, 400);
				}

			}

			else if(window.location.href.match(/\#list_/)) {

				$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .content .list').addClass('active');
				$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .content .gmap').removeClass('active');
				$('.map_office').parents('ul').find('li').removeClass('active');
				$('.map_office').parents('ul').find('li:first').addClass('active');

				var fl = $('.contacts_elements');
				fl.find('a').each(function(){
					var a = $(this),
						da = a.data('list-url');
					a.attr('href',da);
				});

				var wlh = window.location.href,
					id = $('a[data-list-url="'+wlh+'"]').attr('id');
					if(!$('#'+id).parents('.ui-accordion-content').hasClass('ui-accordion-content-active')){
						$('#'+id).parents('.ui-accordion-content').prev().click();
					}
					$('#'+id).trigger('click');
			}

		}

		google.maps.event.addDomListener(window, 'load', initialize);

	} // end map



	/**
	 * click sidebar go to map
	 */
	$(document).on('click', '.adres a', function () {

		$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .content .list').removeClass('active');
		$('.contacts_content_with_sidebar_wrap .contacts_content_with_sidebar .content .gmap').addClass('active');
		$('.map_office').parents('ul').find('li').removeClass('active');
		$('.map_office').parents('ul').find('li:first').addClass('active');

		var fl = $('.contacts_elements');
		fl.find('a').each(function(){
			var a = $(this),
				da = a.data('map-url');
			a.attr('href',da);
		});

		var el = $(this),
			Lat = el.data('lat') !== '' ? parseFloat(el.data('lat')) : '',
			Long = el.data('lng') !== '' ? parseFloat(el.data('lng')) : '',
			hash = '#gmap_'+Lat+'_'+Long+'_'+ el.parents('.box').attr('id');

		var myLatlng = new google.maps.LatLng(Lat, Long);
		map.panTo(myLatlng);
		map.setZoom(15);

		//window.location.hash = hash;
	});

	// ajax
	var click_load = 0;

	
	$(document).on('click', '.firm_adress li a, .region-link, .contacts_content_with_sidebar .searchresults .show a', function (e) {
		var obj = $(this),
			term_id = obj.data('tax-id'),
			href = obj.attr('href'),
			hs = href.split('#'),
			hash = hs[1];

		e.preventDefault();

		$('#firms_list').css({
			'opacity': 0.3
		});

		window.location.hash = hs[1];

		$.ajax({
			type    : "POST",
			url     : "/wp-admin/admin-ajax.php",
			dataType: "json",
			data    : "action=deco_get_firms_by_region&term_id=" + term_id,
			success : function (a) {

				if (a.content) {
					$('#firms_list').html(a.content).css({
						'opacity': '1'
					});

					var x = [];

					$(a.content).find('.smap-link').each(function(m){
						var el = $(this),
							long = el.data('lng'),
							lat = el.data('lat');
						var e = '['+lat+','+long+']';
						x[m] = e;
					});

					if (x.length !== 1) {

						var latlngbounds = new google.maps.LatLngBounds();
						for (var i = 0; i < x.length; i++) {

							var b = x[i].replace('[','').replace(']',''),
								bspl = b.split(','),
								lat = bspl[0],
								lng = bspl[1];

							var myLatLng = new google.maps.LatLng(lat,lng);
							latlngbounds.extend(myLatLng);

						}
						map.setCenter(latlngbounds.getCenter(), map.fitBounds(latlngbounds));

					}
					else {

						var latlngbounds = new google.maps.LatLngBounds();
						var b = x[0].replace('[','').replace(']',''),
							bspl = b.split(','),
							lat = bspl[0],
							lng = bspl[1];
						var myLatLng = new google.maps.LatLng(lat,lng);
						map.panTo(myLatLng);
						map.setZoom(17);

					}

					if(!obj.hasClass('region-link')){
						$('.firm_adress a').removeClass('current');
						obj.addClass('current');
					}

					$('body,html').animate({scrollTop: $('.content').offset().top - 50}, 400);

				}

			}
		});

	}); // end ajax



}); //end ready

// helper
jQuery.fn.exists = function(){return this.length>0;}
