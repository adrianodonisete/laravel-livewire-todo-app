<div>
    <button wire:click.prevent="handleClick"
        class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-700">
        Click Me
    </button>

    <button wire:click.prevent="$set('message', 'ok')"
        class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-700">
        Show Ok
    </button>

    <button wire:click.prevent="$set('message', 'error')"
        class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-700">
        Show Error
    </button>

    <div>
        {{ $message }}
    </div>
</div>
