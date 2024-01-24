{{-- @include('layouts.navigation', ['topRole' => $topRole]) --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 pb-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-xl font-bold">
                    {{ __("Welcome") }} {{ Auth::user()->name }} 🖐
                </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-center text-3xl font-bold">
                        {{ __("News") }}
                    </div>
                    <div>
                        @yield('news')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-center text-2xl font-bold">
                        {{ __("Your Ratings") }}
                    </div>
                    <div class="mx-auto sm:px-6 lg:px-8 mt-1 ml-0">
                        <div class="p-4 dark:text-gray-100 rounded-lg flex flex-col gap-4">
                            @foreach ($posts as $item)
                            {{-- // score | nazwa | opis | miejscowosc | adres... | user --}}
                                <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-5 px-4 flex  gap-4">
                                    
                                    <div id="score" class=" w-1/5 border-r-4 hidden md:block">
                                        @for ($i = 0; $i < $item->score; $i++)
                                            ⭐
                                        @endfor
                                    </div>
                                    <div id="placeName " class="flex w-1/5 font-bold">
                                        {{ $item->placeName }}
                                    </div> 
                                    <div id="description" class="flex grow w-1/5">
                                        {{ $item->description }}
                                    </div>
                                    <div id="Country" class="w-1/5 justify-items-end hidden md:block">
                                        {{ $item->country }}
                                    </div>
                                    <div id="city" class="flex w-1/5">
                                        {{ $item->city }}
                                    </div>                                    
                                    <form action="{{ route('dashboard-destroyPost',$item->placeId) }}" method="Post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex bg-red-800 hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" onclick="return confirm('Are you sure you want to deactivate this item?');">✖</button>
                                    </form>
                                    <a href="/explore/{{ $item->placeId }}"><button class="flex bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"">👁‍🗨</button></a>
                                </div>  
                            @endforeach
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
