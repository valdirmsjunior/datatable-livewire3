<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.data-table', [
            'users' => User::paginate(5),
        ]);
    }
}
