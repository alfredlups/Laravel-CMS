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
                        	<a href="{{ route('snippets') }}" class="btn btn-secondary">Add new</a><br>
                            <!-- TOP CAMPAIGN-->
                                <div class="top-campaign col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px;">
                                    <h3 class="title-3 m-b-30">Snippets</h3>
                                    <div class="table-responsive">
                                        <table class="table table-top-campaign">
                                        	<thead>
                                        		<tr>
                                        			<th>Name</th>
                                                    <th>Created At</th>
                                        			<th></th>
                                        		</tr>
                                        	</thead>
                                            <tbody>
                                                @foreach( $snippets as $snippet )
                                                	<tr>
	                                                    <td>{{ $snippet->snippet_name }}</td>
                                                        <td>{{ $snippet->created_at }}</td>
	                                                    <td>
                                                            <a href="{{ route('snippets-view',$snippet->id) }}" class="btn btn-info btn-sm snippet-edit">Edit</a> 
                                                            <!--<a href="{{ route('snippets-delete', $snippet->id) }}" class="btn btn-danger btn-sm snippet-delete">Remove</a>-->
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
    <script>
        $(document).ready(function(){
        
        });
    </script>
@endsection
