

    
  <div class=" bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
      <h2 class="text-2xl font-bold mb-6 text-center">สมัครสมาชิกสำหรับครู</h2>
      <form wire:submit.prevent="insert">
        <!-- Name Input -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">ชื่อ - สกุล</label>
            <input wire:model="name"
                type="text"
                id="name"
                name="name"
                placeholder="ชื่อ - นามสกุล"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            />
            @error('name')
                <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
            @enderror
        </div>
    
        <!-- Email Input -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">อีเมลล์</label>
            <input wire:model="email"
                type="email"
                id="email"
                name="email"
                placeholder="อีเมลล์"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            />
            @error('email')
                <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="tel" class="block text-sm font-medium text-gray-700">เบอร์โทร</label>
            <input wire:model="tel"
                type="text"
                id="tel"
                name="tel"
                placeholder="เบอร์โทรศัพท์"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            />
            @error('email')
                <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
            @enderror
        </div>
    
        <!-- School Input -->
        <div class="mb-4">
            <label for="school_id" class="block text-sm font-medium text-gray-700">โรงเรียน</label>
            <select wire:model="school_id"
                id="school_id"
                name="school_id"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            >
                <option value="" selected >เลือกชื่อโรงเรียน</option>
                @foreach ($schools as $row )
                <option value="{{$row->id}}">{{$row->school_name}}</option>
                @endforeach
                
                
            </select>
            @error('school_id')
                <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
            @enderror
        </div>
    
        <!-- Password Input -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">รหัสผ่าน</label>
            <input wire:model="password"
                type="password"
                id="password"
                name="password"
                placeholder="รหัสผ่าน"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            />
            @error('password')
                <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
            @enderror
        </div>
    
        <!-- Confirm Password Input -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">ยืนยันรหัสผ่าน</label>
            <input wire:model="password_confirmation"
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="ยืนยันรหัสผ่าน"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            />
            @error('password')
                <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
            @enderror
            {{-- @error('password_confirmation')
                <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
            @enderror --}}
        </div>
    
        <!-- Submit Button -->
        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Register
        </button>
    </form>
    <div class="mt-5 text-center text-blue-500">
        <a href="{{route('login')}}">เข้าสู่ระบบ</a>
    </div>
    </div>
  </div>

