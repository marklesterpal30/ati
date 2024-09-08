@extends('office/layouts.master')
@section('content')

<div class="p-12 bg-white">
    <div class="relative overflow-x-auto shadow-lg  sm:rounded-lg">
        <h1 class="text-3xl mb-3 font-bold text-green-700">Incoming Documents</h1>
        
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                       Reference Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Document Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        From
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="">
                @foreach($files as $file)
                <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-green-200' : 'bg-white' }}  border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $file->code }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $file->file_name }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $file->sender->email}}
                    </td>         
                    <td class="px-6 py-4">
                        <span class="px-2 py-2 font-semibold rounded-sm text-white bg-blue-400">
                        {{ $file->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 flex space-x-3">
                        <a href="{{ url('/office-incoming/' . $file->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>
                        <button id="thumbsUpButton" data-id="{{$file->id}}" data-modal-target="accept-modal" data-modal-toggle="accept-modal" class="font-extra bold text-blue-600 dark:text-blue-500 hover:underline">
                           <i class="fa-solid fa-thumbs-up" style="color: #00b37d;"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
     
    </div>
    <div id="accept-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 left-1 end-2.5 text-red-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="accept-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to accept this document?</h3>
                <form action="{{ url('/accept-documents') }}" method="POST" >
                    @csrf
                   <input type="text" name="id" id="id" class="hidden">
                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-green-400 hover:bg-green-500 ocus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="accept-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium bg-red-500  text-white  rounded-md">No, cancel</button>  
                </form>

            </div>
        </div>
    </div>
</div>
</div>
<script>

const modalTriggers = document.querySelectorAll('[data-modal-toggle="accept-modal"]');
        const inputId = document.getElementById('id');

        modalTriggers.forEach(trigger => {
            trigger.addEventListener('click', () => {
                const id = trigger.getAttribute('data-id');

                // Update modal content with task information
               inputId.value = id;
            });
        });
</script>


@endsection