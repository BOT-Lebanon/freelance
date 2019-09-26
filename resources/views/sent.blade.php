@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Mail Box
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/css/pages/alertmessage.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/pages/mail_box.css') }}" rel="stylesheet" type="text/css"/>
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
		background:#01bc8c !important;
		color:#ffffff !important;
	}
	.web-mail ul .sent a, .web-mail ul .sent a{
		color:#fff;
		background:#01bc8c !important;
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
                        <li class='compose'>
                            <a href="{{ URL::to('compose') }}">
                                <i class="material-icons">mode_edit</i>
                                &nbsp; &nbsp;Compose
                            </a>
                        </li>
                        <li class='inbox'>
                            <a href="{{ URL::to('inbox') }}">
                                <i class="material-icons">inbox</i>
                                &nbsp; &nbsp;Inbox
                            </a>
                        </li>
                        <li class='sent'>
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
                    <table class="table table-striped table-advance table-hover" id="inbox-check">
                        <thead>
                       
                        
                        </thead>
                        <tbody>
						<tr>
							<td colspan="6">
							<div class="col-md-8">
								<h4>
								<strong>Sent</strong>
								</h4>
							</div>
							</td>
						</tr>
						@foreach($sent as $snt)
                        <tr data-messageid="1" class="unread">
                            <td width="4%" class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                          
                            <td width="22%" class="view-message hidden-xs">
                                <a href="view_mail">
                                    {{ $snt->receiver->first_name }} {{ $snt->receiver->last_name }}</a>
                            </td>
                            <td width="56%" class="view-message ">
                                <a href="view_mail">{{ $snt->content }}</a>
                            </td>
                            <td width="3%" class="view-message inbox-small-cells">
                                <a href="view_mail">
                                    <!--<i class="material-icons">attach_file</i>-->
                                </a>
                            </td>
                            <td width="13%" class="view-message text-right">
                                <a href="view_mail">{{ $snt->created_at }}</a>
                            </td>
                        </tr>
						@endforeach
                       
                       
                        
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
    <script>
        $(document).ready(function () {
            $("#inbox-check #checkall").click(function () {

                if ($("#inbox-check #checkall").is(':checked')) {
                    $("#inbox-check input[type=checkbox]").each(function () {
                        $(this).prop("checked", true);
                    });
                } else {
                    $("#inbox-check input[type=checkbox]").each(function () {
                        $(this).prop("checked", false);
                    });
                }
            });
        });
    </script>

@stop
