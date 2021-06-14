@extends('layouts.admin.app')
@section('styles')
<link rel=stylesheet href="{{ asset('public/codemirror/lib/codemirror.css') }}">
<link rel=stylesheet href="{{ asset('public/codemirror/doc/docs.css') }}">
<script src="{{ asset('public/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('public/codemirror/mode/xml/xml.js') }}"></script>
<script src="{{ asset('public/codemirror/mode/javascript/javascript.js') }}"></script>
<script src="{{ asset('public/codemirror/mode/css/css.js') }}"></script>
<script src="{{ asset('public/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
<script src="{{ asset('public/codemirror/addon/edit/matchbrackets.js') }}"></script>
<script src="{{ asset('public/codemirror/doc/activebookmark.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/codemirror-formatting@1.0.0/formatting.js"></script>
<style type="text/css">
	.CodeMirror {
	  border: 1px solid #eee;
	  height: auto;
	}
    .margin-top-10{ margin-top: 10px; }
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
                    <form method="post" action="{{ route('form-autoresponder-update') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="form_id" value="{{ $form->id }}">
                        <div class="card">
                            <div class="card-header">RESPONDER INFO</div>
                            <div class="card-body">
                                <div class="row form_fields">
                                    <div class="col-12 margin-top-10">
                                        <label for="subject" class="control-label mb-1"> <span>Email Subject</span></label>
                                        <input type="text" name="subject" class="form-control" value="{{ $form->resp_subject }}" required>
                                    </div>
                                    <div class="col-12 margin-top-10">
                                        <label for="email" class="control-label mb-1"> <span>Email Address</span></label>
                                        <input type="email" name="email" class="form-control" value="{{ $form->resp_from_email }}" required>
                                    </div>
                                    <div class="col-12 margin-top-10">
                                        <label for="name" class="control-label mb-1"> <span>Email Name</span></label>
                                        <input type="text" name="name" class="form-control" value="{{ $form->resp_from_name }}" required>
                                    </div>
                                    <div class="col-12 margin-top-10">
                                        <label for="content" class="control-label mb-1"> <span>Email Content</span></label>
                                        <textarea name="content" id="codemirror">{{ $form->resp_email_content }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <button id="form-fields-save" type="submit" class="btn btn-lg btn-info">
                                <span id="payment-button-amount">Save</span>
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
@endsection
@section('scripts')
<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("codemirror"), {
        lineNumbers: true,
        mode: "htmlmixed",
    });
</script>
<script>
    $(function(){
       editor.replaceSelection( $("#formGenerator").html() );
       var totalLines = editor.lineCount();
       var totalChars = editor.getTextArea().value.length;
       editor.autoFormatRange({line:0, ch:0}, {line:totalLines, ch:totalChars});
    });
</script>
@endsection
