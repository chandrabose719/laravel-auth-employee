
@extends('main_layout')

@section('content')
    <div id="dashboard">
        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
            		<h2 class="text-left">Edit Customer</h2>
                    <div class="content-block dashboard-block">
                        <div class="text-right">
                            <a class="px-3 text-primary" href="/new-customer">New Customer</a>
                            <a class="px-3 text-primary" href="/dashboard">Dashboard</a>
                        </div>
                    </div>
                    <div class="content-block dashboard-block">
                        <form method="post" action="{{ url('/edit-customer/'.$customer->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Customer Name: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control custom-radius" name="name" id="name" value="{{ $customer->name }}">
                                        @if($errors->has('name'))
                                            <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Customer Email: <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control custom-radius" name="email" id="email" value="{{ $customer->email }}">
                                        @if($errors->has('email'))
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Customer Mobile: <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control custom-radius" name="mobile" id="mobile" value="{{ $customer->mobile }}">
                                        @if($errors->has('mobile'))
                                            <small class="text-danger">{{ $errors->first('mobile') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Customer Salary: <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control custom-radius" name="salary" id="salary" value="{{ $customer['salary'] }}">
                                        @if($errors->has('salary'))
                                            <small class="text-danger">{{ $errors->first('salary') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">    
                                <div class="col-4 offset-8">
                                    <div class="form-group">
                                        <input type="submit" class="form-control btn btn-success btn-custom-success custom-radius" name="edit-customer-submit" value="SUBMIT">
                                    </div>
                                </div>    
                            </div>        
                        </form>    
            		</div>
            	</div>	
            </div>
        </div>
    </div>    
@endsection


