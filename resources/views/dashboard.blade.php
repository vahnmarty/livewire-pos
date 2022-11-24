<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <h1 class="text-3xl font-bold">Dashboard</h1>
            <div class="mt-8">
                <dl class="grid grid-cols-1 gap-5 mt-5 sm:grid-cols-3 lg:grid-cols-4">

                    <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Sales</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">71,897</dd>
                    </div>

                    <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">This Month Sales</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">58.16%</dd>
                    </div>

                    <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Last 7 days Sales</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">58.16%</dd>
                    </div>

                    <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Today Sales</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">58.16%</dd>
                    </div>

                </dl>
            </div>

            <div class="mt-8">
                <dl class="grid grid-cols-1 gap-5 mt-5 sm:grid-cols-3 lg:grid-cols-4">

                    <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Orders</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">71,897</dd>
                    </div>

                    <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">This Month Orders</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">58.16%</dd>
                    </div>

                    <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Last 7 days Orders</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">58.16%</dd>
                    </div>

                    <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate">Today Orders</dt>
                        <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">24.57%</dd>
                    </div>
                </dl>
            </div>

            <div class="grid grid-cols-6 gap-5 mt-8">

                <div class="col-span-4">
                    <div class="min-h-[10rem] rounded-md border bg-white">
                        <h1>Sales Chart</h1>
                    </div>
                </div>

                <div class="col-span-2">
                    <div class="bg-white border rounded-md">
                        <header class="px-4 py-2">
                            <h1>Top Performing Product</h1>
                        </header>
                        <div class="border-t">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
