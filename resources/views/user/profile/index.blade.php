@extends('user.layouts.master')
@section('content')

<div class="p-2 sm:p-12 bg-white shadow-md rounded-md">
    <!-- ----NAME, EMAIL ------>
    <div class="flex sm:space-x-12">
        <div class="hidden sm:block w-96">
            <h1 class="text-gray-700 font-semibold text-4xl mb-2">Profile Information</h1>
            <h1 class="text-gray-900 font-medium text-lg italic">Update your account Profile Information and email address</h1>
        </div>
        <div class="space-y-3 bg-green-50 w-full sm:w-1/2">
            <div class="px-4 pt-5">
               <label for="name" class="text-gray-800 font-bold text-xl">Name</label>
               <input type="text" name="name" class="block w-full sm:w-80 border-1  rounded-sm bg-green-100 border-2 border-green-400" value="{{ Auth::user()->name }}">
            </div>
            <div class="px-4">
               <label for="email" class="text-gray-800 font-bold text-xl">Email</label>
               <input type="text" name="email" class="block w-full sm:w-80 border-1  rounded-sm bg-green-100 border-2 border-green-400" value="{{ Auth::user()->email }}">
            </div>
            <div class="bg-green-300 flex justify-end py-2">
                <button class="mr-5 bg-green-600 px-5 py-1 rounde-sm text-white text-xl font-semibold">Save</button>
            </div>
        </div>
    </div>
    <hr class="bg-gray-600  mt-4">

    <!-------- PASSWORD ----->
    <div class="flex sm:space-x-12 mt-8">
        <div class="hidden sm:block w-96">
            <h1 class="text-gray-700 font-semibold text-4xl mb-2">Update Your Password</h1>
            <h1 class="text-gray-900 font-medium text-lg italic">Ensure your account is using a long and and random password</h1>
        </div>
        <div class="space-y-3 bg-green-50 w-full sm:w-1/2">
            <div class="px-4 pt-5">
               <label for="name" class="text-gray-800 font-bold text-xl">Current Passowrd</label>
               <input type="text" name="name" class="block w-full sm:w-80 border-1  rounded-sm bg-green-100 border-2 border-green-400" >
            </div>
            <div class="px-4">
               <label for="email" class="text-gray-800 font-bold text-xl">New Password</label>
               <input type="text" name="email" class="block w-full sm:w-80 border-1  rounded-sm bg-green-100 border-2 border-green-400" >
            </div>
            <div class="px-4">
               <label for="email" class="text-gray-800 font-bold text-xl">Confirm Password</label>
               <input type="text" name="email" class="block w-full sm:w-80 border-1  rounded-sm bg-green-100 border-2 border-green-400" >
            </div>
            <div class="bg-green-300 flex justify-end py-2">
                <button class="mr-5 bg-green-600 px-5 py-1 rounded-sm text-white text-xl font-semibold">Save</button>
            </div>
        </div>
    </div>
   
</div>

@endsection