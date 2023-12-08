@extends('layouts.register')

@section('title', 'دخول')

@section('styles')
<link href="{{ asset('assets/admin/css/register/register-styles.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="register-box">
	<h3 style="text-align: center;">
		<img src="{{ asset('assets/images/hail.JPG') }}" alt="دخول"
			style="display: block; margin: 0 auto; max-width: 200px; height: auto;">
	</h3>
	<form action="{{ route('login') }}" method="post">
		@csrf


		<div class="form-group">
			<input type="email" class="form-control" placeholder="البريد الإلكتروني" name="email" dir="rtl">
			@error('email')
			<span class="text-danger">{{ $message }}</span>
			@enderror
		</div>

		<div class="form-group">
			<input type="password" class="form-control" placeholder="كلمة المرور" name="password"
				autocomplete="new-password" dir="rtl">
			@error('password')
			<span class="text-danger">{{ $message }}</span>
			@enderror
		</div>

		<button type="submit" class="btn btn-primary btn-block">دخول</button>
	</form>
	<div class="text-center mt-3">
		<a href="{{ route('register_form') }}" class="btn btn-success">تسجيل عضو جديد</a>
	</div>
</div>

@endsection