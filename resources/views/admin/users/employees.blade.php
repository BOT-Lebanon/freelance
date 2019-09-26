@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
    Users Grid
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-tagsinput/css/app.css') }}" />
    <link href="{{ asset('css/pages/taginput.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendors/ion.rangeslider/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/ion.rangeslider/css/ion.rangeSlider.skinFlat.css') }}" />
    <link href="{{ asset('css/pages/editor.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/sweetalert/css/sweetalert.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/custom_sweet_alert.css') }}"/>


    <style>
        .form-group{
            margin:0px !important;
        }
    </style>
@stop


{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Users Grid</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Laravel Examples</a></li>
            <li class="active">Ajax Datatables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">

                <div class="clearfix"></div>

            <div class="panel panel-primary " style="margin-bottom:0px">
                <div class="panel-heading">
                    <h4 class="panel-title"><i class="material-icons">person</i>Users List

                    </h4>
                </div>
            </div>
            <!--<div class="col-sm-12 text-right"><button class="btn-primary" onclick="filterdata()">Filter</button></div>-->
            <div class="clearfix"></div>
            <div class="table-responsive " style="background-color: #ffffff">
                <table class="table table-bordered panel-body" id="table1">
                    <thead>
                    <tr class="filters">

                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>E-mail</th>
                        <th>Phone</th>

                        <th>created at</th>
                        <th>updated at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
        </div>    <!-- row-->
    </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('vendors/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/users.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('vendors/ion.rangeslider/js/ion.rangeSlider.js') }}" ></script>
    <script  src="{{ asset('vendors/ckeditor/js/ckeditor.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('vendors/ckeditor/js/jquery.js') }}"  type="text/javascript" ></script>
    <script  src="{{ asset('vendors/ckeditor/js/config.js') }}"  type="text/javascript"></script>

    <script type="text/javascript" src="{{asset('vendors/sweetalert/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendors/sweetalert/js/sweetalert-dev.js')}}"></script>

    <script>

        $(function() {
            var provinceId,kadaaId,city,gender,workavailable,worktype,equipments,birthday,specialneeds,highesteducation;

            var table = $('#table1').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route('admin.users.dataemployees') !!}',
                    data: function (d) {

                    },
                    "type": "get"
                },
                columns: [

                    { data: 'first_name', name: 'first_name' },
                    { data: 'last_name', name: 'last_name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },

                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    /*{ data: 'selectuser', name: 'selectuser',render: function (data,row) {return '<button>Select User</button>';} }*/
                ]
            });

            $("#table1 tbody").on('click','button',function (){
                var data= table.row( $(this).parents('tr')).data();

                $('#usertags').tagsinput('add',data['first_name']+data['last_name']);
                $('#usertagsid').tagsinput('add',data['id']);
                //alert(data['id']);
            });

            $("#usertags").tagsinput({
                minChars: 0,
                unique: true
            });

            $('#provinces').on('change', function(event){
                provinceId =  $(this).val();
                table.draw();
            });
            $('#kadaaId').on('change', function(event){
                kadaaId =  $(this).val();
                table.draw();
            });
            $('#city').on('change', function(event){
                city =  $(this).val();
                table.draw();
            });

            $('#gender').on('change', function(event){
                gender =  $(this).val();
                table.draw();
            });
            $('#workavailable').on('change', function(event){
                workavailable =  $(this).val();
                table.draw();
            });

            $('#worktype').on('change', function(event){
                worktype =  $(this).val();
                table.draw();
            });

            $('#equipments').on('change', function(event){
                equipments =  $(this).val();
                table.draw();
            });

            $('#birthday').on('change', function(event){
                birthday =  $(this).val();
                table.draw();
            });

            $('#specialneeds').on('change', function(event){
                specialneeds =  $(this).val();
                table.draw();
            });

            $('#highesteducation').on('change', function(event){
                highesteducation =  $(this).val();
                table.draw();
            });
        });



    </script>
    <script>
        function sendmail(){
            var users=$("#usertagsid").val();
            var emailcontent=$("#emailcontent").val();
            var subject=$("#emailsubject").val();
            // if(users!=''){
            $.ajax({
                type: "POST",
                url: '/admin/sendmailusers',

                data: {users: users,emailcontent:emailcontent,subject:subject},
                success: function( response ) {


                }
            });
            // }
        }
    </script>

@stop
