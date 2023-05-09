<x-authentication-layout>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif   
    <!-- Form -->
    <form method="POST" action="{{ route('login') }}" class="dark:bg-gray-800 p-6 rounded-lg">
        @csrf
        <div class="space-y-4">
            <div>
                <x-jet-label for="username" value="{{ __('messages.username') }}" />
                <x-jet-input id="username" type="text" name="username" :value="old('username')" required autofocus />                
            </div>
            <div>
                <x-jet-label for="password" value="{{ __('messages.password') }}" />
                <x-jet-input id="password" type="password" name="password" required autocomplete="current-password" />                
            </div>
        </div>
        <div class="flex items-center justify-end mt-6">
        
            <x-jet-button class="">
                {{ __('messages.signin') }}
            </x-jet-button>            
        </div>
    </form>
    <x-jet-validation-errors class="mt-4" />   
</x-authentication-layout>
