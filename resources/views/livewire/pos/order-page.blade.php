<div class="xl:min-h-[36rem] px-8 overflow-auto overflow-hidden shadow-sm xl:max-h-[40rem] mt-4">
    <div class="py-6">
        @if($errors->any())
<div class="p-4 rounded-md bg-red-50">
    <div class="flex">
      <div class="flex-shrink-0">
        <!-- Heroicon name: solid/x-circle -->
        <svg class="w-5 h-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
        </svg>
      </div>
      <div class="ml-3">
        <h3 class="text-sm font-medium text-red-800">There were {{ count($errors) }} errors with your submission</h3>
        <div class="mt-2 text-sm text-red-700">
          <ul role="list" class="pl-5 space-y-1 list-disc">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
@endif
        <div class="grid grid-cols-6 gap-8">
            <div class="col-span-3">
                <div class="flex justify-between">
                    <header>
                        <h1 class="text-2xl font-bold">My Restaurant</h1>
                        <p class="mt-1 text-gray-600">{{ $branch->name }}</p>
                    </header>
                    <div>
    
                        <div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <x-heroicon-s-magnifying-glass-circle class="w-8 h-8 text-gray-400" />
                                </div>
                                <input type="text"
                                    class="block w-full py-3 pl-16 text-lg bg-transparent border-gray-300 rounded-md focus:border-gray-500 focus:ring-gray-500 sm:text-sm"
                                    placeholder="Search menu...">
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
            <div class="col-span-3">
                <div class="grid grid-cols-2 gap-4">
                    <header>
                        <h1 class="text-2xl font-bold">Order {{ '#' . $order_number }}</h1>
                        <p class="mt-1 text-sm text-gray-600">{{ now()->format('F d, Y h:i a') }}</p>
                    </header>
                    <div class="grid grid-cols-2">
                        <label class="flex items-center p-2 border-2 rounded-l-md {{ $order_type == 'dine-in' ? 'border-red-300 bg-red-50' : 'bg-gray-50 border-gray-300'  }}">
                            <input type="radio" class="hidden" wire:model="order_type" value="dine-in">
                            <x-heroicon-s-home-modern class="w-6 h-6" />
                            <span class="ml-2">Dine In</span>
                        </label>
                        <label
                            class="flex items-center p-2 border-2 rounded-r-md  hover:opacity-100 {{ $order_type == 'take-out' ? 'border-red-300 bg-red-50' : 'bg-gray-50 border-gray-300'  }}">
                            <input type="radio" class="hidden" wire:model="order_type" value="take-out">
                            <x-heroicon-s-shopping-bag class="w-6 h-6" />
                            <span class="ml-2">Take-Out</span>
                        </label>
                    </div>
                </div>
    
            </div>
        </div>
    
        <div class="grid grid-cols-6 gap-8 mt-4">
            <div class="col-span-3">
    
                {{-- Categories --}}
                <section x-data="{ active: -1 }" class="grid grid-cols-4 gap-4">
                    @foreach ($categories as $index => $categoryItem)
                        <div wire:key="category-{{ $index  . '-' . time() }}" 
                            class="p-2 border-2 rounded-md cursor-pointer hover:border-red-300 hover:bg-red-100"
                            x-on:click="active = {{ $index }}" wire:click="setCategory({{ $categoryItem->id }})"
                            :class="active == {{ $index }} ? 'border-2 border-red-400 bg-red-100' : 'bg-gray-300 '">
                            <div class="flex items-center">
                                <img class="w-5 h-5" src="{{ $categoryItem->getImagePreview() }}" alt="">
                                <p class="ml-2 text-sm">{{ $categoryItem->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </section>
    
                {{-- Catalog --}}
    
                <section class="grid grid-cols-3 gap-4 mt-8">
                    @foreach ($products as $i => $productItem)
                        @if (!$category_id || $category_id == $productItem->category_id)
                            <div wire:key="product-{{ $i . '-' . time() }}"
                                class="p-2 border-2 rounded-md shadow-md cursor-pointer hover:border-red-300 hover:bg-red-100"
                                wire:click="selectProduct(`{{ $productItem->id }}`)">
                                <div>
                                    <div class="bg-gray-200">
                                        <img class="object-fill w-auto h-16 mx-auto"
                                            src="{{ $productItem->getImagePreview() }}" alt="">
                                    </div>
                                    <div class="px-2 py-1">
                                        <p class="text-xs font-bold">{{ Str::limit($productItem->name, 30, '..') }}</p>
                                        <p class="text-red-700">{{ App\Helpers::money($productItem->price) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </section>
    
            </div>
            <div class="col-span-3">
    
                <div class="grid grid-cols-2 gap-4">
    
                    <section>
                        <!-- Orders -->
                        <div class="max-h-screen min-h-[33rem] space-y-0.5 overflow-auto rounded-md border bg-gray-300">
                            @foreach ($orders as $key => $orderItem)
                                <div wire:key="order-{{ $key . '-' . time() }}" 
                                    class="flex justify-between p-2 bg-gray-100 shadow-md cursor-pointer">
                                    <div class="flex">
                                        <div>
                                            <p class="text-xs">{{ Str::limit($orderItem['name']) }}</p>
                                            <p class="text-xs font-bold text-red-700">
                                                {{ App\Helpers::money($orderItem['price']) }}</p>
                                        </div>
                                    </div>
                                    <div x-data="{ quantity: $wire.entangle('orders.{{ $key }}.quantity').defer }" class="flex items-center gap-1">
                                        <a href="#" x-on:click.prevent="quantity--">
                                            <x-heroicon-m-minus-small
                                                class="w-5 h-5 font-bold text-gray-400 hover:text-gray-700" />
                                        </a>
                                        <span x-text="quantity" class="text-xl font-bold"></span>
                                        <a href="#" x-on:click.prevent="quantity++">
                                            <x-heroicon-m-plus-small
                                                class="w-5 h-5 font-bold text-gray-400 hover:text-gray-700" />
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
    
                    <section class="space-y-4">
                        <!-- Customer -->
                        <div class="p-2 bg-white rounded-md">
                            <h3 class="mb-1 text-sm font-bold">Extra</h3>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <x-heroicon-s-users class="w-4 h-4 text-gray-400" />
                                </div>
                                <input type="text"
                                    wire:model.defer="customer"
                                    class="block w-full py-2 pl-10 text-sm bg-transparent border-gray-300 rounded-md focus:border-gray-500 focus:ring-gray-500 sm:text-xs"
                                    placeholder="Customer Name">
                            </div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-start pl-3 pointer-events-none top-2">
                                    <x-heroicon-s-clipboard-document-list class="w-4 h-4 text-gray-400" />
                                </div>
                                <textarea type="text" row="3"
                                    wire:model.defer="notes"
                                    class="block w-full py-2 pl-10 text-sm bg-transparent border-gray-300 rounded-md focus:border-gray-500 focus:ring-gray-500 sm:text-xs"
                                    placeholder="Notes"></textarea>
                            </div>
                        </div>
    
                        <!-- Payments -->
                        <div class="p-2 bg-white rounded-md">
                            <div class="flex justify-between">
                                <h3 class="mb-1 text-sm font-bold">Payments</h3>
                                <a href="#"
                                    class="flex items-center justify-center w-4 h-4 bg-yellow-400 rounded-full">
                                    <x-heroicon-s-plus class="w-3 h-3 font-bold text-gray-900" />
                                </a>
                            </div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-xs text-gray-500">Cash</span>
                                </div>
                                <input type="text" wire:model="cash"
                                    class="block w-full py-2 pl-10 text-lg text-right bg-transparent border-gray-300 rounded-md focus:border-gray-500 focus:ring-gray-500 sm:text-sm"
                                    placeholder="0.00">
                            </div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-xs text-gray-500">Change</span>
                                </div>
                                <input type="text" value="{{ $cash ? $cash - $total : 0 }}"
                                    class="block w-full py-2 pl-10 text-lg text-right bg-transparent border-gray-300 rounded-md focus:border-gray-500 focus:ring-gray-500 sm:text-sm"
                                    placeholder="0.00">
                            </div>
                        </div>
    
                        <!-- Summary -->
                        <div class="p-2 bg-white rounded-md">
                            <h3 class="mb-1 text-sm font-bold">Summary</h3>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-xs text-gray-500">Sub-Total</span>
                                </div>
                                <input type="text" value="{{ number_format($subtotal, 2) }}"
                                    class="block w-full py-2 pl-10 text-lg text-right bg-gray-100 border-gray-300 rounded-md focus:border-gray-500 focus:ring-gray-500 sm:text-sm"
                                    placeholder="0.00">
                            </div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <span class="text-xs text-gray-500">Discount</span>
                                </div>
                                <input type="text" wire:model="discount"
                                    class="block w-full py-2 pl-10 text-lg text-right bg-transparent border-gray-300 rounded-md focus:border-gray-500 focus:ring-gray-500 sm:text-sm"
                                    placeholder="0.00">
                            </div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-start pl-3 pointer-events-none top-4">
                                    <span class="font-bold">Total</span>
                                </div>
                                <input type="text" value="{{ number_format($total, 2) }}"
                                    class="block w-full py-2 pl-10 text-2xl font-bold text-right bg-gray-100 border-gray-300 rounded-md focus:border-gray-500 focus:ring-gray-500 sm:text-2xl"
                                    placeholder="0.00">
                            </div>
                        </div>
                        
                        <div>
                            <button type="button"
                                wire:click="checkout"
                                class="block w-full px-6 py-3 text-xl font-medium text-center text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Take Order
                            </button>
                        </div>
                        
                    </section>
    
                </div>
    
    
    
    
    
            </div>
        </div>
    </div>
</div>
