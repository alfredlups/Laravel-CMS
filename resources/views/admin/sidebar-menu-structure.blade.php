<div class="col-lg-4">
    <div class="card">
        <div class="card-header">MENU STRUCTURE <button type="button" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#menuItemModal">
                                Sort Menu</div>
        <div class="card-body">
            <div class="row">
                <div class="parent_menu">
                    <ul>
                        @module_menus('menu_items','Header Navigation', 5)
                        @foreach( $menu_items as $parent_item )
                            @if( $parent_item->parent == 0 )
                                <li>
                                    <a href="{{ route('menu-item-edit', $parent_item->id) }}">{{ $parent_item->name }}</a>
                                    <ul style="margin-left: 30px;">
                                        @foreach( $menu_items as $child )
                                            @if($parent_item->id == $child->parent)
                                            <li>
                                                <a href="{{ route('menu-item-edit', $child->id) }}">{{ $child->name }}</a>
                                                <ul style="margin-left: 30px;">
                                                    @foreach( $menu_items as $second_child )
                                                        @if( $child->id == $second_child->parent )
                                                            <li>
                                                                <a href="{{ route('menu-item-edit', $second_child->id) }}">{{ $second_child->name }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach 
                                                </ul>        
                                            </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>