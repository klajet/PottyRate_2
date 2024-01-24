<x-app-layout>
    <script src="js/map1.js"></script>
    <link rel="stylesheet" href="css/add.css">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Add") }}
                </div>
            </div>
        </div>
    </div>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <form method="post" action="{{ route('post') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf

                    <div id="address" class="gap-4 mt-3 mb-3">
                        <div id="myMap" class="object-center"></div>
                        
                        <div id="placeName">
                            <x-text-input id="placeName" name="placeName" type="text" placeholder=' {{ __("Place Name") }} '  class="mt-1"  />
                            <x-text-input id="description" name="description" type="text" placeholder=' {{ __("Description") }} '  class="mt-1"  />

                            <input id="latitude" name="latitude" value="" required>
                            <input id="longitude" name="longitude" value="" required>
                        </div>

                        <div id="addressText" class="flex flex-row">
                            <x-text-input id="Country" name="Country" type="text" placeholder=' {{ __("Country") }} '  class="mt-1"  />
                            <x-text-input id="Voivodeship" name="Voivodeship" type="text" placeholder=' {{ __("Voivodeship") }} '  class="mt-1" />
                            <x-text-input id="City" name="City" type="text" placeholder=' {{ __("City") }} '  class="mt-1" />
                            <x-text-input id="Street" name="Street" type="text" placeholder=' {{ __("Street") }} '  class="mt-1" />
                            <x-text-input id="Number" name="Number" type="text" placeholder=' {{ __("Number") }} '  class="mt-1 shrink " />

                        </div>
                    </div>
                        
                        <div id="placeRating">
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                <input id="bordered-radio-1" type="radio" value="1" name="score" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐</label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                <input checked id="bordered-radio-2" type="radio" value="2" name="score" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐⭐</label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                <input checked id="bordered-radio-3" type="radio" value="3" name="score" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-3" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐⭐⭐</label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                <input checked id="bordered-radio-4" type="radio" value="4" name="score" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-4" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐⭐⭐⭐</label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                <input checked id="bordered-radio-5" type="radio" value="5" name="score" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-5" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">⭐⭐⭐⭐⭐</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        {{-- <div class="form-group">
                            <input type="text" name="title" id="title" class="form-control" placeholder='{{__("Title")}}' required>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="image">{{__("Image")}}</label>
                            <input type="file" name="image" id="image" class="form-control" required>
                        </div> --}}
                        {{-- <input type="file" class="form-control" name="image" />    --}}
                    </div>

                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>