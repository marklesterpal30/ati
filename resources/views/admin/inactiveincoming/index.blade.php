@extends('admin/layouts.master')
@section('content')
<div class="p-4 bg-white shadow-xl rounded-md h-fit  w-screen ">  
    <h1 class="mb-4 text-2xl text-gray-600 font-bold">Inactive Incoming/Document Lists</h1>
    <div role="tablist" class="tabs tabs-boxed bg-white w-screen">
  <input type="radio" name="my_tabs_2" role="tab" class="tab text-sm font-semibold" aria-label="ATI SPECIAL ORDER" checked />
  <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6 overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference Number
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Received
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address to/from
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/Title/Descritpion
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
                                        @foreach($atispecialorders as $atispecialorder)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $atispecialorder->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $atispecialorder->recieved_date }}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $atispecialorder->address_from }}
                                            </td>    
                                            <td class="px-6 py-4">
                                             {{ $atispecialorder->file_name }}
                                            </td> 
                                            <td class="px-6 py-4">
                                               {{$atispecialorder->active_years}}
                                            </td> 
                                            <td class="px-6 py-4">
                                               {{$atispecialorder->inactive_years}}
                                            </td>  
                                            <td class="px-6 py-4">
                                               Nasa Cabinet 
                                            </td>          
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $atispecialorder->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>      
                                                <a href="{{ url('/print', ['documentId' => $atispecialorder->id]) }}" class="text-blue-500 hover:underline">Print</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
  </div>

  <input type="radio" name="my_tabs_2" role="tab" class="tab text-lg font-semibold" aria-label="ATI MEMORANDUM ORDER"  />
  <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference Number
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Received
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address to/from
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/Title/Descritpion
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
                                        @foreach($atimemorandumorders as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $document->date_approved }}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->address_from }}
                                            </td>    
                                            <td class="px-6 py-4">
                                             {{ $document->file_name }}
                                            </td> 
                                            <td class="px-6 py-4">
                                               2 years
                                            </td> 
                                            <td class="px-6 py-4">
                                               3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                               Nasa Cabinet 
                                            </td>          
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>      
                                                <a href="{{ url('/print', ['documentId' => $document->id]) }}" class="text-blue-500 hover:underline">Print</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
  </div>
  

  <input type="radio" name="my_tabs_2" role="tab" class="tab text-lg font-semibold" aria-label="LETTER" />
  <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference Number
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Received
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address to/from
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/Title/Descritpion
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
                                        @foreach($letters as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $document->date_approved }}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->address_from }}
                                            </td>    
                                            <td class="px-6 py-4">
                                             {{ $document->file_name }}
                                            </td> 
                                            <td class="px-6 py-4">
                                               2 years
                                            </td> 
                                            <td class="px-6 py-4">
                                               3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                               Nasa Cabinet 
                                            </td>          
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>      
                                                <a href="{{ url('/print', ['documentId' => $document->id]) }}" class="text-blue-500 hover:underline">Print</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
  </div>

  <input type="radio" name="my_tabs_2" role="tab" class="tab text-lg font-semibold" aria-label="OTHERS" />
  <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference Number
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Received
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address to/from
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/Title/Descritpion
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
                                        @foreach($others as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $document->date_approved }}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->address_from }}
                                            </td>    
                                            <td class="px-6 py-4">
                                             {{ $document->file_name }}
                                            </td> 
                                            <td class="px-6 py-4">
                                               2 years
                                            </td> 
                                            <td class="px-6 py-4">
                                               3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                               Nasa Cabinet 
                                            </td>          
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>      
                                                <a href="{{ url('/print', ['documentId' => $document->id]) }}" class="text-blue-500 hover:underline">Print</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
  </div>



  <input type="radio" name="my_tabs_2" role="tab" class="tab text-lg font-semibold" aria-label="DA MEMORANDUM ORDER" />
  <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference Number
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Received
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address to/from
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/Title/Descritpion
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
                                        @foreach($damemorandumorders as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $document->date_approved }}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->address_from }}
                                            </td>    
                                            <td class="px-6 py-4">
                                             {{ $document->file_name }}
                                            </td> 
                                            <td class="px-6 py-4">
                                               2 years
                                            </td> 
                                            <td class="px-6 py-4">
                                               3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                               Nasa Cabinet 
                                            </td>          
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>      
                                                <a href="{{ url('/print', ['documentId' => $document->id]) }}" class="text-blue-500 hover:underline">Print</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
  </div>

  <input type="radio" name="my_tabs_2" role="tab" class="tab text-lg font-semibold" aria-label="DA SPECIAL ORDER" />
  <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                                    <thead class="text-xs text-gray-700 shadow-lg uppercase bg-green-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                        <th scope="col" class="px-6 py-3">
                                                Reference Number
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Received
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Address to/from
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Subject/Title/Descritpion
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
                                        @foreach($daspecialorders as $document)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $document->code }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $document->date_approved }}
                                            </td>
                                            <td class="px-6 py-4">
                                            {{ $document->address_from }}
                                            </td>    
                                            <td class="px-6 py-4">
                                             {{ $document->file_name }}
                                            </td> 
                                            <td class="px-6 py-4">
                                               2 years
                                            </td> 
                                            <td class="px-6 py-4">
                                               3 years
                                            </td>  
                                            <td class="px-6 py-4">
                                               Nasa Cabinet 
                                            </td>          
                                            <td class="px-6 flex py-4 space-x-2">
                                                <a href="{{ url('/admin-alldocuments/' . $document->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye" style="color: #2977ff;"></i></a>      
                                                <a href="{{ url('/print', ['documentId' => $document->id]) }}" class="text-blue-500 hover:underline">Print</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
  </div>
</div>
</div>
@endsection