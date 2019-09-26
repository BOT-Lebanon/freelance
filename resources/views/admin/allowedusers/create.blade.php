@extends('admin/layouts/default')

@section('title')
Allowedusers
@parent
@stop

@section('content')
@include('core-templates::common.errors')
<section class="content-header">
    <h1>Allowedusers</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="material-icons text-primary leftsize">home</i>
                Dashboard
            </a>
        </li>
        <li>Allowedusers</li>
        <li class="active">Create Allowedusers </li>
    </ol>
</section>
<section class="content paddingleft_right15">
<div class="row">
 <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title"> <i class="material-icons text-primary leftsize">add_circle</i>
                Create New  Alloweduser
            </h4></div>
        <br />
        <div class="panel-body">
        {!! Form::open(['route' => 'admin.allowedusers.store']) !!}

            @include('admin.allowedusers.fields')

        {!! Form::close() !!}
    </div>
  </div>
 </div>
</section>
 @stop
