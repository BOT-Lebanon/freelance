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
    <link href="{{ asset('../vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>

    <link href="{{ asset('vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="fonts/fontswizard.css" />
    <link rel="stylesheet" href="fonts/font-awesome.min.css" />

    <!-- CSS Files -->

    <link rel="stylesheet" href="../css/css.css">
    <link href="{{ asset('vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/iCheck/css/all.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/iCheck/css/line/line.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendors/bootstrap-switch/css/bootstrap-switch.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/switchery/css/switchery.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendors/awesome-bootstrap-checkbox/css/awesome-bootstrap-checkbox.css') }}"/>
    <link rel="stylesheet" type="text/css" href="../css/pages/radio_checkbox.css"/>
    <link href="{{ asset('css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/acc-wizard/acc-wizard.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/pages/accordionformwizard.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/sweetalert/css/sweetalert.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/custom_sweet_alert.css') }}"/>
    <link href="{{ asset('vendors/starability/css/starability-all.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendors/starrating/css/star-rating.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/pages/ratings.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>

        @media only screen and (max-width: 768px) {
            /* For mobile phones: */
            #work{
                height:auto !important;
            }

            #training{
                height:auto !important;
            }
            .collapsed{
                display:block;
            }

            .displaymargin{
                margin-top:20px !important;
            }
        }

        /*.control-label{
            color:#000000 !important;
        }
        #profile .control-label{
            color:#AAAAAA !important;
        }*/

        .select2-container--bootstrap .select2-selection--single .select2-selection__rendered{
            color:#999 !important;
        }

        .select2-container--bootstrap .select2-selection--multiple{
            background:url("img/arrow_down.png") no-repeat right center !important
        }
        .select2-container-multi .select2-choices {
           /* background:url("/path_to/dropdown_arrow.png") no-repeat right center !important*/
        }
        .btn.btn-primary, .btn.btn-primary:hover, .btn.btn-primary:focus, .btn.btn-primary:active, .btn.btn-primary.active, .btn.btn-primary:active:focus, .btn.btn-primary:active:hover, .btn.btn-primary.active:focus, .btn.btn-primary.active:hover, .open > .btn.btn-primary.dropdown-toggle, .open > .btn.btn-primary.dropdown-toggle:focus, .open > .btn.btn-primary.dropdown-toggle:hover{
            background-color:#3c763d;
        }
        .table-scrollable{
            margin-left:15px !important;
            width:96% !important;
        }

        .nav-pills{

        }
        .nav-pills > li {
            cursor:default !important;
        }
        .acc-wizard-step{
            margin-top:0px;
            /*float:right !important;*/
        }

        button[type="submit"]{
            float:right !important;
        }

        .panel-success > .panel-heading{
            background-color:#3c763d;
        }

        .panel-info > .panel-heading{
            background-color:#31708f;
        }

        .panel-warning > .panel-heading{
            background-color:#8a6d3b;
        }

        .panel-danger > .panel-heading{
            background-color:#a94442;
        }

        .haserror{
            box-shadow: 0px 2px 8px rgb(255, 0, 0);
        }
        .has-error .checkbox, .has-error .checkbox-inline, .has-error .control-label, .has-error .help-block, .has-error .radio, .has-error .radio-inline, .has-error.checkbox label, .has-error.checkbox-inline label, .has-error.radio label, .has-error.radio-inline label{
            color: red;
        }
        input[type="radio"].error{ /*box-shadow: 0px 2px 8px rgb(255, 0, 0);*/ color:red; }
        input[type="checkbox"].error{ box-shadow: 0px 2px 8px rgb(255, 0, 0); }
        .error + LABEL{ color: red; }
        .wizard-card .choice.has-error{ border: 1px solid red; }
        /*.picture.has-error{ border: 5px solid red; }
        //.picture.valid{ border: 5px solid green; }*/
        /*.error{ border: 5px solid red !important; }
        .valid{ border: 5px solid green !important; }*/

        .bg-primary{
            background-color:#3e7364;
        }

        .panel-primary > .panel-heading {
            background-color:#3e7364;
            border-color:#3e7364;
        }

        .checkbox label, .radio label, label{
            font-size:11px;
        }

        .select2-search__field{
            width:95% !important;
        }

        .wizard-card[data-color="green"] .moving-tab{
            background-color:#3e7364;
        }

        .wizard-container{
            padding-top:50px;
        }

        .icheckbox_line-red, .iradio_line-red{
            background:#d2d2d2 !important;
            color:#000000;
        }

        fieldset{
            border:1px solid #dddddd;;
        }
        legend{
            width:auto;
            font-size:14px;
            font-weight: 600;
            padding:0px;
            margin-bottom:0px;
        }
        .panel-heading > span{
            margin-top:-20px;
        }

        .control-label{
            margin-top:10px !important;
        }

        h6{
            font-weight:600;
            text-transform:none !important;
            font-size:14px !important;
        }

        .formtech > div {
            height:40px !important;
        }

        .formfunc > div {
            height:40px !important;
        }

        ul.ui-autocomplete {
            color: #000000 !important;
            -moz-border-radius: 15px;
            border-radius:2px;
            z-index:9999 !important;
            background-color:#ffffff;
            width:220px !important;
            padding: 0;
            list-style-type: none;
            cursor: pointer;
            margin-top:15px !important;
            border:1px solid #4caf50;
            padding-top:10px !important;
            font-size:12px;
        }

        .ui-helper-hidden-accessible{
            display:none !important;
        }

        .wizard-card .moving-tab{
            cursor:default !important;
        }
    </style>


</head>

<body>

<div class="animation flipInX image-container set-full-height" id="maindiv" style="background-image: url('img/Photo-2.png')">


    <!--  Made With Material Kit
    <a href="http://demos.creative-tim.com/material-kit/index.html?ref=material-bootstrap-wizard" class="made-with-mk">
        <div class="brand">MK</div>
        <div class="made-with">Made with <strong>Material Kit</strong></div>
    </a> -->
    @php $lang='labeleng';@endphp

    <!--   Big container   -->
    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-sm-offset-2">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div id="firebaseui-auth-container"></div>
                    <div class="card wizard-card" data-color="green" id="wizardProfile">

                        <form  method="POST" enctype="multipart/form-data">
                            <!-- CSRF Token -->
                        {{ csrf_field() }}
                            <input type="hidden" name="todaydate"  id="todaydate" value="{{$today}}">
                            <input type="hidden" name="id"  id="id" >
                            <input type="hidden" name="phone"  id="phone" value="{{$phoneNumber}}" >
                            <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

                            <!--<div class="wizard-header">
                                <h3 class="wizard-title">
                                    Build Your Profile
                                </h3>

                            </div>-->
                            <div class="wizard-navigation">
                                <ul>
                                    <li ><a href="#profile" data-toggle="tab" style="cursor:default !important;">{{ $labelform['profile']['labeleng'] }}</a></li>
                                    <li><a href="#biodata" data-toggle="tab" style="cursor:default !important;" id="next">{{ $labelform['biodata']['labeleng'] }}</a></li>
                                    <li><a href="#education" data-toggle="tab" style="cursor:default !important;">{{ $labelform['education']['labeleng'] }}</a></li>
                                    <li><a href="#training" data-toggle="tab" style="cursor:default !important;">{{ $labelform['trainings']['labeleng'] }}</a></li>
                                    <li><a href="#work" data-toggle="tab" style="cursor:default !important;">{{ $labelform['work']['labeleng'] }}</a></li>
                                    <li><a href="#interests" data-toggle="tab" style="cursor:default !important;">{{ $labelform['skills']['labeleng'] }}</a></li>
                                  </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="profile">
                                    <div class="row">


                                        <h4 class="info-text"> {{ $labelform['basicinfo']['labeleng'] }}</h4>
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="{{ asset('img/default-avatar.png') }}" class="picture-src" id="wizardPicturePreview" data-bv-file-extension="image/jpeg" title=""/>
                                                    <input type="file" id="wizard-picture" name="pic">
                                                </div>
                                                <h6>{{ $labelform['picture']['labeleng'] }}</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">{{ $labelform['firstname']['labeleng'] }} &nbsp;<small><span style="color:red">*</span></small></label>
                                                    <input name="first_name" id='first_name' type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">{{ $labelform['lastname']['labeleng'] }} <small><span style="color:red">*</span></small></label>
                                                    <input name="last_name" id='last_name' type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">{{ $labelform['email']['labeleng'] }} </label>
                                                    <input name="email" id="email" type="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 ">
                                            <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">phone</i>
													</span>
                                                <div class="form-group label-floating">
                                                    {{ $phoneNumber }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock</i>
													</span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">{{ $labelform['pass']['labeleng'] }} {{ $labelform['minimumsixcharacters']['labeleng'] }} <small>*</small></label>
                                                    <input name="password" type="password" id='password' class="form-control" value="{{old('password')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 ">
                                            <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock</i>
													</span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">{{ $labelform['confirmpass']['labeleng'] }} </label>
                                                    <input name="password_confirm" id="password_confirm" type="password" id='password_confirm' class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <span style="color:red">*</span>&nbsp;<span style="font-size:12px">Required fields</span>
                                        <!--<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">phone</i>
													</span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">{{ $labelform['phone']['labeleng'] }} <small>(Required)</small></label>
                                                    <input name="phone" id="phone" type="number" class="form-control">
                                                </div>
                                            </div>-->
                                        </div>

                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-success btn-wd' id='submitbtn' name='next' value='{{ $labelform['next']['labeleng'] }}' />
                                            <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finish' />
                                        </div>

                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="biodata" >

                                    <!--<div class="col-sm-2" style="text-align:right">
                                        <div class="progress-bar1" data-percent="20" data-duration="1000" data-color="#ccc,#E74C3C"></div>
                                    </div>-->

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-5">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-birthday-cake"></i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{ $labelform['dob']['labeleng'] }} <small><span style="color:red">*</span></small></label>
                                                        {!!  Form::text('dob', null, array('id' => 'datepicker','class' => 'form-control'))  !!}

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-arrows-alt"></i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{ $labelform['governate']['labeleng'] }} <small><span style="color:red">*</span></small></label>
                                                        {!! Form::select('provinceId', [null => 'Select your governate']+$province, null,['class' => 'form-control select2', 'id' => 'provinces','style'=>'width:220px','data-placeholder'=>$labelform["select a"]["labeleng"].' '.$labelform["governate"]["labeleng"]]) !!}

                                                    </div>
                                                </div>



                                            </div>

                                            <div class="clearfix"></div>
                                            <div class="col-sm-4">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-flag"></i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{ $labelform['nationality']['labeleng'] }} <small><span style="color:red">*</span></small></label>

                                                        {!! Form::select('country',[null => 'Select your nationality']+$countries, null,['class' => 'form-control select2', 'id' => 'countries','style'=>'width:220px','data-placeholder'=>$labelform["select a"]["labeleng"].' '.$labelform["nationality"]["labeleng"] ]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-map-signs"></i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{ $labelform['caza']['labeleng'] }} <small><span style="color:red">*</span></small></label>
                                                        {!! Form::select('kadaaId', [null => 'Select your caza']+$kadaa, null,['class' => 'form-control select2', 'id' => 'kadaa','style'=>'width:220px','data-placeholder'=>$labelform["select a"]["labeleng"].' '.$labelform["caza"]["labeleng"]]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-venus-mars"></i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{ $labelform['gender']['labeleng'] }} <small><span style="color:red">*</span></small></label>
                                                        <select id="gender" name="gender" data-placeholder="{{ $labelform['select a']['labeleng'] }} {{ $labelform['gender']['labeleng'] }}" class="form-control select2" style="width:220px">
                                                            <option value="" selected>{{ $labelform['select a']['labeleng'] }} {{ $labelform['gender']['labeleng'] }}</option>
                                                            <option value="male" >Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-5 col-sm-offset-1">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-city"></i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{ $labelform['city']['labeleng'] }} <small><span style="color:red">*</span></small></label>
                                                        {!! Form::select('city', [null => 'Select your city'] +$city, null,['class' => 'form-control select2', 'id' => 'city','style'=>'width:220px','data-placeholder'=>$labelform["select a"]["labeleng"].' '.$labelform["city"]["labeleng"]]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-group">
													<span class="input-group-addon">
                                                        <i class="fas fa-home"></i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{ $labelform['address']['labeleng'] }} <small><span style="color:red">*</span></small></label>
                                                        <input name="address" type="text" class="form-control" id="address">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-file-medical"></i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{ $labelform['specialneeds']['labeleng'] }} {{ $labelform['selectmoreone']['labeleng'] }}</label>
                                                        <select name="specialneeds[]" multiple id="specialneeds" data-placeholder="{{ $labelform['select']['labeleng'] }} {{ $labelform['specialneeds']['labeleng'] }}" style="width: auto !important">
                                                            <option value="">Select special needs</option>
                                                        @foreach($specials as $sp =>$valuep)
                                                            <option value="{{$sp}}">{{$valuep}}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="col-sm-5 ">
                                                <label >Gender</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" id="inlineRadio1" value="male"> Male
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" id="inlineRadio2" value="female"> Female
                                                </label>
                                            </div>-->


                                            <!--<div class="col-sm-4">
                                                <div class="choice" data-toggle="wizard-checkbox">
                                                    <input type="checkbox" name="jobb" value="Code">
                                                    <div class="icon">
                                                        <i class="fa fa-terminal"></i>
                                                    </div>
                                                    <h6>Code</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="choice" data-toggle="wizard-checkbox">
                                                    <input type="checkbox" name="jobb" value="Develop">
                                                    <div class="icon">
                                                        <i class="fa fa-laptop"></i>
                                                    </div>
                                                    <h6>Develop</h6>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>

                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-success btn-wd'  id="submitbiodata" name='next' value='{{ $labelform['next']['labeleng'] }}' />
                                            <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finish' />
                                        </div>

                                        <div class="pull-left">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                 </div>
                                <div class="tab-pane" id="education">
                                    <div class="row">

                                        <div class="clearfix"></div>
                                        <div class="col-sm-12" >

                                                        <legend>
                                                        Choose your {{ $labelform['highesteducation']['labeleng'] }} <small><span style="color:red">*</span></small></legend>
                                                        @php $i=1;$count=count($education);@endphp
                                                        <div data-toggle="buttons">
                                                            <div class="btn-group">
                                                        @foreach($education as $ed =>$value)
                                                            <div class="col-sm-4" style="font-size:10px;padding-left:0px !important">

                                                                <input type="radio" name="highesteducation"   value="{{$ed}}" onclick="Showgridedu({{$ed}})"/>
                                                                <label style="font-size:13px">{{$value}}
                                                                </label>
                                                            @php $i=$i+1;@endphp
                                                            </div>
                                                        @endforeach
                                                            </div>
                                                        </div>

                                        </div>
                                        <div class="clearfix"></div>


                                        <div class="educationhistory">
                                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                                            <form name="educationform" id="educationform">
                                                <input type="hidden" name="educationId" id="educationId">
                                                <input type="hidden" name="educationcount" id="educationcount">


                                                <div class="portlet-body" id="edudiv" style="display:none">
                                                    <div class="table-scrollable" class="col-sm-10" >
                                                        <div class="col-sm-12" >
                                                        <table class="table table-hover" id="educationdiv">
                                                            <thead>
                                                            <tr >
                                                                <th >{{ $labelform["major"]["labeleng"] }} <i class="fas fa-diploma"></i>
                                                                </th>
                                                                <th>{{ $labelform["year"]["labeleng"] }}</th>
                                                                <th>{{ $labelform['institution']['labeleng'] }}</th>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {!! Form::select('major', [null => 'Select your major']+$major, null,['style'=>'margin:0px !important','class' => 'select2', 'id' => 'major','data-placeholder'=>$labelform["select your"]["labeleng"].' '.$labelform["major"]["labeleng"]] ) !!}</td>
                                                                <td>{!! Form::select('educationyear', [null => 'Select your education year']+$year, null,['class' => 'select2', 'id' => 'educationyear','style'=>'width:100px !important','data-placeholder'=>$labelform["select"]["labeleng"].' '.$labelform["year"]["labeleng"]] ) !!}
                                                                </td>
                                                                <td>
                                                                <input type="text" class="form-control" name="educationinstitution" id="educationinstitution" placeholder="{{ $labelform['institution']['labeleng'] }}" style="margin-top:-15px">
                                                                </td>
                                                                <td>
                                                                        &nbsp;
                                                                        <input type='button' class='btn btn-fill btn-success' style="height:30px !important;line-height:10px" id='submiteducation' name='Add' value='{{ $labelform['add']['labeleng'] }}' />
                                                                </td>
                                                            </tr>
                                                            </thead>
                                                            <tbody >


                                                            </tbody>
                                                        </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END SAMPLE TABLE PORTLET-->
                                        </div>

                                        <div class="clearfix"></div>
                                        <div class="col-sm-12">
                                                <h6 style="font-weight:600">{{ $labelform['workquestion']['labeleng'] }} &nbsp;<span style="color:red">*</span></h6>


                                                <label class="radio-inline" style="font-size:13px">
                                                    <input type="radio" name="working" value="yes" onclick="opendiv('yes')"><label>Yes</label>
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="working"   value="no" onclick="opendiv('no')"><label>No</label>
                                                </label>
                                            <div class="col-sm-12" id="workdiv" style="display:none">
                                                <div class="col-sm-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{ $labelform['company']['labeleng'] }}</label>
                                                        <input type="text" class="form-control" name="currentwork" id="currentwork">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{ $labelform['workposition']['labeleng'] }}</label>
                                                        <input type="text" class="form-control" name="workposition" id="workposition">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">{{ $labelform['time']['labeleng'] }}</label>
                                                        <select name="worktime" id="worktime">
                                                            <option value=""></option>
                                                            <option value="fulltime">Full time</option>
                                                            <option value="parttime">Part time</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="clearfix"></div>
                                        <div class="wizard-footer">
                                                <div class="pull-right">
                                                    <input type='button' class='btn btn-next btn-fill btn-success btn-wd ' id="educationsubmit" name='next' value='{{ $labelform['next']['labeleng'] }}' />
                                                    <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finish' />
                                                </div>

                                                <div class="pull-left">
                                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                                </div>

                                                <div class="clearfix"></div>
                                         </div>
                                        </div>
                                </div>
                                <div class="tab-pane" id="training" style="height:auto">
                                    <div class="trainingbloc" >

                                            <input type="hidden" name="trainingId" id="trainingId">
                                        <div class="col-sm-12">
                                            <h6 style="font-weight:600">{{ $labelform['trainingquestion']['labeleng'] }}&nbsp;<span style="color:red">*</span></h6>
                                        </div>
                                            <div class="col-sm-12">

                                            <div class="col-sm-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">{{ $labelform['course']['labeleng'] }}</label>
                                                    <input type="text" class="form-control" name="trainingcourse" id="trainingcourse">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">{{ $labelform['year']['labeleng'] }}</label>
                                                    {!!  Form::text('trainingyear', null, array('id' => 'trainingyear','class' => 'form-control'))  !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">{{ $labelform['institution']['labeleng'] }}</label>
                                                    <input type="text" class="form-control" name="traininginstitution" id="traininginstitution">
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                &nbsp;
                                                <input type='button' class='btn btn-fill btn-success' style="height:30px !important;line-height:10px" id='submittraining' name='Add' value='{{ $labelform['add']['labeleng'] }}' />

                                            </div>
                                                <div class="clearfix"></div>
                                        </div>
                                        <div id="trainingdiv"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="wizard-footer" style="position:absolute;bottom:70px !important;width:94% !important;margin-top:20px">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-success btn-wd trainingbtn'  name='next' value='{{ $labelform['next']['labeleng'] }}' />
                                            <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finish' />
                                        </div>

                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="work" style="height:640px">
                                    <div class="clearfix"></div>

                                    <div class="col-sm-10">
                                        <h6>{{ $labelform['availableat']['labeleng'] }} <span style="color:red">*</span>  <span style="color:#AAAAAA;font-size:12px">{{ $labelform['selectmoreone']['labeleng'] }}</span></h6>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-4">
                                        <div class="choice" data-toggle="wizard-checkbox">
                                            <input type="checkbox" id="workavailable" name="workavailable" value="morning" class="phone-group">
                                            <div class="icon">
                                                <i class="fa fa-coffee" aria-hidden="true"></i>
                                            </div>
                                            <p>{{ $labelform['morning']['labeleng'] }}</p>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">

                                        <div class="choice" data-toggle="wizard-checkbox">
                                            <input type="checkbox" name="workavailable" id="workavailable" value="noon" class="phone-group">
                                            <div class="icon">
                                                <i class="fa fa-sun-o" aria-hidden="true"></i>
                                            </div>
                                            <p>{{ $labelform['noon']['labeleng'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="choice" data-toggle="wizard-checkbox">
                                            <input type="checkbox" name="workavailable" id="workavailable" value="night" class="phone-group">
                                            <div class="icon">
                                                <i class="fa fa-moon-o" aria-hidden="true"></i>
                                            </div>
                                            <p>{{ $labelform['night']['labeleng'] }}</p>
                                        </div>
                                    </div>


                                        <div class="col-sm-10">
                                            <h6>{{ $labelform['worktype']['labeleng'] }} <span style="color:red">*</span>  <span style="color:#AAAAAA;font-size:12px">{{ $labelform['selectmoreone']['labeleng'] }}</span></h6>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="worktype" id="worktype" value="onsite">
                                                <div class="icon">
                                                    <i class="fa fa-map-pin" aria-hidden="true"></i>
                                                </div>
                                                <p>{{ $labelform['onsite']['labeleng'] }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" name="worktype" id="worktype" value="remote">
                                                <div class="icon">
                                                    <i class="fa fa-wifi" aria-hidden="true"></i>
                                                </div>
                                                <p>{{ $labelform['remote']['labeleng'] }}</p>
                                            </div>
                                        </div>

                                    <div class="clearfix"></div>
                                    <div class="col-sm-10">
                                        <h6>{{ $labelform['equipmentquestion']['labeleng'] }} <span style="color:red">*</span>  <span style="color:#AAAAAA;font-size:12px">{{ $labelform['selectmoreone']['labeleng'] }}</span></h6>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-4">
                                        <div class="choice" data-toggle="wizard-checkbox">
                                            <input type="checkbox" id="equip" name="equip" value="laptop">
                                            <div class="icon">
                                                <i class="fa fa-laptop" aria-hidden="true"></i>
                                            </div>
                                            <p>{{ $labelform['laptop']['labeleng'] }}</p>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="choice" data-toggle="wizard-checkbox">
                                            <input type="checkbox" id="equip" name="equip" value="smartphone">
                                            <div class="icon">
                                                <i class="fa fa-mobile" aria-hidden="true"></i>
                                            </div>
                                            <p>{{ $labelform['smartphone']['labeleng'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="choice" data-toggle="wizard-checkbox">
                                            <input type="checkbox" id="equip" name="equip" value="internet">
                                            <div class="icon">
                                                <i class="fa fa-globe" aria-hidden="true"></i>
                                            </div>
                                            <p>{{ $labelform['internet']['labeleng'] }}</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="pull-right" >
                                        <input type='button' class='btn btn-next btn-fill btn-success btn-wd updateworkbtn'  name='next' value='{{ $labelform['next']['labeleng'] }}' />
                                        <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Finish' />
                                    </div>
                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                    </div>
                                </div>
                                <div class="tab-pane" id="interests" style="height:auto">

                                    <div class="row">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="material-icons">settings</i> Specials
                                                </h3>
                                                <span class="pull-right clickable">
                                <i class="material-icons">keyboard_arrow_up</i>
                            </span>
                                            </div>
                                            <div class="panel-body">

                                                <div class="row acc-wizard">
                                                    <div class="col-md-3 pd-2">

                                                        <ol class="acc-wizard-sidebar">
                                                            <li class="acc-wizard-todo acc-wizard-active">
                                                                <a href="#prerequisites">{{ $labelform['languageskills']['labeleng'] }}</a>
                                                            </li>
                                                            <li class="acc-wizard-todo">
                                                                <a href="#addwizard">{{ $labelform['technologyplatform']['labeleng'] }}</a>
                                                            </li>
                                                            <li class="acc-wizard-todo">
                                                                <a href="#adjusthtml">{{ $labelform['functionalskills']['labeleng'] }}</a>
                                                            </li>

                                                        </ol>
                                                    </div>
                                                    <div class="col-md-9 pd-r">
                                                        <div id="accordion-demo" class="panel-group">
                                                            <div class="panel panel-success">
                                                                <div class="panel-heading">
                                                                    <h4 class="panel-title">
                                                                        <a href="#prerequisites" data-parent="#accordion-demo" data-toggle="collapse">{{ $labelform['languageskills']['labeleng'] }}</a>
                                                                    </h4>
                                                                </div>
                                                                <div id="prerequisites" class="panel-collapse collapse in">
                                                                    <div class="panel-body">
                                                                        <form id="form-lang" >
                                                                            <div class="col-sm-12">

                                                                                <div class="col-sm-3"></div>
                                                                                <div class="col-sm-3">Read</div>
                                                                                <div class="col-sm-3">Written</div>
                                                                                <div class="col-sm-3">Spoken</div>
                                                                            </div>
                                                                            @foreach($langs as $lg => $valuelg)
                                                                                <div class="col-sm-12" style="margin-top:20px">



                                                                                    <div class="col-sm-3" > {{$valuelg}}</div>
                                                                                    <div class="col-sm-3"><select name="read{{$lg}}" class="languageselect">
                                                                                            <option value="">Select</option>
                                                                                            <option>Weak</option>
                                                                                            <option>Medium</option>
                                                                                            <option>Strong</option>
                                                                                        </select></div>

                                                                                    <div class="col-sm-3"><select name="write{{$lg}}" class="languageselect">
                                                                                            <option  value="">Select</option>
                                                                                            <option>Weak</option>
                                                                                            <option>Medium</option>
                                                                                            <option>Strong</option>
                                                                                        </select></div>

                                                                                    <div class="col-sm-3"><select name="speak{{$lg}}" class="languageselect">
                                                                                            <option  value="">Select</option>
                                                                                            <option>Weak</option>
                                                                                            <option>Medium</option>
                                                                                            <option>Strong</option>
                                                                                        </select></div>
                                                                                </div>
                                                                            @endforeach
                                                                            <div class="acc-wizard-step" style="text-align:right !important"></div>
                                                                        </form>
                                                                    </div>
                                                                    <!--/.panel-body -->
                                                                </div>
                                                                <!-- /#prerequisites -->
                                                            </div>
                                                            <!-- /.panel.panel-default -->
                                                            <div class="panel panel-info">
                                                                <div class="panel-heading">
                                                                    <h4 class="panel-title">
                                                                        <a href="#addwizard" data-parent="#accordion-demo" data-toggle="collapse">{{ $labelform['technologyplatform']['labeleng'] }}</a>
                                                                    </h4>
                                                                </div>
                                                                <div id="addwizard" class="panel-collapse collapse awd-h">
                                                                    <div class="panel-body">
                                                                        <form id="form-tech" class="formtech">
                                                                            @foreach($technology as $tc => $valuetc)
                                                                                <div class="col-sm-7">{{$valuetc}}</div>
                                                                                <div class="col-sm-5"><fieldset class="starability-fade">
                                                                                        <input type="radio" id="fading-rate5-{{$tc}}" name="ratingtech-{{$tc}}" value="5" />
                                                                                        <label for="fading-rate5-{{$tc}}" title="Amazing"></label>
                                                                                        <input type="radio" id="fading-rate4-{{$tc}}" name="ratingtech-{{$tc}}" value="4" />
                                                                                        <label for="fading-rate4-{{$tc}}" title="Very good"></label>
                                                                                        <input type="radio" id="fading-rate3-{{$tc}}" name="ratingtech-{{$tc}}" value="3" />
                                                                                        <label for="fading-rate3-{{$tc}}" title="Average"></label>
                                                                                        <input type="radio" id="fading-rate2-{{$tc}}" name="ratingtech-{{$tc}}" value="2" />
                                                                                        <label for="fading-rate2-{{$tc}}" title="Not good"></label>
                                                                                        <input type="radio" id="fading-rate1-{{$tc}}" name="ratingtech-{{$tc}}" value="1" />
                                                                                        <label for="fading-rate1-{{$tc}}" title="Terrible"></label>
                                                                                    </fieldset></div>
                                                                                <div class="clearfix"></div>
                                                                            @endforeach
                                                                            <div class="acc-wizard-step"></div>
                                                                        </form>
                                                                    </div>
                                                                    <!--/.panel-body -->
                                                                </div>
                                                                <!-- /#addwizard -->
                                                            </div>
                                                            <!-- /.panel.panel-default -->
                                                            <div class="panel panel-warning">
                                                                <div class="panel-heading">
                                                                    <h4 class="panel-title">
                                                                        <a href="#adjusthtml" data-parent="#accordion-demo" data-toggle="collapse">{{ $labelform['functionalskills']['labeleng'] }}</a>
                                                                    </h4>
                                                                </div>
                                                                <div id="adjusthtml" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                        <form id="form-func" class="formfunc">
                                                                            @foreach($funcskill as $func => $valuefunc)
                                                                                <div class="col-sm-7">{{$valuefunc}}</div>
                                                                                <div class="col-sm-5"><fieldset class="starability-fade">
                                                                                        <input type="radio" id="fading-rate5-{{$func}}" name="ratingfunc-{{$func}}" value="5" />
                                                                                        <label for="fading-rate5-{{$func}}" title="Amazing"></label>
                                                                                        <input type="radio" id="fading-rate4-{{$func}}" name="ratingfunc-{{$func}}" value="4" />
                                                                                        <label for="fading-rate4-{{$func}}" title="Very good"></label>
                                                                                        <input type="radio" id="fading-rate3-{{$func}}" name="ratingfunc-{{$func}}" value="3" />
                                                                                        <label for="fading-rate3-{{$func}}" title="Average"></label>
                                                                                        <input type="radio" id="fading-rate2-{{$func}}" name="ratingfunc-{{$func}}" value="2" />
                                                                                        <label for="fading-rate2-{{$func}}" title="Not good"></label>
                                                                                        <input type="radio" id="fading-rate1-{{$func}}" name="ratingfunc-{{$func}}" value="1" />
                                                                                        <label for="fading-rate1-{{$func}}" title="Terrible"></label>
                                                                                    </fieldset></div>
                                                                                <div class="clearfix"></div>
                                                                            @endforeach
                                                                            <div class="acc-wizard-step"></div>
                                                                        </form>
                                                                    </div>
                                                                    <!--/.panel-body -->
                                                                </div>
                                                                <!-- /#adjusthtml -->
                                                            </div>
                                                            <!-- /.panel.panel-default -->

                                                            <!-- /.panel.panel-default -->
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-success btn-wd' id='submitbtn' name='next' value='{{ $labelform['next']['labeleng'] }}' />
                                            <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' id='finishbtn' name='finish' value='Finish' />
                                        </div>

                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

            </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container text-center">
            <!-- Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/bootstrap-wizard">here.</a>-->
        </div>
    </div>
</div>
    </div></div>
</body>
<!--   Core JS Files   -->

<script src="{{ asset('js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.bootstrap.js') }} " type="text/javascript"></script>

<script type="text/javascript" src="{{ asset('js/jqmeter.min.js') }}"></script>
<!--  Plugin for the Wizard
<script src="code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
<script src="js/frontend/registeruser.js"></script>
<script src="js/jquery1.11.4.js"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"></script>
https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.js
<script src="js/jQuery-plugin-progressbar.js"></script>
<script src="js/js.js"></script>
<script type="text/javascript" src="vendors/moment/js/moment.min.js"></script>
<!--<script type="text/javascript" src="vendors/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>-->
<script src="vendors/daterangepicker/js/daterangepicker.js" type="text/javascript"></script>

<script language="javascript" type="text/javascript" src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('vendors/bootstrap-maxlength/js/bootstrap-maxlength.js') }}"></script>
<script src="{{ asset('vendors/acc-wizard/acc-wizard.min.js') }}" ></script>
<script src="{{ asset('js/pages/accordionformwizard.js') }}"  type="text/javascript"></script>
<script type="text/javascript" src="{{asset('vendors/sweetalert/js/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendors/sweetalert/js/sweetalert-dev.js')}}"></script>
<script src="{{ asset('vendors/starrating/js/star-rating.min.js') }}" type="text/javascript"></script>


<script>

$("#datepicker").daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    locale: {
        format: 'DD-MM-YYYY'
    }
});

if($("#datepicker").val()==$("#todaydate").val())
    $("#datepicker").val('');

$("#trainingyear").daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    locale: {
        format: 'MM-YYYY'
    }
});

$("#trainingyear").val("").trigger('change');


function formatState (state) {
    if (!state.id) { return state.text; }
    var $state = $(
        '<span><img src="img/countries_flags/' + state.element.value.toLowerCase() + '.png" class="img-flag" width="20px" height="20px" /> ' + state.text + '</span>'
    );
    return $state;
}


$("#countries").select2({
    templateResult: formatState,
    templateSelection: formatState,
    placeholder: "select a country",
    theme:"bootstrap",
    width: "200px"
});

var userId=$("#id").val();

if (userId!='' && userId!='undefined') {
    $(function () {
        $('#submitbtn').trigger('click');
    });

    $.ajax({
        type: "GET",
        url: '/educationusers/'+userId,

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

    $.ajax({
        type: "GET",
        url: '/trainingsusers/'+userId,

        success: function( response ) {
            var htmldata='';
            htmldata=htmldata+"<div class='col-sm-12 ' style='font-size:12px'>";
            for (let index = 0;index<response.traininguser.length; ++index) {
                htmldata=htmldata+"<div class='col-sm-4'>"+response.traininguser[index].course+"</div>" +
                    "<div class='col-sm-2'>"+response.traininguser[index].year+"</div>" +
                    "<div class='col-sm-4'>"+response.traininguser[index].institution+"</div><div class='col-sm-2' >" +
                    "<a onclick='edittraining("+response.traininguser[index].Id+")' style='cursor:pointer'>&nbsp;&nbsp;"+
                    "<img src='../img/edit.png' width='16px'></a>&nbsp;<a style='cursor:pointer' onclick='deleteeducation("+response.traininguser[index].Id+")' >"+
                    "<img src='../img/delete.png' width='16px'></a></div>";
            }
            var htmldata=htmldata+"</div>";
            $("#trainingdiv").html(htmldata);
        }
    });
}
</script>
<script type="text/javascript">
    var submitted = false;
    window.onbeforeunload = function() {

        if(!submitted)
            return "Do you really want to leave our brilliant application?";
        //if we return nothing here (just calling return;) then there will be no pop-up question at all
        //return;
    };
    $(window).unload(function(){
        //I will call my method
    });

</script>
</html>
