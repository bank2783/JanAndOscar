<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
      <h1 class="text-2xl font-bold mb-6 text-center">แบบฟอร์มลงทะเบียนขอทุนการศึกษา</h1>
      <form wire:submit="insert" action="" class="space-y-6">
        <!-- ส่วนข้อมูลนักเรียน -->
        <div>
          <h2 class="text-xl font-semibold mb-4">ข้อมูลนักเรียน</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="studentName" class="block text-sm font-medium text-gray-700">ชื่อนักเรียน</label>
              <input wire:model="student_name" type="text" id="studentName" name="studentName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
              @error('student_name')
              <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
            @enderror
            </div>
            <div>
              <label for="studentPhone" class="block text-sm font-medium text-gray-700">เบอร์โทรนักเรียน</label>
              <input wire:model="student_tel" type="text" id="studentPhone" name="studentPhone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
              @error('student_tel')
              <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            
            <div>
              <label for="studentLineId" class="block text-sm font-medium text-gray-700">ไลน์ไอดีนักเรียน</label>
              <input wire:model="student_line_id" type="text" id="studentLineId" name="studentLineId" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
              @error('student_line_id')
              <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
              @enderror
            </div>
            <div>
                <label for="schoolName" class="block text-sm font-medium text-gray-700">เลือกชื่อโรงเรียน</label>
                <select wire:model="school_id" id="schoolName" name="schoolName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                  <option selected value="">-- กรุณาเลือกโรงเรียน --</option>
                  @foreach ($schools as $row )
                  <option value="{{$row->id}}">{{$row->school_name}}</option>
                  @endforeach
                  
                  
                </select>
                @error('school_id')
                <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div>
            
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
              
              
              <div>
                <label for="studentGoogleMapLink" class="block text-sm font-medium text-gray-700">Google Map Link</label>
                <input wire:model="student_google_map_link" type="url" id="studentGoogleMapLink" name="studentGoogleMapLink" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
              
                @error('student_google_map_link')
                <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
            @enderror</div>
              <div>
                <label for="studentEducationLevel" class="block text-sm font-medium text-gray-700">ระดับการศึกษา</label>
                <input wire:model="student_education_level" type="text" id="education_level" name="education_level" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
             
                @error('student_education_level')
                <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
            @enderror</div>
              
              
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            
            
            <div>
                <label for="studentAddress" class="block text-sm font-medium text-gray-700">ที่อยู่นักเรียน</label>
                <textarea wire:model="student_address" id="studentAddress" name="studentAddress" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
              
                @error('student_address')
                <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
            @enderror
        </div>
            
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <div>
              <label for="studentBirthCertificate" class="block text-sm font-medium text-gray-700">สำเนาใบเกิด</label>
              <input wire:model="student_copy_of_birth_cercificate"  type="file" id="studentBirthCertificate" name="studentBirthCertificate" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            
              @error('student_copy_of_birth_cercificate')
              <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
          @enderror
        </div>
            <div>
              <label for="studentIdCard" class="block text-sm font-medium text-gray-700">สำเนาบัตรประชาชน</label>
              <input wire:model="student_copy_of_id_card" type="file" id="studentIdCard" name="studentIdCard" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
              @error('student_copy_of_id_card')
              <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
          @enderror
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <div>
              <label for="studentHouseRegistration" class="block text-sm font-medium text-gray-700">สำเนาทะเบียนบ้าน</label>
              <input wire:model="student_copy_of_house_registration" type="file" id="studentHouseRegistration" name="studentHouseRegistration" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
              @error('student_copy_of_house_registration')
              <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
          @enderror
            </div>
            <div>
              <label for="studentPhoto" class="block text-sm font-medium text-gray-700">รูปนักเรียน</label>
              <input wire:model="student_selft_image" multiple type="file" id="studentPhoto" name="studentPhoto" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
              @error('student_selft_image')
              <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
          @enderror
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <div>
              <label for="studentHousePhoto" class="block text-sm font-medium text-gray-700">รูปบ้านนักเรียน</label>
              <input wire:model="student_selft_house" multiple type="file" id="studentHousePhoto" name="studentHousePhoto" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
              @error('student_selft_house')
              <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
          @enderror
            </div>
            <div>
              <label for="studentHousePhoto" class="block text-sm font-medium text-gray-700">เรียงความ</label>
              <input wire:model="essay" type="file" id="essay" name="essay" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
              @error('essay')
              <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
          @enderror
            </div>
          </div>
        </div>
  
        <!-- ส่วนข้อมูลผู้ปกครอง -->
        <div>
          <h2 class="text-xl font-semibold mb-4">ข้อมูลผู้ปกครอง</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="parentName" class="block text-sm font-medium text-gray-700">ชื่อผู้ปกครอง</label>
              <input wire:model="parent_name" type="text" id="parentName" name="parentName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
              @error('parent_name')
              <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
          @enderror
            </div>
            <div>
              <label for="parentPhone" class="block text-sm font-medium text-gray-700">เบอร์โทรผู้ปกครอง</label>
              <input wire:model="parent_tel" type="tel" id="parentPhone" name="parentPhone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
              @error('parent_tel')
              <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
          @enderror
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <div>
                <label for="parentGoogleMapLink" class="block text-sm font-medium text-gray-700">Google Map Link</label>
                <input wire:model="parent_google_map_link" type="url" id="parentGoogleMapLink" name="parentGoogleMapLink" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('parent_google_map_link')
                <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
            @enderror
            </div>
            <div>
              <label for="parentLineId" class="block text-sm font-medium text-gray-700">ไลน์ไอดีผู้ปกครอง</label>
              <input wire:model="parent_line_id" type="text" id="parentLineId" name="parentLineId" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
              @error('parent_line_id')
              <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
          @enderror
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            
            <div>
                <label for="parentAddress" class="block text-sm font-medium text-gray-700">ที่อยู่ผู้ปกครอง</label>
                <textarea wire:model="parent_address" id="parentAddress" name="parentAddress" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                @error('parent_address')
                <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
            @enderror  
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <div>
              <label for="parentHouseRegistration" class="block text-sm font-medium text-gray-700">สำเนาทะเบียนบ้าน</label>
              <input wire:model="parent_copy_of_house_registration"  type="file" id="parentHouseRegistration" name="parentHouseRegistration" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
              @error('parent_copy_of_house_registration')
              <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
          @enderror
            </div>
            <div>
              <label for="parentIdCard" class="block text-sm font-medium text-gray-700">สำเนาบัตรประชาชน</label>
              <input  wire:model="parent_copy_of_id_card"  type="file" id="parentIdCard" name="parentIdCard" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
              @error('parent_copy_of_id_card')
              <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
          @enderror
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <div>
              <label class="text-xl font-semibold mb-4" for="">เอกสารรับรอง (มีหรือไม่มีก็ได้)</label>
              <p class="mt-3 block text-sm font-medium text-gray-700">เอกสารรับรองความถูกต้องของข้อมูล</p>
              <input wire:model="data_guarantee_document"  type="file" id="" name="" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
              <p class="mt-10 block text-sm font-medium text-gray-700">เอกสารรับรองฐานะทางการเงิน</p>
              <input wire:model="financial_guarantee_document"  type="file" id="" name="" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
           
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <div>
              <label class="text-xl font-semibold mb-4" for="">การประเมินเบื้องต้น</label>
              <p class="mt-3 block text-sm font-medium text-gray-700">ระดับการเรียน</p>
              <select wire:model="study_point" id="" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>เลือกระดับผลการเรียน</option>
                @foreach ($study_level as $row )
                  <option value="{{$row->point}}">{{$row->study_level_name}}</option>
                @endforeach
              </select>
            </div>
            <div>
              <p class="mt-10 block text-sm font-medium text-gray-700">ระดับฐานะครอบครัว</p>
              <select wire:model="financial_point" id="" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option  selected>เลือกระดับฐานะ</option>
                @foreach ($financial as $row )
                  <option value="{{$row->point}}">{{$row->financial_level}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
  
        <!-- ส่วนข้อมูลนัดเรียน -->
        
        <!-- ปุ่มส่งฟอร์ม -->
        <div class="flex justify-end">
          <button  type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">ส่งข้อมูล</button>
        </div>
      </form>
      @if (session()->has('success'))
        <div class="text-green-500 text-xs">{{ session('success') }}</div>
      @endif
    </div>
  </div>
  