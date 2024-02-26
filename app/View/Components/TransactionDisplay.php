<?php

namespace App\View\Components;

use App\Models\Device;
use App\Models\Transaction;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TransactionDisplay extends Component
{
    public function __construct(
        public Transaction $transaction,
        public Device $device
    ) { }

    public function render(): View|Closure|string {
        return view('components.transaction-display');
    }
}
