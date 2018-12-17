<?php

namespace App\Http\Controllers;

use App\Services\CardService;
use Illuminate\Http\Request;

class PokerController extends Controller
{
    private $cardService;

    public function __construct(CardService $cardService)
    {
        $this->cardService = $cardService;
    }

    public function newDeck()
    {
        $deck = $this->cardService->getNewDeck();
        return response($deck);
    }

    public function getOdds(Request $request)
    {
        $this->validate(
            $request,
            [
            'deck' => 'required',
            'turn' => 'required',
            'card' => 'required'
            ]
        );

        $odds = $this->cardService->getOdds($request->deck, $request->turn, $request->card);
        return response($odds);
    }
}
