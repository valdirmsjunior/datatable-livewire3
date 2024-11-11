<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    public int $perPage = 7;
    public String $search = '';
    public String $sortByColumn = 'created_at';
    public String $sortDirection = 'DESC';

    public function setSortFunctionality($columnName)
    {
        if ($this->sortByColumn === $columnName) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortByColumn = $columnName;
        $this->sortDirection = 'ASC';
    }

    public function render()
    {
        return view('livewire.data-table', [
            'users' => User::search($this->search)
                ->orderBy($this->sortByColumn, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
}
