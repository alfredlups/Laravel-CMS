<form method="post" action="{{ route('web-form',$form->form_route)  }}" enctype="multipart/form-data" method="post">
	{{ csrf_field() }}
	@foreach( $fields as $field )
         <?php $options = explode(';',$field->options); ?>
    <div class="col-12">
        <label for="{{$field->name}}" class="control-label mb-1"> <span>{{ $field->label }}</span> </label>
        @if( $field->type == "textarea" )
            <textarea name="{{$field->name}}" class="form-control" {{$field->is_required == 1 ? 'required' : ''}}></textarea>
        @elseif( $field->type == "select" )
            <select name="{{$field->name}}" class="form-control" {{$field->is_required == 1 ? 'required' : ''}}>
                @foreach( $options as $option )
                    <option>{{ $option }}</option>
                @endforeach
            </select>
        @elseif( $field->type == "checkbox" )
            <br>
            @foreach( $options as $option )
                <input type="{{$field->type}}" name="{{$field->name}}[]" {{$field->is_required == 1 ? 'required' : ''}}> {{ $option }} 
            @endforeach
        @elseif( $field->type == "radio" )<br>
            @foreach( $options as $option )
                <input type="{{$field->type}}" name="{{$field->name}}" {{$field->is_required == 1 ? 'required' : ''}}> {{ $option }}
            @endforeach
        @elseif( $field->type == "boolean" )
            <input type="checkbox" name="{{$field->name}}" {{$field->is_required == 1 ? 'required' : ''}}>      
        @else
            <input type="{{$field->type}}" name="{{$field->name}}" class="form-control" {{$field->is_required == 1 ? 'required' : ''}}>
        @endif
    </div>
   @endforeach
   <br>
   <div class="col-xs-3">
        <button id="form-fields-save" type="submit" class="btn btn-lg btn-info">
            <span id="payment-button-amount">Submit</span>
        </button>
    </div>
</form>