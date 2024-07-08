<?php

namespace App\Livewire;

use App\Models\Card;
use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;

class CardPanel extends Component
{
    public ?int $userId = null;
    public ?Collection $cards = null;
    public ?Collection $unusedUsers = null;

    public Device $device;

    protected $listeners = [
        "refresh" => 'refresh'
    ];

    public function mount() {
        $this->cards = $this->device->cards()->latest()->get();
        $this->unusedUsers = \App\Models\User::query()
            ->whereNull("device_id")
            ->where("role", "user")
            ->where("city", $this->device->city)
            ->get();
    }

    public function refresh() {
        $this->userId = null;
        $this->cards = $this->device->cards()->latest()->get();
        $this->unusedUsers = \App\Models\User::query()
            ->whereNull("device_id")
            ->where("role", "user")
            ->get();
        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.card-panel');
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

        $this->dispatch("refresh");
    }

    public function deleteCard($cardId) {
        $card = Card::find($cardId);

        $card->delete();
        $card->user->update([
            "device_id" => null
        ]);
        $this->dispatch('refresh');
    }
}
