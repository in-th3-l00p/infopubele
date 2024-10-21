<?php

namespace App\Livewire\Transactions;

use App\Models\Card;
use App\Models\Device;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserTransactions extends Component
{
    use WithPagination;

    public function render(): View
    {
        $transactions = Transaction::query()
            ->whereHas("card", function ($query) {
                $query->where("user_id", Auth::id());
            })
            ->paginate(5);
        return view('livewire.transactions.user-transactions', [
            "transactions" => $transactions
        ]);
    }
}
