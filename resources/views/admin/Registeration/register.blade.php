@extends('layouts.register')

@section('title', 'تسجيل عضو جديد')

@section('styles')
<link href="{{ asset('assets/admin/css/register/register-styles.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="register-box">
	<h3>تسجيل عضو جديد</h3>

	<form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
		@csrf

		<div class="form-group">
			<input type="text" class="form-control" placeholder="اسم المستخدم" name="name" dir="rtl">
			@error('name')
			<span class="text-danger">{{ $message }}</span>
			@enderror
		</div>

		<div class="form-group">
			<input type="text" class="form-control" placeholder="اسم الشركة" name="company_name" dir="rtl">
			@error('company_name')
			<span class="text-danger">{{ $message }}</span>
			@enderror
		</div>

		<div class="form-group">
			<input type="email" class="form-control" placeholder="البريد الإلكتروني" name="email" dir="rtl">
			@error('email')
			<span class="text-danger">{{ $message }}</span>
			@enderror
		</div>

		<div class="form-group">
			<input type="text" class="form-control" placeholder="رقم الجوال" name="mobile" dir="rtl">
			@error('mobile')
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

		<div class="form-group">
			<input type="password" class="form-control" placeholder="تأكيد كلمة المرور" name="password_confirmation"
				dir="rtl">
		</div>

		<div class="form-group">
			<h5><label for="image">صورة الملف الشخصي</label></h5>
			<input type="file" class="form-control" id="image" name="image">
			@error('image')
			<span class="text-danger">{{ $message }}</span>
			@enderror
		</div>

		<button type="submit" class="btn btn-success btn-block">تسجيل</button>
	</form>
</div>
@endsection