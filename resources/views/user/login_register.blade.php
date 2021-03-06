@extends('user.layout.page')

@section('content')		
<section class="header_text sub">
	<img class="pageBanner" src="user/themes/images/pageBanner.png" alt="New products" >
	<h4><span>Login or Regsiter</span></h4>
</section>			
<section class="main-content">				
	<div class="row">
		<div class="span5">					
			<h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
			<form action="login" method="post">
				<input type="hidden" name="_token" value="{{csrf_token('')}}">
				<input type="hidden" name="next" value="/">
				<fieldset>
					<div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls">
							<input type="text" placeholder="Enter your email" id="username" class="input-xlarge" name="txtEmail" value="{{isset($emailCookie) ? $emailCookie : old('txtEmail')}}">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<input type="password" placeholder="Enter your password" id="password" class="input-xlarge" name="txtPass">
						</div>
					</div>
					<div class="control-group">
						<input tabindex="3" class="btn btn-inverse large" type="submit" value="Sign into your account">
						<hr>
						<p class="reset">Recover your <a tabindex="4" href="#" title="Recover your username or password">username or password</a></p>
					</div>
				</fieldset>
			</form>				
		</div>
		<div class="span7">					
			<h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
			<form action="register" method="post" class="form-stacked">
				<input type="hidden" name="_token" value="{{csrf_token('')}}">
				<fieldset>
					<div class="control-group">
						<label class="control-label">Username</label>
						<div class="controls">
							<input type="text" placeholder="Enter your username" class="input-xlarge" name="txtUser" value="{{old('txtUser')}}">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email address:</label>
						<div class="controls">
							<input type="email" placeholder="Enter your email" class="input-xlarge" name="txtEmail" value="{{old('txtEmail')}}">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Fullname:</label>
						<div class="controls">
							<input type="text" placeholder="Enter your fullname" class="input-xlarge" name="txtFullName" value="{{old('txtFullName')}}">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Phone:</label>
						<div class="controls">
							<input type="text" placeholder="Enter your phone" class="input-xlarge" name="txtPhone" value="{{old('txtPhone')}}">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Address:</label>
						<div class="controls">
							<input type="text" placeholder="Enter your address" class="input-xlarge" name="txtAddress" value="{{old('txtAddress')}}">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Password:</label>
						<div class="controls">
							<input type="password" placeholder="Enter your password" class="input-xlarge" name="txtPass" value="{{old('txtPass')}}">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Re-Password:</label>
						<div class="controls">
							<input type="password" placeholder="Enter your password" class="input-xlarge" name="txtRePass" value="{{old('txtRePass')}}">
						</div>
					</div>							                            
					<div class="control-group">
						<p>Now that we know who you are. I'm not a mistake! In a comic, you know how you can tell who the arch-villain's going to be?</p>
					</div>
					<hr>
					<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Create your account"></div>
				</fieldset>
			</form>					
		</div>				
	</div>
</section>			
@endsection

@section('script')
<script>
	$(document).ready(function() {
		$('#checkout').click(function (e) {
			document.location.href = "checkout.html";
		})
	});
</script>		
@endsection