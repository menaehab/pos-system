<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-3xl/9 font-bold tracking-tight text-gray-900">
            {{ __('keywords.sign_in') }}</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm bg-white p-6 rounded-lg shadow-sm">
        <form class="space-y-6" wire:submit.prevent="login">
            <div>
                <label for="email" class="block text-sm/6 font-medium text-gray-900">{{ __('keywords.email') }}</label>
                <div class="mt-2">
                    <input type="email" wire:model.lazy="email" name="email" id="email" autocomplete="email"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500 sm:text-sm/6">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password"
                        class="block text-sm/6 font-medium text-gray-900">{{ __('keywords.password') }}</label>
                </div>
                <div class="mt-2">
                    <input type="password" wire:model.lazy="password" name="password" id="password"
                        autocomplete="current-password"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500 sm:text-sm/6">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-blue-500 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-blue-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-500"><span
                        wire:loading.remove>{{ __('keywords.sign_in') }}</span><span wire:loading
                        class="animate-spin h-5 w-5 border-b-2 border-white rounded-full mr-2"></span></button>
            </div>
        </form>
    </div>
</div>
