@extends('admin/layouts.master')
@section('content')

<div class="p-4 h-full bg-white">
    <div class="relative overflow-x-auto shadow-lg  sm:rounded-lg">
        <h1 class="text-3xl mb-3 font-bold text-green-700">Incoming Documents</h1>
        
        <form action="{{  url('/admin-incoming')}}" method="GET" class=" flex justify-end space-x-1 mb-2">
        <select name="type" id="" class="p-1">
            <option value="incoming" {{ $selectedType == 'incoming' ? 'selected' : '' }}>Incoming</option>
            <option value="outgoing" {{ $selectedType == 'outgoing' ? 'selected' : '' }}>Outgoing</option>
        </select>

            <select name="status" id="" class="p-1 ">
                <option value="pending" {{ $selectedStatus == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="received" {{ $selectedStatus == 'received' ? 'selected' : '' }}>Received</option>
            </select>
          
            <button type="submit" class="bg-green-300 px-2 py-1 text-white">filter</button>
        </form>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        File Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Document Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                         From
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date Sent
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
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $file->file_name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $file->category }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $file->address_from}}
                    </td>       
                    <td class="px-6 py-4">
                    {{ $file->created_at}}
                    </td>    
                    <td class="px-6 py-4 ">
                        <h1 class="px-2 py-1 text-center text-white {{ $file->status == 'pending' ? 'bg-yellow-400' : 'bg-green-500' }}">
                            {{ $file->status}}
                        </h1>
                    </td>   
                   
                    <td class="px-6 py-4 space-x-3 flex ">
                    @if(auth()->user()->role == 'admin')
                    @if($file->status == 'received')
                        @if($file->type == 'incoming')
                        <button id="forward" data-forward-id="{{ $file->id }}" data-modal-target="forward-modal" data-modal-toggle="forward-modal" class="font-extra bold text-blue-600 dark:text-blue-500 hover:underline">
                            <i class="fa-solid fa-forward" style="color: #00b37d;"></i>
                        </button>
                        @else
                        <button id="outgoing-forward" data-outgoing-forward-id="{{ $file->id }}" data-modal-target="outgoing-forward-modal" data-modal-toggle="outgoing-forward-modal" class="font-extra bold text-blue-600 dark:text-blue-500 hover:underline">
                            <i class="fa-solid fa-forward" style="color: #00b37d;"></i>
                        </button>
                        @endif
                        @endif


                    @endif
                    @if($file->status == 'pending')
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ url('/admin-incoming/' . $file->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>
                        <button id="thumbsUpButton" data-file_name="{{$file->file_name}}" data-last_code="{{$file->lastcode}}" data-id="{{$file->id}}" data-modal-target="accept-modal" data-modal-toggle="accept-modal" class="font-extra bold text-blue-600 dark:text-blue-500 hover:underline">
    <i class="fa-solid fa-thumbs-up" style="color: #00b37d;"></i>
</button>
                        <div  x-data="{ open: false }">
                            <!-- Open modal button -->
                            <a  x-on:click="open = true" class=""><i class="fa-solid fa-rotate-left" style="color: #74C0FC;"></i></a>
                            <!-- Modal Overlay -->
                            <div x-show="open" class="fixed inset-0 z-10 overflow-hidden flex items-center justify-center">
                                <div x-show="open" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="bg-opacity-25" x-transition:leave="opacity-50 ease-in duration-300" x-transition:leave-start="opacity-0" x-transition:leave-end="opacity-25" class="absolute inset-0 transition-opacity" style="background-color: rgba(151, 255, 140, 0.47);"></div>
                                <!-- Modal Content -->
                                <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="transform -translate-y-full" x-transition:enter-end="transform translate-y-0" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="transform translate-y-0" x-transition:leave-end="transform -translate-y-full" class="bg-white rounded-md shadow-xl overflow-hidden max-w-md w-full sm:w-96 md:w-1/2 lg:w-2/3 xl:w-1/3 z-50">
                                    <!-- Modal Header -->
                                <div class="bg-blue-500 text-white px-4 py-2 flex justify-center">
                                    <h2 class="text-lg font-semibold">Return Documents</h2>
                                </div>
                                <!-- Modal Body -->
                                <div class="p-4">
                                    <p class="text-center text-xl">Are you sure you want to Return this Documents</p>
                                </div>
                                <!-- Modal Footer -->
                                <div class="border-t px-4 py-2 flex items-center justify-center space-x-3 ">
                                    <button x-on:click="open = false" class="px-3 py-1 bg-red-500 text-white rounded-md "> Cancel </button>
                                    <form action="{{ url( '/admin-return-documents') }}" method="POST" class="">
                                        @csrf
                                        @method("PATCH")
                                        <input type="text" name="id" class="hidden" value="{{$file->id}}">
                                        <input type="text" name="file_name" class="hidden" value="{{$file->file_name}}">
                                        <button type="submit" class="px-3 py-1 bg-green-500 text-white rounded-md ">Return</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif
                        </div> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="accept-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="accept-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to receive this document?</h3>
                <form action="{{ route('approveddocuments') }}" method="POST" >
                 @csrf
                 @method("PATCH")
                <input type="text" name="file_name" id="file_name" class="hidden">
                <div class="mb-3">
                    <label for="reference_code"   class="text-left w-full block">Enter Reference Code</label>
                     <input type="text" name="reference_code" id="reference_code" placeholder=""  class="block w-full bg-green-50 rounded-md">
                </div> 
                <label for="" class=" w-full block text-left">Retention Period</label>
                <div class="flex space-x-1 w-full mb-5">
                     <div class="w-1/2">
                        <input type="number" name="active_years" class="w-full bg-green-50 rounded-md" placeholder="active">
                     </div>
                     <div class="w-1/2">
                        <input type="number" name="inactive_years" class="w-full bg-green-50 rounded-md" placeholder="inactive">
                     </div>
                </div>
                <input type="text" name="id" id="id" class="hidden">
                    <button data-modal-hide="accept-modal" type="submit" class=" text-white bg-green-400 hover:bg-green-500 ocus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-8 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="accept-modal" type="button" class=" py-2.5 px-8 ms-3 text-sm font-medium text-whiteF focus:outline-none bg-red-500 rounded-md">No, cancel</button>  
                </form>
            </div>
        </div>
    </div>
</div>

<div id="forward-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="forward-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to forward this document?</h3>

                <form action="{{ url('/forward-documents') }}" method="POST">
                    @csrf
                    <input type="text" name="id" id="forwardId" class="hidden">
                    <label for="forward_to" class="text-lg font-semibold">Select Office you want to forward</label>
                    <select name="forwardTo" id="forward_to" class="w-full mb-2 p-1">
                        @foreach($offices as $office)
                            <option value="{{ $office->id }}">{{ $office->name }}</option>
                        @endforeach
                    </select>
                    <div class="flex justify-center">
                        <button data-modal-hide="forward-modal" type="submit" class="text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="forward-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white bg-red-500 rounded-md">No, cancel</button>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="outgoing-forward-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="outgoing-forward-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to forward this document?</h3>

                <form action="{{ url('/forward-documents') }}" method="POST">
                    @csrf
                    <input type="text" name="id" id="outgoing-forwardId" class="hidden">
                    
                    <div class="flex justify-center">
                        <button data-modal-hide="forward-modal" type="submit" class="text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="outgoing-forward-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white bg-red-500 rounded-md">No, cancel</button>  
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<script>

const modalTriggers = document.querySelectorAll('[data-modal-toggle="accept-modal"]');
const inputId = document.getElementById('id');
const inputfilename = document.getElementById('file_name');
const inputReferencecode = document.getElementById('reference_code'); // Corrected typo here

modalTriggers.forEach(trigger => {
    trigger.addEventListener('click', () => {
        const id = trigger.getAttribute('data-id');
        const code = trigger.getAttribute('data-last_code');
        const filename = trigger.getAttribute('data-file_name'); // Adding filename attribute

        console.log(code);
        // Update modal content with task information
        inputId.value = id;
        inputReferencecode.placeholder = code;
        inputfilename.value = filename; // Assigning value to inputfilename
    });
});

    
    document.addEventListener('DOMContentLoaded', function() {
    const forwardTriggers = document.querySelectorAll('[data-modal-toggle="forward-modal"]');
    const inputId = document.getElementById('forwardId');

    forwardTriggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            const id = trigger.getAttribute('data-forward-id');
            // Update the form input with the task ID
            inputId.value = id;
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const forwardTriggers = document.querySelectorAll('[data-modal-toggle="outgoing-forward-modal"]');
    const inputId = document.getElementById('outgoing-forwardId');

    forwardTriggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            const id = trigger.getAttribute('data-outgoing-forward-id');
            // Update the form input with the task ID
            inputId.value = id;
        });
    });
});


</script>


@endsection