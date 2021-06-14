@extends('layouts.admin.app')
@section('styles')
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <style type="text/css">
        .parent_menu{ padding: 0 10px 0 30px; }
        #menuModal .link{ color: #333333 !important; cursor: pointer; }
        #menuModal .link:hover,#menuModal .link.selected{ color: #007bff !important;  }

        .menu-box {
          width: 100%;
          padding: 10px;
        }
        .menu-box ul {
          margin: 0;
          padding: 0;
          list-style: none;
        }
        .menu-box ul.menu-list li {
          display: block;
          margin-bottom: 5px;
          border: 1px solid #eee;
          background: #fff;
          padding-right: 20px;
        }
        .menu-box ul.menu-list > li a {
          background: #fff;
          display: block;
          font-size: 14px;
          color: red;
          text-transform: uppercase;
          text-decoration: none;
          padding: 10px;
        }
        .menu-box ul.menu-list > li a:hover {
          cursor: move;
        }
        .menu-box ul.menu-list ul {
          margin-left: 20px;
          margin-top: 5px;
        }
        .menu-box ul.menu-list ul li a {
          color: blue;
        }
        .menu-box li.menu-highlight {
          border: 1px dashed red !important;
          background: #f5f5f5;
        }
    </style>
@endsection
@section('content')

<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @if( session()->has('message') )
                            <br>
                            <div class="message">{{ session()->get('message') }}</div>
                        @endif
                        <h4>{{ $menu->name }}</h4>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-lg-8">
                                <form action="{{ route('menu-item-create') }}" method="post" style="position: relative;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                    <input type="hidden" name="page_id" id="pageId">
                                    <div class="card">
                                        <div class="card-header">CREATE MENU ITEM</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1"> Name</label>
                                                    <div class="input-group">
                                                        <input name="menu_name" type="text" class="form-control" value="" id="pageName" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">URL</label>
                                                    <div class="input-group">
                                                        <input name="menu_url" type="text" class="form-control menu_url" value="" required>
                                                        <div class="input-group-addon" id="editURL" data-toggle="modal" data-target="#menuModal">
                                                            <i class="fas fa-link"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6"><br>
                                                    <label for="x_card_code" class="control-label mb-1">Target</label>
                                                    <div class="input-group">
                                                        <select name="menu_target" class="form-control">
                                                           <option value="_blank">Blank</option>
                                                           <option value="_self">Self</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6"><br>
                                                    <label for="x_card_code" class="control-label mb-1">Parent Menu</label>
                                                    <div class="input-group">
                                                        <select name="menu_parent" class="form-control">
                                                            <option value="0">Root</option>
                                                            @foreach( $menus as $item )
                                                                @if( $item->parent == 0 )
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6"><br>
                                                    <label for="x_card_code" class="control-label mb-1">Class Name</label>
                                                    <div class="input-group">
                                                        <input type="text" name="menu_class" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-6"><br>
                                                    <label for="x_card_code" class="control-label mb-1">ID</label>
                                                    <div class="input-group">
                                                        <input type="text" name="attr_id" class="form-control">
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
                                            </div><br>
                                            <div class="col-xs-3">
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info">
                                                    <span id="payment-button-amount">Save</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @include('admin.sidebar-menu-structure')
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
            <!-- modal medium -->
            <div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Pages</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12">
                                @foreach( $pages as $page )
                                    <div class="link" data-id="{{ $page->id }}">{{ $page->slug }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->
            @include('admin.menu-item-sorting-modal')
@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://ilikenwf.github.io/jquery.mjs.nestedSortable.js"></script>
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

        $("#menuModal .link").click(function(){
            $(".link").removeClass('selected');
            $(this).addClass('selected');
            $('.menu_url').val( $(this).text() );
            $('#pageId').val( $(this).data('id') );
        });

        $('.sortable').nestedSortable({
            forcePlaceholderSize: true,
            items: 'li',
            handle: 'a',
            placeholder: 'menu-highlight',
            listType: 'ul',
            maxLevels: 3,
            opacity: .6,
        });

        $('.btn-save-menu').click(function(){
            var menu_array = [];
            $('.menu-list > li').each(function(){
                var menu_id = $(this).data('id');
                var parent_id = 0;
                menu_array.push([menu_id, parent_id]);
                $(this).find('> ul > li').each(function(){
                    var child_id = $(this).data('id');
                    var child_parent_id = menu_id;
                    menu_array.push([child_id, child_parent_id]);
                    $(this).find('> ul > li').each(function(){
                        var second_child_id = $(this).data('id');
                        var second_child_parent_id = child_id;
                        menu_array.push([second_child_id, second_child_parent_id]);
                    });
                });
            });

            $.post("{{ route('menu-item-sort') }}", { _token: "{{ csrf_token() }}", sort_array: menu_array }, function(data){
                if( data ){
                    console.log( data );
                    location.reload();
                }else{
                    alert('Server not responding');
                }
            });

        });
    });
</script>
@endsection