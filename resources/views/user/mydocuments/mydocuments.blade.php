@extends('user/layouts.master')
@section('content')

<div class="p-2 sm:p-12 bg-white rounded-md shadow-2xl">
    <div class="relative h-screen overflow-x-auto sm:rounded-lg">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl mb-3 font-semibold text-green-700 hidden sm:block">My Documents</h1>
            <input type="text" class="w-fit h-fit rounded-md" onkeyup="filterTable()" id="inputCategory" placeholder="Filter by category">
            <form action="{{ url('/user-mydocuments') }}" method="GET" class="mb-4">
                <label for="status" class="mr-2 hidden sm:block">Filter by Status:</label>
                <select name="status" id="status" class="px-2 py-1 border rounded">
                    <option value="">All</option>
                    <option value="pending">Pending</option>
                    <option value="received">Received</option>
                    <option value="accepted">Accepted</option>
                    <option value="forwarded">Forwarded</option>
                    <option value="return">Return</option>
                </select>
                <button type="submit" class="px-3 py-1 bg-green-500 text-white rounded ml-2">Filter</button>
            </form>
        </div>
        <table id="myDocumentsTable" class="w-full z-0 text-xs sm:text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-green-400 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Document Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Document Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        From
                    </th>
                    <th scope="col" class="px-6 py-3">
                        To
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($files as $file)
                <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-green-200' : 'bg-white' }} border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $file->code }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $file->file_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $file->category }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $file->sender->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $file->recieved->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $file->created_at }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1.5 font-semibold text-white {{ $file->status == 'pending' ? 'bg-yellow-300' : ( $file->status == 'accepted' ? 'bg-gray-400 text-black shadow-md' : ($file->status == 'forwarded' ? 'bg-blue-400' : ( $file->status == 'return' ? 'bg-red-500' : ( $file->status == 'received' ? 'bg-green-500' : '' ) ) ))}}">
                            {{ $file->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ url('/user-mydocuments/' . $file->id . '/edit') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <i class="fa-solid fa-eye" style="color: #2977ff;"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function filterTable() {
    var inputCategory = document.getElementById('inputCategory').value.trim().toUpperCase();
    var table = document.getElementById('myDocumentsTable');
    var tr = table.getElementsByTagName('tr');

    for (var i = 1; i < tr.length; i++) {
        var categoryField = tr[i].getElementsByTagName('td')[2];
        if (categoryField) {
            var categoryText = categoryField.textContent || categoryField.innerText;
            categoryText = categoryText.trim().toUpperCase(); // Trim and convert to uppercase
            if (categoryText.startsWith(inputCategory)) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }
        }
    }
}
</script>

@endsection
