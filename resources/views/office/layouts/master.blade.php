<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/6c0a20b496.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <div>
        <nav class="flex justify-between items-center w-screen bg-green-300 fixed top-0 left-0 py-1 z-50">
            
                <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                 </button>
            <img src="{{ asset('storage/images/header.png') }}" class="hidden sm:block sm:w-96  ml-20 ">
            <h1 class="mr-4 sm:mr-20 font-bold font-sans bg-white text-green-400 px-2 py-1 rounded-md">{{ Auth::user()->name }} <i class="fa-solid fa-angle-down font-bold"></i></h1>
            
        </nav>
    </div>
 
   


 
 <aside id="default-sidebar" class="fixed top-10 sm:top-16 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-green-200 dark:bg-gray-800">
       <ul class="space-y-2 font-medium">
       <li class="flex justify-center">
         <img src="{{ asset('storage/images/dalogo.png') }}" class="h-28 text-center">
        </li>
       <li class="{{ request()->is('office-incoming') ? 'bg-green-800' : 'bg-green-600' }} bg-green-600 mb-4 p-2 text-xl font-semibold rounded-md hover:bg-green-500 text-white"><a href="/office-incoming"><i class="fa-solid fa-file mr-2" style="color: #6eff6b;"></i><span class="menu-text">Incoming <span class="bg-white text-green-600 px-3 py-0.5 ml-2 rounded-lg"></span></span></a></li>
            <li class=" {{ request()->is('office-dashboard') ? 'bg-green-800' : 'bg-green-600' }} mb-4 p-2 text-xl font-semibold rounded-md hover:bg-green-500 text-white shadow-xl"><a href="{{ url('/office-dashboard') }}"><i class="fa-solid fa-gauge mr-2" style="color: #FFFF00;"></i><span class="menu-text">Dashboard</span></a></li>
            <li class="{{ request()->is('office-alldocuments') ? 'bg-green-800' : 'bg-green-600' }}  text-white mb-4 p-2 text-xl font-semibold rounded-md hover:bg-green-500"><a href="{{ url('/office-alldocuments') }}"><i class="fa-solid fa-file-lines mr-2" style="color: #6eff6b;"></i><span class="menu-text">All Docuemnts</span></a></li>
            <li class="{{ request()->is('record') ? 'bg-green-800' : 'bg-green-600' }} bg-green-600 text-white mb-4 p-2 text-xl font-semibold rounded-md hover:bg-green-500"><a href="/record"><i class="fa-solid fa-address-book mr-2" style="color: #358500;"></i><span class="menu-text">Records</span></a></li>
            <li id="dropdownDefaultButton" data-dropdown-toggle="dropdown" data-dropdown-offset-skidding="30" class="{{ request()->is('office-outgoing') ? 'bg-green-400' : 'bg-green-600' }}  text-white mb-4 p-2 text-xl font-semibold rounded-md hover:bg-green-500 " type="button"><i class="fa-solid fa-file-arrow-down mr-1"></i> <span class="menu-text">Outgoing</span> 
            </li>

                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden bg-green-500 divide-y ml-12 divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class=" text-white  text-sm hover:text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li><a href="{{ url('/office-outgoing')}}" class="hover:text-gray-700 text-white block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Outgoing</a></li>
                    <li><a href="{{ url('/office-outgoing-documents') }}" class="hover:text-gray-700 block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Documents</a></li>
                </div>

            <form action="{{ url('/logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="bg-green-600 text-white  mb-4 p-2 text-xl font-semibold rounded-md hover:bg-green-500"><i class="fa-solid fa-right-from-bracket mr-2" style="color: #fb3a18;"></i>Logout</button>
            </form>
       </ul>
    </div>
 </aside>
 
 <div class=" sm:ml-64 mt-20">

  <!-- CONTENT -->
  <div class="content bg-green-200  w-full {{ request()->is('dashboard') ? 'p-0' : 'p-6' }} m-0 sm:m-4 shadow-lg rounded-md h-screen overflow-y-auto">
      @yield('content') 
  </div>
 </div>
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

        
</body>
</html>