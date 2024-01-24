<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welcome to PottyRate, your go-to destination for all things restroom-related! At PottyRate, we understand the importance of clean, comfortable, and accessible public restrooms. Our mission is to empower individuals to make informed decisions about where to answer nature's call by providing a comprehensive platform for restroom reviews and ratings.") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("PottyRate was founded in 2024 by a group of passionate individuals who shared a common goal – to revolutionize the way people experience public restrooms. We believe that everyone deserves access to clean and well-maintained facilities, and our platform aims to make that vision a reality.") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("we pride ourselves on being the premier destination for honest and reliable restroom reviews. Our user-friendly platform allows visitors to share their experiences and rate public restrooms based on various criteria, including cleanliness, accessibility, amenities, and overall comfort. We believe in the power of community-driven feedback to inspire positive change in public restroom standards.") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>