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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" >
            <!-- รูปนักเรียน -->

            @foreach ($student_photos as $row)
    <div class="relative inline-block" wire:key="photo-{{ $row->id }}">
        <label class="block text-gray-700 font-bold mb-2">รูปนักเรียน</label>

        @if (!empty($row->file_name))
            <div class="relative">
                <img src="{{ Storage::url($row->file_name) }}" alt="รูปนักเรียน" class="w-full h-auto rounded-lg shadow-md">

                @if($editing_student_register_id == $student_register->id)
                    <!-- ปุ่มลบ -->
                    <button wire:click="deletePhoto({{ $row->id }})" wire:confirm="Are you sure want to delete this?"
                            class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                        &times;
                    </button>
                @endif
            </div>
        @else
            <!-- ใช้ Factory Function เพื่อให้แต่ละ component มีตัวแปรของตัวเอง -->
            <div x-data="studentPhotosUploadComponent({{ $row->id }})" class="w-40 h-40 border-2 border-gray-300 flex flex-col items-center justify-center rounded-lg bg-gray-100">
                
                <!-- แสดงรูปพรีวิวถ้ามี -->
                <template x-if="previewUrl">
                    <img :src="previewUrl" class="w-full h-auto rounded-lg">
                </template>

                <!-- แสดงข้อความถ้ายังไม่มีไฟล์ -->
                <p x-show="!previewUrl" class="text-gray-500" x-text="fileName ? fileName : 'ยังไม่มีไฟล์'"></p>

                <!-- ปุ่มเพิ่มรูปภาพ -->
                <label :for="'file-upload-' + id" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700">
                    เพิ่มรูปภาพ
                </label>

                <!-- Input file ที่ซ่อนอยู่ -->
                <input wire:model="editing_student_photo" :id="'file-upload-' + id" type="file" class="hidden"
                    @change="
                        const file = $event.target.files[0];
                        if (file) {
                            fileName = file.name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                previewUrl = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    ">

                <!-- ปุ่มบันทึก และ ปุ่มยกเลิก -->
                <div class="mt-2 flex space-x-2">
                    <!-- ปุ่มบันทึก -->
                    <button wire:click="insertStudentPhoto(id)" x-show="previewUrl"
                        class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-700">
                        บันทึก
                    </button>

                    <!-- ปุ่มยกเลิก -->
                    <button @click="fileName = ''; previewUrl = ''" x-show="previewUrl"
                        class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-700">
                        ยกเลิก
                    </button>
                </div>
            </div>
        @endif
    </div>
@endforeach

<script>
function studentPhotosUploadComponent(id) {
    return {
        id: id, // กำหนด ID ให้แต่ละ instance แยกกัน
        fileName: '',
        previewUrl: ''
    };
}

function studentHomePhotoComponent(id){
    return{
        id:id,
        fileName:'',
        previewUrl:''
    }
}

function studentFileUploadComponent(fill_name){
    return{
        fill_name:fill_name,
        fileName:'',
        previewUrl:''

    }
}

function parentFileUploadComponent(fill_name){
    return{
        fill_name:fill_name,
        fileName:'',
        previewUrl:''
    }
}

function dataGuaranteeDocument(fill_name){
    return{
        fill_name:fill_name,
        fileName:'',
        previewUrl:''
    }
}

function financialGuaranteeDocument(fill_name){
    return{
        fill_name:fill_name,
        fileName:'',
        previewUrl:''
    }
}
</script>

            
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
                <div x-data="studentHomePhotoComponent({{$row->id}})" class="w-40 h-40 border-2 border-gray-300 flex flex-col items-center justify-center rounded-lg bg-gray-100">
                    <!-- แสดงรูปพรีวิวถ้ามี -->
                    <template x-if="previewUrl">
                        <img :src="previewUrl" class="w-full h-auto rounded-lg">
                    </template>
                
                    <!-- แสดงข้อความถ้ายังไม่มีไฟล์ -->
                    <p x-show="!previewUrl" class="text-gray-500" x-text="fileName ? fileName : 'ยังไม่มีไฟล์'"></p>
                
                    <!-- ปุ่มเพิ่มรูปภาพ -->
                    <label :for="'file-upload'+id" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700">
                        เพิ่มรูปภาพ
                    </label>
                
                    <!-- Input file ที่ซ่อนอยู่ -->
                    <input wire:model="editing_student_home_photo" :id="'file-upload'+id" type="file" class="hidden"
                        @change="
                            const file = $event.target.files[0];
                            if (file) {
                                fileName = file.name;
                                const reader = new FileReader();
                                reader.onload = (e) => previewUrl = e.target.result;
                                reader.readAsDataURL(file);
                            }
                        ">
                
                    <!-- ปุ่มบันทึก -->
                    <div class="mt-2 flex space-x-2">
                        <button wire:click="insertStudentHomePhoto({{$row->id}})" x-show="previewUrl" 
                            class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-700">
                            บันทึก
                        </button>
                        <button @click="fileName = ''; previewUrl = ''" x-show="previewUrl"
                        class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-700">
                        ยกเลิก
                    </button>
                    </div>
                    
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
                            <button wire:click="deleteFileInStudentFileUpload('copy_of_birth_cercificate')" 
                                    class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                                &times;
                            </button>
                        @endif
                    </div>
                @else
                    <div x-data="studentFileUploadComponent('copy_of_birth_cercificate')" class="w-40 h-40 border-2 border-gray-300 flex flex-col items-center justify-center rounded-lg bg-gray-100">
                        <!-- แสดงรูปพรีวิวถ้ามี -->
                        <template x-if="previewUrl">
                            <img :src="previewUrl" class="w-full h-auto rounded-lg">
                        </template>
                    
                        <!-- แสดงข้อความถ้ายังไม่มีไฟล์ -->
                        <p x-show="!previewUrl" class="text-gray-500" x-text="fileName ? fileName : 'ยังไม่มีไฟล์'"></p>
                    
                        <!-- ปุ่มเพิ่มรูปภาพ -->
                        <label :for="'file-upload-' + fill_name" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700">
                            เพิ่มรูปภาพ
                        </label>
                    
                        <!-- Input file ที่ซ่อนอยู่ -->
                        <input wire:model="editing_student_register_file" :id="'file-upload-' + fill_name" type="file" class="hidden"
                            @change="
                                const file = $event.target.files[0];
                                if (file) {
                                    fileName = file.name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => previewUrl = e.target.result;
                                    reader.readAsDataURL(file);
                                }
                            ">
                    
                        <!-- ปุ่มบันทึก -->
                        <div class="mt-2 flex space-x-2">
                            <button wire:click="insertFileInStudentFileUpload('copy_of_birth_cercificate')" x-show="previewUrl" 
                            class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-700">
                                บันทึก
                            </button>
                            <button @click="fileName = ''; previewUrl = ''" x-show="previewUrl"
                            class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-700">
                            ยกเลิก
                        </button>
                        </div>
                        
                    </div>
                @endif
            </div>
            
            <!-- รูปสำเนาบัตรประชาชนนักเรียน -->
            <div class="relative inline-block">
                <label class="block text-gray-700 font-bold mb-2">รูปสำเนาบัตรประชาชนนักเรียน</label>
                @if(!empty($student_register->studentRegisterFileUpload->copy_of_id_card))
                    <div class="relative">
                        <img src="{{ Storage::url($student_register->studentRegisterFileUpload->copy_of_id_card) }}" alt="รูปสำเนาบัตรประชาชนนักเรียน" class="w-full h-auto rounded-lg shadow-md">
                        
                        @if($editing_student_register_id == $student_register->id)
                            <!-- ปุ่มลบ -->
                            <button wire:click="deleteFileInStudentFileUpload('copy_of_id_card')" 
                                    class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                                &times;
                            </button>
                        @endif
                    </div>
                @else
                    <div x-data="studentFileUploadComponent('copy_id_card')" class="w-40 h-40 border-2 border-gray-300 flex flex-col items-center justify-center rounded-lg bg-gray-100">
                        <!-- แสดงรูปพรีวิวถ้ามี -->
                        <template x-if="previewUrl">
                            <img :src="previewUrl" class="w-full h-auto rounded-lg">
                        </template>
                    
                        <!-- แสดงข้อความถ้ายังไม่มีไฟล์ -->
                        <p x-show="!previewUrl" class="text-gray-500" x-text="fileName ? fileName : 'ยังไม่มีไฟล์'"></p>
                    
                        <!-- ปุ่มเพิ่มรูปภาพ -->
                        <label :for="'file-upload-' + fill_name" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700">
                            เพิ่มรูปภาพ
                        </label>
                    
                        <!-- Input file ที่ซ่อนอยู่ -->
                        <input wire:model="editing_student_register_file" :id="'file-upload-' + fill_name" type="file" class="hidden"
                            @change="
                                const file = $event.target.files[0];
                                if (file) {
                                    fileName = file.name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => previewUrl = e.target.result;
                                    reader.readAsDataURL(file);
                                }
                            ">
                    
                        <!-- ปุ่มบันทึก -->
                        <div class="mt-2 flex space-x-2">
                            <button wire:click="insertFileInStudentFileUpload('copy_of_id_card')" x-show="previewUrl" 
                            class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-700">
                                บันทึก
                            </button>
                            <button @click="fileName = ''; previewUrl = ''" x-show="previewUrl"
                        class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-700">
                        ยกเลิก
                    </button>
                        </div>
                        
                    </div>
                @endif
            </div>
            <div class="relative">
                <label class="block text-gray-700 font-bold mb-2">เรียงความ</label>
                @if(!empty($student_register->studentRegisterFileUpload->essay))
                <img src="{{Storage::url($student_register->studentRegisterFileUpload->essay)}}" alt="รูปสำเนาทะเบียนบ้าน" class="w-full h-auto rounded-lg shadow-md">
                    @if($editing_student_register_id == $student_register->id)
                <!-- ปุ่มลบ -->
                    <button wire:click="deleteFileInStudentFileUpload('essay')" 
                            class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                        &times;
                    </button>
                    @endif
                @else

                <div x-data="studentFileUploadComponent('essay')" class="w-40 h-40 border-2 border-gray-300 flex flex-col items-center justify-center rounded-lg bg-gray-100">
                    <!-- แสดงรูปพรีวิวถ้ามี -->
                    <template x-if="previewUrl">
                        <img :src="previewUrl" class="w-full h-auto rounded-lg">
                    </template>
                
                    <!-- แสดงข้อความถ้ายังไม่มีไฟล์ -->
                    <p x-show="!previewUrl" class="text-gray-500" x-text="fileName ? fileName : 'ยังไม่มีไฟล์'"></p>
                
                    <!-- ปุ่มเพิ่มรูปภาพ -->
                    <label :for="'file-upload'+fill_name" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700">
                        เพิ่มรูปภาพ
                    </label>
                
                    <!-- Input file ที่ซ่อนอยู่ -->
                    <input wire:model="editing_student_register_file" :id="'file-upload'+fill_name" type="file" class="hidden"
                        @change="
                            const file = $event.target.files[0];
                            if (file) {
                                fileName = file.name;
                                const reader = new FileReader();
                                reader.onload = (e) => previewUrl = e.target.result;
                                reader.readAsDataURL(file);
                            }
                        ">
                
                    <!-- ปุ่มบันทึก -->
                    <div class="mt-2 flex space-x-2">
                        <button wire:click="insertFileInStudentFileUpload('essay')" x-show="previewUrl" 
                        class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-700">
                            บันทึก
                        </button>
                        <button @click="fileName = ''; previewUrl = ''" x-show="previewUrl"
                        class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-700">
                        ยกเลิก
                    </button>
                    </div>
                    
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
            <input wire:model="editing_student_parent_name" value="{{$student_register->studentParent->parent_name}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
            @else
            <label class="block text-gray-700 font-bold mb-2">ชื่อผู้ปกครอง</label>
            <p class="text-gray-900">{{$student_register->studentParent->parent_name}}</p>
            @endif
        </div>

        <!-- เบอร์โทร -->
        <div>
            @if($editing_student_register_id == $student_register->id)
            <label class="block text-gray-700 font-bold mb-2">เบอร์โทร</label>
            <input wire:model="editing_student_parent_tel" value="{{$student_register->studentParent->tel}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
            @else
            <label class="block text-gray-700 font-bold mb-2">เบอร์โทร</label>
            <p class="text-gray-900">{{$student_register->studentParent->tel}}</p>
            @endif
        </div>

        <!-- Line ID -->
        <div>
            @if($editing_student_register_id == $student_register->id)
            <label class="block text-gray-700 font-bold mb-2">Line ID</label>
            <input wire:model="editing_student_parent_line_id" value="{{$student_register->studentParent->line_id}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
            @else
            <label class="block text-gray-700 font-bold mb-2">Line ID</label>
            <p class="text-gray-900">{{$student_register->studentParent->line_id}}</p>
            @endif
        </div>

        <!-- Google Map Link -->
        <div>
            @if($editing_student_register_id == $student_register->id)
            <label class="block text-gray-700 font-bold mb-2">Google Map Link</label>
            <input wire:model="editing_student_parent_google_map_link" value="{{$student_register->studentParent->google_map_link}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
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
            <input wire:model="editing_student_parent_address" value="{{$student_register->studentParent->line_id}}" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5">
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
                <button wire:click="deleteFileInStudentParentFileUpload('copy_of_house_registration')" 
                class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                &times;
                @endif
            </button>
            @else
            <div x-data="studentFileUploadComponent('copy_house_registration')" class="w-40 h-40 border-2 border-gray-300 flex flex-col items-center justify-center rounded-lg bg-gray-100">
                <!-- แสดงรูปพรีวิวถ้ามี -->
                <template x-if="previewUrl">
                    <img :src="previewUrl" class="w-full h-auto rounded-lg">
                </template>
            
                <!-- แสดงข้อความถ้ายังไม่มีไฟล์ -->
                <p x-show="!previewUrl" class="text-gray-500" x-text="fileName ? fileName : 'ยังไม่มีไฟล์'"></p>
            
                <!-- ปุ่มเพิ่มรูปภาพ -->
                <label :for="'file-upload'+fill_name" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700">
                    เพิ่มรูปภาพ
                </label>
            
                <!-- Input file ที่ซ่อนอยู่ -->
                <input wire:model="editing_parent_file_upload" :id="'file-upload'+fill_name" type="file" class="hidden"
                    @change="
                        const file = $event.target.files[0];
                        if (file) {
                            fileName = file.name;
                            const reader = new FileReader();
                            reader.onload = (e) => previewUrl = e.target.result;
                            reader.readAsDataURL(file);
                        }
                    ">
            
                <!-- ปุ่มบันทึก -->
                <div class="mt-2 flex space-x-2">
                    <button wire:click="insertParentFileUpload('copy_of_house_registration')" x-show="previewUrl" 
                    class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-700">
                        บันทึก
                    </button>
                    <button @click="fileName = ''; previewUrl = ''" x-show="previewUrl"
                        class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-700">
                        ยกเลิก
                    </button> 
                </div>
                
            </div>
            @endif


        </div>

        <!-- สำเนาบัตรประชาชน -->
        <div class="relative">
            <label class="block text-gray-700 font-bold mb-2">สำเนาบัตรประชาชนผู้ปกครอง</label>
            @if(!empty($student_register->studentParentFileUpload->copy_of_id_card))
            <img src="{{Storage::url($student_register->studentParentFileUpload->copy_of_id_card)}}" alt="สำเนาบัตรประชาชนผู้ปกครอง" class="w-full h-auto rounded-lg shadow-md">
                @if($editing_student_register_id == $student_register->id)

                <button wire:click="deleteFileInStudentParentFileUpload('copy_of_id_card')" 
                    class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                    &times;

                @endif

            @else

            <div x-data="parentFileUploadComponent('copy_id_card')" class="w-40 h-40 border-2 border-gray-300 flex flex-col items-center justify-center rounded-lg bg-gray-100">
                <!-- แสดงรูปพรีวิวถ้ามี -->
                <template x-if="previewUrl">
                    <img :src="previewUrl" class="w-full h-auto rounded-lg">
                </template>
            
                <!-- แสดงข้อความถ้ายังไม่มีไฟล์ -->
                <p x-show="!previewUrl" class="text-gray-500" x-text="fileName ? fileName : 'ยังไม่มีไฟล์'"></p>
            
                <!-- ปุ่มเพิ่มรูปภาพ -->
                <label :for="'file-upload'+fill_name" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700">
                    เพิ่มรูปภาพ
                </label>
            
                <!-- Input file ที่ซ่อนอยู่ -->
                <input wire:model="editing_parent_file_upload" :id="'file-upload'+fill_name" type="file" class="hidden"
                    @change="
                        const file = $event.target.files[0];
                        if (file) {
                            fileName = file.name;
                            const reader = new FileReader();
                            reader.onload = (e) => previewUrl = e.target.result;
                            reader.readAsDataURL(file);
                        }
                    ">
            
                <!-- ปุ่มบันทึก -->
                <div class="mt-2 flex space-x-2">
                    <button wire:click="insertParentFileUpload('copy_of_id_card')" x-show="previewUrl" 
                    class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-700">
                        บันทึก
                    </button>
                    <button @click="fileName = ''; previewUrl = ''" x-show="previewUrl"
                        class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-700">
                        ยกเลิก
                    </button> 
                </div>
                
            </div>

            @endif
        </div>
        
    </div>
    
    <div>
    @if (session()->has('insert_student_sponsored'))
    <div class="text-green-500 text-xs">{{ session('insert_student_sponsored') }}</div>
      @endif
    </div>
</div>
<div class="mt-10">
    <h2 class="text-2xl font-bold mb-6">เอกสารยืนยันข้อมูล</h2>
    
    <div class="relative inline-block" >
        <label class="block text-gray-700 font-bold mb-2">รูปนักเรียน</label>

        @if ($student_register->CertificationDocument->data_guarantee_document)
            <div class="relative">
                <img src="{{ Storage::url($student_register->CertificationDocument->data_guarantee_document) }}" alt="รูปนักเรียน" class="w-full h-auto rounded-lg shadow-md">

                @if($editing_student_register_id == $student_register->id)
                    <!-- ปุ่มลบ -->
                    <button wire:click="deleteCertification('data_guarantee_document')" wire:confirm="Are you sure want to delete this?"
                            class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                        &times;
                    </button>
                @endif
            </div>
        @else
            <!-- ใช้ Factory Function เพื่อให้แต่ละ component มีตัวแปรของตัวเอง -->
            <div x-data="dataGuaranteeDocument('data_guarantee_document')" class="w-40 h-40 border-2 border-gray-300 flex flex-col items-center justify-center rounded-lg bg-gray-100">
                
                <!-- แสดงรูปพรีวิวถ้ามี -->
                <template x-if="previewUrl">
                    <img :src="previewUrl" class="w-full h-auto rounded-lg">
                </template>

                <!-- แสดงข้อความถ้ายังไม่มีไฟล์ -->
                <p x-show="!previewUrl" class="text-gray-500" x-text="fileName ? fileName : 'ยังไม่มีไฟล์'"></p>

                <!-- ปุ่มเพิ่มรูปภาพ -->
                <label :for="'file-upload-' + fill_name" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700">
                    เพิ่มรูปภาพ
                </label>

                <!-- Input file ที่ซ่อนอยู่ -->
                <input wire:model="editing_data_guarantee_document" :id="'file-upload-' + fill_name" type="file" class="hidden"
                    @change="
                        const file = $event.target.files[0];
                        if (file) {
                            fileName = file.name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                previewUrl = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    ">

                <!-- ปุ่มบันทึก และ ปุ่มยกเลิก -->
                <div class="mt-2 flex space-x-2">
                    <!-- ปุ่มบันทึก -->
                    <button wire:click="insertStudentPhoto(id)" x-show="previewUrl"
                        class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-700">
                        บันทึก
                    </button>

                    <!-- ปุ่มยกเลิก -->
                    <button @click="fileName = ''; previewUrl = ''" x-show="previewUrl"
                        class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-700">
                        ยกเลิก
                    </button>
                </div>
            </div>
        @endif
    </div>
    <div class="relative inline-block" >
        <label class="block text-gray-700 font-bold mb-2">เอกสารยืนยันข้อมูลการเงิน</label>

        @if ($student_register->CertificationDocument->financial_guarantee_document)
            <div class="relative">
                <img src="{{ Storage::url($student_register->CertificationDocument->financial_guarantee_document) }}" alt="" class="w-full h-auto rounded-lg shadow-md">

                @if($editing_student_register_id == $student_register->id)
                    <!-- ปุ่มลบ -->
                    <button wire:click="deleteCertification('financial_guarantee_document')" wire:confirm="Are you sure want to delete this?"
                            class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md hover:bg-red-700">
                        &times;
                    </button>
                @endif
            </div>
        @else
            <!-- ใช้ Factory Function เพื่อให้แต่ละ component มีตัวแปรของตัวเอง -->
            <div x-data="financialGuaranteeDocument('financial_guarantee_document')" class="w-40 h-40 border-2 border-gray-300 flex flex-col items-center justify-center rounded-lg bg-gray-100">
                
                <!-- แสดงรูปพรีวิวถ้ามี -->
                <template x-if="previewUrl">
                    <img :src="previewUrl" class="w-full h-auto rounded-lg">
                </template>

                <!-- แสดงข้อความถ้ายังไม่มีไฟล์ -->
                <p x-show="!previewUrl" class="text-gray-500" x-text="fileName ? fileName : 'ยังไม่มีไฟล์'"></p>

                <!-- ปุ่มเพิ่มรูปภาพ -->
                <label :for="'file-upload-'+fill_name" class="mt-2 px-3 py-1 bg-blue-500 text-white rounded cursor-pointer hover:bg-blue-700">
                    เพิ่มรูปภาพ
                </label>

                <!-- Input file ที่ซ่อนอยู่ -->
                <input wire:model="editing_financial_guarantee_document" :id="'file-upload-'+fill_name" type="file" class="hidden"
                    @change="
                        const file = $event.target.files[0];
                        if (file) {
                            fileName = file.name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                previewUrl = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    ">

                <!-- ปุ่มบันทึก และ ปุ่มยกเลิก -->
                <div class="mt-2 flex space-x-2">
                    <!-- ปุ่มบันทึก -->
                    <button wire:click="insertStudentPhoto(id)" x-show="previewUrl"
                        class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-700">
                        บันทึก
                    </button>

                    <!-- ปุ่มยกเลิก -->
                    <button @click="fileName = ''; previewUrl = ''" x-show="previewUrl"
                        class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-700">
                        ยกเลิก
                    </button>
                </div>
            </div>
        @endif
    </div>

</div>
<div>
    <div>
        @if(Auth::user()->role_id == 1)
        <button wire:click="insertStudentSponsored({{$student_register->id}})" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            เพิ่มข้อมูลรายชื่อเข้าเป็นนักเรียนทุนการศึกษา
        </button>
        @endif
    </div>
</div>


    
    </div>
</div>


