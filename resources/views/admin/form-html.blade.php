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
                    <div class="card">
	                    <div class="card-header">FORM CONTENT</div>
	                    <div class="card-body">
	                        <textarea name="codemirror" id="codemirror"></textarea>
	                    </div>
	                </div>
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
<div id="formGenerator" class="d-none">@include('admin.form-generator')</div>
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
