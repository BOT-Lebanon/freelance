@extends('admin/layouts/default')

@section('title')
Resources
@parent
@stop

@section('content')
  @include('core-templates::common.errors')
    <section class="content-header">
     <h1>Resources Edit</h1>
     <ol class="breadcrumb">
         <li>
             <a href="{{ route('admin.dashboard') }}"> <i class="material-icons text-primary leftsize">home</i>
                 Dashboard
             </a>
         </li>
         <li>Resources</li>
         <li class="active">Edit Resources </li>
     </ol>
    </section>
    <section class="content paddingleft_right15">
      <div class="row">
      <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title"> <i class="material-icons text-primary leftsize">edit</i>
                    Edit  Resource
                </h4></div>
            <br />
        <div class="panel-body">
        {!! Form::model($resource, ['route' => ['admin.resources.update', collect($resource)->first() ], 'method' => 'patch']) !!}

        @include('admin.resources.fields')

        {!! Form::close() !!}
        </div>
      </div>
    </div>
   </section>
 @stop
