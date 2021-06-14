<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
   <li class="nav-item">
      <a class="nav-link {{ Route::current()->getName() == 'form-item' ? 'active' : '' }}"  href="{{route('form-item',$form->id)}}">FORM DETAILS</a>
   </li>
   <li class="nav-item">
      <a class="nav-link {{ Route::current()->getName() == 'form-fields' || Route::current()->getName() == 'form-fields-item-edit' ? 'active' : '' }}"  href="{{route('form-fields',$form->id)}}">FORM FIELDS</a>
   </li>
    <li class="nav-item">
      <a class="nav-link {{ Route::current()->getName() == 'form-autoresponder' ? 'active' : '' }}" href="{{route('form-autoresponder',$form->id)}}">AUTORESPONDER</a>
   </li>
    <li class="nav-item">
      <a class="nav-link {{ Route::current()->getName() == 'form-html' ? 'active' : '' }}" id="pills-contact-tab" href="{{route('form-html',$form->id)}}">FORM HTML</a>
    </li>
</ul>    