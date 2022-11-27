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
            <div class="col-span-3 min-h-[33rem] max-h-[33rem] overflow-auto">
                <div class="grid grid-cols-1 gap-2">
                    @foreach($transactions as $transactionItem)
                    <div wire:key="transgrid-{{ $transactionItem['id'] . '-' . time() }}" class="shadow-lg">
                        <div class="flex bg-white">
                            <div class="w-10 px-2 py-2 mr-3 font-bold {{ $transactionItem->isPaid() ? 'bg-green-200' : 'bg-red-100' }}">
                                {{ $transactionItem->order_number }}
                            </div>
                            <div class="flex-1 py-2 space-y-1 text-sm">
                                <p class="font-bold">{{  Str::title($transactionItem->order_type) }}</strong></p>
                                <div class="text-xs">Quantity: <strong>{{ $transactionItem->getTotalItems() }} Items</strong></div>
                                <div class="text-xs">Payment: <strong> {{ $transactionItem->paid_at ? 'PAID' : 'PENDING' }}</strong></div>
                            </div>
                            <div class="self-start w-24 px-2 py-2 text-right">
                                <h3 class="text-lg font-bold text-red-700">₱{{ number_format($transactionItem->total, 2) }}</h3>
                            </div>
                        </div>
                        <div class="px-2 py-2 border-t bg-gray-50">
                            <div class="flex items-center justify-between">
                                <p class="flex text-xs">
                                    <x-heroicon-o-clock class="w-4 h-4 mr-2 text-gray-400"/>
                                    {{ $transactionItem->created_at->format('h:i a')}}
                                </p>
                                <div class="flex gap-1">
                                    <button type="button" wire:click="select(`{{ $transactionItem->id }}`)" class="btn-primary btn-sm">View</button>
                                </div>
                            </div>
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
                            <div wire:key="order-{{ $orderItem['id'] . '-' . time() }}" 
                                class="flex justify-between p-2 bg-gray-100 shadow-md cursor-pointer">
                                <div class="flex">
                                    <div>
                                        <p class="text-xs">{{ Str::limit($orderItem['product_name']) }}</p>
                                        <p class="text-xs font-bold text-red-700">
                                            {{ App\Helpers::money($orderItem['product_price']) }}</p>
                                    </div>
                                </div>
                                <div x-data="{ quantity: $wire.entangle('orders.{{ $key }}.quantity').defer }" class="flex items-center gap-1 mr-4">
                                    
                                    <span x-text="quantity" class="text-xl font-bold"></span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>
    
                    <section class="space-y-4">
    
    
                        <!-- Summary -->
                        <div class="p-2 bg-white rounded-md">
                            <h3 class="mb-1 text-sm font-bold">Summary</h3>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <x-heroicon-s-users class="w-4 h-4 text-gray-400" />
                                </div>
                                <input type="text"
                                    wire:model.defer="customer"
                                    class="block w-full py-2 pl-10 text-sm bg-gray-100 border-gray-300 rounded-md focus:border-gray-500 focus:ring-gray-500 sm:text-xs"
                                    placeholder="Customer Name">
                            </div>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 flex items-start pl-3 pointer-events-none top-2">
                                    <x-heroicon-s-clipboard-document-list class="w-4 h-4 text-gray-400" />
                                </div>
                                <textarea type="text" row="3"
                                    wire:model.defer="notes"
                                    class="block w-full py-2 pl-10 text-sm bg-gray-100 border-gray-300 rounded-md focus:border-gray-500 focus:ring-gray-500 sm:text-xs"
                                    placeholder="Notes"></textarea>
                            </div>
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
                                <input type="text" value="{{ number_format($discount, 2) }}"
                                    class="block w-full py-2 pl-10 text-lg text-right bg-gray-100 border-gray-300 rounded-md focus:border-gray-500 focus:ring-gray-500 sm:text-sm"
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
                        
                        <div class="space-y-2" x-data="{}">

                            @if($transaction_id)
                            <button type="button"
                                class="flex items-center w-full px-6 py-2 font-medium text-center text-white bg-yellow-600 border border-transparent rounded-md shadow-sm opacity-20 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                                <x-heroicon-s-cog-6-tooth class="w-6 h-6 mr-4 text-white"/>
                                Modify
                            </button>
                            @if($transaction->paid_at)
                            <button type="button"
                                x-on:click="if(confirm('Complete?')){ $wire.completeOrder(`{{ $transaction_id }}`) }"
                                class="flex items-center w-full px-6 py-2 font-medium text-center text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                <x-heroicon-s-check-circle class="w-6 h-6 mr-4 text-white"/>
                                Complete Order
                            </button>
                            @else
                            <button type="button"
                                x-on:click="$dispatch('openmodal-pay')"
                                class="flex items-center w-full px-6 py-2 font-medium text-center text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                <x-heroicon-s-banknotes class="w-6 h-6 mr-4 text-white"/>
                                Pay Now {{ $transaction->paid_at }}
                            </button>
                            @endif
                            <button type="button"
                                x-on:click="$dispatch('openmodal-cancel')"
                                class="flex items-center w-full px-6 py-2 font-medium text-center text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                <x-heroicon-s-no-symbol class="w-6 h-6 mr-4 text-white"/>
                                Cancel
                            </button>
                            @endif

                            <x-modal ref="pay" size="sm">
                                <x-slot name="title">Pay Order</x-slot>
                                <div class="py-6">
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span class="text-xs text-gray-500">Total</span>
                                        </div>
                                        <input type="text" value="{{ number_format($total,2) }}"
                                            class="block w-full py-2 pl-10 text-lg text-right bg-transparent bg-gray-100 border-gray-300 rounded-md focus:border-gray-500 focus:ring-gray-500 sm:text-sm"
                                            disabled
                                            placeholder="0.00">
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

                                    <div class="flex justify-center mt-8">
                                        <button type="button"
                                            wire:click="pay"
                                            class="flex items-center px-6 py-2 font-medium text-center text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                            <x-heroicon-s-banknotes class="w-6 h-6 mr-4 text-white"/>
                                            Confirm Payment
                                        </button>
                                    </div>
                                </div>
                            </x-modal>

                            <x-modal ref="cancel" size="md">
                                <x-slot name="title">Cancel Order</x-slot>
                                <div class="py-6">
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <label for="">Cancellation Reason</label>
                                        <textarea rows="5" class="w-full rounded-md" placeholder="Write your explanation (Optional)"></textarea>
                                    </div>
                                    <div class="flex justify-center mt-8">
                                        <button type="button"
                                            wire:click="pay"
                                            class="flex items-center px-6 py-2 font-medium text-center text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                            Confirm Cancel
                                        </button>
                                    </div>
                                </div>
                            </x-modal>
                        </div>
                        
                    </section>
    
                </div>
    
    
    
    
    
            </div>
        </div>
    </div>
</div>
