@extends('layouts.admin.app')
@section('styles')
	<style type="text/css">
		.table-top-campaign.table tr td:last-child{ color: unset; text-align: left;  }
        #confirmpageModal .link{ color: #333333 !important; cursor: pointer; }
        #confirmpageModal .link:hover,#confirmpageModal .link.selected{ color: #007bff !important;  }
	</style>
@endsection
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            @if( session()->has('message') )
                <div class="message">{{ session()->get('message') }}</div><br>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    @include('admin.form-tab-menus')
                    <form action="{{ route('form-details-update') }}" method="post" style="position: relative; margin-top: .5em;">
                        {{ csrf_field() }}
                        <input type="hidden" name="form_id" value="{{ $form->id }}">
                        <input type="hidden" name="page_id" id="pageId" value="{{ $form->confirm_page }}">
                        <div class="card">
                            <div class="card-header">FORM DETAILS</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="form-name" class="control-label mb-1">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $form->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="workflow" class="control-label mb-1">Workflow</label>
                                    <select name="workflow_id" class="form-control" required="">
                                        @foreach( $workflow as $wf )
                                            <option value="{{ $wf->id }}" {{ $status = $wf->id == $form->workflow_id ? "selected" : ""}}>{{ $wf->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    Send Autoresponder email 
                                    <label class="switch switch-3d switch-primary mr-3">
                                        <input type="checkbox" name="is_autoresponder" class="switch-input" {{$form->is_auto_responder == 1 ? "checked" : ""}}>
                                        <span class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    Select Confirmation Page <a href="javascript:;" class="confirm-page-btn" data-toggle="modal" data-target="#confirmpageModal"><i class="fas fa-link"></i></a> <br>
                                    <small class="page_url">{{ isset($form->page->slug) ? $form->page->slug : ''  }}</small>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-xs-3">
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info">
                                <span id="payment-button-amount">Update</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal medium -->
<div class="modal fade" id="confirmpageModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Pages</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    @foreach( $pages as $page )
                        <div class="link" data-id="{{ $page->id }}">{{ $page->slug }}</div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $("#confirmpageModal .link").click(function(){
            $(".link").removeClass('selected');
            $(this).addClass('selected');
            $('.page_url').text( 'URL: ' + $(this).text() );
            $('#pageId').val( $(this).data('id') );
        });
    });
</script> 
@endsection
