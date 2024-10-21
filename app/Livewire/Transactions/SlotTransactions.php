<?php

namespace App\Livewire\Transactions;

use App\Models\Slot;
use Livewire\Component;
use Livewire\WithPagination;

class SlotTransactions extends Component
{
    use WithPagination;

    public Slot $slot;

    public function render()
    {
        $transactions = $this
            ->slot
            ->transactions()
            ->latest()
            ->paginate(5);
        return view('livewire.transactions.transactions', [
            'transactions' => $transactions
        ]);
    }
}
