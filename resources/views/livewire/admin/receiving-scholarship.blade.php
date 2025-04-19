<div>
    <div class="h-15 flex items-center justify-center bg-green-400">
        <span class="text-4xl">scholarship</span>
    </div>
    <div>
        <h2 class="text-3xl font-bold ml-5">{{$student_data->student_name}}</h2>
        <div class="grid-cols-2 grid w-250">
            <div class="mt-3 ml-5">
               <span class="text-3xl">จำนวนทุนการศึกษาที่ได้รับทั้งหมด</span>
            </div>
            <div>
                <span class="text-4xl">{{$student_data->TotalStudentReceivingScholarship($student_data->id)}} บาท</span>
            </div>
        </div>
    </div>
    <div>
        <div class="mt-5">
            <form action="">
                <div class="grid gap-6 mb-6 md:grid-cols-2 p-4">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        จำนวนเงินทุนการศึกษา
                    </label>
                    <input wire:model="scholarship" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        หมายเหตุ/ภาคเรียนที่ได้รับ
                    </label>
                    <input wire:model="annotation" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                </div>
                    
                    
                </div>

                <div class="h-10 flex items-center justify-center">
                    <button wire:click="insertData()" type="submit" href="" class="focus:outline-none text-white bg-violet-600 hover:bg-violet-800 focus:ring-4 focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800">
                        เพิ่มข้อมูลทุนการศึกษา
                    </button>
                </div>
            </form>
        </div>
        
    </div>
    
<div class="relative overflow-x-auto mt-3">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    scholarship
                </th>
                <th scope="col" class="px-6 py-3">
                    annotaion
                </th>
                <th scope="col" class="px-6 py-3">
                    date/time
                </th>
                <th scope="col" class="px-6 py-3">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($scholarship_data as $row )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   
                   
                  
                        @if($editing_receiving_scholarship_id == $row->id)
                            <div>
                                <div class="w-50">
                                    <label class="block text-gray-700 font-bold mb-2">ทุนการศึกษา</label>
                                    <input wire:model="editing_scholarship" value="{{$row->scholarship}}" type="text" class=" text-gray-900 text-sm rounded block w-full border border-gray-400 p-2.5">
                                    @error('editing_student_register_name')
                                        <span class="text-red-500 text-xs block">{{$message}}</span>    
                                    @enderror
                                </div>
                            </div>
                        @else
                        {{$row->scholarship}}
                        @endif
                  
                   
                </th>
                <td class="px-6 py-4">
                    @if($editing_receiving_scholarship_id == $row->id)
                    <div>
                        <div class="w-50">
                            <label class="block text-gray-700 font-bold mb-2">หมายเหตุ/ภาคเรียนที่ได้รับ</label>
                            <input wire:model="editing_annotation" value="{{$row->annotation}}" type="text" class=" text-gray-900 text-sm rounded block w-full border border-gray-400 p-2.5">
                            @error('editing_student_register_name')
                                <span class="text-red-500 text-xs block">{{$message}}</span>    
                            @enderror
                        </div>
                    </div>
                @else
                {{$row->annotation}}
                @endif
                    
                </td>
                <td class="px-6 py-4">
                    {{$row->created_at}}
                </td>
                <td class="px-6 py-4">
                    @if($editing_receiving_scholarship_id != $row->id)
                    <button wire:click.prevent="edit({{$row->id}})" class="p-3 ">
                        <i class="bi bi-pencil-square text-2xl text-cyan-500 hover:text-cyan-700"></i>
                    </button>
                    <button>
                        <i class="bi bi-trash3 text-2xl text-red-500 hover:text-red-700"></i>
                    </button>

                @else
                    @if($editing_receiving_scholarship_id == $row->id)
                <button wire:click.prevent="update({{$row->id}})" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                   บันทึก
                </button>
                <button wire:click.prevent="cancelEdit" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    ยกเลิก
                </button>
                    @endif
                @endif
                    
                </td>
            </tr>
            @endforeach
            
            
        </tbody>
    </table>
</div>

</div>
