<div class="bg-blue-100 p-6">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <!-- ส่วนหัวหน้าเว็บ -->
        <h1 class="text-2xl font-bold text-center mb-6">ข้อมูลนักเรียนและผู้ปกครอง</h1>
        @if(session('insert_massage'))
        <div class="flex justify-center">
            <p class="text-green-500 text-bold text-xl">{{session('insert_massage')}}</p>
        </div>
        @endif
        <!-- ส่วนข้อมูลนักเรียน -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">ข้อมูลนักเรียน</h2>
            <div class="flex  justify-end">
                @if($editing_student_id != $student_data->id)
                <button wire:click.prevent="edit({{$student_data->id}})" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    แก้ไขข้อมูล
                </button> 

                @else
                    @if($editing_student_id == $student_data->id)
                <button wire:click.prevent="update" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                   บันทึก
                </button>
                <button wire:click="cancelEdit" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    ยกเลิก
                </button>
                    @endif
                @endif
                
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @if($editing_student_id == $student_data->id)

                <div class="w-80">
                    <label class="block text-gray-700 font-bold mb-2">ชื่อนักเรียน</label>
                    <input wire:model="editing_student_name" value="{{$student_data->student_name}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                    @error('editing_student_register_name')
                        <span class="text-red-500 text-xs block">{{$message}}</span>    
                    @enderror
                </div>
                @else
                <div>
                    <label class="block text-lg font-bold text-gray-700 ">ชื่อนักเรียน</label>  
                    <p class="mt-1 text-sm">{{$student_data -> student_name}}</p>
                </div>

                @endif

                @if($editing_student_id == $student_data->id)
                <div class="w-80">
                    <label class="block text-gray-700 font-bold mb-2">เบอร์โทร</label>
                    <input wire:model="editing_student_tel" value="{{$student_data->tel}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                    @error('editing_student_register_name')
                        <span class="text-red-500 text-xs block">{{$message}}</span>
                    @enderror
                </div>
                @else
                <div>
                    <label class="block text-lg font-bold text-gray-700 ">เบอร์โทร</label>
                    <p class="mt-1 text-sm">{{$student_data -> tel}}</p>
                </div>
                @endif

                @if($editing_student_id == $student_data->id)
                <div class="w-80">
                    <label class="block text-gray-700 font-bold mb-2">ไลน์ไอดี</label>
                    <input wire:model="editing_student_line_id" value="{{$student_data->line_id}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                    @error('editing_student_register_name')
                        <span class="text-red-500 text-xs block">{{$message}}</span>
                    @enderror
                </div>
                @else

                <div>
                    <label class="block text-lg font-bold text-gray-700 ">ไอดีไลน์</label>
                    <p class="mt-1 text-sm">{{$student_data -> line_id}}</p>
                </div>
                @endif


                @if($editing_student_id == $student_data->id)
                <div class="w-80">
                    <label class="block text-gray-700 font-bold mb-2">ระดับการศึกษา</label>
                    <input wire:model="editing_student_education_level" value="{{$student_data->education_level}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                    @error('editing_student_register_name')
                        <span class="text-red-500 text-xs block">{{$message}}</span>
                    @enderror
                </div>
                @else
                <div>
                    <label class="block text-lg font-bold text-gray-700 ">ไอดีไลน์</label>   
                    <p class="mt-1 text-sm">{{$student_data ->education_level}}</p>
                </div>
                @endif
                                
                @if($editing_student_id == $student_data->id)

                <div class="w-80">
                    <label class="block text-gray-700 font-bold mb-2">Google Map Link</label>
                    <input wire:model="editing_student_google_map_link" value="{{$student_data->google_map_link}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                    @error('editing_student_register_name')
                        <span class="text-red-500 text-xs block">{{$message}}</span>
                    @enderror
                </div>
                @else

                <div>
                    <label class="block text-lg font-bold text-gray-700 ">Google Map Link</label>
                    <a href="{{$student_data -> google_map_link}}" class="mt-1 text-lg font-semibold text-blue-500 hover:underline">ดูบน Google Map</a>
                </div>

                @endif

                @if($editing_student_id == $student_data->id)
                <div class="w-80">
                    <label class="block text-gray-700 font-bold mb-2">ที่อยู่</label>
                    <input wire:model="editing_student_address" value="{{$student_data->adress}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                    @error('editing_student_register_name')
                        <span class="text-red-500 text-xs block">{{$message}}</span>
                    @enderror
                </div>

                @else
                <div class="md:col-span-2">
                    <label class="block text-lg font-bold text-gray-700 ">ที่อยู่</label>
                    <p class="mt-1 text-sm ">{{$student_data -> adress}}</p>
                </div>
                @endif

                @if($editing_student_id == $student_data->id)


            <div class="md:col-span-2">
                <label class="block text-gray-700 font-bold mb-2">โน๊ต</label>
                <textarea wire:model="editing_student_note"type="text" class=" text-gray-900 text-sm rounded block w-120 border p-2.5">
                    {{$student_data->note}}
                </textarea>
                @error('editing_student_register_address')
                    <span class="text-red-500 text-xs block">{{$message}}</span>
                @enderror
            </div>
            @else
            <div class="md:col-span-2">
                <label class="block text-gray-700 font-bold mb-2">โน๊ต</label>
                <p class="text-gray-900">{{ $student_data->note }}</p>
            </div>
            
            @endif
                
                
            </div>
        </div>

        <!-- ส่วนข้อมูลผู้ปกครอง -->
        <div>
            <h2 class="text-xl font-semibold mb-4">ข้อมูลผู้ปกครอง</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                @if($editing_student_id == $student_data->id)

                <div class="w-80">
                    <label class="block text-gray-700 font-bold mb-2">ชื่อ</label>
                    <input wire:model="editing_parent_name" value="{{$student_data->StudentSponsoredParent->parent_name}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                    @error('editing_student_register_name')
                        <span class="text-red-500 text-xs block">{{$message}}</span>
                    @enderror
                </div>

                @else
                <div class="md:col-span-2">
                    <label class="block text-lg font-bold text-gray-700 ">ชื่อ</label>
                    <p class="mt-1 text-sm ">{{$student_data ->StudentSponsoredParent->parent_name}}</p>
                </div>
                @endif



                @if($editing_student_id == $student_data->id)
                <div class="w-80">
                    <label class="block text-gray-700 font-bold mb-2">เบอร์โทร</label>
                    <input wire:model="editing_parent_tel" value="{{$student_data->StudentSponsoredParent->tel}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                    @error('editing_student_register_name')
                        <span class="text-red-500 text-xs block">{{$message}}</span>
                    @enderror
                </div>
                @else
                <div>
                    <label class="block text-lg font-bold text-gray-700 ">เบอร์โทร</label>
                    <p class="mt-1 text-sm">{{$student_data -> StudentSponsoredParent->tel}}</p>
                </div>
                @endif

                @if($editing_student_id == $student_data->id)

                <div class="w-80">
                    <label class="block text-gray-700 font-bold mb-2">ไลน์ไอดี</label>
                    <input wire:model="editing_parent_line_id" value="{{$student_data->StudentSponsoredParent->line_id}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                    @error('editing_student_register_name')
                        <span class="text-red-500 text-xs block">{{$message}}</span>
                    @enderror
                </div>

                @else

                <div>
                    <label class="block text-lg font-bold text-gray-700 ">ไลน์ไอดี</label> 
                    <p class="mt-1 text-sm">{{$student_data -> StudentSponsoredParent->line_id}}</p>
                </div>

                @endif

                @if($editing_student_id == $student_data->id)

                <div class="w-80">
                    <label class="block text-gray-700 font-bold mb-2">google_map_link</label>
                    <input wire:model="editing_parent_google_map_link" value="{{$student_data->StudentSponsoredParent->google_map_link}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                    @error('editing_student_register_name')
                        <span class="text-red-500 text-xs block">{{$message}}</span>
                    @enderror
                </div>

                @else

                <div>
                    <label class="block text-lg font-bold text-gray-700 ">google_map_link</label> 
                    <p class="mt-1 text-sm">{{$student_data -> StudentSponsoredParent->google_map_link}}</p>
                </div>

                @endif
                
                @if($editing_student_id == $student_data->id)

                <div class="w-80">
                    <label class="block text-gray-700 font-bold mb-2">ที่อยู่</label>
                    <input wire:model="editing_parent_address" value="{{$student_data->StudentSponsoredParent->address}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                    @error('editing_student_register_name')
                        <span class="text-red-500 text-xs block">{{$message}}</span>
                    @enderror
                </div>

                @else

                <div class="md:col-span-2">
                    <label class="block text-lg font-bold text-gray-700 ">ที่อยู่</label>
                    <p class="mt-1 text-sm">{{$student_data -> StudentSponsoredParent->address}}</p>
                </div>

                @endif 
                
                
            </div>
        </div>

        <div class="flex justify-center mt-4">
            <a href="" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                ดูรูปภาพของนักเรียน
            </a>
            <a href="" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                ดูผลการเรียนของนักเรียน
            </a>
        </div>
    </div>
</div>
