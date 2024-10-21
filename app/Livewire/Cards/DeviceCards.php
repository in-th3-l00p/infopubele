<?php

namespace App\Livewire\Cards;

use App\Models\Card;
use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class DeviceCards extends Component
{
    use WithPagination;

    public Device $device;
    public string $user;

    public function createCard() {
        $user = User::findOrFail($this->user);
        if ($user->role !== "user") {
            $this->addError('user', __('Rolul utilizatorului selectat nu este "user".'));
            return;
        }
        if ($user->city !== $this->device->city) {
            $this->addError('user', __('Utilizatorul selectat nu este din același oraș cu dispozitivul.'));
            return;
        }

        $this->device->cards()->create([
            'user_id' => $user->id,
            'uuid' => Str::uuid()
        ]);

        $this->user = "";

        $this->dispatch("saved");
        $this->dispatch('$refresh');
    }

    public function deleteCard($cardId) {
        $card = Card::findOrFail($cardId);
        $card->delete();
        $this->dispatch("saved");
        $this->dispatch('$refresh');
    }

    public function render()
    {
        $cards = $this->device->cards()->paginate(5);
        $cardPossibleUsers = User::query()
            ->whereNotIn('id', $cards->getCollection()->pluck('user_id'))
            ->where("role", "=", "user")
            ->where("city", "=", $this->device->city)
            ->get();
        return view('livewire.cards.device-cards', [
            'cards' => $cards,
            'cardPossibleUsers' => $cardPossibleUsers,
        ]);
    }
}
