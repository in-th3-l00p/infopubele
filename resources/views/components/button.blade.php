<button{{ $attributes->merge(['type' => 'submit', 'class' => 'btn','id'=>'antiScroll']) }}>
    {{ $slot }}
</button>
