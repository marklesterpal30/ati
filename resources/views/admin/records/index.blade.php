@extends('admin/layouts.master')
@section('content')
<div class="p-8 bg-white rounded-md h-full shadow-2xl">
	<div class="relative h-full overflow-x-auto shadow-md sm:rounded-lg">
		<div class="flex flex-col sm:flex sm:flex-row sm:justify-between">
			<form id="filterForm" action="{{ url('/admin-records') }}" method="GET" class="mb-4 space-y-2">
				<label for="category" class="mr-2 hidden sm:inline-block">Filter by Category:</label>
				<select name="category" id="category" class="px-2 py-1 border rounded">
					<option value="">All Category</option>
					<option value="ATI SPECIAL ORDER" {{ $selectedCategory == 'ATI SPECIAL ORDER' ? 'selected' : '' }}>ATI SPECIAL ORDER</option>
					<option value="ATI MEMORANDUM ORDER" {{ $selectedCategory == 'ATI MEMORANDUM ORDER' ? 'selected' : '' }}>ATI MEMORANDUM ORDER</option>
					<option value="LETTER" {{ $selectedCategory == 'LETTER' ? 'selected' : '' }}>LETTER</option>
					<option value="DA SPECIAL ORDER" {{ $selectedCategory == 'DA SPECIAL ORDER' ? 'selected' : '' }}>DA SPECIAL ORDER</option>
					<option value="DA MEMORANDUM ORDER" {{ $selectedCategory == 'DA MEMORANDUM ORDER' ? 'selected' : '' }}>DA MEMORANDUM ORDER</option>
					<option value="OTHERS" {{ $selectedCategory == 'OTHERS' ? 'selected' : '' }}>OTHERS</option>
				</select>
				<select name="months" id="months" class="px-2 py-1 w-full sm:w-fit border rounded">
					<option value="" class="">All Months</option>
					@foreach(range(1, 12) as $month)
					<option value="{{ date('F', mktime(0, 0, 0, $month, 1)) }}" {{ $selectedMonth == date('F', mktime(0, 0, 0, $month, 1)) ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
					@endforeach
				</select>
				<!-- <label for="weeks" class="mr-2 hidden sm:inline-block">Week:</label>
					<select name="weeks" id="weeks" class="px-2 py-1 border rounded">
					   <option value="">All Week</option>
					   <option value="1st Week" {{ $selectedWeek == '1st Week' ? 'selected' : '' }}>1st Week</option>
					   <option value="2nd Week" {{ $selectedWeek == '2nd Week' ? 'selected' : '' }}>2nd Week</option>
					   <option value="3rd Week" {{ $selectedWeek == '3rd Week' ? 'selected' : '' }}>3rd Week</option>
					   <option value="4th Week" {{ $selectedWeek == '4th Week' ? 'selected' : '' }}>4th Week</option>
					</select> -->
				<select name="office" id="" class="px-2 py-1 border rounded">
					<option value="">All Office</option>
					@foreach($offices as $office)
					<option value="{{$office->id}}">{{$office->name}}</option>
					@endforeach
				</select>
				<select name="status" id="status" class="px-2 py-1 w-full sm:w-fit border rounded">
					<option value="">All status</option>
					<option value="active">Active</option>
					<option value="inactive">Inactive</option>
					<option value="disposal">Disposal</option>
				</select>
				<select name="type" id="type" class="px-2 py-1 w-full sm:w-fit border rounded">
					<option value="">All Type</option>
					<option value="incoming">Incoming</option>
					<option value="outgoing">Outgoing</option>
				</select>
				<button type="submit" class="px-3 py-1 bg-green-500 text-white rounded ml-2">Filter</button>
			</form>
			<form id="reportForm" action="{{ url('/admin-generateReport') }}" method="GET">
				<input type="text" name="reportcategory" value="" class="hidden">
				<input type="text" name="reportmonth" value="" class="hidden">
				<input type="text" name="reportstatus" value="" class="hidden">
				<input type="text" name="reporttype" value="" class="hidden">
				<!-- <input type="text" name="reportweek" value="" class="hidden"> -->
				<button type="submit" class="bg-green-400 px-3 py-1.5 mb-2 sm:mb-0 text-white">Generate</button>
			</form>
		</div>
		<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
			<thead class="text-xs text-gray-700 uppercase bg-green-400 dark:bg-gray-700 dark:text-gray-400">
				<tr>
					<th scope="col" class="px-6 py-3">
						File Name
					</th>
					<th scope="col" class="px-6 py-3">
						Category
					</th>
					<th scope="col" class="px-6 py-3">
						From
					</th>
					<th scope="col" class="px-6 py-3">
						To
					</th>
					<th scope="col" class="px-6 py-3">
						Received Date
					</th>
					<th scope="col" class="px-6 py-3">
						Status
					</th>
					<th scope="col" class="px-6 py-3">
						Action
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($files as $file)
				<tr class="{{ $loop->iteration % 2 == 0 ? 'bg-green-200' : 'bg-white' }} border-b dark:bg-gray-800 dark:border-gray-700">
					<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
						{{ $file->file}}
					</th>
					<td class="px-6 py-4">
						{{ $file->category}}
					</td>
					<td class="px-6 py-4">
						{{ $file->sender->email}}
					</td>
					<td class="px-6 py-4">
						{{ $file->recieved->name}}
					</td>
					<td class="px-6 py-4">
						{{ $file->created_at}}
					</td>
					<td class="px-6 py-4 " >
						<span class="px-2 py-1.5 font-semibold text-white {{ $file->status == 'received' ? 'bg-green-400' : ($file->status == 'accepted' ? 'bg-green-700' : ($file->status == 'forwarded' ? 'bg-blue-300' : '')) }}">
						{{ $file->status }}
						</span>
					</td>
					<td class="px-6 py-4">
						<a href="{{ url('/admin-records/' . $file->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<script>
	document.addEventListener('DOMContentLoaded', function() {
	  var category = document.getElementById('category').value;
	  var month = document.getElementById('months').value;
	  var status = document.getElementById('status').value;
	  var type = document.getElementById('type').value;
	
	
	
	  console.log(category);
	
	  // Set initial values of hidden inputs
	  document.getElementById('reportForm').querySelector('input[name="reportcategory"]').value = category;
	  document.getElementById('reportForm').querySelector('input[name="reportmonth"]').value = month;
	  document.getElementById('reportForm').querySelector('input[name="reportstatus"]').value = status;
	  document.getElementById('reportForm').querySelector('input[name="reporttype"]').value = type;
	
	
	//   document.getElementById('reportForm').querySelector('input[name="reportweek"]').value = week;
	
	  // Update hidden inputs in the second form when there's a change in the first form
	  document.getElementById('filterForm').addEventListener('change', function() {
	      var category = document.getElementById('category').value;
	      var month = document.getElementById('months').value;
	      var status = document.getElementById('status').value;
	      var type = document.getElementById('type').value;
	
	
	      // var week = document.getElementById('weeks').value;
	
	      // Update hidden inputs in the second form
	      document.getElementById('reportForm').querySelector('input[name="reportcategory"]').value = category;
	      document.getElementById('reportForm').querySelector('input[name="reportmonth"]').value = month;
	      document.getElementById('reportForm').querySelector('input[name="reportstatus"]').value = status;
	      document.getElementById('reportForm').querySelector('input[name="reporttype"]').value = type;
	
	
	      // document.getElementById('reportForm').querySelector('input[name="reportweek"]').value = week;
	  });
	});  // JavaScript to handle form submission and updating hidden inputs
	  document.getElementById('filterForm').addEventListener('change', function() {
	      var category = document.getElementById('category').value;
	      var month = document.getElementById('months').value;
	      var status = document.getElementById('status').value;
	      var type = document.getElementById('type').value;
	
	
	      // var week = document.getElementById('weeks').value;
	      
	      // Update hidden inputs in the second form
	      document.getElementById('reportForm').querySelector('input[name="reportcategory"]').value = category;
	      document.getElementById('reportForm').querySelector('input[name="reportmonth"]').value = month;
	      document.getElementById('reportForm').querySelector('input[name="reportstatus"]').value = status;
	      document.getElementById('reportForm').querySelector('input[name="reporttype"]').value = type;
	
	
	      // document.getElementById('reportForm').querySelector('input[name="reportweek"]').value = week;
	  });
</script>
@endsection