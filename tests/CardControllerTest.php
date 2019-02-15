<?php

use PHPUnit\Framework\TestCase;

use Moo\CardController;
use Moo\pack\Pack;
use Moo\card\MiniCardType;
use Moo\card\BusinessCardType;

class CardControllerTest extends TestCase
{
    protected $cardController;

    public function setUp() : void
    {
        
    }

    public function testPrintCardsWithOneCardType()
    {
        $pack = $this->createMock(Pack::class);

        $this->cardController = new CardController(array($pack));
        $this->assertSame(1, count($this->cardController->getPacks()));
    }

    public function testPrintCardsWithMoreThanOneCardType()
    {
        $pack = $this->createMock(Pack::class);
        $extraPack = $this->createMock(Pack::class);

        $this->cardController = new CardController(array($pack, $extraPack));
        $this->assertSame(2, count($this->cardController->getPacks()));
    }
}