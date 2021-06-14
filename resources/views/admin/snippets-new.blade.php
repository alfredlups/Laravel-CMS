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
                        <div class="row">
                            <div class="col-lg-12">
                                @if( session()->has('message') )
                                    <div class="message">{{ session()->get('message') }}</div><br>
                                @endif
                                <h4>CREATE NEW SNIPPET</h4><br>
                                <form action="{{ route('snippets-create') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="card">
                                        <div class="card-header">SNIPPET NAME</div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input type="text" name="snippet_name" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">CONTENT HOLDER</div>
                                        <div class="card-body">
                                            <textarea name="snippet_content" id=snippet-content></textarea>
                                            <script>
                                                var editor = CodeMirror.fromTextArea(document.getElementById("snippet-content"), {
                                                    lineNumbers: true,
                                                    mode: "htmlmixed",
                                                    matchBrackets: true
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-xs-3 pull-left">
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info">
                                            Save
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