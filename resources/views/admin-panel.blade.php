<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Panel') }}
        </h2>
    </x-slot>

    <div class="pt-6 max-w-7xl mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    ▼ {{ __("Manage Users") }}
                </div>
            </div>
        </div>

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 mt-1 ml-0 flex-nowrap">
        <div class="p-4 dark:text-gray-100 rounded-lg flex flex-col gap-4 flex-nowrap">
            @foreach ($users as $item)
            {{-- ->select('users.name', 'users.email', 'roles.name as roleName', 'users.id') --}}
                <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-4 px-4 flex gap-4 flex-nowrap">
                    
                    <div id="placeName " class="flex font-bold min-w-fit">
                        {{ $item->id }}.
                    </div>    
                    <div id="name" class="flex font-bold w-1/5 min-w-fit">
                        {{ $item->name }}
                    </div>    
                    <div id="email " class="flex w-2/5 font-bold min-w-fit hidden md:block">
                        {{ $item->email }}
                    </div> 
                    <div id="roleName" class="flex w-1/5 justify-items-end min-w-fit">
                        {{ $item->roleName }}
                    </div>
                    <form action="{{ route('admin-panel-deactivateUser',$item->id) }}" method="Post" class="center min-w-fit">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-800 hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" onclick="return confirm('Are you sure you want to deactivate this item?');">✖</button>
                    </form>
                </div>  
            @endforeach
            {{ $users->links() }}
        </div>
    </div>
    </div>

    <div class="pt-6 max-w-7xl mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    ▼ {{ __("Manage Posts") }}
                </div>
            </div>
        </div>

    <div class="mx-auto sm:px-6 lg:px-8 mt-1 ml-0">
        <div class="p-4 dark:text-gray-100 rounded-lg flex flex-col gap-4">
            @foreach ($posts as $item)
            {{-- // score | nazwa | opis | miejscowosc | adres... | user --}}
                <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-5 px-4 flex  gap-4">
                    
                    <div id="placeName " class="flex font-bold">
                        {{ $item->placeId }}.
                    </div>    
                    <div id="score" class=" w-1/5 border-r-4">
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
                    <div id="city" class="flex w-1/5">
                        {{ $item->city }}
                    </div>
                    <div id="user" class="w-1/5 justify-items-end hidden md:block">
                        {{ $item->name }}
                    </div>
                    <form action="{{ route('admin-panel-destroyPost',$item->placeId) }}" method="Post" class="center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex bg-red-800 hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" onclick="return confirm('Are you sure you want to deactivate this item?');">✖</button>
                    </form>
                </div>  
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</div>
</div>
</x-app-layout>
