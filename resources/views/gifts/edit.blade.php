<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('gifts.update', $gift) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <br>
                        <h2 class="font-semibold text-xl text-gray-800">Edit the gift</h2>
                        <p>Please fill out all the form fields and click 'Submit'</p>
                        <br>

                        <div class="p-2">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $gift)"
                                          required autofocus autocomplete="name" placeholder="Enter the gift's name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="p-2">
                            <x-input-label for="slug" :value="__('Slug')" />
                            <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" :value="old('slug', $gift)"
                                          required autofocus autocomplete="slug" placeholder="Enter the gift's slug" />
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                        </div>
                        <div class="p-2">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-gift.text-area name="description" rows="5" class="mt-1 block w-full border-gray-300 focus:border-indigo-500
                                            focus:ring-indigo-500 rounded-md shadow-sm"
                                                 placeholder="Enter the gift's description..."
                                                 value="{{ old('description', $gift) }}" ></x-gift.text-area>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>
                        <div class="p-2">
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" :value="old('price', $gift)"
                                          required autofocus autocomplete="price" placeholder="Enter the gift's price" />
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div><div class="p-2">
                            <x-input-label for="brand" :value="__('Brand')" />
                            <x-text-input id="brand" name="brand" type="text" class="mt-1 block w-full" :value="old('brand', $gift)"
                                          required autofocus autocomplete="brand" placeholder="Enter the gift's brand" />
                            <x-input-error class="mt-2" :messages="$errors->get('brand')" />
                        </div>
                        <div class="sm:flex sm:items-center">
                            <button type="submit" class="btn bg-green-600 rounded m-1 py-1 px-4">Save</button>
                            <a type="button" href="{{ route('gifts.show', $gift) }}" class="btn bg-yellow-200 rounded m-1 py-1 px-4">Cancel</a>
                            <button type="reset" class="btn bg-red-500 rounded m-1 py-1 px-4">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
