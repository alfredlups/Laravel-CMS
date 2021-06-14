@extends('layouts.admin.app')
@section('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
        .fr-wrapper{ min-height: 150px; }
    </style>
@endsection
@section('content')

<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                     
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                 @if( session()->has('success') )
                                   <div class="text-center">{{ session()->get('success') }}</div><br>
                                @endif
                                <div class="card">
                                    <div class="card-header">{{ $fields->webApp->name }} Items<a href="{{ route('webapp-item-list',$fields->webApp->id) }}" class="btn btn-secondary btn-sm float-right">Back</a></div>
                                    <div class="card-body">
                                        <form action="{{ route('webapp-item-create') }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="custom_fields_id" value="{{ $fields->id }}">
                                            <input type="hidden" name="web_app_id" value="{{ $fields->webApp->id }}">
                                            <input type="hidden" name="">
                                            <input type="hidden" name="details_slug" class="details_slug">
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Name</label>
                                                <input type="text" name="item_name" class="form-control webapp-title" required>
                                                <span style="font-size: 13px;">URL : <span class="slug"></span></span>
                                            </div>
                                            <div class="form-group">
                                                Enabled
                                                <label class="switch switch-3d switch-primary mr-3">
                                                    <input type="checkbox" class="switch-input" name="enabled" checked>
                                                    <span class="switch-label"></span>
                                                    <span class="switch-handle"></span>
                                                </label>
                                            </div>
                                            <center>Item Fields</center>
                                            <hr>
                                            <?php $fields = json_decode( $fields->fields ); ?>
                                            @foreach( $fields as $key => $field )
                                                <div class="form-group">
                                                    <label for="cc-number" class="control-label mb-1">{{ $field[0] }}</label>
                                                    @if( $field[1] == "text" || $field[1] == "email" || $field[1] == "password" || $field[1] == "radio" || $field[1] == "checkbox")
                                                        <input type="{{ $field[1] }}" name="{{ $field[1].'_'.$key }}" class="form-control">
                                                    @elseif( $field[1] == "file" )
                                                        <input type="{{ $field[1] }}" name="file" class="form-control imageUpload">
                                                         <div id="divImageMediaPreview"></div>
                                                    @elseif( $field[1] == "textarea" )
                                                        <textarea name="{{ $field[1].'_'.$key }}" class="form-control"></textarea>
                                                    @elseif( $field[1] == "editor" )
                                                        <textarea name="editor" class="form-control" id="edit" style="margin-top: 30px;"></textarea>
                                                    @endif
                                                </div>
                                            @endforeach
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Release Date</label>
                                                <input type="text" name="release_date" value="2019-01-01" class="form-control datepicker">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Expiry Date</label>
                                                <input type="text" name="expiry_date" value="2099-12-31" class="form-control datepicker">
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <span id="payment-button-amount">Save</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--<script src="https://cdn.ckeditor.com/4.13.0/standard-all/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>-->
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
            $('.webapp-title').keyup(function(){
                var title  = '/'+$(this).val().replace(/ /g, "/").toLowerCase();
                $('.slug').text(title);
                $('.details_slug').val(title);
            });

            $(".imageUpload").change(function () {
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = $("#divImageMediaPreview");
                    dvPreview.html("");            
                    $($(this)[0].files).each(function () {
                        var file = $(this);                
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = $("<img />");
                                img.attr("src", e.target.result);
                                dvPreview.append(img);
                            }
                            reader.readAsDataURL(file[0]);                
                    });
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            });

            $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        });
    </script>
@endsection