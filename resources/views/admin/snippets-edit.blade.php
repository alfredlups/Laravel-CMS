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
                                <h4>UPDATE SNIPPET</h4><br>
                                <form action="{{ route('snippets-update') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="snippet_id" value="{{ $snippet->id }}">
                                    <input type="hidden" name="previous_file" value="{{ $snippet->file_name }}">
                                    <div class="card">
                                        <div class="card-header">SNIPPET NAME</div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input type="text" name="snippet_name" class="form-control" value="{{ $snippet->snippet_name }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">CONTENT HOLDER</div>
                                        <div class="card-body">
                                            <textarea name="snippet_content" id=snippet-content>{{ $content }}</textarea>
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
                                        <button type="submit" class="btn btn-lg btn-info">Save</button>
                                    </div>
                                    <div class="col-xs-3 pull-right">
                                        <a href="{{ route('snippets-delete', $snippet->id) }}" class="btn btn-lg btn-danger snippet-delete" style="color:white;">Delete</a>
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
<script type="text/javascript">
    $(document).ready(function(){
        $(".snippet-delete").click(function(){
            var conf = confirm('Are you sure you want to delete this snippet?');
            if( conf === true ){
                return true;
            }
            return false;
        });
    });
</script>
@endsection