<div class=" transition-all duration-250 p-1 main-content">
    <div class="bg-white h-11 flex items-center font-bold">
        <span>Dashboard</span>
    </div>

    <div class="grid grid-cols-4 gap-4 mt-5 p-4">
        <a href="{{route('student-sponsored-list')}}">
            <div class="bg-white rounded-md p-4 shadow-sm  h-30">
                <div class="flex justify-center">
                    <i class="bi bi-person-fill text-4xl text-blue-400"></i>
                </div>
                <div class="flex justify-center">
                    <span class=" text-gray-500">
                        {{$student_sponsored}}
                    </span>
                </div>
                <div class="flex justify-center">
                    <span class="text-gray-400">Sponsored</span>
                </div>
            </div>
        </a>
       
        <div class="bg-white rounded-md p-4 shadow-sm  h-30">
            <a href="{{route('studentRegisterList')}}">
                <div class="flex justify-center">
                    <i class="bi bi-person-fill text-4xl text-orange-400"></i>
                </div>
                <div class="flex justify-center">
                    <span class=" text-gray-500">
                        {{$student_registers}}
                    </span>
                </div>
                <div class="flex justify-center">
                    <span class="text-gray-400">Registers</span>
                </div>
            </a>
            
        </div>

        <div class="bg-white rounded-md p-4 shadow-sm  h-30">
            <a href="{{route('teacher')}}">
                <div class="flex justify-center">
                    <i class="bi bi-person-fill text-4xl text-green-400"></i>
                </div>
                <div class="flex justify-center">
                    <span class=" text-gray-500">
                        {{$teachers}}
                    </span>
                </div>
                <div class="flex justify-center">
                    <span class="text-gray-400">Teachers</span>
                </div>
            </a>
            
        </div>
        <div class="bg-white rounded-md p-4 shadow-sm  h-30">
            <a href="{{route('admin.schools')}}">
                <div class="flex justify-center">
                    <i class="bi bi-buildings-fill text-4xl text-red-400"></i>
                </div>
                <div class="flex justify-center">
                    <span class=" text-gray-500">
                        {{$schools}}
                    </span>
                </div>
                <div class="flex justify-center">
                    <span class="text-gray-400">School</span>
                </div>
            </a>
            
        </div>
        <div class="bg-white rounded-md p-4 shadow-sm  h-30">
            <a href="{{route('awarded')}}">
                <div class="flex justify-center">
                    <i class="bi bi-card-checklist text-4xl text-green-400"></i>
                </div>
                <div class="flex justify-center">
                    <span class=" text-gray-500">
                        {{$awarded}}
                    </span>
                </div>
                <div class="flex justify-center">
                    <span class="text-gray-400">Awarded</span>
                </div>
            </a>
            
        </div>
        <div class="bg-white rounded-md p-4 shadow-sm  h-30">
            <div class="flex justify-center">
                <i class="bi bi-currency-bitcoin text-4xl text-green-400"></i>
            </div>
            <div class="flex justify-center">
                <span class=" text-gray-500">
                    {{number_format($total_money).' '. 'THB'}}
                </span>
            </div>
            <div class="flex justify-center">
                <span class="text-gray-400">Total Money</span>
            </div>
        </div>
        
        
      </div>
      <div class="grid grid-cols-2">
        <div class="">
            <livewire:admin.barchart></livewire:admin.barchart>
        </div>
        <div>
            <livewire:admin.school-pie-chart></livewire:admin.school-pie-chart>
        </div>
      </div>
      

      
</div>