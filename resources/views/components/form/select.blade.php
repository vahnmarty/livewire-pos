<select
    {{
    $attributes
    }}
    class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm"
>
    <option>-- Select --</option>
    {{
        $slot
    }}
</select>
