<x-guest-layout>

    <form>
        <div>
            <x-input-label for="Code" :value="__('Code')" />
            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" placeholder="123456" />
            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ms-3">
                {{ __('Verify') }}
            </x-primary-button>
        </div>
    </form>
    
</x-guest-layout>
