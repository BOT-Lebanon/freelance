@extends('admin/layouts/default')

@section('title')
Countries
@parent
@stop

@section('content')
  @include('core-templates::common.errors')
    <section class="content-header">
     <h1>Countries Edit</h1>
     <ol class="breadcrumb">
         <li>
             <a href="{{ route('admin.dashboard') }}"> <i class="material-icons text-primary leftsize">home</i>
                 Dashboard
             </a>
         </li>
         <li>Countries</li>
         <li class="active">Edit Countries </li>
     </ol>
    </section>
    <section class="content paddingleft_right15">
      <div class="row">
      <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title"> <i class="material-icons text-primary leftsize">edit</i>
                    Edit  Country
                </h4></div>
            <br />
        <div class="panel-body">
        {!! Form::model($country, ['route' => ['admin.countries.update', collect($country)->first() ], 'method' => 'patch']) !!}

        @include('admin.countries.fields')

        {!! Form::close() !!}
        </div>
      </div>
    </div>
   </section>
 @stop
