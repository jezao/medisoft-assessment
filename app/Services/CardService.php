<?php

namespace App\Services;

use App\Models\CardsModel;

class CardService
{
    private $cardModel;

    public function __construct(CardsModel $cardsModel)
    {
        $this->cardModel = $cardsModel;
    }

    public function getNewDeck()
    {
        return $this->cardModel->shuffle();
    }

    public function getOdds($deck, $turn, $card)
    {

        $cardsOnBoard = $this->cardsOnBoard($deck, $turn);
        $cards = $this->stringToCards($card);
        $possibilities = sizeof($cards);
        $previousTurn = ($turn - 1 < 0) ? 0 : $turn - 1;
        $previousTotal = sizeof($deck) - $previousTurn;
        $match = in_array($deck[$previousTurn], $cards) ? true : false;

        return [
            'odds' => $this->calcOdd($possibilities, sizeof($deck) - sizeof($cardsOnBoard)) . '%',
            'match' => $match,
            'turn' => $turn,
            'lastOdds' => $this->calcOdd($possibilities, $previousTotal) . '%',
            'cardsOnBoard' => $cardsOnBoard
        ];
    }

    public function cardsOnBoard($deck, $turn)
    {
        return array_slice($deck, 0, $turn);
    }

    public function stringToCards($str)
    {

        $cards = [];

        if (strpos($str, '-')) {
            list($strStart, $strEnd) = explode("-", $str);

            $suit = $strStart{0};
            $start = str_replace($suit, '', $strStart);
            $end = str_replace($suit, '', $strEnd);

            $start = ($start > $end) ? $end : $start;
            $end = ($end < $start) ? $start : $end;

            for ($i = $start; $i <= $end; $i++) {
                $cards[] = $suit . $i;
            }

            return $cards;
        }

        return [$str];
    }

    public function calcOdd($amount, $total)
    {
        return round(($amount / $total) * 100, 2);
    }
}
