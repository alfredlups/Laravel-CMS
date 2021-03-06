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
                        <h4>EDIT TEMPLATE</h4>  
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('template-update') }}" method="post" style="position: relative; margin-top: .5em;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="template_id" value="{{ $template->id }}">
                                    <input type="hidden" name="previous_file" value="{{ $template->file_name }}">
                                    <div class="card">
                                        <div class="card-header">TEMPLATE NAME <a href="{{ route('template-list') }}" class="btn btn-secondary btn-sm float-right" style="color:#fff;">Back</a></div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input type="text" name="template_name" value="{{ $template->template_name }}" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                Set as default
                                                <label class="switch switch-3d switch-primary mr-3">
                                                    <input type="checkbox" name="is_default" class="switch-input" {{ $status = $template->is_default == 1 ? "checked" : "" }}>
                                                    <span class="switch-label"></span>
                                                    <span class="switch-handle"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">CONTENT</div>
                                        <div class="card-body">
                                            <textarea name="template_content" id=content>{{ $content }}</textarea>
                                            <script>
                                                var editor = CodeMirror.fromTextArea(document.getElementById("content"), {
                                                    lineNumbers: true,
                                                    mode: "htmlmixed",
                                                    matchBrackets: true
                                                });
                                                editor.setSize("100%", "400");
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-xs-3 pull-left">
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info">
                                            <span id="payment-button-amount">Save</span>
                                        </button>
                                    </div>
                                </form>
                                <form method="post" action="{{ route('template-delete') }}" class="template-delete">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="template_id" value="{{ $template->id }}">
                                    <div class="col-xs-3 pull-right">
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-danger">
                                            <span id="payment-button-amount">Delete</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright ?? 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
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
        $('.template-delete').submit(function(e){                
            if( confirm("Are you sure you want to delete this template?") ) {
                return true;
            }else{
               return false;
            }
        });
    });
</script>
@endsection