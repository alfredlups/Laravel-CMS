@extends('layouts.admin.app')
@section('styles')
	<style type="text/css">
		.table-top-campaign.table tr td:last-child{ color: unset; text-align: left;  }
	</style>
@endsection
@section('content')

<!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        	<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#menuModal">
                                Create New Workflow
                            </button>
                            <!-- TOP CAMPAIGN-->
                                <div class="top-campaign col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px;">
                                    <h3 class="title-3 m-b-30">Manage Workflow</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                        	<thead>
                                        		<tr>
                                        			<th>Name</th>
                                                    <th>Email</th>
                                                    <th>Created At</th>
                                        			<th></th>
                                        		</tr>
                                        	</thead>
                                            <tbody>
                                            @if( count($workflow) > 0 )
                                                @foreach( $workflow as $work )
                                                    <tr>
                                                        <td>{{ $work->name }}</td>
                                                        <td>{{ $work->emails }}</td>
                                                        <td>{{ $work->created_at }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-secondary mb-1 workflow-edit" data-id="{{ $work->id }}" data-name="{{ $work->name }}" data-toggle="modal" data-target="#editmenuModal">
                                                                Edit
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                No Workflow
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--  END TOP CAMPAIGN-->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright ?? 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
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
                        <form method="post" action="{{ route('workflow-create') }}">
                            {{ csrf_field() }}
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Create New Workflow</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12">
                                    <label for="x_card_code" class="control-label mb-1">Name</label>
                                    <div class="input-group">
                                        <input name="name" type="text" class="form-control" value="" id="workflowName" required>
                                    </div>
                                </div><br>
                                <div class="col-12">
                                    <label for="x_card_code" class="control-label mb-1">Emails (Separated with semicolon)</label>
                                    <div class="input-group">
                                        <textarea name="emails" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->
            <!-- modal medium -->
            <div class="modal fade" id="editmenuModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="post" action="{{ route('workflow-update') }}">
                            {{ csrf_field() }}
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Edit Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12">
                                    <label for="x_card_code" class="control-label mb-1">Name</label>
                                    <div class="input-group">
                                        <input name="name" type="text" class="form-control" value="" id="workflowName" required>
                                        <input type="hidden" name="id" id="workflowId">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="#" class="btn btn-danger delete-workflow" style="color:#fff;">Delete</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->

@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.workflow-edit', function(){
                var id = $(this).data('id');
                var name = $(this).data('name');
                var menu = $('#editmenuModal');
                menu.find('#workflowName').val( name );
                menu.find('#workflowId').val( id );
                menu.find('.delete-workflow').attr('href', "{{ url('/menu-delete/') }}/" + id);
            });
            $(".delete-workflow").click(function(){
                var conf = confirm('Are you sure you want to delete this menu?');
                if( conf === true ){
                    return true;
                }
                return false;
            });
        });
    </script>
@endsection
