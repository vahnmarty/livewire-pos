
<div>
    <x-slot name="page_title">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('My Branches') }}
        </h2>
    </x-slot>
    
    <div>
        <div class="sm:px-6 lg:px-8">
    
            <!-- Page header -->
            <!-- <div class="mx-auto md:flex md:items-center md:justify-between md:space-x-5">
                <div class="flex items-center space-x-5">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">My Branches</h1>
                    </div>
                </div>
                <div
                    class="flex flex-col-reverse mt-6 space-y-4 space-y-reverse justify-stretch sm:flex-row-reverse sm:justify-end sm:space-y-0 sm:space-x-3 sm:space-x-reverse md:mt-0 md:flex-row md:space-x-3">
                    <x-button.button-primary>Create</x-button.button-primary>
                </div>
            </div> -->
    
            <div class="mt-8">
                <div class="grid grid-cols-3">

                    <div class="relative p-6 bg-white rounded-md shadow-md">
                        <div class="flex">
                            <x-heroicon-s-home-modern class="w-10 h-10 text-gray-700"/>
                            <div class="ml-4">
                                <h3 class="font-bold">Main Branch</h3>
                                <p class="text-sm text-gray-700">Address</p>
                            </div>
                        </div>
                        <div class="absolute right-5 top-2">
                            <x-heroicon-s-star class="w-8 h-8 text-red-700"/>
                        </div>
                    </div>
                    
                </div>
            </div>
    
        </div>
    </div>
</div>
