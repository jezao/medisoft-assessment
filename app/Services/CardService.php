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

            if (!is_numeric($start)) {
                $start = $this->valueCharToNumber($start);
            }

            if (!is_numeric($end)) {
                $end = $this->valueCharToNumber($end);
            }

            $start = ($start > $end) ? $end : $start;
            $end = ($end < $start) ? $start : $end;

            for ($i = $start; $i <= $end; $i++) {
                $cards[] = $suit . $this->numberCharToValue($i);
            }

            return $cards;
        }

        if (is_numeric($str{1})) {
            $str{1} = $this->numberCharToValue($str{1});
        }

        return [$str];

    }

    public function valueCharToNumber($value)
    {
        switch ($value) {
            case 'A':
                $value = 1;
                break;
            case 'J':
                $value = 11;
                break;
            case 'Q':
                $value = 12;
                break;
            case 'K':
                $value = 13;
                break;
        }

        return $value;
    }

    public function numberCharToValue($value)
    {
        switch ($value) {
            case '1':
                $value = 'A';
                break;
            case '11':
                $value = 'J';
                break;
            case '12':
                $value = 'Q';
                break;
            case '13':
                $value = 'K';
                break;
        }

        return $value;
    }

    public function calcOdd($amount, $total)
    {
        return round(($amount / $total) * 100, 2);
    }
}
