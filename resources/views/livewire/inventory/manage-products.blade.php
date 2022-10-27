<div>
    <x-slot name="page_title">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div>
        <div class="sm:px-6 lg:px-8">
    
            <!-- Page header -->
            <div class="mx-auto md:flex md:items-center md:justify-between md:space-x-5">
                <div class="flex items-center space-x-5">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Products</h1>
                    </div>
                </div>
                <div
                    class="flex flex-col-reverse mt-6 space-y-4 space-y-reverse justify-stretch sm:flex-row-reverse sm:justify-end sm:space-y-0 sm:space-x-3 sm:space-x-reverse md:mt-0 md:flex-row md:space-x-3">
                    <x-button.button-primary>Create</x-button.button-primary>
                </div>
            </div>
    
            <div class="px-6 py-6 mt-8 bg-white border rounded-md">
                <div class="flex flex-col">
                    <div class="">
                        <div
                            class="block"
                        >
                            <div
                                class=""
                            >
                                <table
                                    class="min-w-full divide-y divide-gray-300 table-datatable"
                                >
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <x-table.th></x-table.th>
                                            <x-table.th>Category</x-table.th>
                                            <x-table.th>Name</x-table.th>
                                            <x-table.th>Type</x-table.th>
                                            <x-table.th>Price</x-table.th>
                                            <x-table.th>Action</x-table.th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-gray-200"
                                    >
                                        @foreach($products as $index => $item)
                                        <tr wire:key="coll-{{ $index }}">
                                            <x-table.td>
                                                <img class="w-8 h-8" src="{{ $item->getImagePreview() }}">
                                            </x-table.td>
                                            <x-table.td>{{ $item->category->name }}</x-table.td>
                                            <x-table.td>
                                                <p>{{ $item->name }}</p>
                                            </x-table.td>
                                            <x-table.td>{{ $item->getType() }}</x-table.td>
                                            <x-table.td>{{ App\Helpers::money($item->price) }}</x-table.td>
                                            <x-table.td>
                                                <x-button.button-primary size="sm">View</x-button.button-primary>
                                            </x-table.td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
</div>
