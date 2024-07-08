<?php

namespace App\Livewire;

use App\Models\Card;
use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class CardPanel extends Component
{
    public ?int $userId = null;
    public Device $device;

    protected $listeners = ['refreshParent' => '$refresh'];

    public function render()
    {
        return view('livewire.card-panel', [
            "cards" => $this->device->cards()->latest()->get()
        ]);
    }

    public function createCard() {
        $this->validate([
            'userId' => 'required|exists:users,id'
        ],[
            'userId.required' => 'Id-ul utilizatorului este obligatoriu.',
            'userId.exists' => 'Utilizatorul nu există.'
        ]);

        if (Card::query()
            ->where('user_id', $this->userId)
            ->exists()
        ) {
            $this->addError('userId', 'Utilizatorul are deja un card asociat.');
            return;
        }

        Card::create([
            'uuid' => Str::uuid()->toString(),
            'user_id' => $this->userId,
            'device_id' => $this->device->id,
        ]);
        User::find($this->userId)->update([
            "device_id" => $this->device->id
        ]);

        $this->dispatch('refresh');
    }
}
