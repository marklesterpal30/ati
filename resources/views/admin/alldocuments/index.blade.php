@extends('admin/layouts.master')
@section('content')


<div class="p-4 bg-white shadow-xl rounded-md h-fit w-screen ">  
    <h1 class="mb-4 text-2xl text-gray-600 font-bold">Active Incoming/Document Lists</h1>
    
    <input type="text" id="codeFilter" class="w-full mb-2 px-4 py-2 bg-green-200 border rounded-lg focus:outline-none focus:border-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white" placeholder="Search by Code">

    <div role="tablist" class="tabs tabs-boxed tabs-md w-screen text-sm font-medium overflow-x-auto">
        
        <!-- ATI SPECIAL ORDER Tab -->
        <input type="radio" name="gender_tabs" role="tab" class="tab text-lg bg-green-500 text-white" aria-label="ATI SPECIAL ORDER" checked />
         <div role="tabpanel" class="tab-content border-base-300 rounded-box pt-10 px-4">
            <!-- Nested Boy Age Tabs -->
            <div role="tablist" class="tabs tabs-boxed tabs-md ">
            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="January" checked />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6 overflow-x-auto">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="February" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="March" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="April" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="May" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="June" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">      
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="July" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="August" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            @if(isset($atiSpecialOrders[8]) && $atiSpecialOrders[8]->count() > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference No.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Recieved
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address To/From
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/TItle/Description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Active
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Inactive
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Location
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                    @foreach($atiSpecialOrders[8] as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                            {{ $document->recieved_date }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$document->address_from}}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->file_name}}
                                            </td>   
                                            <td class="px-6 py-4">
                                              2 years
                                            </td>   
                                            <td class="px-6 py-4">
                                                3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                                Nasa may cabinet 
                                            </td>                
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="September" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            @if(isset($atiSpecialOrders[9]) && $atiSpecialOrders[9]->count() > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference No.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Recieved
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address To/From
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/TItle/Description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Active
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Inactive
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Location
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                    @foreach($atiSpecialOrders[9] as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                            {{ $document->recieved_date }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$document->address_from}}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->file_name}}
                                            </td>   
                                            <td class="px-6 py-4">
                                              2 years
                                            </td>   
                                            <td class="px-6 py-4">
                                                3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                                Nasa may cabinet 
                                            </td>                
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="October" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="November" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="December" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>
            </div>
        </div>

         <!-- ATI MEMORANDUM ORDER  -->
         <input type="radio" name="gender_tabs" role="tab" class="tab text-lg bg-green-500 text-white" aria-label="ATI MEMORANDUM ORDER"  />
        <div role="tabpanel" class="tab-content border-base-300 rounded-box pt-10 px-4">
            <!-- Nested Boy Age Tabs -->
            <div role="tablist" class="tabs tabs-boxed tabs-md ">
            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="January" checked />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6 overflow-x-auto">
             
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="February" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="March" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="April" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="May" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="June" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
           
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="July" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="August" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            @if(isset($atiMemorandumOrders[8]) && $atiMemorandumOrders[8]->count() > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference No.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Recieved
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address To/From
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/TItle/Description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Active
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Inactive
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Location
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                    @foreach($atiMemorandumOrders[8] as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                            {{ $document->date_approved }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$document->address_from}}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->file_name}}
                                            </td>   
                                            <td class="px-6 py-4">
                                              2 years
                                            </td>   
                                            <td class="px-6 py-4">
                                                3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                                Nasa may cabinet 
                                            </td>                
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="September" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            @if(isset($atiMemorandumOrders[9]) && $atiMemorandumOrders[9]->count() > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference No.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Recieved
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address To/From
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/TItle/Description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Active
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Inactive
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Location
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                    @foreach($atiMemorandumOrders[9] as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                            {{ $document->date_approved }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$document->address_from}}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->file_name}}
                                            </td>   
                                            <td class="px-6 py-4">
                                              2 years
                                            </td>   
                                            <td class="px-6 py-4">
                                                3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                                Nasa may cabinet 
                                            </td>                
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="October" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="November" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="December" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            </div>
        </div>

       <!--  LETTER   -->
       <input type="radio" name="gender_tabs" role="tab" class="tab text-lg bg-green-500 text-white" aria-label="LETTER"  />
        <div role="tabpanel" class="tab-content border-base-300 rounded-box pt-10 px-4">
            <!-- Nested Boy Age Tabs -->
            <div role="tablist" class="tabs tabs-boxed tabs-md ">
            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="January" checked />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6 overflow-x-auto">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="February" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="March" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="April" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="May" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
           </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="June" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="July" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6"> 
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="August" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            @if(isset($letters[8]) && $letters[8]->count() > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference No.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Recieved
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address To/From
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/TItle/Description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Active
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Inactive
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Location
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                    @foreach($letters[6] as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                            {{ $document->date_approved }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$document->address_from}}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->file_name}}
                                            </td>   
                                            <td class="px-6 py-4">
                                              2 years
                                            </td>   
                                            <td class="px-6 py-4">
                                                3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                                Nasa may cabinet 
                                            </td>                
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif   
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="September" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            @if(isset($letters[9]) && $letters[9]->count() > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference No.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Recieved
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address To/From
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/TItle/Description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Active
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Inactive
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Location
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                    @foreach($letters[9] as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                            {{ $document->date_approved }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$document->address_from}}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->file_name}}
                                            </td>   
                                            <td class="px-6 py-4">
                                              2 years
                                            </td>   
                                            <td class="px-6 py-4">
                                                3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                                Nasa may cabinet 
                                            </td>                
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif   
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="October" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="November" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="December" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            </div>
        </div>

        <!-- DA MEMORANDUM ORDER  -->
       <input type="radio" name="gender_tabs" role="tab" class="tab text-lg bg-green-500 text-white" aria-label="DA MEMORANDUM"  />
        <div role="tabpanel" class="tab-content border-base-300 rounded-box pt-10 px-4">
            <!-- Nested Boy Age Tabs -->
            <div role="tablist" class="tabs tabs-boxed tabs-md ">
            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="January" checked />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6 overflow-x-auto">
              
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="February" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="March" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="April" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="May" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="June" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="July" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="August" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            @if(isset($daMemorandumOrders[8]) && $daMemorandumOrders[8]->count() > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference No.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Recieved
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address To/From
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/TItle/Description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Active
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Inactive
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Location
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                    @foreach($daMemorandumOrders[8] as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                            {{ $document->date_approved }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$document->address_from}}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->file_name}}
                                            </td>   
                                            <td class="px-6 py-4">
                                              2 years
                                            </td>   
                                            <td class="px-6 py-4">
                                                3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                                Nasa may cabinet 
                                            </td>                
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif   
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="September" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            @if(isset($daMemorandumOrders[9]) && $daMemorandumOrders[9]->count() > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference No.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Recieved
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address To/From
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/TItle/Description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Active
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Inactive
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Location
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                    @foreach($daMemorandumOrders[9] as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                            {{ $document->date_approved }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$document->address_from}}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->file_name}}
                                            </td>   
                                            <td class="px-6 py-4">
                                              2 years
                                            </td>   
                                            <td class="px-6 py-4">
                                                3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                                Nasa may cabinet 
                                            </td>                
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif   
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="October" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="November" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>


            <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="December" />
            <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
            </div>

            </div>
        </div>

        
    <!-- DA SPECIAL ORDER  -->
        <input type="radio" name="gender_tabs" role="tab" class="tab text-lg bg-green-500 text-white" aria-label="DA SPECIAL ORDER"  />
            <div role="tabpanel" class="tab-content border-base-300 rounded-box pt-10 px-4">
                <div role="tablist" class="tabs tabs-boxed tabs-md ">
                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="January" checked />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6 overflow-x-auto">
                </div>

                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="February" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>

                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="March" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>

                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="April" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>

                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="May" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>


                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="June" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>


                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="July" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>

                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="August" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                @if(isset($daSpecialOrders[8]) && $daSpecialOrders[8]->count() > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference No.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Recieved
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address To/From
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/TItle/Description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Active
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Inactive
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Location
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                    @foreach($daSpecialOrders[8] as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                            {{ $document->date_approved }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$document->address_from}}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->file_name}}
                                            </td>   
                                            <td class="px-6 py-4">
                                              2 years
                                            </td>   
                                            <td class="px-6 py-4">
                                                3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                                Nasa may cabinet 
                                            </td>                
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif   
                </div>


                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="September" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                @if(isset($daSpecialOrders[9]) && $daSpecialOrders[9]->count() > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference No.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Recieved
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address To/From
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/TItle/Description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Active
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Inactive
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Location
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                    @foreach($daSpecialOrders[9] as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                            {{ $document->date_approved }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$document->address_from}}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->file_name}}
                                            </td>   
                                            <td class="px-6 py-4">
                                              2 years
                                            </td>   
                                            <td class="px-6 py-4">
                                                3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                                Nasa may cabinet 
                                            </td>                
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif   
                </div>


                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="October" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>


                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="November" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>


                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="December" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>

                </div>
        </div>

        <input type="radio" name="gender_tabs" role="tab" class="tab text-lg bg-green-500 text-white" aria-label="OTHERS"  />
            <div role="tabpanel" class="tab-content border-base-300 rounded-box pt-10 px-4">
                <div role="tablist" class="tabs tabs-boxed tabs-md ">
                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="January" checked />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6 overflow-x-auto">
                </div>

                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="February" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>

                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="March" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>

                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="April" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>

                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="May" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>


                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="June" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>


                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="July" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>

                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="August" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                @if(isset($others[8]) && $others[8]->count() > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference No.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Recieved
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address To/From
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/TItle/Description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Active
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Inactive
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Location
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                    @foreach($others[8] as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                            {{ $document->date_approved }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$document->address_from}}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->file_name}}
                                            </td>   
                                            <td class="px-6 py-4">
                                              2 years
                                            </td>   
                                            <td class="px-6 py-4">
                                                3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                                Nasa may cabinet 
                                            </td>                
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif   
                </div>


                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="September" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                @if(isset($others[9]) && $others[9]->count() > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference No.
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Recieved
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address To/From
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/TItle/Description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Active
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Inactive
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Location
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                    @foreach($others[9] as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                            {{ $document->date_approved }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$document->address_from}}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->file_name}}
                                            </td>   
                                            <td class="px-6 py-4">
                                              2 years
                                            </td>   
                                            <td class="px-6 py-4">
                                                3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                                Nasa may cabinet 
                                            </td>                
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif   
                </div>


                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="October" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>


                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="November" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>


                <input type="radio" name="specialorder" role="tab" class="tab bg-green-600 text-white" aria-label="December" />
                <div id="tables" role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                </div>

                </div>
        </div>

    </div>

</div>

  




<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const codeFilterInput = document.getElementById("codeFilter");
        const rows = document.querySelectorAll("#tables tbody tr");

        codeFilterInput.addEventListener("input", function() {
            const filterValue = this.value.trim().toLowerCase();

            rows.forEach(row => {
                const codeCell = row.querySelector("th");
                if (codeCell) {
                    const codeText = codeCell.textContent.trim().toLowerCase();
                    if (codeText.includes(filterValue)) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                }
            });
        });
    });
   

  const tabs = document.querySelectorAll('.tab');
  const tabContents = document.querySelectorAll('.tab-content');

  tabs.forEach((tab, index) => {
    tab.addEventListener('change', () => {
      tabs.forEach(tab => {
        tab.classList.remove('bg-green-400');
      });
      tabs[index].classList.add('bg-green-400');
    });
  });
  

  
</script>
@endsection