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

    #[Rule('required|min:3|max:50')]
    public string $editTodoName;

    public function create(): void
    {
        $validated =  $this->validateOnly('name');

        Todo::create($validated);
        session()->flash('success', 'Created.');

        // $this->reset('name');
        // $this->name = 'teste novo';

        $this->reset();
        // $this->resetPage();
    }

    public function delete($id)
    {
        try {
            Todo::findOrFail($id)
                ->delete();
        } catch (\Exception $e) {
            session()->flash('error', 'Fail to delete!');
            return;
        }
    }

    public function toggle(Todo $todo)
    {
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function edit(Todo $todo)
    {
        $this->editTodoId = $todo->id;
        $this->editTodoName = $todo->name;
    }

    public function cancelEdit()
    {
        $this->reset('editTodoId', 'editTodoName');
    }

    public function update()
    {
        $this->validateOnly('editTodoName');
        Todo::find($this->editTodoId)
            ->update([
                'name' => $this->editTodoName
            ]);

        $this->cancelEdit();
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
