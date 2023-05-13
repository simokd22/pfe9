<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white dark:bg-white">  
    <div>
        {{ $logo }}
    </div>

    <div style="border: 1px solid lightgray" class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800  overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
