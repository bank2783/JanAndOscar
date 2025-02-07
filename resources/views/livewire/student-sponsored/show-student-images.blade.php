<div class="max-w-full mx-auto px-4 py-8">
    <!-- ปุ่มเพิ่มรูปภาพ -->
    <div class="flex justify-end mb-4">
        <button 
            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
            onclick="document.getElementById('imageUploadModal').classList.remove('hidden')">
            เพิ่มรูปภาพ
        </button>
    </div>

    <!-- รูปภาพนักเรียน -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($student_images as $row)
            
                <div class="w-full h-full bg-gray-100 rounded overflow-hidden">
                    <img class="w-full h-full object-cover" src="{{Storage::url($row->file_name)}}" alt="Student Profile Image">
                </div>
            
                
            
        @endforeach
    </div>

    <!-- Modal สำหรับเพิ่มรูปภาพ -->
    <div id="imageUploadModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-md shadow-lg max-w-lg w-full">
            <h2 class="text-2xl font-bold mb-4">เพิ่มรูปภาพ</h2>
            <form  wire:submit="UploadImages" action=""  >
                
                <div class="mb-4">
                    <label for="profile_image" class="block text-sm font-medium text-gray-700">เลือกรูปภาพ</label>
                    <input wire:model="images_upload_file" multiple type="file" multiple  id="profile_image" class="mt-1 block w-full" required>
                </div>
                <div class="flex justify-between items-center">
                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600" onclick="document.getElementById('imageUploadModal').classList.add('hidden')">
                        ยกเลิก
                    </button>
                    <button  type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        อัปโหลด
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
