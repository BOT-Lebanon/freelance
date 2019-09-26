@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
    Freelancers Grid
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
        .modal-footer{
            padding:0px !important;
        }
        .form-group input[type="file"]{
            opacity:1 !important;
            position: relative;
        }
    </style>
@stop


{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Freelancers Grid</h1>
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
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">receipt</i>Filter Freelancers
                        </h3>
                        <span class="pull-right" style="margin-top:-20px">
                             <i class="material-icons clickable">keyboard_arrow_up</i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div class="col-sm-4" >
                                <select name="provinceId[]" multiple id="provinces" data-placeholder="Select governate" class ='form-control select2' style='width:220px'>

                                    @foreach($province as $pr =>$valueprov)
                                        <option value="{{$pr}}">{{$valueprov}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-sm-4">
                                <select name="kadaaId[]" multiple id="kadaaId" data-placeholder="Select caza" class ='form-control select2' style='width:220px'>

                                    @foreach($kadaa as $ka =>$valueka)
                                        <option value="{{$ka}}">{{$valueka}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select name="city[]" multiple id="city" data-placeholder="Select caza" class ='form-control select2' style='width:220px'>

                                    @foreach($city as $ci =>$valueci)
                                        <option value="{{$ci}}">{{$valueci}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-4" style="margin-top:15px">
                                <select id="gender" name="gender[]" data-placeholder="Select gender" multiple class="form-control select2" style="width:220px">
                                    <option value="male" >Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="col-sm-3" style="margin-top:15px">
                                <input id="birthday" type="text" name="" value="" />
                            <!--<select id="birthday" name="birthday"  class="form-control select2" style="width:220px">
                                    <option value="" selected>Select birth year</option>
                                    @for($i=2019;$i>=1965;$i--)
                                <option value="{{$i}}" >{{$i}}</option>
                                    @endfor
                                    $year[$i]=$i;

                                </select>-->
                            </div>
                            <div class="col-sm-4  col-sm-offset-1" style="margin-top:15px">
                                <select name="highesteducation[]" multiple id="highesteducation" data-placeholder="Select Education" class ='form-control select2' style='width:220px'>

                                    @foreach($education as $eu =>$valueed)
                                        <option value="{{$eu}}">{{$valueed}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="clearfix"></div>
                            <div class="col-sm-4" style="margin-top:15px">
                                <select id="workavailable" multiple name="workavailable[]"  data-placeholder="Select availability" class="form-control select2" style="width:220px">

                                    <option value="morning" >Morning</option>
                                    <option value="noon">Noon</option>
                                    <option value="night">Night</option>
                                </select>
                            </div>

                            <div class="col-sm-4" style="margin-top:15px">
                                <select id="worktype" multiple name="worktype[]"  data-placeholder="Select work type" class="form-control select2" style="width:220px">

                                    <option value="morning" >on Site</option>
                                    <option value="noon">Remote</option>
                                </select>
                            </div>

                            <div class="col-sm-4" style="margin-top:15px">
                                <select id="equipments" multiple name="equipments[]"  data-placeholder="Select equipments" class="form-control select2" style="width:220px">

                                    <option value="laptop" >Laptop</option>
                                    <option value="smartphone">Smartphone</option>
                                    <option value="internet">Internet</option>
                                </select>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-sm-12" style="margin-top:20px">
                                <select name="specialneeds[]" multiple id="specialneeds" data-placeholder="Select special needs" style="width: 94.5% !important">

                                    @foreach($specials as $sp =>$valuep)
                                        <option value="{{$sp}}">{{$valuep}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-sm-10" style="margin-top:20px">
                                <input type="text" style="width:70%" class="form-group" id='usertags' name='usertags'  data-role="tagsinput" />
                                <div style="display:none">
                                    <input type="hidden" style="width:94%" class="form-group" id='usertagsid' name='usertagsid'  data-role="tagsinput" />
                                </div>
                            </div>
                            <div class="col-sm-2" style="margin-top:20px">
                                <a class="btn btn-raised btn-primary btn-large" data-toggle="modal"
                                   data-href="#stack1" href="#stack1">Send Mail</a>
                            </div>
                            <div class="modal fade bs-example-modal-sm in" id="stack1" tabindex="-1" role="dialog" aria-hidden="false">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-body">

                                            <div class="form-group label-floating">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <div class="text-muted bootstrap-admin-box-title editor-clr">
                                                            <h3 class="panel-title">
                                                                <i class="material-icons">local_offer</i> Email Body</h3>
                                                        </div>
                                                    </div>
                                                    <form  method="POST" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <div class="col-sm-12">

                                                            <input id="emailsubject" name="emailsubject" type="text" placeholder="Subject"
                                                                   class="form-control "/>

                                                                    <input id="emailattachment" name="emailattachment" type="file"
                                                                           class="form-control "/>

                                                            </div>

                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="bootstrap-admin-panel-content" style="margin-top:20px">
                                                            <textarea id="emailcontent"></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="pull-left">
                                                    <a class="btn btn-default" data-toggle="modal" href="#stack2" onclick="sendmail()">Send Mail</a>
                                                </div>
                                                <div class="pull-right">
                                                    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <th>Date of birth</th>
                        <th>province</th>
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
    <script src="{{asset('vendors/tinymce/tinymce.min.js')}}" type="text/javascript"></script>
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
                    url: '{!! route('admin.users.data') !!}',
                    data: function (d) {
                        d.provinceId=provinceId;
                        d.kadaaId=kadaaId;
                        d.city=city;
                        d.gender=gender;
                        d.workavailable=workavailable;
                        d.worktype=worktype;
                        d.equipments=equipments;
                        d.birthday=birthday;
                        d.specialneeds=specialneeds;
                        d.highesteducation=highesteducation;
                    },
                    "type": "GET"
                },
                columns: [

                    { data: 'first_name', name: 'first_name' },
                    { data: 'last_name', name: 'last_name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'dob', name: 'dob' },
                    { data: 'province', name: 'province' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'selectuser', name: 'selectuser',render: function (data,row) {return '<button>Select User</button>';} }
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
            var formData = new FormData();
            formData.append('file', $('input[type=file]')[0].files[0]);

            var users=$("#usertagsid").val();
            var emailcontent=$("#emailcontent").val();
            var subject=$("#emailsubject").val();
            var emailattachment=$("#emailattachment").val();

            formData.append('users',users);
            formData.append('emailcontent',emailcontent);
            formData.append('subject',subject);

            // if(users!=''){
            $.ajax({
                type: "POST",
                url: '/admin/sendmailusers',

                data: formData,
                processData: false,
                contentType: false,
                success: function( response ) {


                }
            });
            // }
        }
    </script>

@stop
