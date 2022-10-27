<x-app-layout>
    <x-slot name="page_title">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Homepage') }}
        </h2>
    </x-slot>

    <div>
        <div class="sm:px-6 lg:px-8">

            <!-- Page header -->
            <div class="mx-auto md:flex md:items-center md:justify-between md:space-x-5">
                <div class="flex items-center space-x-5">
                    <div class="flex-shrink-0">
                        <div class="relative flex items-center justify-center w-32 h-32">
                            <x-heroicon-s-building-storefront class="w-24 h-24 text-green-500" />
                            <span class="absolute inset-0 rounded-full shadow-md" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">My Store</h1>
                        <p class="text-sm font-medium text-gray-500">
                            Main Branch
                        <Address></Address>
                        </p>
                    </div>
                </div>
                <div
                    class="flex flex-col-reverse mt-6 space-y-4 space-y-reverse justify-stretch sm:flex-row-reverse sm:justify-end sm:space-y-0 sm:space-x-3 sm:space-x-reverse md:mt-0 md:flex-row md:space-x-3">
                    <x-button.button-secondary>Edit</x-button.button-secondary>
                    <x-button.button-primary>Install</x-button.button-primary>
                </div>
            </div>

            <div class="px-6 py-6 mt-8 bg-white rounded-md">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                        <div class="space-y-1 sm:space-y-1">


                            <x-form.form-section>
                                <x-form.form-inline-group label="Store Name">
                                    <x-form.input-text wire:model.defer="name" required :invalid="$errors->has('name')" />
                                </x-form.form-inline-group>
                            </x-form.form-section>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
