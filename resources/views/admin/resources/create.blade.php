@extends('admin/layouts/default')

@section('title')
Resources
@parent
@stop

@section('content')
@include('core-templates::common.errors')
<section class="content-header">
    <h1>Resources</h1>
    <ol class="breadcrumb">

        <li>Resources</li>
        <li class="active">Create Resources </li>
    </ol>
</section>
<section class="content paddingleft_right15">
<div class="row">
 <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title"> <i class="material-icons text-primary leftsize">add_circle</i>
                Create New  Resource
            </h4></div>
        <br />
        <div class="panel-body">
        {!! Form::open(['route' => 'admin.resources.store']) !!}

            @include('admin.resources.fields')

        {!! Form::close() !!}
    </div>
  </div>
 </div>
</section>
 @stop
