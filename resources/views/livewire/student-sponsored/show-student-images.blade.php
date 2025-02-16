<div class="max-w-full mx-auto px-4 py-8" x-data="{ open: false }">
    <!-- ปุ่มเพิ่มรูปภาพ -->
    <div class="flex justify-end mb-4">
        <button 
            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
            @click="open = true">
            เพิ่มรูปภาพ
        </button>
    </div>

    <!-- รูปภาพนักเรียน -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($student_images as $row)
        <div class="w-full bg-gray-100 rounded overflow-hidden shadow-md">
            <img class="w-full object-cover" src="{{ Storage::url($row->file_name) }}" alt="Student Profile Image">
            
            <div class="flex justify-center">
                <button wire:confirm wire:click="deletePhoto({{$row->id}})" class="bg-red-500 hover:bg-red-700 text-white  py-2 px-4 rounded">
                    ลบรูปภาพ
                  </button>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal สำหรับเพิ่มรูปภาพ -->
    <div x-show="open" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center" x-cloak>
        <div class="bg-white p-6 rounded-md shadow-lg max-w-lg w-full">
            <h2 class="text-2xl font-bold mb-4">เพิ่มรูปภาพ</h2>
            <form wire:submit="UploadImages" action="">
                <div class="mb-4">
                    <label for="profile_image" class="block text-sm font-medium text-gray-700">เลือกรูปภาพ</label>
                    <input wire:model="images_upload_file" type="file" multiple id="profile_image" class="mt-1 block w-full" required @change="open = true">
                </div>
                <div class="flex justify-between items-center">
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600" @click="open = false">
                        ยกเลิก
                    </button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600" @click="open = false">
                        อัปโหลด
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
