<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    public int $perPage = 5;
    public String $search = '';

    public function render()
    {
        return view('livewire.data-table', [
            'users' => User::search($this->search)
                ->paginate($this->perPage)
        ]);
    }
}
