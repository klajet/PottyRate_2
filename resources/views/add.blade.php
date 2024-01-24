<x-app-layout>
    <script src="js/map1.js"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="post" action="{{ route('post') }}" class="mt-6 space-y-6 my-4" enctype="multipart/form-data">
                    @csrf

                    <div id="address" class="gap-4 mt-3 mb-3">
                        <div id="myMap" style="position:relative;width:75%;min-width:300px;height:400px;background-color:gray;margin:auto;padding:20px"></div>
                        
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight my-3 text-center">
                            {{ __("Main Informations") }}
                        </h2>

                        <div id="placeInfo" class="flex place-items-center my-2 grid-flow-col mx-auto auto-cols-auto justify-center">
                            <x-text-input id="placeName" name="placeName" type="text" placeholder=' {{ __("Place Name") }} '  class="mt-1 mx-3 md:w-1/5 w-2/5"  />
                            <x-text-input id="description" name="description" type="text" placeholder=' {{ __("Description") }} '  class="mt-1 mx-3 md:w-1/5 w-2/5"  />

                            <input id="latitude" name="latitude" value="" required hidden>
                            <input id="longitude" name="longitude" value="" required hidden>
                        </div>

                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight my-3 text-center">
                            {{ __("Address Informations") }}
                        </h2>

                        <div id="addressText" class="flex flex-row grid-flow-col gap-4 mx-6 my-2">
                            <x-text-input id="Country" name="Country" type="text" placeholder=' {{ __("Country") }} '  class="mt-1 w-1/5"  />
                            <x-text-input id="Voivodeship" name="Voivodeship" type="text" placeholder=' {{ __("Voivodeship") }} '  class="mt-1 w-1/5 mx-auto" />
                            <x-text-input id="City" name="City" type="text" placeholder=' {{ __("City") }} '  class="mt-1 w-1/5 mx-auto" />
                            <x-text-input id="Street" name="Street" type="text" placeholder=' {{ __("Street") }} '  class="mt-1 w-1/5 mx-auto" />
                            <x-text-input id="Number" name="Number" type="text" placeholder=' {{ __("Number") }} '  class="mt-1 w-1/5 hidden md:block mx-auto" />
                        </div>
                    </div>
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight my-2 text-center">
                            {{ __("Rating") }}
                        </h2>
                        <div id="placeRating" class="flex flex-row grid-flow-col gap-4 mx-auto justify-center my-0 flex-wrap">
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 w-full max-w-24 self-center">
                                <input id="bordered-radio-1" type="radio" value="1" name="score" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐</label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 w-full max-w-24 self-center">
                                <input checked id="bordered-radio-2" type="radio" value="2" name="score" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐⭐</label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 w-full max-w-32 self-center">
                                <input checked id="bordered-radio-3" type="radio" value="3" name="score" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-3" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐⭐⭐</label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 w-full max-w-32 self-center">
                                <input checked id="bordered-radio-4" type="radio" value="4" name="score" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-4" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐⭐⭐⭐</label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700 w-full max-w-40 self-center">
                                <input checked id="bordered-radio-5" type="radio" value="5" name="score" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-5" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐⭐⭐⭐⭐</label>
                            </div>
                        </div>
                        <div class="flex place-items-center my-4 grid-flow-col mx-auto auto-cols-auto justify-center">
                            <x-primary-button>
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>

<script>(async () => {
    let script = document.createElement("script");
    script.setAttribute("src", `https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AiiFw2qccbhYzvZ-tAPzPFi01K0uQO9YPhguFPF43zplQRv4F8CNg0HVB8eF3koQ`);
    document.body.appendChild(script);
})();</script>