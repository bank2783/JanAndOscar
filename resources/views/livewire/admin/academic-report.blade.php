<div>
   <div>
    <span class="text-4xl">Academic Performanc Report</span>
   </div>
   <div class="p-4">
    <div>
        <div class="mt-3">
            <span class="text-2xl">ข้อมูลนักเรียน</span>
        </div>
        <div class="grid grid-cols-3 gap-4">
            
            <div class=" p-4">{{$student_data->student_name}}</div>
            <div class=" p-4">{{$student_data->education_level}}</div>
            
          </div>
   </div>
   <div>
        <span class="text-2xl">เลือกผลการเรียน</span>
   </div>
   
    <div class="grid grid-cols-3 mt-3">
        <select wire:model="onselect_academic_performance" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option  selected>เลือกผลการเรียน</option>
            @foreach ($academic_performance as $row )
                <option value="{{$row->id}}">{{$row->annotation}}</option>
            @endforeach
            
        </select>
   </div>
   <div class="mt-5">
    <button wire:click="downloadPDF" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
        สร้างรายงานผลการเรียน
    </button>

   
   
   </div>
   </div>
</div>
