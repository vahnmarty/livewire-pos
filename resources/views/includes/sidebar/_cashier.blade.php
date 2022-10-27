
  <div class="block">
    <div class="">
      <div class="" x-data="{ selected : 0 }">
        <ul class="shadow-box">
          <li class="relative border-b border-gray-800">
            <button type="button" class="w-full hover:bg-gray-700" @click="selected !== 1 ? selected = 1 : selected = null">
              <div class="flex items-center justify-between w-full">
                <x-sidebar-menu-item link="#">
                  <x-heroicon-s-hand-raised class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"/>
                  Payments
                </x-sidebar-menu-item>
                <span>
                  <x-heroicon-s-chevron-down class="w-6 h-6 text-gray-300"/>
                </span>
              </div>
            </button>
            <div class="relative overflow-hidden transition-all duration-700 max-h-0"
              x-bind:class="selected == 1 ? 'bg-gray-800' : '' "
               x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
              <div class="text-xs pl-9">
                <x-sidebar-menu-item link="{{ url('admin/mortuary/disbursements') }}">
                  Disbursements
                </x-sidebar-menu-item>
                <x-sidebar-menu-item link="{{ url('admin/mortuary/collections') }}">
                  Collections
                </x-sidebar-menu-item>
                <x-sidebar-menu-item link="{{ url('admin/mortuary/reports') }}">
                  Reports
                </x-sidebar-menu-item>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="block">
    <div class="">
      <div class="" x-data="{ selected : 0 }">
        <ul class="shadow-box">
          <li class="relative border-b border-gray-800">
            <button type="button" class="w-full hover:bg-gray-700" @click="selected !== 1 ? selected = 1 : selected = null">
              <div class="flex items-center justify-between w-full">
                <x-sidebar-menu-item link="#">
                  <x-heroicon-s-users class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"/>
                  Organization
                </x-sidebar-menu-item>
                <span>
                  <x-heroicon-s-chevron-down class="w-6 h-6 text-gray-300"/>
                </span>
              </div>
            </button>
            <div class="relative overflow-hidden transition-all duration-700 max-h-0"
              x-bind:class="selected == 1 ? 'bg-gray-800' : '' "
               x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
              <div class="text-xs pl-9">
                <x-sidebar-menu-item link="{{ url('admin/members/registrants') }}">
                  Registrants
                </x-sidebar-menu-item>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>