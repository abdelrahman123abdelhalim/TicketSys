@extends('layouts.admin')

@section('title')
إنشاء تذكرة
@stop

@section('content')
<div class="content">
	<div class="page-header">
		<div class="d-flex justify-content-between align-items-center">
			<div class="page-title">
				<h1>إنشاء تذكرة</h1>
			</div>
		</div>
	</div>

	<div class="page-content">
		<form action="{{ route('store.NewTicket') }}" method="post" enctype="multipart/form-data">
			@csrf

			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="type">نوع الشكوى</label>
						<select class="form-control" name="type" id="type">
							<option value="1">مشكلة</option>
							<option value="2"> تحسين وتطوير</option>
							<option value="3"> متطلبات جديدة</option>
							<option value="4"> طلب خدمة</option>
						</select>
						@error('type')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="importance_level">درجة الأهمية</label>
						<select class="form-control" id="importance_level" name="importance_level">
							<option value="1">منخفضة</option>
							<option value="2">متوسطة</option>
							<option value="3">عالية</option>
						</select>
						@error('importance_level')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-4">

					<div class="form-group">
						<label for="user_name">اسم المستخدم</label>
						<input type="text" class="form-control" id="user_name" name="user_name">
						@error('user_name')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>


				<div class="col-md-4">
					<div class="form-group">
						<label for="customer_name">اسم العميل</label>
						<input type="text" class="form-control" id="customer_name" name="customer_name">
						@error('customer_name')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="phone_number">رقم الجوال</label>
						<input type="text" class="form-control" id="phone_number" name="phone_number">
						@error('phone_number')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="email">الإيميل</label>
						<input type="email" class="form-control" id="email" name="email">
						@error('email')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="directed_to">موجهة إلى</label>
						<select class="form-control" id="directed_to" name="directed_to">
							<option value="1">دعم فني</option>
							<option value="2">مبيعات</option>
							<option value="3">مالية</option>
						</select>
						@error('directed_to')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-8">
					<div class="form-group">
						<label for="complaint_subject">موضوع الشكوى</label>
						<input class="form-control" id="complaint_subject" name="complaint_subject">
						@error('complaint_subject')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<label for="complaint_description">وصف الشكوى</label>
						<textarea class="form-control" id="complaint_description"
							name="complaint_description"></textarea>
						@error('complaint_description')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group" style="border: 1px solid #ccc; padding: 10px;">
						<label for="attachments">المرفقات</label>
						<input type="file" class="form-control-file" id="attachments" name="attachments[]" multiple>
					</div>
				</div>
			</div>

			<div class="text-center">
				<button type="submit" class="btn btn-primary mx-auto">إرسال</button>
			</div>
		</form>
	</div>
</div>
@stop