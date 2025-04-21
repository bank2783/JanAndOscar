<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body>
    <header class="bg-white">
        <nav class="flex justify-between items-center w-[92%] bg-white mx-auto">
            <div>
                <img class="w-40" src="https://www.fondationjan-oscar.ch/JO/wp-content/uploads/2016/07/Logo-JO.png" alt="...">
            </div>
            <div class="nav-links duration-200 md:static absolute bg-white mt-7 md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:top-0 w-full flex items-center px-5 md:w-auto">
                <ul class="flex md:flex-row flex-col md:items-center md:gap-[2vw] gap-5">
                    <li >
                        <a class="text-[#dd3333] hover:text-[#ffc500]" href="/">หน้าแรก</a>
                    </li>
                    <li>
                        <a class="text-[#dd3333] hover:text-[#ffc500]" href="{{route('student_register')}}">ลงทะเบียนขอทุนการศึกษา</a>
                    </li>
                    <li>
                        <a class="text-[#dd3333] hover:text-[#ffc500]" href="{{route('admin.dashboard')}}">สำหรับผู้ดูแลระบบ</a>
                    </li>
                    @if(Auth::check())

                    <li>
                        <a class="text-[#dd3333] hover:text-[#ffc500]" href="{{route('studentRegisterList')}}">รายชื่อการขอทุนการศึกษา</a>
                    </li>
                    <li>
                        <a class="text-[#dd3333] hover:text-[#ffc500]" href="{{route('showUSerData')}}" >จัดการบัญชีผู้ใช้</a>
                    </li>

                    @endif
                    
                    @if(Auth::check())
                    
                    <li class="truncate w-30">
                        {{auth::user()->name}}
                    </li>
                    <li>
                        <a href="{{route('logout')}}">ออกจากระบบ</a>
                    </li>

                    @else
                    <li>
                        <a class="text-[#dd3333] hover:text-[#ffc500]" href="{{route('register')}}">สมัครสมาชิก</a>
                    </li>
                    <li>
                        <a class="text-[#dd3333] hover:text-[#ffc500]" href="{{route('login')}}">เข้าสู่ระบบ</a>
                    </li>

                    @endif
                    
                </ul>
                
            </div>
            {{-- @if(Auth::check())
            <div class="items-center flex justify-between mt-7 text-gray-500">
                <div>
                    <span class="truncate w-40">{{Auth::user()->name}}</span>
                </div> <!-- ใช้ไอคอนจาก Heroicons -->
                <div class="text-green-500 ml-2">
                    •
                </div>
                <div class="ml-3">
                    <a href="{{route('logout')}}">ออกจากระบบ</a>
                </div>
            </div>
            @endif --}}
            <div class="flex items-center gap-6">
                <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
            </div>
        </nav>
    
        <script>
            const navLinks = document.querySelector('.nav-links');
            function onToggleMenu(e) {
                e.name = e.name === 'menu' ? 'close' : 'menu'; // สลับไอคอนเมนู
                navLinks.classList.toggle('top-[9%]'); // สลับตำแหน่งเมนู
            }
        </script>
    
        <!-- เชื่อมต่อ Ion Icons -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </header>
</body>
</html>

