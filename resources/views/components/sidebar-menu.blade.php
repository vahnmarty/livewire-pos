<div class="block">
    <div>
        <div x-data="{ selected: 0 }">
            <ul class="shadow-box">
                <li class="relative border-b border-gray-800">
                    <button type="button" class="w-full hover:bg-gray-700"
                        @click="selected !== 1 ? selected = 1 : selected = null">
                        <div class="flex items-center justify-between w-full">
                            {{ $parent }}
                            <span>
                                <x-heroicon-s-chevron-down class="w-6 h-6 text-gray-300" />
                            </span>
                        </div>
                    </button>
                    <div class="relative overflow-hidden transition-all duration-700 max-h-0"
                        x-bind:class="selected == 1 ? 'bg-gray-800' : ''" x-ref="container1"
                        x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                        <div class="text-xs pl-9">
                            {{ $children }}
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
