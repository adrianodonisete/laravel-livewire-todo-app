<div>

    @include('livewire.includes.create-todo-box')

    @include('livewire.includes.search-box')

    <div id="todos-list">
        @foreach ($todos as $todo)
            @include('livewire.includes.todo-card', ['eventDelete' => false])
        @endforeach

        <div class="my-2">
            {{ $todos->links() }}
        </div>
    </div>

</div>


<script>
    const qs = idElement => document.querySelector(idElement) || null;

    const hideElement = idElement => {
        console.log(idElement);
        const el = qs(idElement);
        if (el) {
            el.style.display = `none`;
        }
    }
</script>
