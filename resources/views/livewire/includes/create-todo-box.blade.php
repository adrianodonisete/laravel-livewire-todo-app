<div>
    <div class="container content py-6 mx-auto">
        <div class="mx-auto">
            <div id="create-form" class="hover:shadow p-6 bg-white border-blue-500 border-t-2">
                <div class="flex ">
                    <h2 class="font-semibold text-lg text-gray-800 mb-5">Create New Todo</h2>
                </div>

                <div>
                    <form>
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                                Todo
                            </label>

                            <input wire:model="name" type="text" id="name" placeholder="Type a new Todo..."
                                class="bg-gray-100 text-gray-900 text-sm rounded block w-full p-2.5">

                            @error('name')
                                <span x-data="{ show: true }" x-init="setTimeout(() => { show = false }, 12000)" x-show="show"
                                    class="text-red-500 text-xs mt-3 block">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>

                        <button type="submit" wire:loading.remove wire:target="create" wire:click.prevent="create"
                            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-700">
                            Create +
                        </button>

                        <span wire:loading wire:target="create" class="inline-block px-0 my-0 font-italic text-blue-500"
                            style="display:none;">
                            Creating...
                        </span>

                        @if (session('success'))
                            <span x-data="{ show: true }" x-init="setTimeout(() => { show = false }, 12000)" x-show="show"
                                class="text-green-500 text-xs">
                                {{ session('success') }}
                            </span>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
