<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Keyboard Shortcut
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 overflow-hidden shadow-xl sm:rounded-lg">
                <div 
                    x-data="{
                        input: ''
                    }"
                    @keydown.window.prevent.f1="input = 'testing keyboard'"
                >
                    <div class="w-1/3">
                        <label for="price" class="block text-sm leading-5 font-medium text-gray-700">Price</label>

                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="price" class="form-input block w-full sm:text-sm sm:leading-5" x-model="input">
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
