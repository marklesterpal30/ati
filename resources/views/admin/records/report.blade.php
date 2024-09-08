@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="bg-white p-12 -ml-20 -mt-12 w-full">
    <div class="flex justify-center">
        <img src="{{ asset('storage/images/header.png') }}" class="ml-32" alt="">
    </div>
</div>
      
<div class="flex justify-between w-fulls p-4">
    <div class=" p-4">
        <h1 class="text-xl font-bold">Category: <span class="text-xl font-semibold">{{ $category ?? 'All Categories' }}</span></h1>
        <h1 class="text-xl font-bold">Month: <span class="text-xl font-semibold">{{ $months ?? 'All Months' }}</span></h1>
        <h1 class="text-xl font-bold">Week: <span class="text-xl font-semibold">{{ $weeks ?? 'All Weeks' }}</span></h1>
    </div>
    <div class=" p-4">
        <div class="text-lg">
            @if(is_null($category) && is_null($months))   
                @foreach ($grouped as $item)
                    @if ($loop->first || $item->month !== $grouped[$loop->index - 1]->month)
                        <h2>{{ \Carbon\Carbon::createFromDate(null, $item->month, null)->format('F') }}</h2>
                    @endif
                <p>{{ $item->category }} - {{ $item->count }}</p>
                @endforeach
            @endif
            @if($category && is_null($months))
                @foreach($documentCounts as $month => $count)
                    <p>{{ ucfirst($month) }} - {{ $count }}</p>
                @endforeach
            @endif
            @if(is_null($category) && $months)
            <h1>{{ $months }}</h1>
                <ul>
                    @foreach ($documents as $document)
                        <li>{{ $document->category }} - {{ $document->total }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

<div class="w-full p-4 mt-4">
    <h2 class="mb-3 mt-4 text-2xl font-bold">Documents</h2>
    <table class="min-w-full border border-gray-300 text-lg">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b border-r">Reference Code</th>
                <th class="py-2 px-4 border-b border-r">Document Name</th>
                <th class="py-2 px-4 border-b border-r w-32">From</th>
                <th class="py-2 px-4 border-b">Date Received</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $file)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b border-r">{{ $file->code }}</td>
                    <td class="py-2 px-4 border-b border-r">{{ $file->file_name }}</td>
                    <td class="py-2 px-4 border-b border-r ">{{ $file->address_from }}</td>
                    <td class="py-2 px-4 border-b">{{ $file->created_at->format('Y F j H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-8">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="printOrderDetails()">
        Print Order Details
    </button>
</div>

<script>
    function printOrderDetails() {
        window.print();
    }
</script>
</body>
</html>
