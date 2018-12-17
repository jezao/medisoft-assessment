<?php

namespace Tests\Unit\Services;

use App\Models\CardsModel;
use App\Services\CardService;
use Mockery\Mock;
use PHPUnit\Framework\TestCase;

//use Tests\TestCase;

class CardServiceTest extends TestCase
{

    public function testShouldInstanciatePhraseService()
    {

        $service = new CardService(new CardsModel());
        $this->assertInstanceOf(CardService::class, $service);

    }

    public function testShouldReturnANewDeck()
    {
        $service = new CardService(new CardsModel());

        $newDeck = $service->getNewDeck();

        $this->assertTrue(sizeof($newDeck) == 52);
    }

    public function testShouldGetTwoDifferentsDecks()
    {
        $service = new CardService(new CardsModel());

        $newDeck1 = $service->getNewDeck();
        $newDeck2 = $service->getNewDeck();

        $this->assertFalse($newDeck1 === $newDeck2);
    }

    public function testShouldReturnAnArrayOfCardsBasedOnTurn()
    {
        $service = new CardService(new CardsModel());
        $newDeck = $service->getNewDeck();

        $board = $service->cardsOnBoard($newDeck,2);

        $this->assertTrue(sizeof($board) == 2);
    }

    public function testShouldReturnAnArrayOfCards() {
        $service = new CardService(new CardsModel());

        $cards = $service->stringToCards('H2-H7');

        $this->assertTrue(sizeof($cards) == 6);

    }

    public function testShouldReturnAnArrayOfOneCard() {
        $service = new CardService(new CardsModel());

        $cards = $service->stringToCards('H2');

        $this->assertTrue(sizeof($cards) == 1);

    }

    public function testShouldReturnOdds() {
        $service = new CardService(new CardsModel());

        $odds = $service->calcOdd(10,100);

        $this->assertTrue($odds == 10);

    }

    public function testShouldReturnAnArrayOfDeckInfo() {
        $service = new CardService(new CardsModel());
        $newDeck = $service->getNewDeck();

        $odds = $service->getOdds($newDeck,2,'H2');

        $this->assertTrue(sizeof($odds) == 5);
        $this->assertTrue($odds['odds'] == '2%');

    }



}
