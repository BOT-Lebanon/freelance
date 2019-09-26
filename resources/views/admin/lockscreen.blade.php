<!DOCTYPE html>
<html>

<head>
    <title>Lock Screen | Josh Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- global level css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <!-- end of global level css -->
    <!-- page level css -->
    <link rel="stylesheet" href="{{ asset('vendors/fort.js/css/fort.css') }}" />
    <link href="{{ asset('css/pages/lockscreen.css') }}" rel="stylesheet" />
    <!-- end of page level css -->
</head>

<body>
<div id="notification_remove">
    @include('notifications')
</div>
<div class="top">
    <div class="colors"></div>
</div>
<div class="container">
    <div class="login-container">
        <div id="output"></div>
        @if(Sentinel::getUser()->pic)
            <img src="{!! url('/').'/uploads/users/'.$user->pic !!}" alt="img"
                 class="img-responsive img-circle  "/>
        @elseif(Sentinel::getUser()->gender === "male")
            <img src="{{ asset('images/authors/avatar3.png') }}" alt="..."
                 class="img-responsive img-circle "/>
        @elseif(Sentinel::getUser()->gender === "female")
            <img src="{{ asset('images/authors/avatar5.png') }}" alt="..."
                 class="img-responsive img-circle "/>
        @else
            <img src="{{ asset('images/authors/no_avatar.jpg') }}" alt="..."
                 class="img-responsive img-circle "/>
        @endif
        <div class="form-box">
            <form method="POST" name="screen">
                <div class="form">
                        <p class="form-control-static user_name_max">{{ Sentinel::getUser()->first_name }}</p>
                    <div class="form-group">
                        <label for="password" class="sr-only control-label"></label>
                        <input type="password" id="pwd" name="password" class="form-control" placeholder="Enter password">
                    </div>
                    <button class="btn btn-raised btn-info btn-block login" id="index" type="submit">GO</button>
                </div>

            </form>
        </div>
    </div>

</div>
    <!-- global js -->


    <!-- end of global js -->
    <!-- beginning of page level js-->
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/fort.js/js/fort.js') }}"></script>
    {{--<script src="{{ asset('js/pages/lockscreen.js') }}"></script>--}}

    <script>
   Fort.gradient();

    $(document).ready(function(){
        $.material.init();
        var password = $("#pwd").val();
        $('button[type="submit"]').click(function(e) {
            e.preventDefault();

            if ( $("#pwd").val() == "") {
                $("#output").addClass("alert alert-danger").text('Please enter password');
                setTimeout(function() {
                    $("#output").removeClass("alert alert-warning").text('');
                }, 3500)
            }
            else {

                $.ajax({
                    type: "POST",
                    url: "lockscreen",
                    data: {password: $("#pwd").val(), _token: $('meta[name="_token"]').attr('content')},
                    success: function (result) {
                        if (result == 'error') {
                            $("#output").addClass("alert alert-danger animated fadeInUp").text('You have entered a Wrong Password');
                            setTimeout(function() {
                            $("#output").removeClass("alert alert-danger animated fadeInUp").text('');
                            }, 2500)
                        }
                        else {
                            $("#output").addClass("alert alert-success animated fadeInUp user_name_max2").text('Welcome ' + '{!! Sentinel::getUser()->first_name !!}');
                            setTimeout(function() {
                            window.location.href = '../../admin';
                            }, 1000)
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.responseText);
                    }

                });
            }
                //show avatar
                $(".avatar").css({
                    "background-image":  "url('../../img/authors/avatar3.jpg')"
                });
        });

    });
</script>
    <!-- end of page level js-->
</body>
</html>
