@extends('layouts.admin.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('public/wysiwyg/css/froala_editor.css') }}">
    <link rel="stylesheet" href="{{ asset('public/wysiwyg/css/froala_style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/wysiwyg/css/plugins/code_view.css') }}">
    <link rel="stylesheet" href="{{ asset('public/wysiwyg/css/plugins/image_manager.css') }}">
    <link rel="stylesheet" href="{{ asset('public/wysiwyg/css/plugins/image.css') }}">
    <link rel="stylesheet" href="{{ asset('public/wysiwyg/css/plugins/table.css') }}">
    <link rel="stylesheet" href="{{ asset('public/wysiwyg/css/plugins/video.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
    <style type="text/css">
        .fr-wrapper{ min-height: 300px; }
    </style>
@endsection

@section('content')

<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                         @if( session()->has('message') )
                            <div class="message">{{ session()->get('message') }}</div><br>
                        @endif
                        <h4>CREATE PAGE</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('pages-create') }}" method="post" style="position: relative; margin-top: .5em;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="" id="homepage" value="{{ $homepage }}">
                                    <div class="card">
                                        <div class="card-header">PAGE DETAILS</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Page Name</label>
                                                    <div class="input-group">
                                                        <input name="page_name" type="text" class="form-control" value="" id="pageName" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Page URL</label>
                                                    <div class="input-group">
                                                        <input name="page_url" type="text" class="form-control" value="" id="pageURL" readonly>
                                                        <div class="input-group-addon" id="editURL">
                                                            <i class="fas fa-pencil-square"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Parent</label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="parent" id="parent" required>
                                                           <option value="root">Root</option>
                                                           @foreach( $pages as $page )
                                                                <option value="{{ $page->slug }}">{{ $page->name }}</option>
                                                           @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Template</label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="template_id" required>
                                                            @foreach( $templates as $template )
                                                                <option value="{{ $template->id }}" >{{ $template->template_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6"><br>
                                                    <label for="x_card_code" class="control-label mb-1">Enabled</label>
                                                    <div class="input-group">
                                                        <label class="switch switch-3d switch-primary mr-3">
                                                            <input type="checkbox" name="enabled" class="switch-input" checked>
                                                            <span class="switch-label"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                 <div class="col-6"><br>
                                                    <label for="x_card_code" class="control-label mb-1">Set as homepage</label>
                                                    <div class="input-group">
                                                        <label class="switch switch-3d switch-primary mr-3">
                                                            <input type="checkbox" name="is_homepage" class="switch-input" id="homepage-btn">
                                                            <span class="switch-label"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">CONTENT</div>
                                        <div class="card-body">
                                            <textarea name="page_content" id="edit"></textarea>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">SEO</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="x_card_code" class="control-label mb-1">Title</label>
                                                    <div class="input-group">
                                                        <textarea name="meta_title" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="x_card_code" class="control-label mb-1">Meta Description</label>
                                                    <div class="input-group">
                                                        <textarea name="meta_description" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
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
@section('scripts')
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
<script type="text/javascript" src="{{ asset('/public/wysiwyg/js/froala_editor.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/public/wysiwyg/js/plugins/align.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/public/wysiwyg/js/plugins/code_beautifier.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/public/wysiwyg/js/plugins/code_view.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/public/wysiwyg/js/plugins/draggable.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/public/wysiwyg/js/plugins/image.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/public/wysiwyg/js/plugins/image_manager.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/public/wysiwyg/js/plugins/link.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/public/wysiwyg/js/plugins/lists.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/public/wysiwyg/js/plugins/paragraph_format.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/public/wysiwyg/js/plugins/paragraph_style.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/public/wysiwyg/js/plugins/table.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/public/wysiwyg/js/plugins/video.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/public/wysiwyg/js/plugins/url.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/public/wysiwyg//js/plugins/entities.min.js') }}"></script>
<script>
    (function () {
      const editorInstance = new FroalaEditor('#edit', {
            colorsBackground: ['#61BD6D', '#1ABC9C', '#54ACD2', 'REMOVE'],
              codeBeautifierOptions: {
              end_with_newline: true,
              indent_inner_html: true,
              extra_liners: "['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'blockquote', 'pre', 'ul', 'ol', 'table', 'dl']",
              brace_style: 'expand',
              indent_char: ' ',
              indent_size: 4,
              wrap_line_length: 0
            }
        })
    })()
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var slug = "";
        var parent = "";
        $("#pageName").keyup(function(){
            slug = '/' + $(this).val().replace(/\ /g, '-');;
            $("#pageURL").val( parent + slug.toLowerCase() );
        });

        $("#parent").change(function(){
            parent = $(this).val();
            $("#pageURL").val( parent + slug.toLowerCase() );
        });

        $("#editURL").css('cursor','pointer').click(function(){
           $("#pageURL").removeAttr('readonly'); 
        });

        $("#homepage-btn").click(function(){
            if( $(this).prop('checked') && $("#homepage").val() > 0 ) {
                if( confirm("Are you sure you want to set this as homepage?") ) {
                    return true;
                }else{
                    return false;
                } 
            }
        });

    });
</script>
@endsection