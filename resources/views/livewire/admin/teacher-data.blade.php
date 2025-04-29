<div>
    <div class="">
        <div class="bg-green-400 w-auto h-20 flex items-center justify-center">
            <span class="text-4xl">ข้อมูลครู</span>
        </div>
        <div class="mt-5 p-4">
            <span class="text-4xl">{{$teacher->name}}</span>
        </div>
        <div class="p-4 grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    {{$teacher->email}}
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">School</label>
                    {{$teacher->School->school_name}}
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                    {{$teacher->tel}}
                </div>
        </div>
    </div>
</div>
