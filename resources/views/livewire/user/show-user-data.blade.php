<div class="bg-gray-100 flex items-center justify-center ">
    <div class="bg-white shadow-md rounded-lg h-auto w-full max-w-4xl flex">
        <!-- คอลัมน์ซ้าย: เมนูลิงค์ -->
        <div class="w-1/4 bg-gray-800 text-white p-6 rounded-l-lg">
            <h2 class="text-lg font-bold mb-6">เมนู</h2>
            <ul class="space-y-4">
                <li>
                    <a href="{{route('studentRegisterList')}}" class="hover:text-gray-300">ดูรายชื่อนักเรียนที่ขอทุนการศึกษา</a>
                </li>
                
                <li>
                    <a href="#" class="hover:text-gray-300">ออกจากระบบ</a>
                </li>
            </ul>
        </div>

        <!-- คอลัมน์ขวา: ข้อมูลบัญชีผู้ใช้ -->
        <div class="w-3/4 p-8">
            <h2 class="text-xl text-center font-bold mb-6">ข้อมูลบัญชีผู้ใช้</h2>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    ชื่อ
                </label>
                @if($edit_user_id == $user_data->id)
                    <input wire:model="edit_user_name" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5" type="text">
                @else

                <p class="text-gray-900">{{$user_data->name}}</p>
                @endif
                
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    อีเมลล์
                </label>
                @if($edit_user_id == $user_data->id)
                <input wire:model="edit_user_email" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5" type="text">
                @else
                <p class="text-gray-900">{{$user_data->email}}</p>
                @endif
                
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                    เบอร์โทรศัพท์
                </label>
                @if($edit_user_id == $user_data->id)
                <input wire:model="edit_user_tel" type="text" class=" text-gray-900 text-sm rounded block w-full border p-2.5" type="text">
                @else

                @endif
                <p class="text-gray-900">{{$user_data->tel}}</p>
            </div>
            <div class="flex items-center justify-between">
                @if($edit_user_id != $user_data->id)
                <button wire:click="edit({{$user_data->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    แก้ไขข้อมูล
                </button>

                @else
                <div>
                    <button wire:click="update" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        บันทึก
                      </button>
    
                      <button wire:click="cancelEdit" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        ยกเลิก
                      </button>
                </div>
                


                @endif
            </div>
        </div>
    </div>
</div>