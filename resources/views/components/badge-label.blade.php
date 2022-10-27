<div {{ $attributes->merge(['class' => 'px-3 py-2 rounded-md']) }}>
				<span>{{ $label }}</span>
				{{ $slot }}
</div>
