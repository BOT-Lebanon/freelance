@extends('admin/layouts/default')

@section('title')
Cities
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Cities View</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="material-icons text-primary leftsize">home</i>
                Dashboard
            </a>
        </li>
        <li>Cities</li>
        <li class="active">Cities View</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
       <div class="panel panel-primary">
        <div class="panel-heading clearfix">
            <h4 class="panel-title"> <i class="material-icons text-primary leftsize">info</i>
                Cities details
            </h4>
        </div>
            <div class="panel-body">
                @include('admin.cities.show_fields')
            </div>
        </div>
    <div class="form-group">
           <a href="{!! route('admin.cities.index') !!}" class="btn btn-default">Back</a>
    </div>
  </div>
</section>
@stop
