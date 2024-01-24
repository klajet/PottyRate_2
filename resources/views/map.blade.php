<x-app-layout>
    <script src="js/map2.js"></script>

    <script>    
        var pins = {!! json_encode($pins->toArray(), JSON_HEX_TAG) !!};
    </script>
    

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
            {{ __('Map') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-center text-3xl font-bold">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Map") }}
                </div>
            </div>
        </div>
    </div>

    <div id="myMap" style="position:relative;width:75%;min-width:290px;height:600px;background-color:gray;margin:auto;padding:20px"></div>

</x-app-layout>

<script>(async () => {
    let script = document.createElement("script");
    script.setAttribute("src", `https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AiiFw2qccbhYzvZ-tAPzPFi01K0uQO9YPhguFPF43zplQRv4F8CNg0HVB8eF3koQ`);
    document.body.appendChild(script);
})();</script>