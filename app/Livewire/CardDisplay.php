<?php

namespace App\Livewire;

use App\Models\Card;
use Livewire\Component;

class CardDisplay extends Component
{
    public Card $card;

    public function render()
    {
        return view('livewire.card-display');
    }

    public function deleteCard() {
        $this->card->delete();
        $this->card->user->update([
            "device_id" => null
        ]);
        $this->dispatch('refreshParent');
    }
}
