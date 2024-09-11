@extends('user.layouts.master')
@section('content')

<div class="p-4 flex flex-col sm:flex sm:flex-row  items-start space-x-2 bg-white shadow-lg">

    <div id="STATUS COUNT" class="flex flex-col space-y-3 mr-3">

        <div id="PENDING DOCUMENTS" class="w-fit bg-green-500 shadow-md p-4 rounded-md flex items-center space-y-2 border-l-8 border-green-700">
            <div class="flex flex-col justify-between">
                <h1 class="text-2xl font-bold text-white">Pending Documents</h1>
                <h1 class="text-3xl font-bold text-white">{{$pendingDocumentsCount}}</h1>
            </div>
            <div>
                 <i class="fa-solid fa-file-circle-question fa-2xl text-5xl" style="color: #1a6035;"></i>
            </div>
        </div>

        <div id="RECIEVED DOCUMENTS" class="w-fit bg-green-500 shadow-md p-4 rounded-md flex items-center space-x-2 border-l-8 border-green-700">
            <div class="flex flex-col justify-between">
                <h1 class="text-2xl font-bold text-white">Recieved Documents</h1>
                <h1 class="text-3xl font-bold text-white">{{ $recievedDocumentsCount }}</h1>
            </div>
            <div>
                <i class="fa-solid fa-file-arrow-up fa-2xl text-5xl pr-3" style="color: #1a6035;"></i>
            </div>
        </div>

        <div id="FORWARDED DOCUMENTS" class="w-fit bg-green-500 shadow-md p-4 rounded-md flex items-center space-x-2 border-l-8 border-green-700">
            <div class="flex flex-col justify-between">
                <h1 class="text-2xl font-bold text-white">Forwarded Documents</h1>
                <h1 class="text-3xl font-bold text-white">{{ $forwardedDocumentsCount }}</h1>
            </div>
            <div>
                <i class="fa-solid fa-file-circle-check fa-2xl text-5xl" style="color: #1a6035;"></i> 
            </div>
        </div>

        <div id="ACCEPTED DOCUMENTS" class="w-fit bg-green-500 shadow-md p-4 rounded-md flex items-center space-x-2 border-l-8 border-green-700">
            <div class="flex flex-col justify-between">
                <h1 class="text-2xl font-bold text-white">Accepted Documents</h1>
                <h1 class="text-3xl font-bold text-white">{{ $acceptedDocumentsCount }}</h1>
            </div>
            <div>
                <i class="fa-solid fa-file-excel fa-2xl text-5xl pr-3" style="color: #1a6035"></i>   
            </div>
        </div>
            
        <div id="RETURNED DOCUMENTES" class="w-fit bg-green-500 shadow-md p-4 rounded-md flex items-center space-x-2 border-l-8 border-green-700">
            <div class="flex flex-col justify-between">
                <h1 class="text-2xl font-bold text-white">Returned Documents</h1>
                <h1 class="text-3xl font-bold text-white">{{ $returnedDocumentsCount }}</h1>
            </div>
            <div>
                <i class="fa-solid fa-file-excel fa-2xl text-5xl pr-3" style="color: #1a6035"></i>   
            </div>
        </div>

    </div>

    <div id="BAR CHART" class="w-full h-full" style=" ">
        <canvas id="documentsChart"></canvas>
    </div>
   
</div>
<!-- JavaScript to create the chart -->
<script>
    var ctx = document.getElementById('documentsChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($months) !!},
            datasets: [{
                label: 'Number of Documents',
                data: {!! json_encode($counts) !!},
                backgroundColor: 'rgba(0, 207, 36, 0.8)',
                borderColor: 'rgba(167, 130, 0, 0.8)',
                borderWidth: 4
            }]
        },
    });
</script>
@endsection