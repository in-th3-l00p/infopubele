<?php

namespace App\Livewire\Cards;

use App\Models\Card;
use App\Models\Device;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowCard extends Component
{
    public Card $card;
    public string $uuid = '';

    public function mount(Device $device): void
    {
        $this->card = Card::where('user_id', Auth::user()->id)->first();
        $this->uuid = $this->card->uuid;
    }

    public function render(): View
    {
        return view('livewire.cards.show-card');
    }
}
