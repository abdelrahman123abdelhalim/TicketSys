@extends('layouts.admin')

@section('title')
بيانات التذكرة
@stop

@section('content')
<div class="container">
	<h1>بيانات التذكرة</h1>

	<table class="table table-bordered">
		<tbody>
			<tr>
				<th scope="row">كود الشكوى</th>
				<td>{{ $ticket->ticket_code }}</td>
			</tr>
			<tr>
				<th scope="row">حالة الشكوى</th>
				<td>
					@if($ticket->status == 1)
					جديد
					@elseif($ticket->status == 2)
					جاري التحقق
					@elseif($ticket->status == 3)
					جاري المعالجة
					@elseif($ticket->status == 4)
					بإنتظار رد الجهة الطالبة
					@elseif($ticket->status == 5)
					بإنتظار اعتماد لجنة الحوكمة
					@elseif($ticket->status == 6)
					تمت المعالجة
					@elseif($ticket->status == 7)
					ملغاة
					@elseif($ticket->status == 8)
					إعادة فتح
					@else
					Unknown Type
					@endif
				</td>
			</tr>
			<tr>
				<th scope="row">اسم العميل</th>
				<td>{{ $ticket->customer_name }}</td>
			</tr>
			<tr>
				<th scope="row">نوع الشكوى</th>
				<td>
					@if($ticket->type == 1)
					مشكلة
					@elseif($ticket->type == 2)
					تحسين وتطوير
					@elseif($ticket->type == 3)
					متطلبات جديدة
					@elseif($ticket->type == 4)
					طلب خدمة
					@else
					Unknown Type
					@endif
				</td>
			</tr>
			<tr>
				<th scope="row">اسم المستخدم</th>
				<td>{{ $ticket->user_name }}</td>
			</tr>
			<tr>
				<th scope="row">موجهه إلى</th>
				<td>
					@if($ticket->directed_to == 1)
					دعم فني
					@elseif($ticket->directed_to == 2)
					مبيعات
					@elseif($ticket->directed_to == 3)
					مالية
					@else
					Unknown
					@endif
				</td>
			</tr>
			<tr>
				<th scope="row">تاريخ الإنشاء</th>
				<td>{{ $ticket->created_at->format('Y-m-d') }}</td>
			</tr>
			<tr>
				<th scope="row">تاريخ اخر تحديث</th>
				<td>{{ $ticket->updated_at ?? "--" }}</td>
			</tr>
		</tbody>
	</table>

	<a href="{{ route('admin.tickets.index') }}" class="btn btn-primary">العودة</a>
</div>
@endsection