<div>
  
    <div class="">
      
      <div class="h-15 ">
        <div class="grid grid-cols-2">
            <div class="flex items-center justify-end ">
              <span>ค้นหาข้อมูล</span>
            </div>
            <div class="flex items-center justify-end mr-3 mt-2">
              <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input wire:keyup="set('search',$event.target.value)" wire:model.debounce.500ms="search" type="search" id="search" class="block  p-3 ps-40 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
                
            </div>
            </div>
        </div>
      </div>
        <table class=" w-full  text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        student name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        tels
                    </th>
                    <th scope="col" class="px-6 py-3">
                        line_id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
      
              @foreach ($student_data as $row )
              <tr wire:key="{{$row->id}}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{$row->student_name}}
                </th>
                <td class="px-6 py-4">
                    {{$row->tel}}
                </td>
                <td class="px-6 py-4">
                    {{$row->line_id}}
                </td>
                <td class="px-6 py-4 flex">
                  
                  
                    <a href="{{route('admin.studentSponsoredData',$row->id)}}" class="text-blue-400 p-2">
                     
                      <i class="bi bi-eye text-2xl"></i>
                      
                    </a>
                    
                 
                  
                    <button wire:confirm wire:click="deleteStudent({{$row->id}})" class="text-red-400 p-2">
                     
                      <i class="bi bi-trash3 text-2xl"></i>
                      
                      
                    </button>
                    
                
                </td>
                  
                  
                  
            </tr>
            @endforeach
                
                
            </tbody>
        </table>
</div>
