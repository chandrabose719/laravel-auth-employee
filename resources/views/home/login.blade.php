
@extends('main_layout')

@section('content')
    <div id="login">
        <div class="container">
            <div class="row">
            	<div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-12 col-xs-12 col-12">
            		<div class="login-block">
            			<div class="login-content">
            				<h2>Login</h2>
            				<form method="post" action="{{ url('/login') }}">
            					@csrf
                                <div class="form-group">
            						<label>User Email: <span class="text-danger">*</span></label>
            						<input type="email" class="form-control custom-radius" name="user_email" id="user_email" value="{{ old('user_email') }}">
                                    @if($errors->has('user_email')) 
                                        <small class="text-danger">{{ $errors->first('user_email') }}</small> 
                                    @endif
            					</div>
            					<div class="form-group">
            						<label>User Password: <span class="text-danger">*</span></label>
            						<input type="password" class="form-control custom-radius" name="user_password" id="user_password">
                                    @if($errors->has('user_password')) 
                                        <small class="text-danger">{{ $errors->first('user_password') }}</small> 
                                    @endif
            					</div>
            					<div class="form-group">
            						<input type="submit" class="form-control btn btn-success btn-custom-success custom-radius" name="login-submit" value="SUBMIT">
            					</div>
            				</form>
            				<p class="text-right">Don't have an account? <a class="text-custom" href="/register">Register</a></p>
            			</div>
            		</div>
            	</div>	
            </div>
        </div>
    </div>    
@endsection


