<div class="xl:min-h-[36rem] px-8 overflow-auto overflow-hidden shadow-sm xl:max-h-[40rem] mt-4">
    <div class="py-6">
        <div class="grid grid-cols-6 gap-8">
            <div class="col-span-3">
                <div class="flex justify-between">
                    <header>
                        <h1 class="text-2xl font-bold">Orders</h1>
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
                                    placeholder="Search Order...">
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
                <div class="grid grid-cols-1 gap-1">
                    @foreach($transactions as $transaction)
                    <div wire:key="trans-{{ $transaction['id'] . '-' . time() }}" class="grid grid-cols-4 gap-4 px-4 py-2 bg-white rounded-md">
                        <div class="font-bold">
                            #{{ $transaction->order_number }}
                        </div>
                        <div>{{ $transaction->getTotalItems() }} Items</div>
                        <div class="font-bold">P{{ number_format($transaction->total, 2) }}</div>
                        <div class="text-center">
                            <button type="viewOrder(`{{ $transaction->id }}`)">
                                <x-heroicon-s-eye class="w-6 h-6 text-blue-600"/>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
    
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
