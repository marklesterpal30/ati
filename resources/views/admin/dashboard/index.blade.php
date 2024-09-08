@extends('admin.layouts.master')
@section('content')
<div class="p-8 bg-white shadow-xl rounded-md">
   <div class="flex flex-col sm:flex sm:flex-row space-y-2  sm:space-x-3">
      <div class="w-fit bg-green-500 shadow-md p-4 rounded-md flex items-center  space-x-2 border-l-8 border-green-700">
         <div class="flex flex-col justify-between">
            <h1 class="text-2xl font-bold text-white">Registered Employee</h1>
            <h1 class="text-3xl font-bold text-white">{{$totalUsers}}</h1>
         </div>
         <i class="fa-solid fa-users fa-2xl text-5xl" style="color: #e3e3e3"></i>
      </div>
      <div class="w-fit bg-green-500 shadow-md p-4 rounded-md flex items-center space-x-2 border-l-8 border-green-700">
         <div class="flex flex-col justify-between">
            <h1 class="text-2xl font-bold text-white">Disposal Documents</h1>
            <h1 class="text-3xl font-bold text-white">0</h1>
         </div>
         <i class="fa-solid fa-file-circle-xmark fa-2xl text-5xl" style="color: #e3e3e3"></i>
      </div>
      <div class="w-fit bg-green-500 shadow-md p-4 rounded-md flex items-center space-x-2 border-l-8 border-green-700">
         <div class="flex flex-col justify-between">
            <h1 class="text-2xl font-bold text-white">Active Documents</h1>
            <h1 class="text-3xl font-bold text-white">{{$activeDocuments}}</h1>
         </div>
         <i class="fa-solid fa-file-shield fa-2xl text-5xl" style="color: #e3e3e3"></i>
      </div>
      <div class="w-fit bg-green-500 shadow-md p-4 rounded-md flex items-center space-x-2 border-l-8 border-green-700">
         <div class="flex flex-col justify-between">
            <h1 class="text-2xl font-bold text-white">Inactive Documents</h1>
            <h1 class="text-3xl font-bold text-white">{{$inactiveDocuments}}</h1>
         </div>
         <i class="fa-solid fa-file-circle-question fa-2xl text-5xl" style="color: #e3e3e3"></i>
      </div>
   </div>
   <div class="grid grid-cols-1 sm:grid sm:grid-cols-4  space-y-2 sm:space-y-0 sm:space-x-3 ml-3 mt-8">
      <div class="space-y-3">
         <div class="flex items-center space-x-3">
            <i class="fa-solid fa-circle-arrow-right fa-xl" style="color: #00bd3f;"></i>
            <h1 class="font-bold">{{$acceptedDocument}}</h1>
         </div>
         <h1 class="text-2xl font-bold text-green-600">ACCEPTED  </h1>
         <div class="bg-green-600 p-1 rounded-md"></div>
      </div>
      <div class="space-y-3">
         <div class="flex items-center space-x-3">
            <i class="fa-solid fa-file-circle-check fa-xl" style="color: #00bd3f;"></i>
            <h1 class="font-bold">0</h1>
         </div>
         <h1 class="text-2xl font-bold text-green-600">Forwarded </h1>
         <div class="bg-green-600 p-1 rounded-md"></div>
      </div>
      <div class="space-y-3">
         <div class="flex items-center space-x-3">
            <i class="fa-solid fa-rotate fa-xl" style="color: #00bd3f;"></i>
            <h1 class="font-bold">{{$returnedDocumentCount}}</h1>
         </div>
         <h1 class="text-2xl font-bold text-green-600">RETURN </h1>
         <div class="bg-green-600 p-1 rounded-md"></div>
      </div>
      <div class="space-y-3">
         <div class="flex items-center space-x-3">
            <i class="fa-solid fa-file-circle-xmark fa-xl" style="color: #00bd3f;"></i>
            <h1>0</h1>
         </div>
         <h1 class="text-2xl font-bold text-green-600">DECLINE </h1>
         <div class="bg-green-600 p-1 rounded-md"></div>
      </div>
   </div>
</div>

<div class="mt-4 flex flex-col space-y-2 sm:flex sm:flex-row  sm:space-x-3 sm:space-y-0  shadow-xl rounded-md">
   <div style="" class="bg-white h-96 w-full ">
      <div class="flex items-center p-2 space-x-3">
         <label for="monthFilter" class="hidden sm:block">Select Month:</label>
         <select id="monthFilter" class="p-1 ">
            <option value="0">All Months</option>
            @foreach(range(1,12) as $month)
            <option value="{{$month}}">{{date('F', mktime(0,0,0, $month, 1))}}</option>
            @endforeach
         </select>
         <label for="weekFilter" class="hidden sm:block">Select Week:</label>
         <select id="weekFilter" class="p-1">
            <option value="0">All Weeks</option>
            <option value="1">1st Week</option>
            <option value="2">2nd Week</option>
            <option value="3">3rd Week</option>
            <option value="4">4th Week</option>
            <!-- You can add more weeks if needed -->
         </select>
      </div>
      <canvas id="documentsChart"></canvas>
   </div>
   <div style="" class="bg-white  h-96 w-full flex justify-center overflow-hidden">
      <canvas id="categoriesChart" style="" class=""></canvas>
   </div>
</div>
<script>
   var ctxDocuments = document.getElementById('documentsChart').getContext('2d');
   var myChartDocuments;
   
   // Event listener to update chart when month is changed
   // Default values for month and week filters
   var defaultMonth = 0; // 0 represents all months
   var defaultWeek = 0; // 0 represents all weeks
   
   // Set default values for filters
   document.getElementById('monthFilter').value = defaultMonth;
   document.getElementById('weekFilter').value = defaultWeek;
   
   // Event listener to update chart when month is changed
   document.getElementById('monthFilter').addEventListener('change', function() {
     var selectedMonth = parseInt(this.value);
     var selectedWeek = parseInt(document.getElementById('weekFilter').value);
     updateChart(selectedMonth, selectedWeek);
   });
   
   // Event listener to update chart when week is changed
   document.getElementById('weekFilter').addEventListener('change', function() {
     var selectedMonth = parseInt(document.getElementById('monthFilter').value);
     var selectedWeek = parseInt(this.value);
     updateChart(selectedMonth, selectedWeek);
   });
   
   // Function to update the chart
   function updateChart(month, week) {
     var filteredCounts = {!! json_encode($counts) !!};
   
     if (month !== 0) {
         filteredCounts = filteredCounts.map((count, index) => index + 1 === month ? count : 0);
     }
   
     if (week !== 0) {
         // Calculate start and end index for the selected week
         var startIndex = (week - 1) * 4; // Assuming 4 weeks in a month
         var endIndex = week * 4 - 1;
         filteredCounts = filteredCounts.slice(startIndex, endIndex + 1);
     }
   
     // Log the filtered data
     console.log("Filtered Data:", filteredCounts);
   
     if (myChartDocuments) {
         myChartDocuments.destroy(); // Destroy previous chart instance
     }
   
     myChartDocuments = new Chart(ctxDocuments, {
         type: 'bar',
         data: {
             labels: {!! json_encode($months) !!},
             datasets: [{
                 label: 'Number of Documents',
                 data: filteredCounts,
                 backgroundColor: 'rgba(0, 207, 36, 0.8)',
                 borderColor: 'rgba(75, 192, 192, 1)',
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     }); 
   }
   
   // Initially, update the chart with default values
   updateChart(defaultMonth, defaultWeek);
   
   
     var categories = @json($categories->pluck('category'));
     var counts = @json($categories->pluck('count'));
   
     var ctxCategories = document.getElementById('categoriesChart').getContext('2d');
     var myChartCategories = new Chart(ctxCategories, {
         type: 'pie',
         data: {
             labels: categories,
             datasets: [{
                 label: 'Document Counts per Category',
                 data: counts,
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                     'rgba(255, 159, 64, 0.2)',
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)'
                     // Add more colors if you have more categories
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                     'rgba(255, 159, 64, 1)',
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)'
                     // Add more colors if you have more categories
                 ],
                 borderWidth: 1
             }]
         },
         options: {
             scales: {
                 yAxes: [{
                     ticks: {
                         beginAtZero: true
                     }
                 }]
             }
         }
     });
</script>
@endsection