@extends('office.layouts.master')
@section('content')

<div class="p-2">

    @if(session('success'))
        <div id="successMessage" class="p-8 bg-green-100 rounded-sm font-bold fixed top-2 left-1/2 transform -translate-x-1/2">
            <div class="flex items-center flex-col space-y-4">
                <i class="fa-solid fa-circle-check fa-2xl text-5xl" style="color: #63E6BE;"></i>
                <h1 class="text-xl text-green-600 font-thin"> {{ session('success') }}</h1>
            </div>
        </div>
        <script>
            // Hide the success message after 3 seconds
            setTimeout(function() {
                var successMessage = document.getElementById('successMessage');
                if (successMessage) {
                    successMessage.style.display = 'none';
                }
            }, 3000);
        </script>
    @endif 

    <form action="{{ url('/office-outgoing') }}" method="POST" enctype="multipart/form-data"  class="bg-white shadow-xl rounded-md p-12 flex flex-col space-y-14 ">
        @csrf 
        <!------FILE UPLOAD------>
        <div class="flex justify-between items-center ">
            <!-- LABEL -->
            <div class="w-1/2">
                <h1 class="text-gray-700 font-bold text-4xl font-sans mb-4">Upload PDF File</h1>
                <p class="text-gray-600   font-sans text-xl">Please ensure that uploaded files adhere to organizational policies and guidelines. This feature is designed to enhance collaboration and document management within the system.</p>
            </div>
            <!-- FORM -->
            <div class="flex flex-col justify-center items-center w-1/2 bg-green-200 rounded-md p-12 border-2 border-dashed border-green-400">
                <label for="file" class="text-4xl mb-8"><i class="fa-solid fa-cloud-arrow-up fa-2xl" style="color: #355E3B	;"></i></label>
                <input type="file" name="file" required>
            </div>
       </div>
       <hr>

       <!-- FILE NAME, ADDRESS FROM, CATEGORY -->
       <div class="flex justify-between items-start ">
            <!-- LABEL -->
            <div id="LABEL" class="w-1/2">
                <h1 class="text-gray-600 font-bold text-4xl font-sans mb-4">Additional Information</h1>
                <p class="text-gray-600 font-sans text-xl">By considering these additional aspects, users can maximize the effectiveness of the file upload feature while ensuring compliance with organizational standards and best practices.</p>
            </div>
            <!-- INPUTS   -->
            <div id="INPUTS" class="flex flex-col justify-center items-center w-1/2 p-2 bg-green-50 rounded-md">
                <div class=" p-2 w-full">
                    <label for="file_name" class="text-gray-600 font-semibold text-xl">Subject/Title/Description</label>
                    <input type="text" name="file_name" class="block w-full rounded-sm bg-green-200 border-2 border-green-400" required>
                </div>
                <div class=" p-2 w-full">
                    <label for="forward_to" class="text-gray-600 font-semibold text-xl">Forward to</label>
                    <input name="forward_to" type="text" class="block w-full rounded-sm bg-green-200 border-2 border-green-400" required>
                </div>
                <div class=" p-2 w-full">
                    <label for="category" class="text-gray-600 font-semibold text-xl">Category</label>
                    <select name="category" class="block w-full text-lg rounded-sm py-2.5 px-2 bg-green-200 border-2 border-green-400">
                         @foreach($purposes as $purpose)
                             <option value="{{ $purpose->purpose_name }}">{{ $purpose->purpose_name }}</option>
                        @endforeach
                    </select> 
                </div>
            </div>  
       </div>
       <hr>

        <!-- SENDER ID, SENDER NAME -->
       <div class="flex justify-between items-start ">
            <!-- LABEL -->
            <div class="w-1/2">
                <h1 class="text-gray-600 font-bold text-4xl font-sans mb-4">Document Details</h1>
                <p class="text-gray-600 font-sans text-xl">By considering these additional aspects, users can maximize the effectiveness of the file upload feature while ensuring compliance with organizational standards and best practices.</p>
            </div>
            <!-- INPUT -->
            <div class="flex flex-col justify-center items-center w-1/2 p-2 bg-green-50 rounded-md">
                <div class=" p-2 w-full">
                    <label for="from" class="text-gray-600 font-semibold text-xl">Address to/from</label>
                    <input type="text" name="from" class="block w-full rounded-sm bg-green-200 border-2 border-green-400">
                </div>
                <div class=" p-2 w-full">
                    <label for="" class="text-gray-600 font-semibold text-xl">Location</label>
                    <input type="text" class="block w-full rounded-sm bg-green-200 border-2 border-green-400">
                </div>
            </div>
       </div>   

       <!-- BUTTON SEND -->
       <div class="flex justify-center ">
         <button type="submit" class="bg-green-400 shadow-md rounded-sm w-60 px-3 py-1.5 text-white text-2xl font-semibold  border-2 border-green-500 hover:bg-green-700 hover:text-white">Send</button>
       </div>

    </form>

</div>
@endsection