@extends('layouts.admin')

@section('title')
التذاكر
@stop

@section('content')
<div class="content">
	<div class="page-header">
		<div class="d-flex justify-content-between align-items-center">
			<div class="page-title">
				<h1>Tickets</h1>
			</div>
			<div class="page-actions">
				<a href="{{route('add.NewTicket')}}" class="btn btn-success">Add New Ticket</a>
			</div>
		</div>
	</div>

	<div class="filter-section">
		<form id="filter-form" action="" method="get">
			<div class="form-row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="code">رقم الشكوى</label>
						<input type="text" class="form-control" name="code" id="code">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="status">حالة الشكوى</label>
						<select class="form-control" name="status" id="status">
							<option value="1">جديد</option>
							<option value="2">جاري التحقق</option>
							<option value="3">جاري المعالجة</option>
							<option value="4">بإنتظار رد الجهة الطالبة</option>
							<option value="5">بإنتظار اعتماد لجنة الحوكمه</option>
							<option value="6">تمت المعالجة</option>
							<option value="7">ملغاة</option>
							<option value="8">إعادة فتح</option>
						</select>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="type"> نوع الشكوى</label>
						<select class="form-control" name="type" id="type">
							<option value="1">مشكلة</option>
							<option value="2"> تحسين وتطوير</option>
							<option value="3"> متطلبات جديدة</option>
							<option value="4"> طلب خدمة</option>
						</select>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="customer_name">اسم العميل</label>
						<input type="text" class="form-control" name="customer_name" id="customer_name">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="user_name">اسم المستخدم</label>
						<input type="text" class="form-control" name="user_name" id="user_name">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="directed_to">موجهه إلى</label>
						<select class="form-control" id="directed_to" name="directed_to">
							<option value="1">دعم فني</option>
							<option value="2">مبيعات</option>
							<option value="3">مالية</option>
						</select>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="created_at">تاريخ الإنشاء</label>
						<input type="date" class="form-control" name="created_at" id="created_at">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="updated_at">تاريخ اخر تحديث</label>
						<input type="date" class="form-control" name="updated_at" id="updated_at">
					</div>
				</div>
			</div>
			<div class="form-row justify-content-center">
				<button type="submit" class="btn btn-primary mb-2">بحث </button>
			</div>
		</form>
	</div>


	<div class="page-content">
		<div class="table-responsive">

			<table class="table" id="ticket-table">
				<thead>
					<tr>
						<th>الكود</th>
						<th>اسم العميل</th>
						<th>نوع الشكوى</th>
						<th>اسم المستخدم</th>
						<th>موجهه إلى</th>
						<th>تاريخ الإنشاء</th>
						<th>تاريخ اخر تحديث</th>
						<th>الحالة</th>
						<th>الإجراءات</th>
					</tr>
				</thead>
				<tbody>
					@foreach($records as $record)
					<tr>
						<td>{{ $record['ticket_code'] }}</td>
						<td>{{ $record['customer_name'] }}</td>
						<td>
							@if($record['type'] == 1)
							مشكلة
							@elseif($record['type'] == 2)
							تحسين وتطوير
							@elseif($record['type'] == 3)
							متطلبات جديدة
							@elseif($record['type'] == 4)
							طلب خدمة
							@else
							Unknown Type
							@endif
						</td>
						<td>{{ $record['user_name'] }}</td>
						<td>
							@if($record['directed_to'] == 1)
							دعم فني
							@elseif($record['directed_to'] == 2)
							مبيعات
							@elseif($record['directed_to'] == 3)
							مالية
							@else
							Unknown
							@endif
						</td>
						<td>{{ $record['created_at']->format('Y-m-d') }}</td>
						<td>{{ optional($record['updated_at'])->format('Y-m-d') ?? "--" }}</td>

						<td>
							@if($record['status'] == 1)
							جديد
							@elseif($record['status'] == 2)
							جاري التحقق
							@elseif($record['status'] == 3)
							جاري المعالجة
							@elseif($record['status'] == 4)
							بإنتظار رد الجهة الطالبة
							@elseif($record['status'] == 5)
							بإنتظار اعتماد لجنة الحوكمة
							@elseif($record['status'] == 6)
							تمت المعالجة
							@elseif($record['status'] == 7)
							ملغاة
							@elseif($record['status'] == 8)
							إعادة فتح
							@else
							Unknown Type
							@endif
						</td>
						<td>
							<a href="{{ route('ticket.edit', $record['id']) }}">
								<i class=" fas fa-edit"></i>
							</a>
							|
							<a href="{{ route('ticket.view', $record['id']) }}">
								<i class="fas fa-eye"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<!--Pagination-->
			<div class="custom-pagination">
				@if($records->currentPage() > 1)
				<a href="{{ $records->previousPageUrl() }}">Previous</a>
				@endif

				@if($records->hasMorePages())
				<a href="{{ $records->nextPageUrl() }}">Next</a>
				@endif
			</div>
		</div>
	</div>

</div>
@stop
@section('script')
<script>
$(document).ready(function() {
	$('#filter-form').on('submit', function(e) {
		e.preventDefault();

		$.ajax({
			type: 'GET',
			url: '{{ route("tickets.filter") }}',
			data: $(this).serialize(),
			success: function(data) {
				$('#ticket-table tbody').html(data);
			},
			error: function(xhr, status, error) {
				console.error(xhr.responseText);
			}
		});
	});
});
</script>

@stop