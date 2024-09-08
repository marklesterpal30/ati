@extends('office/layouts.master')
@section('content')

<div class="p-12 bg-white rounded-md shadow-2xl">
    
<h1 class="text-3xl mb-3 font-semibold text-green-700">All Documents</h1>

<div class="mb-1">
    <div>
        <form action="{{ url('/office-alldocuments') }}" method="GET" class="flex space-x-2">
            <select name="category" id="" class="p-2">
                <option value="">ALL CATEGORY</option>
               @foreach($purposes as $purpose)
                    <option value="{{$purpose->purpose_name}}" {{$selectedCategory == $purpose->purpose_name ? 'selected': ''}} >{{$purpose->purpose_name}}</option>
               @endforeach
            </select>
            <select name="month" id="month" class="px-2 py-1 border rounded">
                <option value="">All MONTH</option>
                @foreach(range(1, 12) as $month)
                    <option value="{{$month}}" {{ $selectedMonth == $month ? 'selected': ''}}>{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
                @endforeach
            </select>
            <select name="day" id="day" class="px-2 py-1 border rounded">
                <option value="">All DAY</option>
                @foreach(range(1, 31) as $day)
                    <option value="{{$day}}" {{ $selectedDay == $day ? 'selected': '' }}>{{$day}}</option>
                @endforeach
            </select>
            <div>
                <button type="submit" class="p-2 bg-green-400 text-white">Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-green-400 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Code
            </th>
            <th scope="col" class="px-6 py-3">
                    From
                </th>
                <th scope="col" class="px-6 py-3">
                    Document Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $file)
            <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-green-200' : 'bg-white' }} border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$file->code}}
                </th>
                <td class="px-6 py-4">
                {{$file->sender->email}}
                </td>
                <td class="px-6 py-4">
                {{$file->file_name}}
                </td>
                <td class="px-6 py-4">
                {{$file->category}}
                </td>
                <td class="px-6 py-4">
                <a href="{{ url('/office-alldocuments/' . $file->id . '/edit') }}"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

@endsection