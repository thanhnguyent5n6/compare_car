
function number_format( number, decimals, dec_point, thousands_sep ) {
    // http://kevin.vanzonneveld.net
    // + original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // + bugfix by: Michael White (http://crestidg.com)
    // + bugfix by: Benjamin Lupton
    // + bugfix by: Allan Jensen (http://www.winternet.no)
    // + revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // * example 1: number_format(1234.5678, 2, '.', '');
    // * returns 1: 1234.57
                              
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                              
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
var edit_category = function(id){
    $.ajax({
      url: "http://localhost:8000/admin/category-cars-edit/"+id,
      context: document.body,
    }).done(function(response) {
        var data = JSON.parse(response);
        $('#txt-category-name').val(data.category_cars_name);
        $('#txt-category-name').attr("key_id",data.category_cars_id);
    });

}

var do_edit_category = function(){
    var post_update_id = $('#txt-category-name').attr("key_id");
    var name = $('#txt-category-name').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
      url: "http://localhost:8000/admin/category-cars-do-edit/"+post_update_id,
      type: 'POST',
      data: {"name":name},
      dataType: "text",
      success: function(response) 
      {
        location.reload();
      }
    });
}
var edit_style = function(id){
    $.ajax({
      url: "http://localhost:8000/admin/style-cars-edit/"+id,
      context: document.body,
    }).done(function(response) {
        var data = JSON.parse(response);
        $('#txt-style-name').val(data.style_cars_name);
        $('#txt-style-name').attr("key_id",data.style_cars_id);
    });

}

var do_edit_style = function(){
    var post_update_id = $('#txt-style-name').attr("key_id");
    var name = $('#txt-style-name').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
      url: "http://localhost:8000/admin/style-cars-do-edit/"+post_update_id,
      type: 'POST',
      data: {"name":name},
      dataType: "text",
      success: function(response){
        location.reload();
      }
    });
}
var destroy_car = function(id)
{
  var r = confirm("Bạn có muốn xóa?");
  if (r == true) 
  {
    $.ajax({
    url: "http://localhost:8000/admin/delete-car/"+id,
    type: 'GET',
    context: document.body,
    }).done(function(){
      location.reload();
    });
  } 
}
var edit_car = function(id){
  $.ajax({
    url: "/admin/cars/edit/"+id,
    context: document.body,
    }).done(function(response) {
        
        var data = JSON.parse(response);
        $('.cars_avt').attr('src','/server/img/cars/'+data.car.cars_image);
        $('#edit_cars_name').attr('value',data.car.cars_name);
        $('#edit_cars_source').attr('value',data.car.cars_source);
        $.each(data.category,function(key, val){
          $('.sel_cars_category').append("<option class='opt_edit_car_cate' value="+val.category_cars_id+">"+val.category_cars_name+"</option>");
          if(data.car.cars_category_id == val.category_cars_id)
          {
            $('.opt_edit_car_cate').attr('selected','selected');
          }
        });
        $.each(data.style,function(key, val){
          $('.sel_cars_style').append("<option class='opt_edit_car_style' value="+val.style_cars_id+">"+val.style_cars_name+"</option>");
          if(data.car.cars_style_id == val.style_cars_id)
          {
            $('.opt_edit_car_style').attr('selected','selected');
          }
        });
        $('#edit_cars_price').attr('value',data.car.cars_price);
        $('#edit_cars_promotion_price').attr('value',data.car.cars_promotion_price);
        //status
        if(data.car.cars_status == 1){
          $("input[name='edit_cars_status']").prop('checked',true);
        }
        if(data.car.cars_status == 0){
          $("input[name='edit_cars_status']").prop('checked',false);
        }
        //size
        $('#edit_cars_size').attr('value',data.car.cars_size);
        $('#edit_cars_weight').attr('value',data.car.cars_weight);
        $('#edit_cars_gas_tank').attr('value',data.car.cars_gas_tank);
        $('#edit_cars_engine').attr('value',data.car.cars_engine);
        $('#edit_cars_capacity').attr('value',data.car.cars_capacity);
        $('#edit_cars_momen').attr('value',data.car.cars_momen);
        $('#edit_cars_light_roar').attr('value',data.car.cars_light_roar);
        $('#edit_cars_diameter_spin_min').attr('value',data.car.cars_diameter_spin_min);
        $('#edit_cars_gear').attr('value',data.car.cars_gear);
        $('#edit_cars_fuel_consumption').attr('value',data.car.cars_fuel_consumption);
        $('#edit_cars_air_bag').attr('value',data.car.cars_air_bag);
        $('#edit_cars_headlight').attr('value',data.car.cars_headlight);
        $('#edit_cars_interiar_materials').attr('value',data.car.cars_interiar_materials);
        $('#edit_cars_air_conditioning').attr('value',data.car.cars_air_conditioning);
        $('#edit_cars_seat').attr('value',data.car.cars_seat);
        $('#edit_cars_seat_glass_door').attr('value',data.car.cars_seat_glass_door);
        $('#edit_cars_speakers').attr('value',data.car.cars_speakers);
        // id
        $('#update_id').attr('value',data.car.cars_id);

        //status
        if(data.car.cars_brake_abs == 1){
          $("input[name='edit_cars_brake_abs']").prop('checked',true);
        }
        if(data.car.cars_brake_abs == 0){
          $("input[name='edit_cars_brake_abs']").prop('checked',false);
        }//cars_brake_ebd
        if(data.car.cars_brake_ebd == 1){
          $("input[name='edit_cars_brake_ebd']").prop('checked',true);
        }
        if(data.car.cars_brake_ebd == 0){
          $("input[name='edit_cars_brake_ebd']").prop('checked',false);
        }//cars_brake_ba
        if(data.car.cars_brake_ba == 1){
          $("input[name='edit_cars_brake_ba']").prop('checked',true);
        }
        if(data.car.cars_brake_ba == 0){
          $("input[name='edit_cars_brake_ba']").prop('checked',false);
        }//cars_electric_balance_eps
        if(data.car.cars_electric_balance_eps == 1){
          $("input[name='edit_cars_electric_balance_eps']").prop('checked',true);
        }
        if(data.car.cars_electric_balance_eps == 0){
          $("input[name='edit_cars_electric_balance_eps']").prop('checked',false);
        }
        //edit_cars_electric_support_eps
        if(data.car.cars_electric_support_eps == 1){
          $("input[name='edit_cars_electric_support_eps']").prop('checked',true);
        }
        if(data.car.cars_electric_support_eps == 0){
          $("input[name='edit_cars_electric_support_eps']").prop('checked',false);
        }
        //edit_cars_control_degree_grip
        if(data.car.cars_control_degree_grip == 1){
          $("input[name='edit_cars_control_degree_grip']").prop('checked',true);
        }
        if(data.car.cars_control_degree_grip == 0){
          $("input[name='edit_cars_control_degree_grip']").prop('checked',false);
        }
        //edit_cars_support_start_steep
        if(data.car.cars_support_start_steep == 1){
          $("input[name='edit_cars_support_start_steep']").prop('checked',true);
        }
        if(data.car.cars_support_start_steep == 0){
          $("input[name='edit_cars_support_start_steep']").prop('checked',false);
        }
//edit_cars_cruise_control
        if(data.car.cars_cruise_control == 1){
          $("input[name='edit_cars_cruise_control']").prop('checked',true);
        }
        if(data.car.cars_cruise_control == 0){
          $("input[name='edit_cars_cruise_control']").prop('checked',false);
        }
//edit_cars_run_mode
        if(data.car.cars_run_mode == 1){
          $("input[name='edit_cars_run_mode']").prop('checked',true);
        }
        if(data.car.cars_run_mode == 0){
          $("input[name='edit_cars_run_mode']").prop('checked',false);
        }
//edit_cars_electric_hand_brake
        if(data.car.cars_electric_hand_brake == 1){
          $("input[name='edit_cars_electric_hand_brake']").prop('checked',true);
        }
        if(data.car.cars_electric_hand_brake == 0){
          $("input[name='edit_cars_electric_hand_brake']").prop('checked',false);
        }
        //edit_cars_smart_lock
        if(data.car.cars_smart_lock == 1){
          $("input[name='edit_cars_smart_lock']").prop('checked',true);
        }
        if(data.car.cars_smart_lock == 0){
          $("input[name='edit_cars_smart_lock']").prop('checked',false);
        }
        //edit_cars_auto_headlight
        if(data.car.cars_auto_headlight == 1){
          $("input[name='edit_cars_auto_headlight']").prop('checked',true);
        }
        if(data.car.cars_auto_headlight == 0){
          $("input[name='edit_cars_auto_headlight']").prop('checked',false);
        }
        //edit_cars_auto_headlight_afs
        if(data.car.cars_auto_headlight_afs == 1){
          $("input[name='edit_cars_auto_headlight_afs']").prop('checked',true);
        }
        if(data.car.cars_auto_headlight_afs == 0){
          $("input[name='edit_cars_auto_headlight_afs']").prop('checked',false);
        }
        //edit_cars_auto_wiper
        if(data.car.cars_auto_wiper == 1){
          $("input[name='edit_cars_auto_wiper']").prop('checked',true);
        }
        if(data.car.cars_auto_wiper == 0){
          $("input[name='edit_cars_auto_wiper']").prop('checked',false);
        }
        //edit_cars_after_cooler
        if(data.car.cars_after_cooler == 1){
          $("input[name='edit_cars_after_cooler']").prop('checked',true);
        }
        if(data.car.cars_after_cooler == 0){
          $("input[name='edit_cars_after_cooler']").prop('checked',false);
        }
        //edit_cars_after_wind_door
        if(data.car.cars_after_wind_door == 1){
          $("input[name='edit_cars_after_wind_door']").prop('checked',true);
        }
        if(data.car.cars_after_wind_door == 0){
          $("input[name='edit_cars_after_wind_door']").prop('checked',false);
        }
        //edit_cars_mirror_anti_dazzle
        if(data.car.cars_mirror_anti_dazzle == 1){
          $("input[name='edit_cars_mirror_anti_dazzle']").prop('checked',true);
        }
        if(data.car.cars_mirror_anti_dazzle == 0){
          $("input[name='edit_cars_mirror_anti_dazzle']").prop('checked',false);
        }
        //edit_cars_bluetooth
        if(data.car.cars_bluetooth == 1){
          $("input[name='edit_cars_bluetooth']").prop('checked',true);
        }
        if(data.car.cars_bluetooth == 0){
          $("input[name='edit_cars_bluetooth']").prop('checked',false);
        }
        //edit_cars_usb
        if(data.car.cars_usb == 1){
          $("input[name='edit_cars_usb']").prop('checked',true);
        }
        if(data.car.cars_usb == 0){
          $("input[name='edit_cars_usb']").prop('checked',false);
        }
        //edit_cars_camera_back
        if(data.car.cars_camera_back == 1){
          $("input[name='edit_cars_camera_back']").prop('checked',true);
        }
        if(data.car.cars_camera_back == 0){
          $("input[name='edit_cars_camera_back']").prop('checked',false);
        }
        //edit_cars_sensor_distance
        if(data.car.cars_sensor_distance == 1){
          $("input[name='edit_cars_sensor_distance']").prop('checked',true);
        }
        if(data.car.cars_sensor_distance == 0){
          $("input[name='edit_cars_sensor_distance']").prop('checked',false);
        }
        //edit_cars_out_window
        if(data.car.cars_out_window == 1){
          $("input[name='edit_cars_out_window']").prop('checked',true);
        }
        if(data.car.cars_out_window == 0){
          $("input[name='edit_cars_out_window']").prop('checked',false);
        }
    });
}

var update_car = function(){
  var data = $('#form-edit-car').serialize();
  var id = $('#update_id').val();

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    url: "/admin/cars/edit/"+id,
    type: "POST",
    enctype: 'multipart/form-data',
    processData: true,  // Important!
    
    data: data,
  }).done(function(response) {
    // var data = JSON.parse(response);
    if(response == 1)
    {
      location.reload();
    }
  });
}

function uploadImage(){

  var id = $('#update_id').val();

  var file_data = $('#updateImage').prop('files')[0];   
  var form_data = new FormData();                  
  form_data.append('cars_image', file_data);
  //console.log(form_data.get('cars_image'));
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });            
  $.ajax({
      url: '/admin/cars/editimg/'+id, // point to server-side PHP script 
      type: 'POST',
      enctype: 'multipart/form-data',
      processData: false,
      contentType: false,
      data: form_data,
   }).done(function(response){
    $('.cars_avt').attr('src','/server/img/cars/'+response);
   });
}


$(document).ready(function(){
  // PHƯƠNG THỨC SHOW HÌNH LOADING
    function loading_show(){
        $('#loading').html('<img src="img/loading.gif" style="height: 300px; margin-left: 30%; ">').fadeIn('fast');
    }

    // PHƯƠNG THỨC ẨN HÌNH LOADING
    function loading_hide(){
        $('#loading').fadeOut('fast');
    }
    


    
})
// xem theo danh mục
function change_category(){
  var id = $('#sel_category_car').val();
  $.ajax({
    url: '/admin/cars/searchCategory/'+id,
    type: 'GET',
  }).done(function(response){
    $('.list-car').html(response);
  });
}

// xem theo kiểu dáng
function change_style(){
  var id = $('#sel_style_car').val();
  $.ajax({
    url: '/admin/cars/searchStyle/'+id,
    type: 'GET',
 }).done(function(response){
    $('.list-car').html(response);
 });
}