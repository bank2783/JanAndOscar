<div class="container mx-auto p-8" >
    <div class="bg-white rounded-lg shadow-lg p-8">
        <!-- ชื่อนักเรียน -->
        <h1 class="text-3xl font-bold mb-6">ข้อมูลนักเรียน: {{ $student_register->student_name }}</h1>
        @if(session('success'))
        <div class="flex justify-center">
            <p class="text-green-500 text-bold text-xl">{{session('success')}}</p>
        </div>
        
        @endif
        <div class="flex justify-end">
            @if($editing_student_register_id != $student_register->id)
            <button wire:click.prevent="edit({{$student_register->id}})" class="bg-blue-500 hover:bg-blue-700 mt-5 mb-5 mr-5 text-white  py-2 px-4 rounded">
                แก้ไข
            </button>
              
            @endif
              @if($editing_student_register_id == $student_register->id)
              <button wire:click.prevent="updateData" class="bg-green-600 hover:bg-green-700 mt-5 mb-5 text-white mr-5 py-2 px-4 rounded">บันทึก</button>
              <button wire:click="cancelEdit" class="bg-red-500 hover:bg-red-700 mt-5 mb-5 text-white  py-2 px-4 rounded">ยกเลิก</button>
             
            @endif
        </div>
        <!-- ข้อมูลทั่วไป -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            
            @if($editing_student_register_id == $student_register->id)
            <div class="w-80">
                <label class="block text-gray-700 font-bold mb-2">ชื่อนักเรียน</label>
                <input wire:model="editing_student_register_name" value="{{$student_register->student_name}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                @error('editing_student_register_name')
                    <span class="text-red-500 text-xs block">{{$message}}</span>
                @enderror
            </div>
            @else
            <!-- ชื่อนักเรียน -->
            <div>
                <label class="block text-gray-700 font-bold mb-2">ชื่อนักเรียน</label>
                <p class="text-gray-900">{{ $student_register->student_name }}</p>
            </div>
            @endif

            @if($editing_student_register_id == $student_register->id)
            <div class="w-80">
                <label class="block text-gray-700 font-bold mb-2">เบอร์โทร</label>
                <input wire:model="editing_student_register_tel"  type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                @error('editing_student_register_tel')
                    <span class="text-red-500 text-xs block">{{$message}}</span>
                @enderror
            </div>
            @else
            <!-- เบอร์โทร -->

            <div>
                <label class="block text-gray-700 font-bold mb-2">เบอร์โทร</label>
                <p class="text-gray-900">{{ $student_register->tel }}</p>
            </div>
            @endif
           
            @if($editing_student_register_id == $student_register->id)
            <div class="w-80">
                <label class="block text-gray-700 font-bold mb-2">ไลน์ไอดี</label>
                <input wire:model="editing_student_register_line_id" value="{{$student_register->line_id}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                @error('editing_student_register_line_id')
                    <span class="text-red-500 text-xs block">{{$message}}</span>
                @enderror
            </div>
            @else
            <!-- Line ID -->
            <div>
                <label class="block text-gray-700 font-bold mb-2">ไลน์ไอดี</label>
                <p class="text-gray-900">{{ $student_register->line_id }}</p>
            </div>
            @endif

            @if($editing_student_register_id == $student_register->id)
            <div class="w-80">
                <label class="block text-gray-700 font-bold mb-2">แผนที่บ้าน</label>
                <input wire:model="editing_student_register_google_map_link" value="{{$student_register->google_map_link}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                @error('editing_student_register_google_map_link')
                    <span class="text-red-500 text-xs block">{{$message}}</span>
                @enderror
            </div>
            @else
            <!-- Google Map Link -->
            <div>
                <label class="block text-gray-700 font-bold mb-2">แผนที่บ้าน</label>
                <a href="{{ $student_register->google_map_link }}" target="_blank" class="text-blue-500 hover:underline">
                    ดูบน Google Map
                </a>
            </div>
            @endif

            @if($editing_student_register_id == $student_register->id)
            <div class="w-80">
                <label class="block text-gray-700 font-bold mb-2">ระดับการศึกษา</label>
                <input wire:model="editing_student_register_education_level" value="{{$student_register->education_level}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
                @error('editing_student_register_education_level')
                    <span class="text-red-500 text-xs block">{{$message}}</span>
                @enderror
            </div>
            @else
            <!-- ระดับการศึกษา -->
            <div>
                <label class="block text-gray-700 font-bold mb-2">ระดับการศึกษา</label>
                <p class="text-gray-900">{{ $student_register->education_level }}</p>
            </div>
            @endif

            @if($editing_student_register_id == $student_register->id)
            <div class="md:col-span-2">
                <label class="block text-gray-700 font-bold mb-2">ที่อยู่</label>
                <input wire:model="editing_student_register_address" value="{{$student_register->address}}" type="text" class=" text-gray-900 text-sm rounded block w-120 border p-2.5">
                @error('editing_student_register_address')
                    <span class="text-red-500 text-xs block">{{$message}}</span>
                @enderror
            </div>
            @else
            <div class="md:col-span-2">
                <label class="block text-gray-700 font-bold mb-2">ที่อยู่</label>
                <p class="text-gray-900">{{ $student_register->address }}</p>
            </div>
            @endif
            <!-- ที่อยู่ -->
            
        </div>
            
        <!-- รูปภาพต่าง ๆ -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- รูปนักเรียน -->

            @foreach ($student_photos as $row)
            <div class="relative inline-block">
                <label class="block text-gray-700 font-bold mb-2">รูปนักเรียน</label>
                
                @if (!empty($row->file_name))
                    <div class="relative">
                        <img src="{{ Storage::url($row->file_name) }}" alt="รูปนักเรียน" class="w-full h-auto rounded-lg shadow-md">
        
                        @if($editing_student_register_id == $student_register->id)
                            <!-- ปุ่มลบ -->
                            <button wire:click="deletePhoto({{ $row->id }}) " wire:confirm="Are you sure want to delete this?"
                                    class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                                &times;
                            </button>
                        @endif
                    </div>
                @else
                    <!-- ถ้าไม่มีรูป -->
                    <div class="w-40 h-40 border-2 border-gray-300 flex items-center justify-center rounded-lg bg-gray-100">
                        <span class="text-gray-500">ไม่มีรูป</span>
                    </div>
                @endif
            </div>
        @endforeach
        
            

            <!-- รูปบ้านนักเรียน -->
            
            {{-- รูปบ้านนักเรียน --}}
            @foreach ($student_home_photos as $row )
            <div class="relative inline-block">
                <label class="block text-gray-700 font-bold mb-2">รูปบ้านนักเรียน</label>
                @if(!empty($row->file_name))
                <div class="relative">
                    <img src="{{Storage::url($row->file_name)}}" alt="รูปบ้านนักเรียน" class="w-full h-auto rounded-lg shadow-md">
                    @if($editing_student_register_id == $student_register->id)
                            <!-- ปุ่มลบ -->
                            <button wire:click="deleteHomePhoto({{ $row->id }})" 
                                    class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                                &times;
                            </button>
                    @endif
                </div>  
                @else
                <div class="w-40 h-40 border-2 border-gray-300 flex items-center justify-center rounded-lg bg-gray-100">
                    <span class="text-gray-500">ไม่มีรูป</span>
                </div>
                @endif
            </div>
            @endforeach
            <!-- รูปสำเนาใบเกิด -->


            <div class="relative inline-block">
                <label class="block text-gray-700 font-bold mb-2">รูปสำเนาใบเกิด</label>
                @if(!empty($student_register->studentRegisterFileUpload->copy_of_birth_cercificate))
                <div class="relative">
                    <img src="{{ Storage::url($student_register->studentRegisterFileUpload->copy_of_birth_cercificate) }}" alt="รูปสำเนาใบเกิด" class="w-full h-auto rounded-lg shadow-md">

                    @if($editing_student_register_id == $student_register->id)
                            <!-- ปุ่มลบ -->
                            <button wire:click="deleteFileInStudentFileUpload({{ $row->id }})" 
                                    class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                                &times;
                            </button>
                    @endif
                </div>  
                @else
                <div class="w-40 h-40 border-2 border-gray-300 flex items-center justify-center rounded-lg bg-gray-100">
                    <span class="text-gray-500">ไม่มีรูป</span>
                </div>
                @endif
            </div>

            <!-- รูปสำเนาบัตรประชาชนนักเรียน -->
            <div class="relative inline-block">
                <label class="block text-gray-700 font-bold mb-2">รูปสำเนาบัตรประชาชนนักเรียน</label>
                @if(!empty($student_register->studentRegisterFileUpload->copy_of_id_card))
                <img src="{{ Storage::url($student_register->studentRegisterFileUpload->copy_of_id_card) }}" alt="รูปสำเนาบัตรประชาชนนักเรียน" class="w-full h-auto rounded-lg shadow-md">
                    @if($editing_student_register_id == $student_register->id)
                            <!-- ปุ่มลบ -->
                            <button wire:click="deleteFileInStudentFileUpload({{ 'copy_of_id_card'}})" 
                                    class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                                &times;
                            </button>
                    @endif
                @else
                <div class="w-40 h-40 border-2 border-gray-300 flex items-center justify-center rounded-lg bg-gray-100">
                    <span class="text-gray-500">ไม่มีรูป</span>
                </div>
                @endif
            </div>
            {{-- {{Storage::url($student_register->studentRegisterFileUpload->essay)}} --}}
            <!-- รูปสำเนาทะเบียนบ้าน -->
            <div class="relative inline-block">
                <label class="block text-gray-700 font-bold mb-2">รูปสำเนาทะเบียนบ้าน</label>
                @if(!empty($student_register->studentRegisterFileUpload->copy_of_house_registration))
                <img src="{{ Storage::url($student_register->studentRegisterFileUpload->copy_of_house_registration) }}" alt="รูปสำเนาทะเบียนบ้าน" class="w-full h-auto rounded-lg shadow-md">
                    @if($editing_student_register_id == $student_register->id)
                <!-- ปุ่มลบ -->
                    <button wire:click="deleteFileInStudentFileUpload({{ $row->id }})" 
                            class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                        &times;
                    </button>
                    @endif
                @else
                <div class="w-40 h-40 border-2 border-gray-300 flex items-center justify-center rounded-lg bg-gray-100">
                    <span class="text-gray-500">ไม่มีรูป</span>
                </div>
                @endif
            </div>
            <div class="relative">
                <label class="block text-gray-700 font-bold mb-2">เรียงความ</label>
                @if(!empty($student_register->studentRegisterFileUpload->essay))
                <img src="{{Storage::url($student_register->studentRegisterFileUpload->essay)}}" alt="รูปสำเนาทะเบียนบ้าน" class="w-full h-auto rounded-lg shadow-md">
                    @if($editing_student_register_id == $student_register->id)
                <!-- ปุ่มลบ -->
                    <button wire:click="deleteFileInStudentFileUpload({{ $row->id }})" 
                            class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                        &times;
                    </button>
                    @endif
                @else

                <div class="w-40 h-40 border-2 border-gray-300 flex items-center justify-center rounded-lg bg-gray-100">
                    <span class="text-gray-500">ไม่มีรูป</span>
                </div>
                @endif
            </div>
        </div>
        <!-- ข้อมูลผู้ปกครอง -->
<div class="mt-10">
    <h2 class="text-2xl font-bold mb-6">ข้อมูลผู้ปกครอง</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- ชื่อผู้ปกครอง -->
        <div>
            @if($editing_student_register_id == $student_register->id)
            <label class="block text-gray-700 font-bold mb-2">ชื่อผู้ปกครอง</label>
            <input value="{{$student_register->studentParent->parent_name}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
            @else
            <label class="block text-gray-700 font-bold mb-2">ชื่อผู้ปกครอง</label>
            <p class="text-gray-900">{{$student_register->studentParent->parent_name}}</p>
            @endif
        </div>

        <!-- เบอร์โทร -->
        <div>
            @if($editing_student_register_id == $student_register->id)
            <label class="block text-gray-700 font-bold mb-2">เบอร์โทร</label>
            <input value="{{$student_register->studentParent->tel}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
            @else
            <label class="block text-gray-700 font-bold mb-2">เบอร์โทร</label>
            <p class="text-gray-900">{{$student_register->studentParent->tel}}</p>
            @endif
        </div>

        <!-- Line ID -->
        <div>
            @if($editing_student_register_id == $student_register->id)
            <label class="block text-gray-700 font-bold mb-2">Line ID</label>
            <input value="{{$student_register->studentParent->line_id}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
            @else
            <label class="block text-gray-700 font-bold mb-2">Line ID</label>
            <p class="text-gray-900">{{$student_register->studentParent->line_id}}</p>
            @endif
        </div>

        <!-- Google Map Link -->
        <div>
            @if($editing_student_register_id == $student_register->id)
            <label class="block text-gray-700 font-bold mb-2">Google Map Link</label>
            <input value="{{$student_register->studentParent->google_map_link}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
            @else
            <label class="block text-gray-700 font-bold mb-2">Google Map Link</label>
            <a href="{{$student_register->studentParent->google_map_link}}" target="_blank" class="text-blue-500 hover:underline">
                ดูบน Google Map
            </a>
            @endif
        </div>

        <!-- ที่อยู่ -->
        <div class="md:col-span-2">
            @if($editing_student_register_id == $student_register->id)
            <label class="block text-gray-700 font-bold mb-2">ที่อยู่</label>
            <input value="{{$student_register->studentParent->line_id}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
            @else
            <label class="block text-gray-700 font-bold mb-2">ที่อยู่</label>
            <p class="text-gray-900">{{$student_register->studentParent->address}}</p>
            @endif
        </div>
    </div>

    <!-- เอกสารผู้ปกครอง -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- สำเนาทะเบียนบ้าน -->
        <div class="relative">
            <label class="block text-gray-700 font-bold mb-2">สำเนาทะเบียนบ้านผู้ปกครอง</label>
            @if(!empty($student_register->studentParentFileUpload->copy_of_house_registration))
            <img src="{{Storage::url($student_register->studentParentFileUpload->copy_of_house_registration)}}" alt="สำเนาทะเบียนบ้านผู้ปกครอง" class="w-full h-auto rounded-lg shadow-md">
                @if($editing_student_register_id == $student_register->id)
                <button wire:click="deleteFileInStudentFileUpload({{ $row->id }})" 
                class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                &times;
                @endif
            </button>
            @else
            <div class="w-40 h-40 border-2 border-gray-300 flex items-center justify-center rounded-lg bg-gray-100">
                <span class="text-gray-500">ไม่มีรูป</span>
            </div>
            @endif


        </div>

        <!-- สำเนาบัตรประชาชน -->
        <div class="relative">
            <label class="block text-gray-700 font-bold mb-2">สำเนาบัตรประชาชนผู้ปกครอง</label>
            @if(!empty($student_register->studentParentFileUpload->copy_of_house_registration))
            <img src="{{Storage::url($student_register->studentParentFileUpload->copy_of_id_card)}}" alt="สำเนาบัตรประชาชนผู้ปกครอง" class="w-full h-auto rounded-lg shadow-md">
                @if($editing_student_register_id == $student_register->id)

                <button wire:click="deleteFileInStudentFileUpload({{ $row->id }})" 
                    class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                    &times;

                @endif

            @else

            <div class="w-40 h-40 border-2 border-gray-300 flex items-center justify-center rounded-lg bg-gray-100">
                <span class="text-gray-500">ไม่มีรูป</span>
            </div>

            @endif
        </div>
    </div>
</div>
    
    </div>
</div>


