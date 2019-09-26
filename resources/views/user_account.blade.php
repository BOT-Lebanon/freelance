@extends('layouts/default')

{{-- Page title --}}
@section('title')
    View User Details
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/pages/user_profile.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/iCheck/css/minimal/blue.css') }}">
    <link href="{{ asset('vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/user_account.css') }}">
    <link href="{{ asset('vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">

    <style>
        .form-group{
            margin:0px !important;
        }

    </style>
@stop
{{-- Page content --}}
@section('content')

    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-lg-10 col-sm-offset-1">
                <ul class="nav  nav-tabs ">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">
                            <i class="material-icons tab_icons">supervisor_account</i>
                            User Profile</a>
                    </li>
                    <li>
                        <a href="#biodata" data-toggle="tab">
                            {{ $labelform['biodata']['labeleng'] }}</a>
                    </li>
                    <li><a href="#education" data-toggle="tab">{{ $labelform['education']['labeleng'] }}</a></li>
                    <li><a href="#training" data-toggle="tab">{{ $labelform['trainings']['labeleng'] }}</a></li>
                    <li><a href="#work" data-toggle="tab">{{ $labelform['work']['labeleng'] }}</a></li>
                    <!--<li><a href="#interests" data-toggle="tab">{{ $labelform['interests']['labeleng'] }}</a></li>-->


                </ul>
                <div  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="panel">

                                    <div class="panel-body">
                                        <div class="col-md-4">

                                            <div class="fileinput fileinput-new  col-sm-10" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 150px;">
                                                    @if($user->pic)
                                                        <img src="{!! url('/').'/uploads/users/'. $user->id.'/'.$user->pic !!}" alt="img"
                                                             class="img-responsive"/>
                                                    @elseif($user->gender === "male")
                                                        <img src="{{ asset('assets/images/authors/avatar3.png') }}" alt="..."
                                                             class="img-responsive"/>
                                                    @elseif($user->gender === "female")
                                                        <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="..."
                                                             class="img-responsive"/>
                                                    @else
                                                        <img src="{{ asset('assets/images/authors/no_avatar.jpg') }}" alt="..."
                                                             class="img-responsive"/>

                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                            <!--<div>
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="pic" id="pic" accept="image/png, image/jpeg, image/jpg"/>
                                                </span>
                                                    <span class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</span>
                                                </div>-->
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped" id="users">

                                                        <tr>
                                                            <td>@lang('users/title.first_name')</td>
                                                            <td>{{$user->first_name}}
                                                                <!--{{ $errors->first('first_name', 'has-error') }}
                                                                <input id="first_name" name="first_name" required type="text" class="form-control" value="{!! old('first_name',$user->first_name) !!}">
                                                                <span class="help-block">{{ $errors->first('first_name', ':message') }}</span>-->
                                                             </td>
                                                        </tr>
                                                        <tr>
                                                            <td>@lang('users/title.last_name')</td>
                                                            <td>{{$user->last_name}}
                                                            <!--{{ $errors->first('last_name', 'has-error') }}

                                                                    <input type="text" name="last_name" id="u-name" class="form-control"
                                                                    value="{!! old('last_name',$user->last_name) !!}">
                                                                    <span class="help-block">{{ $errors->first('last_name', ':message') }}</span>
                                                                      -->
                                                            </td>
                                                        </tr>
                                                       <!-- <tr>
                                                            <td>Password</td>
                                                            <td><p class="text-warning"><strong>If you don't want to change password... please leave them empty</strong></p>
                                                            <input type="password" name="password" id="pwd" class="form-control">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Confirm Password</td>
                                                            <td>
                                                               {{ $errors->first('password_confirm', 'has-error') }}
                                                               <input type="password" name="password_confirm" id="cpwd" class="form-control">
                                                               <span class="help-block">{{ $errors->first('password_confirm', ':message') }}</span>
                                                             </td>
                                                        </tr>-->

                                                        <tr>
                                                            <td>@lang('users/title.status')</td>
                                                            <td>

                                                                @if($user->deleted_at)
                                                                    Deleted
                                                                @elseif($activation = Activation::completed($user))
                                                                    Activated
                                                                @else
                                                                    Pending
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>@lang('users/title.created_at')</td>
                                                            <td>
                                                                {!! $user->created_at->diffForHumans() !!}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="biodata" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-10 pd-top">
                                <table class="table table-bordered table-striped" id="users">
                                <tr>
                                    <td>@lang('users/title.dob')</td>
                                    <td>{{$user->dob}}
                                        <!--@if($user->dob === "0000-00-00")

                                            {!!  Form::text('dob', '', array('id' => 'datepicker','class' => 'form-control'))  !!}
                                        @elseif($user->dob === null)
                                            {!!  Form::text('dob', '', array('id' => 'datepicker','class' => 'form-control'))  !!}
                                        @else
                                            {!!  Form::text('dob', null, array('id' => 'datepicker','class' => 'form-control'))  !!}
                                        @endif-->
                                    </td>
                                    <td>
                                        @lang('users/title.gender')
                                    </td>
                                    <td>{{$user->gender}}
                                    <!--<select id="gender" name="gender" data-placeholder="{{ $labelform['select a']['labeleng'] }} {{ $labelform['gender']['labeleng'] }}" class="form-control select2" style="width:220px">
                                            <option value="" selected></option>
                                            <option value="male" >Male</option>
                                            <option value="female">Female</option>
                                        </select>-->
                                    </td>
                                </tr>

                                <tr>
                                    <td>@lang('users/title.country')</td>
                                    <td>
                                        {!! Form::select('country',[null => 'Select your nationality']+$countries, $user->country,['class' => 'form-control select2', 'id' => 'countries','style'=>'width:220px','data-placeholder'=>$labelform["select a"]["labeleng"].' '.$labelform["nationality"]["labeleng"] ]) !!}
                                    </td>
                                    <td>{{ $labelform['governate']['labeleng'] }} </td>
                                    <td>
                                        {!! Form::select('provinceId', [null => 'Select your governate']+$province, $user->provinceId,['class' => 'form-control select2', 'id' => 'provinces','style'=>'width:220px','data-placeholder'=>$labelform["select a"]["labeleng"].' '.$labelform["governate"]["labeleng"]]) !!}
                                    </td>
                                </tr>

                                <tr> <td>{{ $labelform['caza']['labeleng'] }}</td>
                                    <td>
                                        {!! Form::select('kadaaId', [null => 'Select your caza']+$kadaa, $user->kadaaId,['class' => 'form-control select2', 'id' => 'kadaa','style'=>'width:220px','data-placeholder'=>$labelform["select a"]["labeleng"].' '.$labelform["caza"]["labeleng"]]) !!}
                                    </td>
                                    <td>{{ $labelform['city']['labeleng'] }}</td>
                                    <td>
                                        {!! Form::select('city', [null => 'Select your city'] +$city, $user->city,['class' => 'form-control select2', 'id' => 'city','style'=>'width:220px','data-placeholder'=>$labelform["select a"]["labeleng"].' '.$labelform["city"]["labeleng"]]) !!}
                                    </td>
                                </tr>

                                    <tr> <td>{{ $labelform['address']['labeleng'] }}</td>
                                        <td colspan="4">{{$user->address}}
                                        <!--<input name="address" type="text" class="form-control">-->
                                        </td>
                                    </tr>
                                    <tr> <td>{{ $labelform['specialneeds']['labeleng'] }}</td>
                                        <td colspan="4">
                                           <!--<select name="specialneeds[]" multiple id="specialneeds" data-placeholder="{{ $labelform['select']['labeleng'] }} {{ $labelform['specialneeds']['labeleng'] }}" style="width: auto !important">
                                                <option value=""></option>-->

                                               @php $arraySpecial=explode('#',$user->specialneeds);@endphp
                                                @foreach($specials as $sp =>$valuep)
                                                    @if(in_array ($sp, $arraySpecial))
                                                        {{$valuep}} <br>
                                                   @endif
                                                @endforeach
                                           <!-- </select> -->
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="education" class="tab-pane fade">
                        <table class="table table-bordered table-striped" id="users">
                            <tr>
                                <td>
                                    {{ $labelform['highesteducation']['labeleng'] }}
                                </td>
                                <td>
                                    <fieldset>

                                        @php $i=1;$count=count($education);@endphp
                                        @foreach($education as $ed =>$value)
                                            <!--<div class="col-sm-4" style="font-size:10px">
                                                <input type="radio" name="highesteducation"  value="{{$ed}}" @if($i=='2') checked @endif/>
                                                <label>
                                                </label>-->
                                            @if($ed==$user->highesteducation)
                                                 {{$value}}
                                            @endif
                                            <!--</div>-->
                                        @endforeach
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                             <td colspan="2">
                                    <table class="table table-hover" id="educationdiv">
                                        <thead>
                                        <tr >
                                            <th >{{ $labelform["major"]["labeleng"] }}
                                            </th>
                                            <th>{{ $labelform["year"]["labeleng"] }}</th>
                                            <th>{{ $labelform['institution']['labeleng'] }}</th>
                                            <th></th>
                                        </tr>
                                        <!--<tr>
                                            <td>
                                                {!! Form::select('major', [null => 'Select your major']+$major, null,['style'=>'margin:0px !important','class' => 'select2', 'id' => 'major','data-placeholder'=>$labelform["select your"]["labeleng"].' '.$labelform["major"]["labeleng"]] ) !!}</td>
                                            <td>{!! Form::select('educationyear', [null => 'Select your education year']+$year, null,['class' => 'select2', 'id' => 'educationyear','style'=>'width:100px !important','data-placeholder'=>$labelform["select"]["labeleng"].' '.$labelform["year"]["labeleng"]] ) !!}
                                            </td>
                                            <td><input type="text" class="" name="educationinstitution" id="educationinstitution" placeholder="{{ $labelform['institution']['labeleng'] }}">
                                            </td>
                                            <td>
                                                &nbsp;
                                                <input type='button' class='btn btn-fill btn-success' style="height:30px !important;line-height:10px" id='submiteducation' name='Add' value='{{ $labelform['save']['labeleng'] }}' />
                                            </td>
                                        </tr>-->

                                        @foreach($userEducation as $edu)
                                            <tr><td>{{$edu->resourceValue}}</td>
                                                <td>{{$edu->year}}</td>
                                                <td>{{$edu->institution}}</td>
                                            </tr>
                                        @endforeach

                                        </thead>
                                        <tbody >


                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <!--<tr><td><label><p style="font-weight:bold">{{ $labelform['workquestion']['labeleng'] }}</p></label></td>
                                <td>


                                    <label class="radio-inline">
                                        <input type="radio" name="working" id="inlineRadio5"  value="yes" onclick="opendiv()"> Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="working" id="inlineRadio6" checked value="no" onclick="opendiv()"> No
                                    </label>
                                    <div class="col-sm-12" id="workdiv" style="display:none">
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">{{ $labelform['company']['labeleng'] }}</label>
                                                <input type="text" class="form-control" name="currentwork">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">{{ $labelform['workposition']['labeleng'] }}</label>
                                                <input type="text" class="form-control" name="workposition">
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
                                </td></tr>-->
                        </table>
                        <div>{{ $labelform['company']['labeleng'] }} : {{$user->currentwork}}</div>
                        <div>{{ $labelform['workposition']['labeleng'] }}: {{$user->workposition}}</div>
                        <div>{{ $labelform['time']['labeleng'] }}: {{$user->worktimings}}</div>

                    </div>
                    <div id="training" class="tab-pane fade">
                        <table class="table table-bordered table-striped" id="users">
                        <!-- <tr>

                                <td>
                                    <div class="trainingbloc" >

                                        <input type="text" name="trainingId" id="trainingId">
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
                                                <input type='button' class='btn btn-fill btn-success' style="height:30px !important;line-height:10px" id='submittraining' name='Add' value='{{ $labelform['save']['labeleng'] }}' />

                                            </div>
                                        </div>
                                        <div id="trainingdiv"></div>
                                    </div>-->
                                    <thead>
                                    <tr>
                                        <th>{{ $labelform['course']['labeleng'] }}</th>
                                        <th>{{ $labelform['year']['labeleng'] }}</th>
                                        <th>{{ $labelform['institution']['labeleng'] }}</th>
                                    </tr>
                                    </thead>
                                    @foreach($trainingArray as $tra)
                                        <tr><td>{{$tra->course}}</td>
                                            <td>{{$tra->year}}</td>
                                            <td>{{$tra->institution}}</td>
                                        </tr>
                                    @endforeach
                                <!--</td>
                            </tr>-->
                        </table>
                    </div>
                    <div id="work" class="tab-pane fade">
                        <div class="clearfix"></div>
                        <div class="col-sm-12">
                            <div class="col-sm-2">Available at?</div>

                            @php $arrayavailable=explode('#',$user->workavailable);@endphp
                            @foreach($arrayavailable as $ava)
                                @if($ava!='')
                                <div class="col-sm-4">{{$ava}}</div>
                                @endif
                            @endforeach
                        </div>
                        <div class="clearfix"></div>

                        <!--<div class="col-sm-4">
                            <div class="choice" data-toggle="wizard-checkbox">
                                <input type="checkbox" id="morning" name="morning" value="{{ $labelform['morning']['labeleng'] }}">
                                <div class="icon">
                                    <i class="fa fa-coffee" aria-hidden="true"></i>
                                </div>
                                <h6>Morning</h6>
                            </div>
                        </div>

                        <div class="col-sm-4">

                            <div class="choice" data-toggle="wizard-checkbox">
                                <input type="checkbox" name="noon" id="noon" value="{{ $labelform['noon']['labeleng'] }}">
                                <div class="icon">
                                    <i class="fa fa-sun-o" aria-hidden="true"></i>
                                </div>
                                <h6>Noon</h6>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="choice" data-toggle="wizard-checkbox">
                                <input type="checkbox" name="night" id="night" value="{{ $labelform['night']['labeleng'] }}">
                                <div class="icon">
                                    <i class="fa fa-moon-o" aria-hidden="true"></i>

                                </div>
                                <h6>Night</h6>
                            </div>
                        </div>-->

                            <div class="col-sm-12">
                                <div class="col-sm-2">{{ $labelform['worktype']['labeleng'] }}</div>

                                @php $arrayavailable=explode('#',$user->worktype);@endphp
                                @foreach($arrayavailable as $ava)
                                    @if($ava!='')
                                        <div class="col-sm-4">{{$ava}}</div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="clearfix"></div>
                            <!--<div class="col-sm-4">
                                <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this option in case you can only work on site.">
                                    <input type="radio" name="worktype"  class="worktype" value="onsite">
                                    <div class="icon">
                                        {{ $labelform['onsite']['labeleng'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this option in case you can only work remotely.">
                                    <input type="radio" name="worktype"  class="worktype" value="remote">
                                    <div class="icon">
                                        {{ $labelform['remote']['labeleng'] }}
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this option if you can work remotely or on site.">
                                    <input type="radio" name="worktype"  class="worktype" value="both">
                                    <div class="icon">
                                        {{ $labelform['both']['labeleng'] }}
                                    </div>

                                </div>
                            </div>-->

                        <div class="clearfix"></div>
                        <div class="col-sm-12">
                            <div class="col-sm-2">Equipments</div>

                            @php $arrayavailable=explode('#',$user->equipments);@endphp
                            @foreach($arrayavailable as $ava)
                                @if($ava!='')
                                    <div class="col-sm-4">{{$ava}}</div>
                                @endif
                            @endforeach
                        </div>
                        <div class="clearfix"></div>
                        <!--<div class="col-sm-4">
                            <div class="choice" data-toggle="wizard-checkbox">
                                <input type="checkbox" id="laptop" name="laptop" value="{{ $labelform['laptop']['labeleng'] }}">
                                <div class="icon">
                                    <i class="fa fa-laptop" aria-hidden="true"></i>

                                </div>
                                <h6>Laptop</h6>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="choice" data-toggle="wizard-checkbox">
                                <input type="checkbox" id="phoneequip" name="phoneequip" value="{{ $labelform['smartphone']['labeleng'] }}">
                                <div class="icon">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <h6>{{ $labelform['smartphone']['labeleng'] }}</h6>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="choice" data-toggle="wizard-checkbox">
                                <input type="checkbox" id="internet" name="internet" value="{{ $labelform['internet']['labeleng'] }}">
                                <div class="icon">
                                    <i class="fa fa-globe" aria-hidden="true"></i>
                                </div>
                                <h6>Internet</h6>
                            </div>
                        </div>-->

                    </div>
                    <!--<div class="tab-pane" id="interests" style="height:auto">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bs-component">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">{{ $labelform['languageskills']['labeleng'] }}</h4>
                                            <span class="pull-right">
                                                            <i class="material-icons showhide clickable">keyboard_arrow_up</i>

                                                            </span>
                                        </div>
                                        <div class="panel-body">
                                            <p>

                                            @foreach($langs as $lg => $valuelg)
                                                <fieldset>
                                                    <legend> {{$valuelg}}</legend>
                                                    <div class="col-sm-3">Read</div>
                                                    <div class="col-sm-9" style="font-size:10px">
                                                        <div class="col-sm-3" style="font-size:10px">
                                                            <input type="radio" name="engread"  value="weak" checked/>
                                                            <label>Weak
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-3" style="font-size:10px">
                                                            <input type="radio" name="engwrite"  value="avg" checked/>
                                                            <label>Average
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-3" style="font-size:10px">
                                                            <input type="radio" name="engstrong"  value="strong" checked/>
                                                            <label>Strong
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">Write</div>
                                                    <div class="col-sm-9" style="font-size:10px">
                                                        <div class="col-sm-3" style="font-size:10px">
                                                            <input type="radio" name="engread"  value="weak" checked/>
                                                            <label>Weak
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-3" style="font-size:10px">
                                                            <input type="radio" name="engwrite"  value="avg" checked/>
                                                            <label>Average
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-3" style="font-size:10px">
                                                            <input type="radio" name="engstrong"  value="strong" checked/>
                                                            <label>Strong
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">Speak</div>
                                                    <div class="col-sm-9" style="font-size:10px">
                                                        <div class="col-sm-3" style="font-size:10px">
                                                            <input type="radio" name="engread"  value="weak" checked/>
                                                            <label>Weak
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-3" style="font-size:10px">
                                                            <input type="radio" name="engwrite"  value="avg" checked/>
                                                            <label>Average
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-3" style="font-size:10px">
                                                            <input type="radio" name="engstrong"  value="strong" checked/>
                                                            <label>Strong
                                                            </label>
                                                        </div>
                                                    </div>

                                                </fieldset>
                                                @endforeach
                                                </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bs-component">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">{{ $labelform['technologyplatform']['labeleng'] }}</h4>
                                            <span class="pull-right">
                                                                <i class="material-icons showhide clickable">keyboard_arrow_up</i>

                                                                </span>
                                        </div>
                                        <div class="panel-body" style="padding:0px">

                                            @foreach($technology as $tc => $valuetc)
                                                <div class="col-sm-6" style="margin:0px;padding:5px !important;">
                                                    <div class="col-sm-6" style="font-size:13px;font-weight:bold">{{$valuetc}}</div>
                                                    <div class="col-sm-6" style="font-size:11px;">

                                                        <input type="radio" name=""  value="1"/>
                                                        <label>1
                                                        </label>

                                                        <input type="radio" name=""  value="2"/>
                                                        <label>2
                                                        </label>

                                                        <input type="radio" name=""  value="3"/>
                                                        <label>3
                                                        </label>

                                                        <input type="radio" name=""  value="4"/>
                                                        <label>4
                                                        </label>

                                                        <input type="radio" name=""  value="5"/>
                                                        <label>5
                                                        </label>

                                                    </div>
                                                </div>

                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                                <div class="bs-component">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" style="background-color:#3e7364 !important;">
                                            <h4 class="panel-title">{{ $labelform['functionalskills']['labeleng'] }}</h4>
                                            <span class="pull-right">
                                                                <i class="material-icons showhide clickable">keyboard_arrow_up</i>

                                                                </span>
                                        </div>
                                        <div class="panel-body">

                                            @foreach($funcskill as $func => $valuefunc)
                                                <div class="col-sm-6" style="margin:0px;padding:10px !important;">
                                                    <div class="col-sm-6" style="font-size:13px;font-weight:bold">{{$valuefunc}}</div>
                                                    <div class="col-sm-6" style="font-size:11px;">

                                                        <input type="radio" name=""  value="1"/>
                                                        <label>1
                                                        </label>

                                                        <input type="radio" name=""  value="2"/>
                                                        <label>2
                                                        </label>

                                                        <input type="radio" name=""  value="3"/>
                                                        <label>3
                                                        </label>

                                                        <input type="radio" name=""  value="4"/>
                                                        <label>4
                                                        </label>

                                                        <input type="radio" name=""  value="5"/>
                                                        <label>5
                                                        </label>

                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                    </div>
            </div>
        </div>-->

        <div class="modal fade" id="pwdConfirmModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Password Success</h4>
                    </div>
                    <div class="modal-body">
                        <p>You have successfully updated your password</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- Bootstrap WYSIHTML5 -->
    <script  src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="vendors/moment/js/moment.min.js"></script>
    <script type="text/javascript" src="vendors/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="vendors/daterangepicker/js/daterangepicker.js" type="text/javascript"></script>

    <script language="javascript" type="text/javascript" src="{{ asset('vendors/select2/js/select2.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('vendors/iCheck/js/icheck.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('vendors/bootstrap-maxlength/js/bootstrap-maxlength.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/user_account.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#change-password').click(function (e) {

                e.preventDefault();
                var check = false;
                var sendData = '_token={{ csrf_token() }}' + '&password=' + $('#password').val() + '&password-confirm=' + $('#password-confirm').val();
                if ($('#password').val() ===""){
                    alert('Please Enter password');
                }
                else if ($('#password').val() === $('#password-confirm').val()) {
                    check = true;
                }
                else {
                    alert('password and password confirm does not match');
                }
                if (check) {
                    $.ajax({
                        url: {{$user->id }}+'/passwordreset',
                        type: "post",
                        data: sendData,
                        success: function (data) {
                            $('#pwdConfirmModal').modal();
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert('error in password reset');
                        }
                    });
                }
                $('.password_change')[0].reset();
            });
        });
    </script>
@stop
