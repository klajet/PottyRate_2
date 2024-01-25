<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Explore') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 mt-7">
        <div class="p-6 dark:text-gray-100 rounded-lg flex flex-col gap-4">
            @foreach ($posts as $item)
            <a class="" href="/explore/{{ $item->placeId }}" aria-label='{{__("View post button")}}'>
                <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-4 px-4 flex  gap-4
                hover:bg-gray-600 hover:text-gray-500 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 align-middle">
                    
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
                    <div id="user" class="w-1/5 justify-items-end hidden md:block">
                        {{ $item->name }}
                    </div>
                </div>  
            </a>    
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>