@if (@isset($filteredData) && !@empty($filteredData) && count($filteredData) >0)
@foreach($filteredData as $record)
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
@else
<div class="alert alert-danger">
	عفوا لاتوجد بيانات لعرضها !!
</div>
@endif