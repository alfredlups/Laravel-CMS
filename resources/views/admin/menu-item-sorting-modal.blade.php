<div class="modal fade" id="menuItemModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">SORT MENU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="menu-box">
                    <ul class="menu-list sortable ui-sortable">
                        @module_menus('menu_items','Header Navigation', 5)
                        @foreach( $menu_items as $parent_item )
                            @if( $parent_item->parent == 0 )
                                <li data-id="{{ $parent_item->id }}" data-parent="0">
                                    <a href="javascript:void(0)" onclic="return false;" class="ui-sortable-handle">{{ $parent_item->name }}</a>
                                    <ul class="submenu-list">
                                        @foreach( $menu_items as $child )
                                            @if( $parent_item->id == $child->parent )
                                                <li data-id="{{ $child->id }}">
                                                    <a href="javascript:void(0)" class="ui-sortable-handle">{{ $child->name }}</a>
                                                    <ul class="submenu-list">    
                                                        @foreach( $menu_items as $second_child )
                                                            @if( $child->id == $second_child->parent )
                                                                <li data-id="{{ $second_child->id }}">
                                                                    <a href="javascript:void(0)" class="ui-sortable-handle">{{ $second_child->name }}</a>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary btn-save-menu">Save</button>
            </div>
        </div>
    </div>
</div>