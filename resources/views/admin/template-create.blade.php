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
@endsection

@section('content')

<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @if( session()->has('message') )
                            <div class="message">{{ session()->get('message') }}</div><br>
                        @endif
                        <h4>CREATE NEW TEMPLATE</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('template-create') }}" method="post" style="position: relative; margin-top: .5em;">
                                    {{ csrf_field() }}
                                    <div class="card">
                                        <div class="card-header">TEMPLATE NAME </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input type="text" name="template_name" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                Set as default 
                                                <label class="switch switch-3d switch-primary mr-3">
                                                    <input type="checkbox" name="is_default" class="switch-input">
                                                    <span class="switch-label"></span>
                                                    <span class="switch-handle"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">CONTENT</div>
                                        <div class="card-body">
                                            <textarea name="template_content" id=demotext></textarea>
                                            <script>
                                                var editor = CodeMirror.fromTextArea(document.getElementById("demotext"), {
                                                    lineNumbers: true,
                                                    mode: "htmlmixed",
                                                    matchBrackets: true
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info">
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