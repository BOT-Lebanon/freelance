@extends('admin/layouts/default')

@section('title')
Allowedusers
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Allowedusers</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="material-icons text-primary leftsize">home</i>
                Dashboard
            </a>
        </li>
        <li>Allowedusers</li>
        <li class="active">Allowedusers List</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
     @include('flash::message')
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="material-icons">list</i>
                    Allowedusers List
                </h4>
                <div class="pull-right">
                    <a href="{{ route('admin.allowedusers.create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                </div>
            </div>
            <br />
            <div class="panel-body table-responsive">
                 @include('admin.allowedusers.table')
                 
            </div>
        </div>
 </div>
</section>
@stop
