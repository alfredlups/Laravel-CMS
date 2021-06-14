<div class="col-lg-6">
    <div class="card">
        <div class="card-header">FORM FIELDS</div>
        <div class="card-body">
            <div class="row form_fields">
               @foreach( $fields as $field )
                     <?php $options = explode(';',$field->options); ?>
                    <div class="col-12" style="margin-top:10px;">
                        <label for="{{$field->name}}" class="control-label mb-1"> <span>{{ $field->label }}</span> <small>{{$field->is_required == 1 ? '(required)' : ''}}</small></label>
                        @if( $field->order > 3 )
                            <label class="float-right">
                                <a href="{{route('form-fields-item-edit', $field->id)}}" title="edit"><i class="fa fa-edit"></i> | </a> 
                                <a href="{{route('form-fields-item-delete', $field->id)}}" title="delete" class="field-item-delete"><i class="fa fa-cut"></i></a>
                            </label>
                        @endif     
                        @if( $field->type == "textarea" )
                            <textarea name="{{$field->name}}" class="form-control"></textarea>
                        @elseif( $field->type == "select" )
                            <select name="{{$field->name}}" class="form-control">
                                @foreach( $options as $option )
                                    <option>{{ $option }}</option>
                                @endforeach
                            </select>
                        @elseif( $field->type == "checkbox" )
                            <br>
                            @foreach( $options as $option )
                                <input type="{{$field->type}}" name="{{$field->name}}"> {{ $option }} 
                            @endforeach
                        @elseif( $field->type == "radio" )<br>
                            @foreach( $options as $option )
                                <input type="{{$field->type}}" name="{{$field->name}}"> {{ $option }}
                            @endforeach
                        @elseif( $field->type == "boolean" )
                            <input type="checkbox" name="{{$field->name}}" required>      
                        @else
                            <input type="{{$field->type}}" name="{{$field->name}}" class="form-control" required>
                        @endif
                    </div>
               @endforeach
            </div>
        </div>
    </div>
</div>