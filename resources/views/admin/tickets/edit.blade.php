@extends('layouts.admin')

@section('title')
تعديل تذكرة
@stop

@section('content')
<div class="content">
	<div class="page-header">
		<div class="d-flex justify-content-between align-items-center">
			<div class="page-title">
				<h1>تعديل تذكرة</h1>
			</div>
		</div>
	</div>

	<div class="page-content">
		<form action="{{route('ticket.update',$ticket->id)}}" method="post" enctype="multipart/form-data">
			@csrf

			<div class="row">

				<div class="col-md-4">
					<div class="form-group">
						<label for="ticket_code"> كود التذكرة</label>
						<input type="text" class="form-control" id="ticket_code" name="ticket_code"
							value="{{$ticket->ticket_code}}" readOnly>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="user_code">كود المستخدم</label>
						<input type="text" class="form-control" id="user_code" name="user_code"
							value="{{$ticket->user_code}}" readOnly>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="user_name">اسم المستخدم</label>
						<input type="text" class="form-control" id="user_name" name="user_name"
							value="{{$ticket->user_name}}">
						@error('user_name')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="status">حالة الشكوى</label>
						<select class="form-control" name="status" id="status">
							<option value="1" {{ old('status',$ticket['status']) == 1 ? 'selected' : '' }}>جديده
							</option>
							<option value="2" {{ old('status',$ticket['status']) == 2 ? 'selected' : '' }}> جاري التحقق
							</option>
							<option value="3" {{ old('status',$ticket['status']) == 3 ? 'selected' : '' }}> جاري
								المعالجة
							</option>
							<option value="4" {{ old('status',$ticket['status']) == 4 ? 'selected' : '' }}> بإنتظار رد
								الجهة الطالبة
							</option>
							<option value="5" {{ old('status',$ticket['status']) == 5 ? 'selected' : '' }}> بإنتظار
								اعتماد لجنة الحوكمة
							</option>
							<option value="6" {{ old('status',$ticket['status']) == 6 ? 'selected' : '' }}> طلب تمت
								المعالجة
							</option>
							<option value="7" {{ old('status',$ticket['status']) == 7 ? 'selected' : '' }}> ملغاة
							</option>
							<option value="8" {{ old('status',$ticket['status']) == 8 ? 'selected' : '' }}> طلب إعادة
								فتح
							</option>

						</select>
						@error('type')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="type">نوع الشكوى</label>
						<select class="form-control" name="type" id="type">
							<option value="1" {{ old('type',$ticket['type']) == 1 ? 'selected' : '' }}>مشكلة</option>
							<option value="2" {{ old('type',$ticket['type']) == 2 ? 'selected' : '' }}> تحسين وتطوير
							</option>
							<option value="3" {{ old('type',$ticket['type']) == 3 ? 'selected' : '' }}> متطلبات جديدة
							</option>
							<option value="4" {{ old('type',$ticket['type']) == 4 ? 'selected' : '' }}> طلب خدمة
							</option>
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
							<option value="1"
								{{ old('importance_level',$ticket['importance_level']) == 1 ? 'selected' : '' }}>منخفضة
							</option>
							<option value="2"
								{{ old('importance_level',$ticket['importance_level']) == 2 ? 'selected' : '' }}>متوسطة
							</option>
							<option value="3"
								{{ old('importance_level',$ticket['importance_level']) == 3 ? 'selected' : '' }}>عالية
							</option>
						</select>
						@error('importance_level')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="customer_name">اسم العميل</label>
						<input type="text" class="form-control" id="customer_name" name="customer_name"
							value="{{$ticket->customer_name}}">
						@error('customer_name')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="phone_number">رقم الجوال</label>
						<input type="text" class="form-control" id="phone_number" name="phone_number"
							value="{{$ticket->phone_number}}">
						@error('phone_number')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="email">الإيميل</label>
						<input type="email" class="form-control" id="email" name="email" value="{{$ticket->email}}">
						@error('email')
						<span class=" text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="directed_to">موجهة إلى</label>
						<select class="form-control" id="directed_to" name="directed_to">
							<option value="1" {{ old('directed_to',$ticket['directed_to']) == 1 ? 'selected' : '' }}>
								دعم
								فني</option>
							<option value="2" {{ old('directed_to',$ticket['directed_to']) == 2 ? 'selected' : '' }}>
								مبيعات</option>
							<option value="3" {{ old('directed_to',$ticket['directed_to']) == 3 ? 'selected' : '' }}>
								مالية
							</option>
						</select>
						@error('directed_to')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-8">
					<div class="form-group">
						<label for="complaint_subject">موضوع الشكوى</label>
						<input class="form-control" id="complaint_subject" name="complaint_subject"
							value="{{$ticket->complaint_subject}}">
						@error('complaint_subject')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<label for="complaint_description">وصف الشكوى</label>
						<textarea class="form-control" id="complaint_description" name="complaint_description">
                             {{ $ticket->complaint_description }}
                        </textarea>
						@error('complaint_description')
						<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
				</div>


				<div class="col-md-4">
					<div class="form-group" style="border: 1px solid #ccc; padding: 10px;">
						<label for="attachments">المرفقات</label>
						<input type="file" class="form-control-file" id="attachments" name="attachments[]" multiple>
						@if ($ticket->attachments->count() > 0)
						<p><strong>المرفقات الحالية:</strong></p>
						<div class="row">
							<div class="col-md-12">
								<p><strong>الصور:</strong></p>
								<div class="row">
									@foreach ($ticket->attachments as $attachment)
									@if (Str::endsWith($attachment->path, ['.jpg', '.jpeg', '.png', '.gif']))
									<div class="col-md-3 mb-3">
										<a href="{{ asset('storage/' . $attachment->path) }}" target="_blank">
											<img src="{{ asset('storage/' . $attachment->path) }}" alt="AttachmentImage"
												class="img-thumbnail">
										</a>
									</div>
									@endif
									@endforeach
								</div>
							</div>
							<div class="col-md-12">
								<p><strong>الملفات:</strong></p>
								<ul>
									@foreach ($ticket->attachments as $attachment)
									@unless (Str::endsWith($attachment->path, ['.jpg', '.jpeg', '.png', '.gif']))
									<li>
										<a href="{{ asset('storage/' . $attachment->path) }}" target="_blank">
											Pdf_File
										</a>
									</li>
									@endunless
									@endforeach
								</ul>
							</div>
						</div>
						@endif
					</div>
				</div>

			</div>

			<div class="text-center">
				<button type="submit" class="btn btn-primary mx-auto">تعديل</button>
			</div>
		</form>
	</div>
</div>
@stop