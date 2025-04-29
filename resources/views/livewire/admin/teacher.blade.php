<div>
    

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User Name
                </th>
                <th scope="col" class="px-6 py-3">
                    School
                </th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($teacher as $row )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$row->name}}
                </th>
                <td class="px-6 py-4">
                    {{$row->School->school_name}}
                </td>
                <td>
                    <a href="{{route('admin.teacher-data',$row->id)}}" class="text-blue-400 p-2">
                     
                        <i class="bi bi-eye text-2xl"></i>
                        
                    </a>
                      
                   
                    
                      <button wire:confirm wire:click="" class="text-red-400 p-2">
                       
                        <i class="bi bi-trash3 text-2xl"></i>
                        
                        
                      </button>
                </td>
                
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

</div>
