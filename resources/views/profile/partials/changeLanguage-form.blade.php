<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Language') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Change your application language") }}
        </p>
    </header>

    <div class="space-y-6 container">
        <a href="{{ route('locale.setting', 'pl') }}">
            <x-secondary-button>
                {{ __('Polish') }}
            </x-secondary-button>
        </a>
        <a href="{{ route('locale.setting', 'en') }}">
            <x-secondary-button>
                {{ __('English') }}
            </x-secondary-button>
        </a>
    </div>
</section>