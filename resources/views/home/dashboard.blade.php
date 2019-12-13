
@extends('main_layout')

@section('content')
    <div id="dashboard">
        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
            		<h2 class="text-left">Dashboard</h2>
                    <div class="dashboard-block">
                        <div class="content-block filter-content">
                            <div class="row">
                                <div class="col-4">
                                    <div class="text-left">
                                        <input class="form-control custom-radius" type="text" name="filter_keyword" id="filter_keyword" onkeyup="filterCustomer()" placeholder="Enter something to filter...">
                                    </div>
                                </div>
                                <div class="col-6 offset-2">    
                                    <div class="text-right pt-2">
                                        <a class="px-3 text-primary" href="/new-customer">New Customer</a>
                                    </div>
                                </div>
                            </div>        
                        </div>
                        <div class="content-block dashboard-content">
                            {!! $structure !!}    
                		</div>
                    </div>    
            	</div>	
            </div>
        </div>
    </div>    
@endsection


