@extends('admin.layouts.master')
@section('content')
  <div class="bg-white p-4 h-full">
    
  <div class="relative overflow-x-auto h-full  sm:rounded-lg">
        <div class="flex justify-between mb-4">
            <h1 class="text-3xl mb-3 font-bold text-green-700">Employee Lists</h1>
            <div  x-data="{ open: false }">
                            <!-- Open modal button -->
                            <a  x-on:click="open = true" class=""><button class="px-5 py-1 rounded-md shadow-md bg-green-200 font-semibold text-black">Create</button></a>
                            <!-- Modal Overlay -->
                            <div x-show="open" class="fixed inset-0 z-50 overflow-hidden flex items-center justify-end">
                                <div x-show="open" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="bg-opacity-25" x-transition:leave="opacity-50 ease-in duration-300" x-transition:leave-start="opacity-0" x-transition:leave-end="opacity-25" class="absolute inset-0 transition-opacity" style="background-color: rgba(151, 255, 140, 0.47);"></div>
                                <!-- Modal Content -->
                                <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="transform translate-x-full" x-transition:enter-end="transform translate-y-0" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="transform translate-y-0" x-transition:leave-end="transform translate-x-full" class="bg-white  h-full rounded-md shadow-xl overflow-hidden max-w-md w-full sm:w-96 md:w-1/2 lg:w-2/3 xl:w-1/3 z-50">
                                    <!-- Modal Header -->
                                <div class="bg-green-500 text-white px-4 py-2 flex justify-between">
                                    <h2 class="text-lg font-semibold">Create Accounts</h2>
                                    <button x-on:click="open = false" class="px-3 py-1 bg-red-500 text-white rounded-md "> Cancel </button>
                                </div>
                                <!-- Modal Body -->
                  
                                <!-- Modal Footer -->
                                <div class="border-t px-4 py-2 flex space-x-3 justify-end">
                                    <form action="{{ url( '/admin-employee') }}" method="POST" class="w-full mt-10">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="name" class="text-gray-600">Name</label>
                                            <input type="text" name="name" class="w-full border-1 border-gray-200 rounded-md bg-green-100" placeholder="Enter Name">
                                        </div>
                                        <div class="mb-4">
                                            <label for="email" class="text-gray-600">Email</label>
                                            <input type="text" name="email" class="w-full border-1 border-gray-200 rounded-md bg-green-100" placeholder="Enter Email">
                                        </div>
                                        <div class="mb-4">
                                            <label for="password" class="text-gray-600">Password</label>
                                            <input type="text" name="password" class="w-full border-1 border-gray-200 rounded-md bg-green-100" placeholder="Enter Password">
                                        </div>
                                        <div class="mb-4">
                                            <label for="designation" class="text-gray-600">Designation</label>
                                            <input type="text" name="" class="w-full border-1 border-gray-200 rounded-md bg-green-100" placeholder="Choose Designation">
                                        </div>
                                        <div class="mb-4">
                                            <label for="head" class="text-gray-600">Head</label>
                                            <input type="text" name="head" class="w-full border-1 border-gray-200 rounded-md bg-green-100" placeholder="Head of office">
                                        </div>
                                        <div class="mb-4">
                                            <label for="role" class="text-gray-600">Employee Role</label>
                                            <input type="text" name="role" class="w-full border-1 border-gray-200 rounded-md bg-green-100" placeholder="Select Employee Role">
                                        </div>
                                        <div class="mt-5 flex justify-end space-x-4">
                                            <button type="submit" class="px-3 py-1  bg-green-500 text-white rounded-md shadow-md ">Submit</button>
                                            <button class="px-3 py-1 bg-white shadow-sm rounded-md border-gray-200 border-2">Clear Fields</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
             </div>   
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Office
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Designation
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                   
                </tr>
            </thead>
            <tbody class="">
                @foreach($offices as $office)
                <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-green-100' : 'bg-white' }} border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex items-center space-x-2">
                        <div>
                            <div class="user-avatar">
                                <h1 class="bg-green-200 px-3 py-2 rounded-full text-xl">{{$office->user_avatar}}</h1>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <h1>{{ $office->name }}</h1>
                            <h1>{{ $office->email }}</h1>
                       </div>
                    </th>
                    <td class="px-6 py-4">
                     {{$office->name}}
                    </td>
                    <td class="px-6 py-4">
                        N/A
                    </td>         
                    <td class="px-6 py-4 space-x-3">
                        <a href="{{ url('/admin-employee/' . $office->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-pen-to-square" style="color: #74C0FC;"></i></a>
                        <a href="{{ url('/admin-employee/' . $office->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-trash-can" style="color: #ff2424;"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

  </div>
@endsection