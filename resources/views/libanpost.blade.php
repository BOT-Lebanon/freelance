@extends('layouts/default')

{{-- Page title --}}
@section('title')
    View User Details
    @parent
@stop
@section('header_styles')
    <link href="{{ asset('vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">

    <link href="{{ asset('vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />

@stop
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <form  method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
    <input type="text" name="libanpostId" id="libanpostId">

    <div class="col-sm-10 col-sm-offset-1" style="margin-bottom:200px">
        <div id="message"></div>
        <div class="col-sm-3">
            <div class="input-group">
                {!! Form::select('userId',[null => 'Select User']+$users, null,['class' => 'form-control select2', 'id' => 'userId','style'=>'width:220px' ]) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="input-group">
                {!! Form::select('libanpost',[null => 'Select Liban post Code']+$libanposts, null,['class' => 'form-control select2', 'id' => 'libanpost','style'=>'width:220px' ]) !!}
            </div>
        </div>
        <div class="col-sm-1">
            &nbsp;
            <input type='button' class='btn btn-fill btn-success' style="height:30px !important;line-height:10px" id="submitcode" name='Add' value='{{ $labelform['add']['labeleng'] }}' />

        </div>
        <div class="clearfix"></div>
        <div id="libanpostdiv">
            @foreach($userslistall as $usr)
                <div class='col-sm-3'>{{$usr->first_name}} {{$usr->last_name}}</div>
                <div class='col-sm-3'>{{$usr->code}}</div>
                <div class='col-sm-2' >
                 <a onclick='editlibanpost({{$usr->id}})' style='cursor:pointer'>&nbsp;&nbsp;
                <img src='../img/edit.png' width='16px'></a></div>
                <div class="clearfix"></div>
            @endforeach

        </div>
    </div>
    </form>
@stop

@section('footer_scripts')
    <!-- Bootstrap WYSIHTML5 -->
    <script  src="{{ asset('vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="vendors/moment/js/moment.min.js"></script>
    <script type="text/javascript" src="vendors/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="vendors/daterangepicker/js/daterangepicker.js" type="text/javascript"></script>


<script src="{{ asset('js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.bootstrap.js') }} " type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="{{ asset('vendors/select2/js/select2.js') }}"></script>
<script src="{{ asset('js/frontend/libanpost.js') }}" type="text/javascript"></script>
<script>

</script>
@stop