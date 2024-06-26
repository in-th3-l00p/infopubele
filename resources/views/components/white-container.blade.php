<div {{ $attributes->merge([
        "class" => "py-12 max-w-7xl mx-auto"
]) }}>
    <div @class([
        "bg-white overflow-hidden shadow-xl h-full",
        "sm:rounded-lg p-6 lg:p-8 border-b border-gray-200",
        "hover:shadow-2xl transition-all"
    ])>
        {{ $slot }}
    </div>
</div>
