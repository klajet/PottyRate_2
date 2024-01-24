<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Explore') }}
        </h2>
    </x-slot>


    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 mt-7">
        <div class="p-6 dark:text-gray-100 divide-y divide-blue-200 rounded-lg flex flex-col gap-4">
            @foreach ($posts as $item)
            {{-- // score | nazwa | opis | miejscowosc | adres... | user --}}
            <a class="" href="/explore/{{ $item->placeId }}">
                <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-6 space-y-8 px-4 flex flex-wrap gap-4
                hover:bg-gray-600 hover:text-gray-500 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                    <div id="score" class="flex justify-center self-auto w-1/5">
                        @for ($i = 0; $i < $item->score; $i++)
                            ⭐
                        @endfor
                    </div>
                    <div id="placeName " class="flex w-1/5">
                        {{ $item->placeName }}
                    </div> 
                    <div id="description" class="flex grow w-1/5">
                        {{ $item->description }}
                    </div>
                    <div id="city" class="flex w-1/5">
                        {{ $item->city }}
                    </div>
                    <div id="user" class="w-1/5 ">
                        {{ $item->name }}
                    </div>
                </div>  
            </a>    
            @endforeach
            
            
            
            
            
            
            {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Explore") }}
                    </div>
                </div>
            </div> --}}
            
            





                {{-- <tr>
                @foreach ($posts as $item)
                <td class="p-4 border-b border-blue-gray-50">    
                    <div class="flex items-center gap-3">
                        <div class="flex flex-col">
                          <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">React Project</p>
                          <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal opacity-70">Start date: 10 Dec 2023</p>
                        </div>
                    </div>
                </td>
                @endforeach
                </tr> --}}
        </div>
    </div>
</x-app-layout>