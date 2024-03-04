<div class ="my-12 w-full h-[90vh] md:h-[70vh] max-w-7xl mx-auto bg-white relative sm:rounded-lg">
    <div class="absolute py-12 bottom-0 left-0 right-0 bg-blue-300 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8 border-b border-gray-200 hover:shadow-2xl transition-all" style="height: {{ $percentage }}%;">
        {{$slot}}
    </div>
</div>
