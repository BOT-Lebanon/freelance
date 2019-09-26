<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Registration</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../css/material-bootstrap-wizard.css">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="fonts/fontswizard.css" />
    <link rel="stylesheet" href="fonts/font-awesome.min.css" />

    <!-- CSS Files -->
    <script src="https://www.gstatic.com/firebasejs/5.8.3/firebase.js"></script>

    <!-- Firebase App is always required and must be first -->
    <script src="https://www.gstatic.com/firebasejs/5.8.2/firebase-app.js"></script>

    <!-- Add additional services that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/5.8.2/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.8.2/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.8.2/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.8.2/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.8.2/firebase-functions.js"></script>


        <script src="https://www.gstatic.com/firebasejs/5.8.3/firebase.js"></script>
    <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyBJZ_FmjMezw5qV4Epi4XDcM9YMtcmZ0bM",
            authDomain: "botproject-36a08.firebaseapp.com",
            databaseURL: "https://botproject-36a08.firebaseio.com",
            projectId: "botproject-36a08",
            storageBucket: "botproject-36a08.appspot.com",
            messagingSenderId: "1084221686693"
        };
        firebase.initializeApp(config);


    </script>

    <script src="https://www.gstatic.com/firebasejs/ui/2.5.1/firebase-ui-auth.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.css" />

    <script src="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/sweetalert/css/sweetalert.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/custom_sweet_alert.css') }}"/>

</head>

<body>

<div class="animation flipInX image-container set-full-height" id="maindiv" style="background-image: url('img/Photo-2.png')">
    @php $lang='labeleng';@endphp

    <!--   Big container   -->
    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-sm-offset-2">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <form id="submitphone" name="submitphone" method="POST" action="/registerauth">
                        {{ csrf_field() }}
                        <input type="hidden" name="phone" id="phone">
                    <div id="firebaseui-auth-container"></div>
                    </form>
                </div> <!-- wizard container -->
            </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container text-center">
            <!-- Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/bootstrap-wizard">here.</a>-->
        </div>
    </div>
</div>

</body>
<!--   Core JS Files   -->

<script src="{{ asset('js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.bootstrap.js') }} " type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('js/jqmeter.min.js') }}"></script>
<!--  Plugin for the Wizard -->
<script src="js/frontend/registeruser.js"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"></script>
<script type="text/javascript" src="{{asset('vendors/sweetalert/js/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendors/sweetalert/js/sweetalert-dev.js')}}"></script>

<script>
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

    // Opera 8.0+
    var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

    // Firefox 1.0+
    var isFirefox = typeof InstallTrigger !== 'undefined';

    // Safari 3.0+ "[object HTMLElementConstructor]"
    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));

    // Internet Explorer 6-11
    var isIE = /*@cc_on!@*/false || !!document.documentMode;

    // Edge 20+
    var isEdge = !isIE && !!window.StyleMedia;

    // Chrome 1 - 71
    var isChrome = !!window.chrome && (!!window.chrome.webstore || !!window.chrome.runtime);

    // Blink engine detection
    var isBlink = (isChrome || isOpera) && !!window.CSS;

    if (isChrome) {
        // is Google Chrome on IOS
        //alert('chrome');
        var url='https://freelance.letsbot.io/register';
    } else {
        var url='freelance.letsbot.io/register';
       // alert('other');
    }
    // FirebaseUI config.
    var uiConfig = {
        signInSuccessUrl: '',
        signInOptions: [
            // Leave the lines as is for the providers you want to offer your users.
            {
                provider: firebase.auth.PhoneAuthProvider.PROVIDER_ID,
                // The default selected country.
                defaultCountry: 'LB'
            }
        ],
        callbacks: {
            'signInSuccess': function(currentUser, credential, redirectUrl) {
                //console.log('callback run: ' + 'as');
                //alert("Signed in as "+currentUser + " with credential " + credential);
                var phone=currentUser.phoneNumber;
                phone=phone.replace("+","");
                $("#phone").val(phone);
                //$('form#submitphone').submit();
                $.ajax({
                    type: "GET",
                    url: '/checkphonenumber/'+phone,

                    success: function( response ) {
                        if(response['status']==='success')
                            $( "#submitphone" )[0].submit();
                        else {
                            swal({   title: response['message'],
                                text: "",
                                timer: 2500,  showConfirmButton: false
                            });
                            setTimeout(function(){  window.location.href= "";
                                }, 3500);
                            return false;
                        }
                    }

                });
               // window.location.href = "https://localhost:76/registerphone/"+phone;



                /*$.ajax({
                    type: "post",
                    url: "registerphone",
                    data: {phonenumber:phone},
                    success: function(data)
                    {
                        //window.location.href = "http://localhost:76/registerauth";

                       // $(".image-container").css("background-image", url('img/Photo-2.png'));
                        //alert(data); // show response from the php script.
                    },
                    error: function(data){


                        //$(this).on( "submit", false );
                        // $validator.focusInvalid();
                        return false;

                    }
                });*/

                return true;
            }.bind(this),
            uiShown: function() {
                //alert("doing login stuff.");
            }
        },

        // tosUrl and privacyPolicyUrl accept either url string or a callback
        // function.
        // Terms of service url/callback.
        tosUrl: '<your-tos-url>',
        // Privacy policy url/callback.
        privacyPolicyUrl: function() {
            window.location.assign('<your-privacy-policy-url>');
        }
    };

    // Initialize the FirebaseUI Widget using Firebase.
    var ui = new firebaseui.auth.AuthUI(firebase.auth());

    // The start method will wait until the DOM is loaded.
    ui.start('#firebaseui-auth-container', uiConfig);

</script>

</html>
