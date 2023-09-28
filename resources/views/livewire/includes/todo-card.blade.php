<div wire:key="{{ $todo->id }}"
    class="todo mb-5 card px-5 py-6 bg-white col-span-1 border-t-2 border-blue-500 hover:shadow">
    <div class="flex justify-between space-x-2">

        <div class="flex items-center">

            <input wire:click="toggle({{ $todo->id }})" type="checkbox" class="mr-2"
                {{ $todo->completed ? 'checked' : '' }}>

            @if ($editTodoId === $todo->id)
                <div>
                    <input wire:model="editTodoName" type="text" placeholder="Todo.."
                        class="bg-gray-100 text-gray-900 text-sm rounded block w-full p-2.5">

                    @error('editTodoName')
                        <span class="mt-1 text-red-500 text-xs block">{{ $message }}</span>
                    @enderror
                </div>
            @else
                <h3 class="text-lg text-semibold text-gray-800">
                    {{ $todo->name }}
                </h3>
            @endif
        </div>

        <div class="flex items-center space-x-2">

            <button wire:key="bt_edit_{{ $todo->id }}" wire:click="edit({{ $todo->id }})" wire:loading.remove
                wire:target="edit({{ $todo->id }})" id="edit_button_{{ $todo->id }}"
                class="text-sm text-teal-500 font-semibold rounded hover:text-teal-800"
                @click="hideElement(`#del_button_{{ $todo->id }}`);">
                @include('livewire.components.images.svg-edit')
            </button>
            <span wire:key="load_edit_{{ $todo->id }}" wire:loading wire:target="edit({{ $todo->id }})"
                class="inline-block px-0 my-0 font-italic text-teal-500" style="display:none;">
                Loading...
            </span>

            <button wire:key="bt_del_{{ $todo->id }}" wire:click="delete({{ $todo->id }})" wire:loading.remove
                wire:target="delete({{ $todo->id }})" id="del_button_{{ $todo->id }}"
                class="text-sm text-red-500 font-semibold rounded hover:text-teal-800 mr-1"
                @click="hideElement(`#edit_button_{{ $todo->id }}`);">
                @include('livewire.components.images.svg-remove')
            </button>
            <span wire:key="load_del_{{ $todo->id }}" wire:loading wire:target="delete({{ $todo->id }})"
                class="inline-block px-0 my-0 font-italic text-red-700" style="display:none;">
                Deleting...
            </span>
        </div>

    </div>

    <span class="text-xs text-gray-500">
        {{ $todo->created_at }}
    </span>

    <div class="mt-3 text-xs text-gray-700">
        @if ($editTodoId === $todo->id)
            <button wire:click="update"
                class="mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">
                Update
            </button>

            <button wire:click="cancelEdit"
                class="mt-3 px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600">
                Cancel
            </button>
        @endif
    </div>

</div>
