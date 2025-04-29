<div>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Student name
                </th>
                <th scope="col" class="px-6 py-3">
                    Scholarship
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($scholarship as $row )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$row->Student->student_name}}
                </th>
                <td class="px-6 py-4">
                    {{$row->scholarship}}
                </td>
            </tr>
            @endforeach
            
            
        </tbody>
    </table>
</div>

</div>
