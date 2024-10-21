<?php

namespace App\Livewire\Transactions;

use App\Models\Card;
use App\Models\Device;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserTransactions extends Component
{
    public $transactions;

    public function mount(Device $device)
    {
        $card = Card::where('user_id',Auth::user()->id)->first();
        $this->transactions = Transaction::where('card_id',$card->id)->get();
    }

    public function render(): View
    {
        return view('livewire.transactions.user-transactions');
    }
}
