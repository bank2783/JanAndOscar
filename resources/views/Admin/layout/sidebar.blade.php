<div class="flex  h-12 w-full items-center bg-gray-800">
  <div>
    <span class="text-white text-4xl cursor-pointer" onclick="Open()">
      <i class="bi bi-filter-left px-2 bg-gray-900"></i>
    </span>
  </div>
  <div class="header-bar flex-1 lg:ml-[247px] transition-all duration-250">
    <span class="font-bold text-gray-300">JanAncOscar Foundation</span>
  </div>
  <div class="auth-name ml-auto text-gray-300 mr-3">
    <i class="bi bi-person-circle mr-2 text-[18px]"></i>
    <span class="">auth name</span>
    <i class="bi bi-chevron-down text-[10px]"></i>
  </div>
</div>

<div class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] p-2 w-[300px] overflow-y-auto text-center bg-gray-800 transition-all duration-300">
  <div class="text-gray-100 text-xl">
    <div class="p-2.5 mt-1 flex items-center">
      <i class="bi bi-app-indicator px-2 py-1 bg-blue-600 rounded-md"></i>
      <h1 class="font-bold text-gray-200 text-[15px] ml-3">Tailwindbar</h1>
      <i class="bi bi-x-lg cursor-pointer ml-20 lg:hidden" onclick="Open()"></i>
    </div>
    <hr class="my-2 text-gray-600">
  </div>

  <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white">
    <i class="bi bi-search text-sm"></i>
    <input type="text" class="text-[15px] ml-4 w-full bg-transparent focus:outline-none" placeholder="Search">
  </div>
  
  <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white">
    <i class="bi bi-house-door-fill"></i>
    <a href="{{route('admin.dashboard')}}" class="text-[15px] ml-4 text-gray-200">Home</a>
  </div>

  <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white">
    <i class="bi bi-person-check-fill"></i>
    <a href="{{route('student-sponsored-list')}}" class="text-[15px] ml-4 text-gray-200">รายชื่อนักเรียนในมูลนิธิ</a>
      
   
  </div>


  <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white">
    <i class="bi bi-bookmark-fill"></i>
    <a href="{{route('studentRegisterList')}}" class="text-[15px] ml-4 text-gray-200">รายการลงทะเบียนขอทุนการศึกษา</a>
  </div>

  <hr class="my-4 text-gray-600">

  <div onclick="dropdown()" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white">
    <i class="bi bi-chat-left-text-fill"></i>
    <div class="flex justify-between w-full items-center">
      <span class="text-[15px] ml-4 text-gray-200">Chatbox</span>
      <i class="bi bi-chevron-down" id="arrow"></i>
    </div>
  </div>
  <div class="text-left text-sm font-thin mt-2 w-4/5 mx-auto text-gray-200 hidden" id="submenu">
    <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Social</h1>
    <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Personal</h1>
    <h1 class="cursor-pointer p-2 hover:bg-gray-700 rounded-md mt-1">Friends</h1>
  </div>

  <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white">
    <i class="bi bi-box-arrow-in-right"></i>
    <span class="text-[15px] ml-4 text-gray-200">Logout</span>
  </div>
</div>

<script>
  function dropdown() {
    document.querySelector('#submenu').classList.toggle('hidden');
    document.querySelector('#arrow').classList.toggle('rotate-180');
  }

  function Open() {
    const sidebar = document.querySelector('.sidebar');
    const header = document.querySelector('.header-bar');
    const main_content = document.querySelector('.main-content');

    sidebar.classList.toggle('left-[-300px]');
    sidebar.classList.toggle('left-0');

    header.classList.toggle('ml-[247px]');
    main_content.classList.toggle('ml-[300px]')
  }
</script>
