@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit User
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/pages/wizard.css') }}" rel="stylesheet">
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Edit user</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li>Users</li>
        <li class="active">Edit User</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="material-icons">person_add</i>
                        Editing user : <span class="user_name_max">{!! $user->first_name!!} {!! $user->last_name!!}</span>
                    </h3>
                    <span class="pull-right clickable">
                        <i class="material-icons">keyboard_arrow_up</i>
                    </span>
                </div>
                <div class="panel-body">
                    <!--main content-->
                    <div class="row">

                        <div class="col-md-12">
                            @if($errors->any())
                                <div id="notification_remove">
                                @foreach ($errors->all() as $error)
                                    <div  class="text-danger">{{ $error }}</div>
                                @endforeach
                                </div>
                            @endif
                            <form name="commentForm" id="commentForm" action="{{ route('admin.users.update', $user) }}"
                                  method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_method" value="PATCH"/>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div id="rootwizard">
                                    <ul>
                                        <li><a href="#tab1" data-toggle="tab">User Profile</a></li>
                                        <li><a href="#tab2" data-toggle="tab">Bio</a></li>
                                        <li><a href="#tab3" data-toggle="tab">Address</a></li>
                                        <li><a href="#tab4" data-toggle="tab">User Group</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="tab1">
                                            <h2 class="hidden">&nbsp;</h2>

                                            <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                                                <label for="first_name" class="col-sm-2 control-label">First Name *</label>
                                                <div class="col-sm-10">
                                                    <input id="first_name" name="first_name" type="text"
                                                           placeholder="First Name" class="form-control required"
                                                           value="{!! old('first_name', $user->first_name) !!}"/>
                                                </div>
                                                {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                            </div>

                                            <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                                                <label for="last_name" class="col-sm-2 control-label">Last Name *</label>
                                                <div class="col-sm-10">
                                                    <input id="last_name" name="last_name" type="text" placeholder="Last Name"
                                                           class="form-control required"
                                                           value="{!! old('last_name', $user->last_name) !!}"/>
                                                </div>
                                                {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                                            </div>

                                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                                <label for="email" class="col-sm-2 control-label">Email *</label>
                                                <div class="col-sm-10">
                                                    <input id="email" name="email" placeholder="E-Mail" type="text"
                                                           class="form-control required email"
                                                           value="{!! old('email', $user->email) !!}"/>
                                                </div>
                                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                            </div>

                                            <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                                <p class="text-warning">If you don't want to change password... please leave them empty</p>
                                                <label for="password" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input id="password" name="password" type="password" placeholder="Password"
                                                           class="form-control" value="{!! old('password') !!}"/>
                                                </div>
                                                {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                            </div>

                                            <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">
                                                <label for="password_confirm" class="col-sm-2 control-label">Confirm Password</label>
                                                <div class="col-sm-10">
                                                    <input id="password_confirm" name="password_confirm" type="password"
                                                           placeholder="Confirm Password " class="form-control"
                                                           value="{!! old('password_confirm') !!}"/>
                                                </div>
                                                {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="tab2" disabled="disabled">
                                            <h2 class="hidden">&nbsp;</h2>
                                            <div class="form-group {{ $errors->first('dob', 'has-error') }}">
                                                <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                                                <div class="col-sm-10">
                                                    <input id="dob" name="dob" type="text" class="form-control"
                                                           data-date-format="YYYY-MM-DD" value="{!! old('dob', $user->dob) !!}"
                                                           placeholder="yyyy-mm-dd"/>
                                                </div>
                                                {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}
                                            </div>

                                            <div class="form-group {{ $errors->first('pic', 'has-error') }}">
                                                <label for="pic" class="col-sm-2 control-label">Profile picture</label>
                                                <div class="col-sm-10">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                            @if($user->pic)
                                                                <img src="{!! url('/').'/uploads/users/'. $user->pic !!}" alt="img"
                                                                     class="img-responsive"/>
                                                            @elseif($user->gender === "male")
                                                                <img src="{{ asset('images/authors/avatar3.png') }}" alt="..."
                                                                     class="img-responsive"/>
                                                            @elseif($user->gender === "female")
                                                                <img src="{{ asset('images/authors/avatar5.png') }}" alt="..."
                                                                     class="img-responsive"/>
                                                            @else
                                                                <img src="{{ asset('images/authors/no_avatar.jpg') }}" alt="..."
                                                                     class="img-responsive"/>
                                                            @endif
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                                        <div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input id="pic" name="pic_file" type="file"
                                                               class="form-control"/>
                                                    </span>
                                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput" style="color: black !important;">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                {!! $errors->first('pic', '<span class="help-block">:message</span>') !!}
                                            </div>
                                            <div class="form-group {{ $errors->first('bio', 'has-error') }}">
                                                <label for="bio" class="col-sm-2 control-label">Bio <small>(brief intro)</small></label>
                                                <div class="col-sm-10">
                                            <textarea name="bio" id="bio" class="form-control"
                                                      rows="4">{!! old('bio', $user->bio) !!}</textarea>
                                                </div>
                                                {!! $errors->first('bio', '<span class="help-block">:message</span>') !!}
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="tab3" disabled="disabled">
                                            <div class="form-group {{ $errors->first('gender', 'has-error') }}">
                                                <label for="email" class="col-sm-2 control-label">Gender </label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" title="Select Gender..." name="gender">
                                                        <option disabled selected>Select</option>
                                                        <option value="male" @if($user->gender === 'male') selected="selected" @endif >MALE</option>
                                                        <option value="female" @if($user->gender === 'female') selected="selected" @endif >FEMALE</option>
                                                        <option value="other" @if($user->gender === 'other') selected="selected" @endif >OTHER</option>

                                                    </select>
                                                </div>
                                                {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
                                            </div>

                                            <div class="form-group required {{ $errors->first('country', 'has-error') }}">
                                                <label for="country" class="col-sm-2 control-label">Country </label>
                                                <div class="col-sm-10">
                                                    {!! Form::select('country', $countries,old('country',$user->country),array('class' => 'form-control')) !!}

                                                </div>
                                                {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                                            </div>

                                            <div class="form-group {{ $errors->first('state', 'has-error') }}">
                                                <label for="state" class="col-sm-2 control-label">State </label>
                                                <div class="col-sm-10">
                                                    <input id="state" name="user_state" type="text" class="form-control"
                                                           value="{!! old('state', $user->state) !!}"/>
                                                </div>
                                                {!! $errors->first('state', '<span class="help-block">:message</span>') !!}
                                            </div>

                                            <div class="form-group {{ $errors->first('city', 'has-error') }}">
                                                <label for="city" class="col-sm-2 control-label">City </label>
                                                <div class="col-sm-10">
                                                    <input id="city" name="city" type="text" class="form-control"
                                                           value="{!! old('city', $user->city) !!}"/>
                                                </div>
                                                {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
                                            </div>

                                            <div class="form-group {{ $errors->first('address', 'has-error') }}">
                                                <label for="address" class="col-sm-2 control-label">Address </label>
                                                <div class="col-sm-10">
                                                    <input id="address" name="address" type="text" class="form-control"
                                                           value="{!! old('address', $user->address) !!}"/>
                                                </div>
                                                {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                                            </div>

                                            <div class="form-group {{ $errors->first('postal', 'has-error') }}">
                                                <label for="postal" class="col-sm-2 control-label">Postal/zip</label>
                                                <div class="col-sm-10">
                                                    <input id="postal" name="postal" type="text" class="form-control"
                                                           value="{!! old('postal', $user->postal) !!}"/>
                                                </div>
                                                {!! $errors->first('postal', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab4" disabled="disabled">
                                            <p class="text-danger"><strong>Be careful with group selection, if you give admin access.. they can access admin section</strong></p>
                                            <div class="form-group {{ $errors->first('group', 'has-error') }}">
                                                <label for="group" class="control-label">Group *</label>
                                                    <select class="form-control " title="Select group..." name="groups[]" id="groups" required>
                                                        <option value="">Select</option>
                                                        @foreach($roles as $role)
                                                            <option value="{!! $role->id !!}" {{ (array_key_exists($role->id, $userRoles) ? ' selected="selected"' : '') }}>{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                {!! $errors->first('group', '<span class="help-block">:message</span>') !!}
                                            </div>

                                            <div class=" form-group checkbox edit_check">
                                                <label>
                                                    <input type="checkbox" id="activate" name="activate" class="pos-rel p-l-30"  @if($status) checked="checked" @endif >
                                                    If user is not activated, mail will be sent to user with activation link
                                                </label>
                                                <br>
                                            </div>
                                        </div>
                                        <ul class="pager wizard">
                                            <li class="previous"><a href="#">Previous</a></li>
                                            <li class="next"><a href="#">Next</a></li>
                                            <li class="next finish" style="display:none;"><a href="javascript:;">Finish</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--main content end-->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editConfirmModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Activate Confirm</h4>
                </div>
                <div class="modal-body">
                    <p>Please check the checkbox to active your account</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!--row end-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/edituser.js') }}" type="text/javascript"></script>
@stop
