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
                        	<a href="{{ route('webapp-item', $app->id) }}" class="btn btn-secondary">Add new</a><br>
                            <!-- TOP CAMPAIGN-->
                                <div class="top-campaign col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px;">
                                    <h3 class="title-3 m-b-30">{{ $app->name }} Items</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                        	<thead>
                                        		<tr>
                                        			<th>Name</th>
                                                    <th>Release Date</th>
                                                    <th>Expiry Date</th>
                                                    <th>Created At</th>
                                        			<th></th>
                                        		</tr>
                                        	</thead>
                                            <tbody>
                                                @foreach( $fields as $field )
                                                	<tr>
	                                                    <td>{{ $field->item_name }}</td>
                                                        <td>{{ $field->release_date }}</td>
                                                        <td>{{ $field->expiry_date }}</td>
                                                        <td>{{ $field->created_at }}</td>
	                                                    <td>
                                                            <a href="{{ route('webapp-item-values',$field->id) }}" class="btn btn-info btn-sm">Edit</a> 
                                                            <a href="{{ route('webapp-item-remove',$field->id) }}" class="btn btn-danger btn-sm webapp-item-delete">Delete</a>
                                                        </td>
	                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--  END TOP CAMPAIGN-->
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
            $(".webapp-item-delete").click(function(){
                var conf = confirm('Are you sure you want to delete this?');
                if( conf === true ){
                    return true;
                }
                return false;
            });
        });
    </script>
@endsection