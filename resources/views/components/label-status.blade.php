
@if($status == 'success')
<span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-100 text-green-800">
    {{  $slot }} 
</span>
@elseif($status == 'danger')
<span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-100 text-red-800">
    {{  $slot }} 
</span>
@elseif($status == 'warning')
<span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-yellow-100 text-yellow-800">
    {{  $slot }} 
</span>
@elseif($status == 'soft_warning')
<span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-indigo-100 text-indigo-800">
    {{  $slot }} 
</span>
@else
<span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-gray-100 text-gray-800">
    {{  $slot }} 
</span>
@endif
<span sr-only="severity-{{ $status }}"></span>