@php
    $item = $post->first();
@endphp

<script src="/js/map2.js"></script>

<script>    
    var pins = {!! json_encode(array(array( 'latitude' => $item->latitude, 'longitude' => $item->longitude )), JSON_HEX_TAG) !!};
</script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Explore') }}
        </h2>
    </x-slot>


    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 mt-7">
        <div class="p-6 dark:text-gray-100 rounded-lg flex flex-col gap-4">

                <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-4 px-4 flex  gap-4">
                    <div id="score" class=" w-1/5 border-r-4">
                        @for ($i = 0; $i < $item->score; $i++)
                            ⭐
                        @endfor
                    </div>
                    <div id="placeName " class="flex w-1/5 font-bold">
                        {{ $item->placeName }}
                    </div> 
                    <div id="description" class="flex grow w-2/5">
                        {{ $item->description }}
                    </div>
                    <div id="city" class="flex w-1/5">
                        {{ $item->city }}
                    </div>
                    <div id="user" class="w-1/5 justify-items-end">
                        {{ $item->name }}
                    </div>
                </div>
                <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-4 px-4 flex  gap-4">
                    <div id="country" class=" w-1/5">
                        {{ $item->country}}
                    </div>
                    <div id="voivodeship" class="flex w-1/5 font-bold">
                        {{ $item->voivodeship }}
                    </div> 
                    <div id="Street" class="flex grow w-2/5">
                        {{ $item->street }}
                    </div>
                    <div id="Number" class="flex w-1/5">
                        {{ $item->number }}
                    </div>
                </div>
            </div> 
            <div id="myMap" style="position:relative;width:75%;min-width:290px;height:600px;background-color:gray;margin:auto;padding:20px"></div>
        </div>
    </div>
</x-app-layout>

<script>(async () => {
    let script = document.createElement("script");
    script.setAttribute("src", `https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AiiFw2qccbhYzvZ-tAPzPFi01K0uQO9YPhguFPF43zplQRv4F8CNg0HVB8eF3koQ`);
    document.body.appendChild(script);
})();</script>
