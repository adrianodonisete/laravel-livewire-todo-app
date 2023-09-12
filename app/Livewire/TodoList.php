<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Todo;

class TodoList extends Component
{
    use WithPagination;

    #[Rule('required|min:3|max:50')]
    public string $name;

    public string $search = '';
    public bool $showEditButton = true;

    public function create(array $args = []): void
    {
        $validated =  $this->validateOnly('name');

        Todo::create($validated);

        $this->reset('name');

        session()->flash('success', 'Created.');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
    }

    public function render()
    {
        $all = Todo::latest()
            ->where('name', 'like', "%{$this->search}%")
            ->paginate(4);

        return view(
            'livewire.todo-list',
            [
                'todos' => $all
            ]
        );
    }
}
