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

    public int $editTodoId;
    public string $edtiTodoName;

    public function create(): void
    {
        $validated =  $this->validateOnly('name');

        Todo::create($validated);
        session()->flash('success', 'Created.');

        $this->reset('name');
        $this->name = '';
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
    }

    public function toggle(Todo $todo)
    {
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function edit(Todo $todo)
    {
        $this->editTodoId = $todo->id;
        $this->edtiTodoName = $todo->name;
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
