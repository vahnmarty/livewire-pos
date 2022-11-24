<div class="xl:min-h-[36rem] px-8 overflow-auto overflow-hidden shadow-sm xl:max-h-[40rem] mt-4">
    <div class="py-6">
        <header class="flex items-start justify-between">
            <h1 class="text-2xl font-bold">Kitchen</h1>
            <p>{{ date('F d, Y h:i a') }}</p>
        </header>
        <div class="grid grid-cols-4 gap-8 py-4 mt-4 border-t-2 border-gray-300 border-dashed">
            @foreach($transactions as $transaction)
            <div wire:key="tran-{{ $transaction->id . '-' . time() }}">
                <div class="bg-white rounded-md shadow-lg">
                    <header class="flex justify-between px-4 py-1">
                        <div>
                            <h2>#{{ $transaction->order_number }}</h2>
                        </div>
                        <div>
                            <span class="px-1 py-1 text-xs bg-red-100 border-red-300 rounded-md">
                                {{ $transaction->order_type }}
                            </span>
                        </div>
                    </header>
                    <div class="border-t">
                        @foreach($transaction->orders as $index => $orderItem)
                        <div wire:key="order-{{ $orderItem['id'] . '-' . time() }}" 
                            class="flex justify-between gap-1 px-3 py-1 text-sm border-t">
                            <div class="flex gap-1 text-xs {{ $orderItem->isCompleted() ? 'line-through' : '' }}">
                                <div class="w-6">{{ $orderItem->quantity }} x </div>
                                <div>{{ $orderItem->product_name }}</div>
                            </div>
                            <div class="text-center">
                                @if($orderItem->isCompleted())
                                <button type="button" wire:click="undoServe(`{{ $orderItem['id'] }}`)">
                                    <x-heroicon-s-check-circle class="w-5 h-5 text-green-500"/>
                                </button>
                                @else
                                <button type="button" wire:click="serve(`{{ $orderItem['id'] }}`)">
                                    <x-heroicon-o-check-circle class="w-5 h-5 text-green-500"/>
                                </button>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="flex justify-between px-3 py-1 bg-blue-100">
                        <div class="flex gap-1">
                            <x-heroicon-o-clock class="w-4 h-4 text-gray-500"/>
                            <p class="text-xs">{{ $transaction->created_at->format('h:i a') }}</p>
                        </div>
                        <div class="text-center">
                            @if($transaction->hasCompleteOrders())
                            <button type="button" wire:click="completeTransaction(`{{ $transaction['id'] }}`)">
                                <x-heroicon-m-document-check class="w-5 h-5 text-green-500"/>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    
    </div>
</div>
