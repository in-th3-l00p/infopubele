<?php

namespace App\Livewire\Transactions;

use App\Models\Device;
use App\Models\Transaction;
use Livewire\Component;

class DeviceTransactions extends Component
{
    public Device $device;

    public function render()
    {
        $transactions = Transaction::query()
            ->whereHas("slot", function ($query) {
                $query->where("device_id", $this->device->id);
            })
            ->orderBy("created_at", "desc")
            ->paginate(5);
        return view('livewire.transactions.transactions', [
            "transactions" => $transactions
        ]);
    }
}
