@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Inbox
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
	
	.web-mail ul .compose a, .web-mail ul .compose a{
		color:#333 !important;
	}
	
	.web-mail ul .inbox a, .web-mail ul .inbox a{
		color:#fff !important;
	}
	
	.web-mail ul .inbox a, .web-mail ul .inbox a{
		color:#fff !important;
	}
	
	.web-mail ul .inbox{
		background:#01bc8c !important;
		color:#ffffff !important;
	}
	.web-mail ul .inbox a, .web-mail ul .inbox a{
		color:#fff;
		background:#01bc8c !important;
	}
	</style>
    <!-- page level css ends-->
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
                    <table class="table table-striped table-advance table-hover web-mail" id="inbox-check">

                                <tbody>
								<tr>
									<td colspan="6">
										<div class="col-md-8">
											<h4>
												<strong>Inbox</strong>
											</h4>
										</div>
									</td>
								</tr>
								@foreach($inbox as $inb)
								    <tr data-messageid="1" class="unread" @if($inb->isRead==0) style="font-weight:bold" @endif>
										 <td width="4%" class="inbox-small-cells">
											<div class="checkbox checker">
												<label>
													<input type="checkbox" class="mail-checkbox">
												</label>
											</div>
										</td>
										
										<td  class="view-message hidden-xs">
											<a href="/viewmail/{{ $inb->id }}">
												{{ $inb->sender->first_name }} {{ $inb->sender->last_name }}</a>
										</td>
										<td  class="view-message ">
											<a href="/viewmail/{{ $inb->id }}">
											{{ $inb->subject }}
											</a>
										</td>
										
										<td  class="view-message text-right">
											<a href="/viewmail/{{ $inb->id }}">{{ $inb->created_at }}</a>
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

    <script type="text/javascript">
        $('#slimscrollside').slimscroll({
            height: '700px',
            size: '3px',
            color: 'black',
            opacity: .3
        });
    </script>
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
