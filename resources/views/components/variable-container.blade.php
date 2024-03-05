<div class="my-12 w-full max-w-7xl mx-auto bg-white relative sm:rounded-lg shadow-xl hover:shadow-2xl">
    <div class="top-0 left-0 p-8 w-full h-full absolute z-10">
        {{$slot}}
    </div>
    <div class="absolute  bottom-0 left-0 right-0 bg-blue-300 overflow-hidden shadow-xl sm:rounded-lg  border-b border-gray-200 hover:shadow-2xl transition-all" style="height: {{ $percentage }}%;">
    </div>
</div>
