/*!

 =========================================================
 * Material Bootstrap Wizard - v1.0.2
 =========================================================
 
 * Product Page: https://www.creative-tim.com/product/material-bootstrap-wizard
 * Copyright 2017 Creative Tim (http://www.creative-tim.com)
 * Licensed under MIT (https://github.com/creativetimofficial/material-bootstrap-wizard/blob/master/LICENSE.md)
 
 =========================================================
 
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 */

// Material Bootstrap Wizard Functions

var searchVisible = 0;
var transparent = true;
var mobile_device = false;
$('#submitbtn').removeAttr("disabled");

$(document).ready(function(event){

    $( "#educationinstitution").autocomplete({

        source: function(request, response) {
            $.ajax({
                url: "autocompleteinstitution",
                data: {
                    insvalue : $("#educationinstitution").val()
                },
                dataType: "json",
                success: function(data){
                    var resp = $.map(data,function(obj){
                        //console.log(obj.city_name);
                        return obj;
                    });

                    response(resp);
                }
            });
        },
       
    });

    $( "#traininginstitution").autocomplete({

        source: function(request, response) {
            $.ajax({
                url: "autocompleteinstitution",
                data: {
                    insvalue : $("#traininginstitution").val()
                },
                dataType: "json",
                success: function(data){
                    var resp = $.map(data,function(obj){
                        //console.log(obj.city_name);
                        return obj;
                    });

                    response(resp);
                }
            });
        },
        minLength: 1
    });

    $( "#trainingcourse").autocomplete({

        source: function(request, response) {
            $.ajax({
                url: "autocompletecourse",
                data: {
                    coursevalue : $("#trainingcourse").val()
                },
                dataType: "json",
                success: function(data){
                    var resp = $.map(data,function(obj){
                        //console.log(obj.city_name);
                        return obj;
                    });

                    response(resp);
                }
            });
        },
        minLength: 1
    });

    /*$('.rating').rating({
        size: 'sm'
    });*/

    //panel hide
    $('.showhide').attr('title','Hide Panel content');
    $(document).on('click', '.panel-heading .clickable', function(e){
        var $this = $(this);
        if(!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.removeClass('material-icons').text("keyboard_arrow_up").addClass('material-icons').text("keyboard_arrow_down");
            $('.showhide').attr('title','Show Panel content');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.removeClass('material-icons').text("keyboard_arrow_down").addClass('material-icons').text("keyboard_arrow_up");
            $('.showhide').attr('title','Hide Panel content');
        }
    });

    $('input.line').each(function() {
        var self = $(this),
            label = self.next(),
            label_text = label.text();

        label.remove();
        self.iCheck({
            checkboxClass: 'icheckbox_line-red',
            radioClass: 'iradio_line-red',
            increaseArea: '20%',
            insert: '<div class="icheck_line-icon"></div>' + label_text
        });
    });

    $("#select22,#specialneeds").select2({
        theme: "bootstrap",
        placeholder: "Select special needs ",
        width: "500px"
    });


    $("#provinces,#gender,#kadaa,#city,#country,#major").select2({
        theme: "bootstrap",

        width: "200px"
    });

    $(".languageselect").select2({
        theme: "bootstrap",
        placeholder: "Select",
        width: "100px"
    });

    $("#educationyear,#worktime").select2({
        theme: "bootstrap",
        placeholder: "",
        width: "110px"
    });

    $.material.init();

    /*  Activate the tooltips      */
    $('[rel="tooltip"]').tooltip();
    var email=$("#email").val();
    var pic=$("#wizard-picture").val();
    pic=pic.replace("C:\\fakepath\\","");

    // Code for the Validator
    var $validator = $('.wizard-card form').validate({
		  rules: {
		    first_name: {
		      required: true,
		      minlength: 3
		    },
		    last_name: {
		      required: true,
		      minlength: 3
		    },
		    email: {
		      required: true,
		      minlength: 3,
                remote: {
                    url: "checkemail/"+email,
                    type: "get",
                    message:"Email already used"
                }
		    },
           /* phone: {
                required: true,
                  minlength: 6,
              },*/
            password: {
               required: true,
               minlength: 6,
            },
              password_confirm: {
                  required: true,
                  minlength: 6,
                  equalTo: "#password"
            },
            dob: {
                required: true
            },
            gender: {
                required: true
            },
            country: {
                required: true
            },
              provinceId: {
               required: true
            },
              kadaaId:{
                  required: true
              },
              city:{
                  required: true
              },
              address:{
                  required: true
              },
              highesteducation:{
		        required: true
              },
              currentwork:{
                required: true
              },
              workposition:{
                  required: true
              },
              worktime:{
                  required: true
              },
              workavailable:{
                  required: true
              },
              worktype:{
                  required: true
              },
              equip:{
                  required: true
              },
              working:{
                  required: true
              }
              /*pic:{
                  required: true,
                  minlength: 3,
                  remote: {
                      url: "checkextension/"+pic,
                      type: "get",
                      message:"Email already used"
                  }
              }*/
          },
        errorPlacement: function(error, element) {
            $(element).parent('div').addClass('has-error');
         }
	});

    var $validator2 = $('#form-lang').validate({
        rules: {

            read163:{
                required: true
            },
            read164:{
                required: true
            },
            read165:{
                required: true
            },
            write163:{
                required: true
            },
            write164:{
                required: true
            },
            write165:{
                required: true
            },
            speak163:{
                required: true
            },
            speak164:{
                required: true
            },
            speak165:{
                required: true
            }
        },

        errorPlacement: function(error, element) {
            $(element).parent('div').addClass('has-error');
        }
    });


    // Wizard Initialization
  	$('.wizard-card').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'nextSelector': '.btn-next',
        'previousSelector': '.btn-previous',

        onNext: function(tab, navigation, index) {
            var userId=$("#id").val();
            var education=$("input[name='highesteducation']:checked").val();

            if(index==3 && education!=9 && education!=10 && education!=12){
                if($("#educationcount").val()=='' || $("#educationcount").val()=='0' ){
                    //alert("fill education");

                    return false;
                }
            }

           var picture=$("#wizard-picture").val();
            if(picture!=''){
                picture=picture.replace("C:\\fakepath\\","");
                picture=picture.slice(-3);
                if(picture!='jpg' && picture!='png')
                return false;
            }

            if(userId!="" && index==1)
                return true;

        	var $valid = $('.wizard-card form').valid();

        	if(!$valid) {
                $validator.focusInvalid();
        		return false;
        	}
        },

        onInit : function(tab, navigation, index){
            //check number of tabs and fill the entire row
            var $total = navigation.find('li').length;
            var $wizard = navigation.closest('.wizard-card');

            $first_li = navigation.find('li:first-child a').html();
            $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
            $('.wizard-card .wizard-navigation').append($moving_div);

            refreshAnimation($wizard, index);

            $('.moving-tab').css('transition','transform 0s');
       },

        onTabClick : function(tab, navigation, index){

           /* var $valid = $('.wizard-card form').valid();

            if(!$valid){
                return false;
            } else{
                return true;
            }*/
            return false;
        },

        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;

            var $wizard = navigation.closest('.wizard-card');

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $($wizard).find('.btn-next').hide();
                $($wizard).find('.btn-finish').show();
            } else {
                $($wizard).find('.btn-next').show();
                $($wizard).find('.btn-finish').hide();
            }

            button_text = navigation.find('li:nth-child(' + $current + ') a').html();

            setTimeout(function(){
                $('.moving-tab').text(button_text);
            }, 150);

            var checkbox = $('.footer-checkbox');

            if( !index == 0 ){
                $(checkbox).css({
                    'opacity':'0',
                    'visibility':'hidden',
                    'position':'absolute'
                });
            } else {
                $(checkbox).css({
                    'opacity':'1',
                    'visibility':'visible'
                });
            }

            refreshAnimation($wizard, index);
        }
  	});


    // Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });

    $('[data-toggle="wizard-radio"]').click(function(){
        wizard = $(this).closest('.wizard-card');
        wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
        $(this).addClass('active');
        $(wizard).find('[type="radio"]').removeAttr('checked');
        $(this).find('[type="radio"]').attr('checked','true');
    });

    $('[data-toggle="wizard-checkbox"]').click(function(){
        if( $(this).hasClass('active')){
            $(this).removeClass('active');
            $(this).find('[type="checkbox"]').removeAttr('checked');
        } else {
            $(this).addClass('active');
            $(this).find('[type="checkbox"]').attr('checked','true');
        }
    });

    $('.set-full-height').css('height', 'auto');


});


function Showgridedu(index){
    if(index==9 || index==10 || index==12)
        $("#edudiv").css('display','none');
    else {
        $("#edudiv").css('display','block');
        //$("#educationdiv").css('display','block');
    }
}
 //Function to show image before upload

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(window).resize(function(){
    $('.wizard-card').each(function(){
        $wizard = $(this);

        index = $wizard.bootstrapWizard('currentIndex');
        refreshAnimation($wizard, index);

        $('.moving-tab').css({
            'transition': 'transform 0s'
        });
    });
});

function refreshAnimation($wizard, index){
    $total = $wizard.find('.nav li').length;
    $li_width = 100/$total;

    total_steps = $wizard.find('.nav li').length;
    move_distance = $wizard.width() / total_steps;
    index_temp = index;
    vertical_level = 0;

    mobile_device = $(document).width() < 600 && $total > 3;

    if(mobile_device){
        move_distance = $wizard.width() / 2;
        index_temp = index % 2;
        $li_width = 50;
    }

    $wizard.find('.nav li').css('width',$li_width + '%');

    step_width = move_distance;
    move_distance = move_distance * index_temp;

    $current = index + 1;

    if($current == 1 || (mobile_device == true && (index % 2 == 0) )){
        move_distance -= 8;
    } else if($current == total_steps || (mobile_device == true && (index % 2 == 1))){
        move_distance += 8;
    }

    if(mobile_device){
        vertical_level = parseInt(index / 2);
        vertical_level = vertical_level * 38;
    }

    $wizard.find('.moving-tab').css('width', step_width);
    $('.moving-tab').css({
        'transform':'translate3d(' + move_distance + 'px, ' + vertical_level +  'px, 0)',
        'transition': 'all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1)'

    });
}

materialDesign = {

    checkScrollForTransparentNavbar: debounce(function() {
                if($(document).scrollTop() > 260 ) {
                    if(transparent) {
                        transparent = false;
                        $('.navbar-color-on-scroll').removeClass('navbar-transparent');
                    }
                } else {
                    if( !transparent ) {
                        transparent = true;
                        $('.navbar-color-on-scroll').addClass('navbar-transparent');
                    }
                }
        }, 17)

}

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		}, wait);
		if (immediate && !timeout) func.apply(context, args);
	};
};

function editeducation(educationid){
    $.ajax({
        type: "GET",
        url: '/educationuser/'+educationid,

        success: function( response ) {
            $('#major').val(response.major).trigger('change');
            $('#educationyear').val(response.year).trigger('change');
            $('#educationinstitution').val(response.institution);
            $('#educationId').val(response.Id);
        }

    });
}

function edittraining(trainingId){
    $.ajax({
        type: "GET",
        url: '/traininguser/'+trainingId,

        success: function( response ) {
            $('#trainingcourse').val(response.course).trigger('change');
            $('#trainingyear').val(response.year).trigger('change');
            $('#traininginstitution').val(response.institution).trigger('change')
            $('#trainingId').val(response.Id);
            $('#trainingcourse').focus();
        }

    });
}

function deleteeducation(educationid){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var userId=$("#id").val();
    $.ajax({
        type: "GET",
        url: '/educationuser/delete/'+educationid+'/'+userId,

        success: function( response ) {
            var htmldata='';

            for (let index = 0;index<response.educationuser.length; ++index) {
                htmldata=htmldata+"<tr >";
                htmldata=htmldata+"<td >"+response.educationuser[index].resourceValue+"</td>" +
                    "<td >"+response.educationuser[index].year+"</td>" +
                    "<td >"+response.educationuser[index].institution+"</td><td >" +
                    "<a onclick='editeducation("+response.educationuser[index].Id+")' style='cursor:pointer'>&nbsp;&nbsp;"+
                    "<img src='../img/edit.png' width='16px'></a>&nbsp;<a style='cursor:pointer' onclick='deleteeducation("+response.educationuser[index].Id+")' >"+
                    "<img src='../img/delete.png' width='16px'></a></td>";
                var htmldata=htmldata+"</tr>";
            }
            $("#educationcount").val(response.educationuser.length);
            $("#educationdiv tbody").html(htmldata);
        }
    });
}

function deletetraining(trainingid){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var userId=$("#id").val();
    $.ajax({
        type: "GET",
        url: '/traininguser/delete/'+trainingid+'/'+userId,

        success: function( response ) {
            var htmldata='';
            htmldata=htmldata+"<div class='col-sm-12 col-xs-12 trainingdiv' style='font-size:12px'>";
            for (let index = 0;index<response.traininguser.length; ++index) {
                htmldata=htmldata+"<div class='col-sm-4 col-xs-12'>"+response.traininguser[index].course+"</div>" +
                    "<div class='col-sm-2 col-xs-12'>"+response.traininguser[index].year+"</div>" +
                    "<div class='col-sm-4 col-xs-12'>"+response.traininguser[index].institution+"</div><div class='col-sm-2 col-xs-12' >" +
                    "<a onclick='editeducation("+response.traininguser[index].Id+")' style='cursor:pointer'>&nbsp;&nbsp;"+
                    "<img src='../img/edit.png' width='16px'></a>&nbsp;<a style='cursor:pointer' onclick='deleteeducation("+response.traininguser[index].Id+")' >"+
                    "<img src='../img/delete.png' width='16px'></a></div>";
            }
            var htmldata=htmldata+"</div>";


            $("#trainingdiv").html(htmldata);
        }
    });
}

function opendiv(index){
    if(index=='yes')
        $("#workdiv").css('display','block');
    else $("#workdiv").css('display','none');
   // $("#workdiv").toggle();
}

function selectOnlyThis(id) {

    for (var i = 1;i <3; i++)
    {
        document.getElementById("worktype-"+i).checked = false;
    }
    document.getElementById("worktype-"+id).checked = true;
}


function sendsms(){
    var phoneNumber = $('#phone').val();
    var appVerifier = window.recaptchaVerifier;
    firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
        .then(function (confirmationResult) {
            // SMS sent. Prompt user to type the code from the message, then sign the
            // user in with confirmationResult.confirm(code).
            window.confirmationResult = confirmationResult;
        }).catch(function (error) {
        // Error; SMS not sent
        // ...
    });
}

$("#provinces").change(function(e){
    $("#city").val("");
    $("#city").empty();

    $.ajax({
        type: "get",
        url: "getcaza/"+$('#provinces').val(),

        success: function(data)
        {
            var html='';
            var $el = $("#kadaa");

            $el.empty(); // remove old options
            $el.append($("<option selected></option>").attr("value", "").text("Select your caza"));
            for (let index = 0; index < data.length; ++index) {
                $el.append($("<option></option>").attr("value", data[index].Id).text(data[index].Name));
            }

            html=html+"<";
            var $el = $("#city");

            $el.empty(); // remove old options
            $el.append($("<option selected></option>").attr("value", "").text("Select your city"));
        },
        error: function(data){
            return false;
        }
    });
});

$("#kadaa").change(function(e){

    $.ajax({
        type: "get",
        url: "getcity/"+$('#kadaa').val(),

        success: function(data)
        {
            var html='';
            var $el = $("#city");

            $el.empty(); // remove old options
            $el.append($("<option selected></option>").attr("value", "").text("Select your city"));
            for (let index = 0; index < data.length; ++index) {
                $el.append($("<option></option>").attr("value", data[index].Id).text(data[index].Name));
            }

            html=html+"<";
        },
        error: function(data){
            return false;
        }
    });
});


$("#submitbtn").click(function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /* var $valid = $('.wizard-card form').valid();
     var $validator = $('.wizard-card form').validate({
         rules: {
             first_name: {
                 required: true,
                 minlength: 3
             },
             last_name: {
                 required: true,
                 minlength: 3
             },
             email: {
                 required: true,
                 minlength: 3,
             },
             phone: {
                 required: true,
                 minlength: 6,
             },
             password: {
                 required: true,
                 minlength: 6,
             }
         },

         errorPlacement: function(error, element) {
             $(element).parent('div').addClass('has-error');
         }
     });*/

    var uploadField = document.getElementById("wizard-picture");
    var skipsave=0;
   // alert($('input[type=file]')[0].files[0].size);
   //uploadField.onchange = function() {

       /* if($('input[type=file]')[0].files[0].size > 5242880){
            alert("File is too big!");
            $valid=false;
            return false;
            this.value = "";
        }
   // };

    else{*/
        var $valid = $('.wizard-card form').valid();
        if(!$valid) {
            //$validator.focusInvalid();
            return false;
        }
        else{
            var formData = new FormData();
            formData.append('file', $('input[type=file]')[0].files[0]);

            var phone=$("#phone").val();
            var first_name=$("#first_name").val();
            var last_name=$("#last_name").val();
            var email=$("#email").val();
            var password=$("#password").val();
            var password_confirm=$("#password_confirm").val();

            formData.append('first_name',first_name);
            formData.append('last_name',last_name);
            formData.append('email',email);
            formData.append('password',password);
            formData.append('password_confirm',password_confirm);
            formData.append('phone',phone);

    // {phone:phone,pic:file,first_name:first_name,last_name:last_name,email:email,password:password,password_confirm:password_confirm}
            var file=$("#pic").val();

            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "post",
                url: "registeruser",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data)
                {
                    if(data.success=='false'){
                        swal("Please use jpg/png files for profile pic !", "", "error");
                    }
                    else{
                        $("#id").val(data.user.id);
                    }
                    // $(".image-container").css("background-image", url('img/Photo-2.png'));
                    //alert(data); // show response from the php script.
                },
                error: function(data){


                    //$(this).on( "submit", false );
                    // $validator.focusInvalid();
                    return false;

                }
            });
        }
  // }
});

$(".updatebtn").click(function(e){

    var form = $(this);
    var url = form.attr('action');
    $.ajax({
        type: "post",
        url: "updateuser",
        data: $('form').serialize(), // serializes the form's elements.
        success: function(data)
        {
            //$('#maindiv').css('backgroundImage', 'url(../img/Photo-2.jpg)');
            $("#id").val(data.user.id);
            //alert(data); // show response from the php script.
        },
        error: function(data){


            //$(this).on( "submit", false );
            // $validator.focusInvalid();
            return false;

        }
    });
});

$("#submitbiodata").click(function(e){

    var $valid = $('.wizard-card form').valid();
    if(!$valid) {
        //$validator.focusInvalid();
        return false;
    }
    else {
        var dob = $("#datepicker").val();
        var gender = $("#gender").val();
        var country = $("#countries").val();
        var provinceId = $("#provinces").val();
        var kadaaId = $("#kadaa").val();
        var cityId = $("#city").val();
        var address = $("#address").val();
        var specialneeds = $("#specialneeds").val();

        $.ajax({
            type: "post",
            url: "updateuser",
            data: {
                dob: dob,
                gender: gender,
                country: country,
                provinceId: provinceId,
                kadaaId: kadaaId,
                city: cityId,
                address: address,
                specialneeds: specialneeds,
                registerstep:3
            }, // serializes the form's elements.
            success: function (data) {
                //$("#id").val(data.user.id);
                //alert(data); // show response from the php script.
            },
            error: function (data) {


                //$(this).on( "submit", false );
                // $validator.focusInvalid();
                return false;

            }
        });
    }
});

$("#educationsubmit").click(function(e){


var stopsaving=0;

    var $valid = $('.wizard-card form').valid();
    if(!$valid) {
        //$validator.focusInvalid();
        return false;
    }

    else {
        var highesteducation=$("input[name='highesteducation']:checked").val();
        if( highesteducation!=9 && highesteducation!=10 && highesteducation!=12 && ($("#educationcount").val()=='' || $("#educationcount").val()=='0')){
            //if($("#educationcount").val()=='' || $("#educationcount").val()=='0' ){
               // alert("fill education");
                swal("Please fill the education grid !", "", "info");
                return false;
            //}
        }
        else{
            var workingavailable = $("input[name=working]").val();
            var currentwork = $("#currentwork").val();
            var workposition = $("#workposition").val();
            var worktime = $("#worktime").val();

            $.ajax({
                type: "post",
                url: "updateuser",
                data: {
                    highesteducation: highesteducation,
                    working: workingavailable,
                    currentwork: currentwork,
                    workposition: workposition,
                    workingavailable:workingavailable,
                    worktime:worktime,
                    registerstep:4

                }, // serializes the form's elements.
                success: function (data) {
                    //$("#id").val(data.user.id);
                    //alert(data); // show response from the php script.
                },
                error: function (data) {


                    //$(this).on( "submit", false );
                    // $validator.focusInvalid();
                    return false;

                }
            });
        }
    }
});



$(".updateworkbtn").click(function(e){

    var $valid = $('.wizard-card form').valid();
    if(!$valid) {
        //$validator.focusInvalid();
        return false;
    }

    else {
        var form = $(this);
        var url = form.attr('action');

        /*var morning='';
        if ($("input[name='morning']").attr("checked")=="checked")
            morning=$("#morning").val();

        var noon='';
        if ($("input[name='noon']").attr("checked")=="checked")
            noon=$("#noon").val();

        var night='';
        if ($("input[name='night']").attr("checked")=="checked")
            night=$("#night").val();
    */

        var laptop = '';
        if ($("input[name='laptop']").attr("checked") == "checked")
            laptop = $("#laptop").val();

        var phoneequip = '';
        if ($("input[name='phoneequip']").attr("checked") == "checked")
            phoneequip = $("#phoneequip").val();

        var internet = '';
        if ($("input[name='internet']").attr("checked") == "checked")
            internet = $("#internet").val();

        /*var onsite = '';
        if ($("input[name='onsite']").attr("checked") == "checked")
            onsite = $("#onsite").val();

        var remote = '';
        if ($("input[name='remote']").attr("checked") == "checked")
            remote = $("#remote").val();
        */

        var worktype='';
        $("input[name='worktype']").each(function() {
            if ($(this).attr("checked")=="checked") {
                worktype = worktype+'#'+$(this).val();
            }
        });

         var workavailable="";

         $("input[name='workavailable']").each(function() {
             if ($(this).attr("checked")=="checked") {
                 workavailable = workavailable+'#'+$(this).val();
             }
         });

         var equipments='';
        $("input[name='equip']").each(function() {
            if ($(this).attr("checked")=="checked") {
                equipments = equipments+'#'+$(this).val();
            }
        });

        $.ajax({
            type: "post",
            url: "updateuser",
            data: {
                workavailable: workavailable,
                equipments:equipments,
                worktype:worktype,
                registerstep:6
            }, // serializes the form's elements.
            success: function (data) {
                //$("#id").val(data.user.id);
                //alert(data); // show response from the php script.
            },
            error: function (data) {


                //$(this).on( "submit", false );
                // $validator.focusInvalid();
                return false;

            }
        });
    }
});

$(".trainingbtn").click(function(e){

    var $valid = $('.wizard-card form').valid();
    if(!$valid) {
        //$validator.focusInvalid();
        return false;
    }

    else {
        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "post",
            url: "updateuser",
            data: {
              registerstep:5
            }, // serializes the form's elements.
            success: function (data) {
                //$("#id").val(data.user.id);
                //alert(data); // show response from the php script.
            },
            error: function (data) {


                //$(this).on( "submit", false );
                // $validator.focusInvalid();
                return false;

            }
        });
    }
});


$("#finishbtn").click(function(e){
    submitted = true;
    var form = $(this);
    var url = form.attr('action');
    var userId=$("#id").val();

    var $valid = $('#form-lang').valid();

    if(!$valid) {
        $validator.focusInvalid();
        return false;
    }

    else {
        $.ajax({
            type: "post",
            url: "updateuserskills/"+userId,
            data: $("#form-lang").serialize() + "&" + $("#form-func").serialize()+ "&" + $("#form-tech").serialize(), // serializes the form's elements.
            success: function(data)
            {
                window.location.href = "thankyouregister";

            },
            error: function(data){


                //$(this).on( "submit", false );
                // $validator.focusInvalid();
                return false;

            }
        });
    }
});

$("#submiteducation").click(function(e){

    /*var $valid = $('#educationform').valid();
    alert($valid);
    if(!$valid) {
        //$validator.focusInvalid();
        return false;
    }
    else {*/
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var educationinstitution = $("#educationinstitution").val();
        var major = $("#major").val();
        var educationyear = $("#educationyear").val();
        var userId = $("#id").val();
        var educationId = $("#educationId").val();

        $.ajax({
            type: "post",
            url: "updateeducation",
            data: {
                institution: educationinstitution,
                major: major,
                year: educationyear,
                userId: userId,
                Id: educationId
            }, // serializes the form's elements.
            success: function (response) {
                var htmldata = "";

                for (let index = 0; index < response.educationuser.length; ++index) {
                    htmldata = htmldata + "<tr >";
                    htmldata = htmldata + "<td >" + response.educationuser[index].resourceValue + "</td>" +
                        "<td >" + response.educationuser[index].year + "</td>" +
                        "<td >" + response.educationuser[index].institution + "</td><td >" +
                        "<a onclick='editeducation(" + response.educationuser[index].Id + ")' style='cursor:pointer'>&nbsp;&nbsp;" +
                        "<img src='../img/edit.png' width='16px'></a>&nbsp;<a style='cursor:pointer' onclick='deleteeducation(" + response.educationuser[index].Id + ")' >" +
                        "<img src='../img/delete.png' width='16px'></a></td>";
                    var htmldata = htmldata + "</tr>";
                }
                $("#educationcount").val(response.educationuser.length);
                $("#educationId").val("");
                $("#educationdiv tbody").html(htmldata);
            },
            error: function (data) {

            }
        });
        $("#educationinstitution").val("");
        $("#major").val("").trigger("change");
        $("#educationyear").val("").trigger("change");
        $("#educationId").val("").trigger("change");
   // }
});

$("#submittraining").click(function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var institution=$("#traininginstitution").val();
    var course=$("#trainingcourse").val();
    var year=$("#trainingyear").val();
    var userId=$("#id").val();
    var trainingId=$("#trainingId").val();

    $.ajax({
        type: "post",
        url: "updatetraining",
        data: {institution:institution,course:course,year:year,userId:userId,Id:trainingId}, // serializes the form's elements.
        success: function(response)
        {
            var htmldata='';
            htmldata=htmldata+"<div class='col-sm-12 ' style='font-size:12px'>";
            for (let index = 0;index<response.trainings.length; ++index) {
                htmldata=htmldata+"<div class='col-sm-4 col-xs-12 displaymargin'>"+response.trainings[index].course+"</div>" +
                    "<div class='col-sm-2 col-xs-12 '>"+response.trainings[index].year+"</div>" +
                    "<div class='col-sm-4 col-xs-12'>"+response.trainings[index].institution+"</div><div class='col-sm-2 col-xs-12' >" +
                    "<a onclick='edittraining("+response.trainings[index].Id+")' style='cursor:pointer'>&nbsp;&nbsp;"+
                    "<img src='../img/edit.png' width='16px'></a>&nbsp;<a style='cursor:pointer' onclick='deletetraining("+response.trainings[index].Id+")' >"+
                    "<img src='../img/delete.png' width='16px'></a></div>";
            }
            var htmldata=htmldata+"</div>";

            var htmldata=htmldata+"<div class='clearfix'></div>";

            $("#trainingId").val("");
            $("#trainingdiv").html(htmldata);
        },
        error: function(data){

        }
    });
    $("#traininginstitution").val("").trigger("change");
    $("#trainingcourse").val("").trigger("change");
    $("#trainingyear").val("").trigger("change");
    $("#trainingId").val("").trigger("change");
});


$('#jqmeter-container').jQMeter({
    goal:'$1,000',
    raised:'$200',
    meterOrientation:'horizontal',
    width:'500px',
    height:'50px'
});

$('#jqmeter-container2').jQMeter({
    goal:'$1,000',
    raised:'$400',
    meterOrientation:'horizontal',
    width:'500px',
    height:'50px'
});

$('#jqmeter-container3').jQMeter({
    goal:'$1,000',
    raised:'$600',
    meterOrientation:'horizontal',
    width:'500px',
    height:'50px'
});

$('#jqmeter-container4').jQMeter({
    goal:'$1,000',
    raised:'$800',
    meterOrientation:'horizontal',
    width:'500px',
    height:'50px'
});

$(function() { //
    // Code for the Validator
    var $validator2 = $('#educationform').validate({
        rules: {
            major: {
                required: true

            }
        },

        errorPlacement: function(error, element) {
            $(element).parent('div').addClass('has-error');
        }
    });
});