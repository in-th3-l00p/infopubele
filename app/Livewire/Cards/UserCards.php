<?php

namespace App\Livewire\Cards;

use Livewire\Component;

class UserCards extends Component
{
    public function render()
    {
        $cards = request()
            ->user()
            ->cards()
            ->latest()
            ->paginate(5, pageName: 'cards');
        return view('livewire.cards.user-cards', [
            'cards' => $cards
        ]);
    }
}
