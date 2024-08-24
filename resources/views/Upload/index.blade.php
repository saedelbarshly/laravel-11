<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('File Uplaod') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-input-label for="file" :value="__('File')"
                            class="block text-gray-700 text-sm font-bold mb-2" />
                        <x-text-input id="file"
                            class="form-control block mt-1 w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-green-200 focus:border-green-500"
                            type="file" name="file" id="formFile"/>

                        <x-input-error :messages="$errors->get('file')" class="mt-2 text-red-600" />
                    </div>

                    <div class="flex items-center justify-center mt-4">
                        <x-primary-button
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
