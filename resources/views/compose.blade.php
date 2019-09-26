@extends('layouts/default')

{{-- Page title --}}
@section('title')
    User Account
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

   <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('assets/css/pages/mail_box.css') }}" rel="stylesheet" type="text/css" />

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
                        <li>
                            <a href="{{ URL::to('inbox') }}">
                                <i class="material-icons">inbox</i>
                                &nbsp; &nbsp;Inbox
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('sent') }}">
                                <i class="material-icons">check_circle</i>
                                &nbsp; &nbsp; Sent
                            </a>
                        </li>
                     
                    </ul>
                </div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">

            
                    <div class="panel">
                        <div class="panel-heading border-bottom whitebg">
                            <h4>
                                <strong>Compose</strong>
                            </h4>
                        </div>
                        <div class="panel-body">
                        {!! Form::open(['route' => 'inbox.store']) !!}
                        {{ csrf_field() }}
                             <div class="compose row">
                                <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="to1">To:</label>
                                    <input type="email" class="form-control" id="receiverEmail" name="receiverEmail" tabindex="1" required>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="to">Subject:</label>
                                    <input type="text" class="form-control" id="subject" tabindex="1" name="subject">
                                </div>
                                </div>
                                <div class="clear"></div>
                                <div class='box-body pad col-sm-12'>
                                    <textarea id="content" name='content'></textarea>
                                </div>
                               
                            </div>
							<div class="form-group">
                                <div class="col-lg-10">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
		</div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
	<script src="{{ asset('assets/vendors/summernote/summernote.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
    $('#content').summernote({
        fontNames: ['Lato', 'Arial', 'Courier New']
    });
    $('body').on('click', '.btn-codeview', function (e) {

        if ( $('.note-editor').hasClass("fullscreen") ) {
            var windowHeight = $(window).height();
            $('.note-editable').css('min-height',windowHeight);
        }else{
            $('.note-editable').css('min-height','300px');
        }
    });
    $('body').on('click','.btn-fullscreen', function (e) {
        setTimeout (function(){
            if ( $('.note-editor').hasClass("fullscreen") ) {
                var windowHeight = $(window).height();
                $('.note-editable').css('min-height',windowHeight);
            }else{
                $('.note-editable').css('min-height','300px');
            }
        },500);

    });
    $('.note-link-url').on('keyup', function() {
        if($('.note-link-text').val() != '') {
            $('.note-link-btn').attr('disabled', false).removeClass('disabled');
        }
    });
    $('#slimscrollside').slimscroll({
        height: '700px',
        size: '3px',
        color: 'black',
        opacity: .3
    });

    </script>

@stop
