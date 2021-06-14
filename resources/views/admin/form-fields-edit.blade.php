@extends('layouts.admin.app')
@section('styles')
    <style type="text/css">
        .table-top-campaign.table tr td:last-child{ color: unset; text-align: left;  }
    </style>
@endsection
@section('content')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @if( session()->has('message') )
                            <div class="message">{{ session()->get('message') }}</div><br>
                        @endif
                         @include('admin.form-tab-menus')
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-lg-6">
                                <form action="{{ route('form-fields-item-update') }}" id="form-fields" method="post" style="position: relative;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="form_id" value="{{ $form_field->form_id }}">
                                    <input type="hidden" name="form_field_id" value="{{ $form_field->id }}">
                                    <input type="hidden" name="fields" id="form_fields">
                                    <input type="hidden" name="options" id="options">
                                    <div class="card">
                                        <div class="card-header">CUSTOM FIELDS</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="field_type" class="control-label mb-1"> Field Type</label>
                                                    <div class="input-group">
                                                        <select name="field_type" class="form-control field_type" required>
                                                            <option value="text" {{$form_field->type == "text" ? "selected" : ""}}>Text (string) </option>
                                                            <option value="textarea" {{$form_field->type == "textarea" ? "selected" : ""}}>Text (multiline)</option>
                                                            <option value="date" {{$form_field->type == "date" ? "selected" : ""}}>Date</option>
                                                            <option value="select" {{$form_field->type == "select" ? "selected" : ""}}>Dropdown (list)</option>
                                                            <option value="checkbox" {{$form_field->type == "checkbox" ? "selected" : ""}}>Checkbox (list)</option>
                                                            <option value="radio" {{$form_field->type == "radio" ? "selected" : ""}}>Radio (list)</option>
                                                            <option value="boolean" {{$form_field->type == "boolean" ? "selected" : ""}}>True/False (boolean)</option>     
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12"><br>
                                                    <label for="label" class="control-label mb-1"> Label</label>
                                                    <div class="input-group">
                                                        <input type="text" name="label" class="form-control label" value="{{ $form_field->label }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 dropdown-list" style="{{$form_field->options == '' ? 'display:none' : 'display:block'}}"><br>
                                                    <label for="label" class="control-label mb-1"> Options (separated by semicolon)</label>
                                                    <div class="input-group">
                                                        <textarea name="options" class="form-control options" style="min-height: 200px;">{{ $form_field->options }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12"><br>
                                                    Required
                                                    <label class="switch switch-3d switch-primary mr-3">
                                                        <input type="checkbox" name="is_required" class="switch-input is_required" {{$form_field->is_required == 1 ? "checked" : ""}}>
                                                        <span class="switch-label"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                </div>
                                            </div>    
                                            
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <button id="form-fields-save" type="submit" class="btn btn-lg btn-info">
                                            <span id="payment-button-amount">Update</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            @include('admin.form-fields-item')
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
        $('#form-fields').submit(function(e){
            var fields =[];
            var label = $(this).find('.label').val();
            var type = $(this).find('.field_type').val();
            var name = label.replace(/\ /g, '_').toLowerCase();
            var required = $('.is_required').is(":checked") ? 1 : 0;
            var options = $(this).find('.options').val();
            fields.push(name,label, type, required);
            $("#form_fields").val( fields );
            $('#options').val( options );
        });
        $('.field_type').change(function(){
            if( $(this).val() == 'select' || $(this).val() == 'checkbox' || $(this).val() == 'radio'){
                $('.dropdown-list').css('display','block');
            }else{
                $('.dropdown-list').css('display','none');
            }
        });
        $('.field-item-delete').click(function(){
            var conf = confirm('Are you sure you want to delete this field item?');
            if( conf === true ){
                return true;
            }else{
                return false;
            }
        });
    });
</script>
@endsection
