<?php

namespace App\Livewire\Transactions;

use App\Models\Device;
use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class DeviceTransactions extends Component
{
    use WithPagination;

    public Device $device;

    public function render()
    {
        $transactions = Transaction::query()
            ->whereHas("slot", function ($query) {
                $query->where("device_id", $this->device->id);
            })
            ->orderBy("created_at", "desc")
            ->paginate(5, pageName: "transactions-page");
        return view('livewire.transactions.transactions', [
            "transactions" => $transactions
        ]);
    }
}
