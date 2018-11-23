/*global jQuery:false */
jQuery(document).ready(function($) {
"use strict";

	
		//add some elements with animate effect

		$(".big-cta").hover(
			function () {
			$('.cta a').addClass("animated shake");
			},
			function () {
			$('.cta a').removeClass("animated shake");
			}
		);
		$(".box").hover(
			function () {
			$(this).find('.icon').addClass("animated fadeInDown");
			$(this).find('p').addClass("animated fadeInUp");
			},
			function () {
			$(this).find('.icon').removeClass("animated fadeInDown");
			$(this).find('p').removeClass("animated fadeInUp");
			}
		);
		
		
		$('.accordion').on('show', function (e) {
		
			$(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
			$(e.target).prev('.accordion-heading').find('.accordion-toggle i').removeClass('icon-plus');
			$(e.target).prev('.accordion-heading').find('.accordion-toggle i').addClass('icon-minus');
		});
		
		$('.accordion').on('hide', function (e) {
			$(this).find('.accordion-toggle').not($(e.target)).removeClass('active');
			$(this).find('.accordion-toggle i').not($(e.target)).removeClass('icon-minus');
			$(this).find('.accordion-toggle i').not($(e.target)).addClass('icon-plus');
		});	
		
		
		//register/login form
$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});

		
		// tooltip
		$('.social-network li a, .options_box .color a').tooltip();
		
		
		//stats
		jQuery('.appear').appear();
		var runOnce = true;
		jQuery(".stats").on("appear", function(data) {
			var counters = {};
			var i = 0;
			if (runOnce){
				jQuery('.number').each(function(){
					counters[this.id] = $(this).html();
					i++;
				});
				jQuery.each( counters, function( i, val ) {
					//console.log(i + ' - ' +val);
					jQuery({countNum: 0}).animate({countNum: val}, {
					  duration: 3000,
					  easing:'linear',
					  step: function() {
						jQuery('#'+i).text(Math.floor(this.countNum));
					  }
					});
				});
				runOnce = false;
			}
		});
		
		//parallax
        if ($('.parallax').length)
        {
			$(window).stellar({
				responsive:true,
                scrollProperty: 'scroll',
                parallaxElements: false,
                horizontalScrolling: false,
                horizontalOffset: 0,
                verticalOffset: 0
            });

        }


		
		//scroll to top
		$(window).scroll(function(){
			if ($(this).scrollTop() > 100) {
				$('.scrollup').fadeIn();
				} else {
				$('.scrollup').fadeOut();
			}
		});
		$('.scrollup').click(function(){
			$("html, body").animate({ scrollTop: 0 }, 1000);
				return false;
		});

	

				
	//search
	new UISearch( document.getElementById( 'sb-search' ) );
	
	//cube portfolio
	    var gridContainer = $('#grid-container'),
        filtersContainer = $('#filters-container');

	// init cubeportfolio
    gridContainer.cubeportfolio({

        defaultFilter: '*',

        animationType: 'flipOutDelay',

        gapHorizontal: 45,

        gapVertical: 30,

        gridAdjustment: 'responsive',

        caption: 'overlayBottomReveal',

        displayType: 'lazyLoading',

        displayTypeSpeed: 100,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxShowCounter: true
		
		});

    // add listener for filters click
    filtersContainer.on('click', '.cbp-filter-item', function (e) {

        var me = $(this), wrap;

        // get cubeportfolio data and check if is still animating (reposition) the items.
        if ( !$.data(gridContainer[0], 'cubeportfolio').isAnimating ) {

            if ( filtersContainer.hasClass('cbp-l-filters-dropdown') ) {
                wrap = $('.cbp-l-filters-dropdownWrap');

                wrap.find('.cbp-filter-item').removeClass('cbp-filter-item-active');

                wrap.find('.cbp-l-filters-dropdownHeader').text(me.text());

                me.addClass('cbp-filter-item-active');
            } else {
                me.addClass('cbp-filter-item-active').siblings().removeClass('cbp-filter-item-active');
            }

        }

        // filter the items
        gridContainer.cubeportfolio('filter', me.data('filter'), function () {});

    });

    // activate counters
    gridContainer.cubeportfolio('showCounter', filtersContainer.find('.cbp-filter-item'));


    // add listener for load more click
    $('.cbp-l-loadMore-button-link').on('click', function(e) {

        e.preventDefault();

        var clicks, me = $(this), oMsg;

        if (me.hasClass('cbp-l-loadMore-button-stop')) return;

        // get the number of times the loadMore link has been clicked
        clicks = $.data(this, 'numberOfClicks');
        clicks = (clicks)? ++clicks : 1;
        $.data(this, 'numberOfClicks', clicks);

        // set loading status
        oMsg = me.text();
        me.text('LOADING...');

        // perform ajax request
        $.ajax({
            url: me.attr('href'),
            type: 'GET',
            dataType: 'HTML'
        })
        .done( function (result) {
            var items, itemsNext;

            // find current container
            items = $(result).filter( function () {
                return $(this).is('div' + '.cbp-loadMore-block' + clicks);
            });

            gridContainer.cubeportfolio('appendItems', items.html(),
                 function () {
                    // put the original message back
                    me.text(oMsg);

                    // check if we have more works
                    itemsNext = $(result).filter( function () {
                        return $(this).is('div' + '.cbp-loadMore-block' + (clicks + 1));
                    });

                    if (itemsNext.length === 0) {
                        me.text('NO MORE WORKS');
                        me.addClass('cbp-l-loadMore-button-stop');
                    }

                 });

        })
        .fail(function() {
            // error
        });

    });

});
function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
function show_info(id)
{
    $.ajax({
      url: "/show-info/"+id,
      context: document.body
    }).done(function(response) {
        data = JSON.parse(response);
        $('.cars_avt').attr('src','/server/img/cars/'+data.cars.cars_image);
        $('#cars_name').html(data.cars.cars_name);
        $('#cars_source').html(data.cars.cars_source);
        $('#cars_price').html(addCommas(data.cars.cars_price+"đ"));
        $('#cars_promotion_price').html(addCommas(data.cars.cars_promotion_price+"đ"));
        $('#cars_size').html(data.cars.cars_size);
        $.each(data.categories,function(key,val){
            if(data.cars.cars_category_id == val.category_cars_id)
            {
                $('.cars_category').html(val.category_cars_name);
            }
        });
        $.each(data.styles,function(key,val){
            if(data.cars.cars_style_id == val.style_cars_id)
            {
                $('.cars_style').html(val.style_cars_name);
            }
        });
        $('#cars_gas_tank').html(data.cars.cars_gas_tank);
        $('#cars_engine').html(data.cars.cars_engine);
        $('#cars_capacity').html(data.cars.cars_capacity);
        $('#cars_momen').html(data.cars.cars_momen);
        $('#cars_light_roar').html(data.cars.cars_light_roar);
        $('#cars_diameter_spin_min').html(data.cars.cars_diameter_spin_min);
        $('#cars_gear').html(data.cars.cars_gear);
        $('#cars_fuel_consumption').html(data.cars.cars_fuel_consumption);
        
        var check_equipment = [
            {'id':'cars_brake_abs','name':"Chống bó cứng phanh (ABS) : "},
            {'id':'cars_brake_ebd','name':"Phân bổ lực phanh điện tử (EBD) : "},
            {'id':'cars_brake_ba','name':"Hỗ trợ phanh khẩn cấp (BA) : "},
            {'id':'cars_electric_balance_eps','name':"Cân bằng điện tử (ESP) : "},
            {'id':'cars_control_degree_grip','name':"Kiểm soát độ bám đường (TRC) : "},
            {'id':'cars_air_bag','name':"Túi khí : "},
            {'id':'cars_electric_support_eps','name':"Trợ lực điện (EPS) : "},
            {'id':'cars_support_start_steep','name':"Hỗ trợ khởi hành ngang dốc (HAS) : "},
            {'id':'cars_cruise_control','name':"Điều khiển hành trình (Cruise Control) : "},
            {'id':'cars_run_mode','name':"Lựa chọn chế độ chạy : "},
            {'id':'cars_electric_hand_brake','name':"Phanh tay điện tử : "},
            {'id':'cars_smart_lock','name':"Chìa khóa thông minh : "},
            {'id':'cars_headlight','name':"Đèn pha : ",},
            {'id':'cars_auto_headlight','name':"Đèn pha tự động : "},
            {'id':'cars_auto_headlight_afs','name':"Đèn pha tự động điều chỉnh góc chiếu (AFS) : "},
            {'id':'cars_auto_wiper','name':"Gạt mưa tự động : "},
            {'id':'cars_interiar_materials','name':"Chất liệu nội thất : "},
            {'id':'cars_air_conditioning','name':"Điều hòa : "},
            {'id':'cars_after_cooler','name':"Dàn lạnh cho hàng ghế sau : "},
            {'id':'cars_after_wind_door','name':"Cửa gió cho hàng ghế sau : "},
            {'id':'cars_mirror_anti_dazzle','name':"Gương chiếu hậu chống chói : "},
            {'id':'cars_seat','name':"Ghế lái : "},
            {'id':'cars_seat_glass_door','name':"Cửa kính ghế lái : "},
            {'id':'cars_speakers','name':"Hệ thống loa (cái) : "},
            {'id':'cars_bluetooth','name':"Kết nối Bluetooth : "},
            {'id':'cars_usb','name':"Đầu cắm USB : "},
            {'id':'cars_camera_back','name':"Camera lùi : "},
            {'id':'cars_sensor_distance','name':"Cảm biến khoảng cách : "},
            {'id':'cars_out_window','name':"Cửa sổ trời : "},
        ];
        

        $.each(check_equipment,function(check_equipment_key, check_equipment_value){
            $.each(data.cars,function(cars_key,cars_value){
                if(cars_key == check_equipment_value.id)
                {
                    if(cars_value == 1 || cars_value == '1')
                        cars_value = "Có";
                    if(cars_value == 0 || cars_value == '0')
                        cars_value = "Không";
                    $('.trangbi .row').append('<div class="col-lg-6"><label>'+check_equipment_value.name+'<label><span class=\'span_equipment\'>'+cars_value+'</span></div>');
                }
            });
            
        });
    });

}





function add_compare(id)
{
    $.ajax({
      url: "add-compare/"+id,
      context: document.body,
      type: 'GET',
    }).done(function(response) {
        $('#content-compare').load('add-compare/'+id);
        //console.log(response);
    });
}
$(document).ready(function(){
    $('#search_keyup').keyup(function(){
        search_li($(this).val());
        search_car($(this).val());
    });
    function search_li(value){
        $('.li_cars_search').each(function(){
            var found = 'false';
            $(this).each(function(){
                if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                {
                    found = 'true';
                }
                if(found == 'true')
                {
                    $(this).show();
                }
                else {
                    $(this).hide();
                }
            })
        })
    }
    function search_car(value){
        $('.search_car').each(function(){
            var found = 'false';
            $(this).each(function(){
                if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                {
                    found = 'true';
                }
                if(found == 'true')
                {
                    $(this).show();
                }
                else {
                    $(this).hide();
                }
            })
        })
    }


    $('#content-compare').load('/search-compare');

})
