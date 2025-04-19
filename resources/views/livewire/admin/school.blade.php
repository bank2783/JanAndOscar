<div>
    
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
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    School name
                </th>
                <th scope="col" class="px-6 py-3">
                    action
                </th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($schools as $row )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    @if($editing_school_id == $row->id)
                    <label class="block text-gray-700 font-bold mb-2">ชื่อโรงเรียน</label>
                    <input wire:model="editing_school_name" value="{{$row->annotation}}" type="text" class=" text-gray-900 text-sm rounded block w-full border border-gray-400 p-2.5">
                    @error('editing_student_register_name')
                        <span class="text-red-500 text-xs block">{{$message}}</span>    
                    @enderror
                    @else
                        {{$row->school_name}}
                    @endif
                    
                </th>
                <td class="px-6 py-4">
                    @if($editing_school_id == $row->id)
                    <button wire:click.prevent="update({{$row->id}})" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        บันทึก
                     </button>
                     <button wire:click.prevent="cancelEdit" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                         ยกเลิก
                     </button>
                    @else
                    <button wire:click.prevent="edit({{$row->id}})" class="p-3 ">
                        <i class="bi bi-pencil-square text-2xl text-cyan-500 hover:text-cyan-700"></i>
                    </button>
                    <button>
                        <i class="bi bi-trash3 text-2xl text-red-500 hover:text-red-700"></i>
                    </button>
                    @endif
                    
                </td>
               
            </tr>
            @endforeach
            
            
        </tbody>
    </table>
</div>

</div>
