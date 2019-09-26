@extends('layouts/default')

{{-- Page title --}}
@section('title')
View Mail
@parent
@stop

{{-- page level styles --}}
@section('header_styles')    
    <!--page level css starts here-->
	<link href="{{ asset('assets/css/pages/mail_box.css') }}" rel="stylesheet" type="text/css" />
    <style>
	
	.web-mail ul .compose{
		color:#333 !important;
		background:#fff !important;
	}
	.web-mail ul .compose a:hover, .web-mail ul .compose:hover{
		color:#333 !important;
		background:#fff !important;
	}	
	
	
	.web-mail ul .inbox a, .web-mail ul .compose a{
		color:#333 !important;
	}
	
	.web-mail ul .inbox a, .web-mail ul .inbox a hover{
		color:#333 !important;
	}
	
	.web-mail ul .sent{
		background:#fff !important;
	}
	.web-mail ul .sent a, .web-mail ul .sent a{
		background:#fff !important;
	}
	</style>
@stop

{{-- Page content --}}
@section('content')

<!-- Main content -->
<section class="content">
    <div class="row web-mail">
        <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="whitebg">
                    <ul>
                        <li class="compose">
                            <a href="{{ URL::to('compose') }}">
                                <i class="material-icons">mode_edit</i>
                                &nbsp; &nbsp;Compose
                            </a>
                        </li>
                        <li class="inbox">
                            <a href="{{ URL::to('inbox') }}">
                                <i class="material-icons">inbox</i>
                                &nbsp; &nbsp;Inbox
                            </a>
                        </li>
                        <li class="sent">
                            <a href="{{ URL::to('sent') }}">
                                <i class="material-icons">check_circle</i>
                                &nbsp; &nbsp; Sent
                            </a>
                        </li>
                     
                    </ul>
                </div>
            </div>
        <div class="col-lg-10 col-md-9 col-sm-8">
            <div class="whitebg">
                <table class="table table-striped table-advance">
                    <thead>
                    <tr>
                        <td colspan="4">
                            <div class="col-md-8">
                                <h4>
                                    <strong>View Mail</strong>
                                </h4>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4">
                            <!--<div class="row no-padding">
                                <div class="col-md-7 col-lg-9 col-xs-12">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-toolbar mail_box"  data-toggle="tooltip" data-placement="top" data-original-title="Tooltip on top" title="Inbox">
                                            <i class="material-icons text-primary mate_mail">mail</i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-toolbar mail_box"  data-toggle="tooltip" data-placement="top" data-original-title="Tooltip on top" title="Delete Message">
                                            <i class="material-icons text-danger mate_mail">delete</i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-toolbar mail_box" data-toggle="tooltip" data-placement="top" data-original-title="Tooltip on top" title="Flag">
                                            <i class="material-icons text-success mate_mail">markunread_mailbox</i>
                                        </button>
                                        <button type="button" class="btn btn-default  btn-toolbar mail_box" data-toggle="tooltip" data-placement="top" data-original-title="Tooltip on top" title="Reload">
                                            <i class="material-icons text-warning mate_mail">refresh</i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-3 col-xs-12">
                                    <div class="pull-right">
                                        <ul class="pagination">
                                            <li class="disabled"><a href="javascript:void(0)">«</a></li>
                                            <li>
                                                <a>1 of 228</a>
                                            </li>
                                            <li><a href="javascript:void(0)">»</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>-->
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="4">
                            <div>
                                <div class="col-md-2 col-lg-1 col-sm-2 col-xs-3">
                                    <a href="#">
                                        {{ $correspondance->subject }}
                                    </a>
                                </div>
                                <div col-xs-11>
                                    <a href="#" class="graytext">
                                        <strong>{{ $correspondance->sender->first_name }} {{ $correspondance->sender->last_name }}</strong>
                                        <br>&lt;{{ $correspondance->sender->email }}&gt;</a>
                                </div>
                                <div>{{ $correspondance->created_at }}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="row">
                                <div class="col-md-12">
                                  {!! $correspondance->content !!}
                                </div>
                            </div>
                        </td>
                    </tr>
                   <!-- <tr>
                        <td colspan="2" class="images">
                            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-8">
                                <br>
                                <a href="#">
                                    <img data-src="holder.js/153x114/#000:#fff" class="img-responsive" alt="riot" />
                                </a>
                                <div class=" nopadmar">
                                    <br>
                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 no-padding">
                                        <button type="button" class="btn btn-raised btn-success btn-sm">View</button>
                                    </div>
                                    <div class="col-md-6 col-sm-3 col-lg-6 col-xs-4 margin_left">
                                        <button type="button" class="btn btn-raised btn-success btn-sm">Download</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-8">
                                <br>
                                <a href="#">
                                    <img data-src="holder.js/153x114/#000:#fff" class="img-responsive" alt="riot" />
                                </a>
                                <div class=" nopadmar">
                                    <br>
                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 no-padding">
                                        <button type="button" class="btn btn-raised btn-success btn-sm">View</button>
                                    </div>
                                    <div class="col-md-6 col-sm-3 col-lg-6 col-xs-4 margin_left">
                                        <button type="button" class="btn btn-raised btn-success btn-sm">Download</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-8">
                                <br>
                                <a href="#">
                                    <img data-src="holder.js/153x114/#000:#fff" class="img-responsive" alt="riot" />
                                </a>
                                <div class=" nopadmar">
                                    <br>
                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 no-padding">
                                        <button type="button" class="btn btn-raised btn-success btn-sm">View</button>
                                    </div>
                                    <div class="col-md-6 col-sm-3 col-lg-6 col-xs-4 margin_left">
                                        <button type="button" class="btn btn-raised btn-success btn-sm">Download</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-8">
                                <br>
                                <a href="#">
                                    <img data-src="holder.js/153x114/#000:#fff" class="img-responsive" alt="riot" />
                                </a>
                                <div class=" nopadmar">
                                    <br>
                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 no-padding">
                                        <button type="button" class="btn btn-raised btn-success btn-sm">View</button>
                                    </div>
                                    <div class="col-md-6 col-sm-3 col-lg-6 col-xs-4 margin_left">
                                        <button type="button" class="btn btn-raised btn-success btn-sm">Download</button>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>-->
                    <tr>
                        <td>
                            <div class="row">
                                <div class="nopadmar">
                                    <div class="col-xs-12">
                                        <a href="/reply/{{$correspondance->id}}"class="btn btn-raised btn-sm btn-primary">
                                            <span class="material-icons view_icons">reply</span>
                                            &nbsp;&nbsp;Reply
                                        </a>
                                    <!--<a href="{{ URL::to('admin/forward') }}" class="btn btn-raised btn-sm btn-success">
                                            <span class="material-icons view_icons">forward</span>
                                            &nbsp;&nbsp;Forward
                                        </a>
                                        <a href="{{ URL::to('admin/trash') }}" class="btn btn-raised btn-sm btn-warning">
                                            <span class="material-icons view_icons">delete</span>
                                            &nbsp;&nbsp;Discard
                                        </a>-->
                                    </div>

                                </div>
                            </div>
                        </td>
                        <td width="3%"></td>
                        <td width="13%" class="view-message text-right">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- content -->
        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop
