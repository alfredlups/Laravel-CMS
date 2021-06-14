@extends('layouts.admin.app')

@section('content')

<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                     
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-header">CREATE NEW WEBAPP</div>
                                    <div class="card-body">
                                        <form action="{{ route('webapp_create') }}" id="cf_form" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="the_fields" class="the_fields">
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Title</label>
                                                <input type="text" class="form-control webapp-title" name="title" required>
                                                <span style="font-size: 13px;">URL : <span class="slug"></span></span>
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <label for="cc-number" class="control-label mb-1">Slug</label>
                                                <input class="form-control webapp-slug" name="slug">
                                            </div>
                                            <div class="form-group" style="display:none">
                                                <label for="cc-number" class="control-label mb-1">Description</label>
                                                <textarea name="description" class="form-control"></textarea>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="cf_table">
                                                    <thead>
                                                        <tr>
                                                            <th>Field Label</th>
                                                            <!--<th>Field Name</th>-->
                                                            <th>Field Type</th>
                                                            <th>
                                                                <button type="button" class="btn btn-info btn-sm add">Add new field</button></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="field"> 
                                                            	<input type="text" name="cf_label" class="form-control cf_label" required>
                                                            </td>
                                                            <!--<td class="field"><input type="text" name="cf_name" class="form-control cf_name"></td>-->
                                                            <td class="field">
                                                                <select name="cf_type" class="form-control cf_type" required>
                                                                    <option value="">Choose Field Type</option>
                                                                    <option value="text">Text</option>
                                                                    <option value="textarea">Textarea</option>
                                                                    <option value="password">Password</option>
                                                                    <option value="number">Number</option>
                                                                    <option value="file">Image</option>
                                                                    <option value="email">Email</option>
                                                                    <option value="editor">Editor</option>
                                                                    <option value="checkbox">Checkbox</option>
                                                                    <option value="radio">Radio/Button</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger btn-sm remove">delete</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <div class="col-xs-3 float-left">
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Save</button>
                                            </div>
                                            @if( session()->has('success') )
                                            	<div class="text-center">{{ session()->get('success') }}</div>
                                            @endif
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
    <script src="https://cdn.ckeditor.com/4.13.0/standard-all/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
    <script type="text/javascript">
        $(document).ready(function(e){

            $('.webapp-title').keyup(function(){
                var title  = '/'+$(this).val().replace(/ /g, "-").toLowerCase();
                $('.slug').text(title);
                $('.webapp-slug').val(title);
            });

            $(document).on('click','.add',function(){

                var _row = $('#cf_table tbody > tr').last().html();
                $('#cf_table tbody').append('<tr>'+ _row +'</tr>');
            
            });

            $(document).on('click','.remove',function(){
                $(this).parents('tr').remove();
            });

            var fields = [];

            $('#cf_form').submit(function(e){
                e.preventDefault();
                
                var fields = [];
                $('#cf_table tbody > tr').each(function(){
                    var cf_label = $(this).find('.cf_label').val();
                    //var cf_name = $(this).find('.cf_name').val();
                    var cf_type = $(this).find('.cf_type').val();
                    if( cf_label && cf_type ){
                        fields.push([cf_label,cf_type]);
                    }
                });
                $('.the_fields').val( JSON.stringify(fields) )

                $('#cf_form')[0].submit();
            });

        });
    </script>
@endsection