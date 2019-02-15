<?php

namespace Moo;

use Moo\card\Card;
use Moo\pack\Pack;
use Moo\utils\Utils;

/**
 * Card controller to execute, handle and show the packs into the screen
 */
class CardController
{
    const PACK_NAME = 'Pack';

    /**
     * @var $packs Array of packs to be processed
     */ 
    protected $packs = array();

    public function __construct($packs)
    {
        $this->packs = $packs;
    }

    /**
     * Execute the printing of the cards, in the loaded packs, into the screen
     */
    public function printCards()
    {
        $this->createCards();
        $this->renderCards();
    }

    protected function createCards()
    {
        foreach ($this->packs as $pack) {
            for ($i = 0; $i < $pack->getPackMax(); $i++) {
                $card = new Card($pack->getCardType());
                
                $color = Utils::greyScaleRandomColourGenerator();
                $card->setBgColour($color);
                $card->setText(self::PACK_NAME . ' ' . $i);

                $pack[$i] = $card;
            }

            $pack->bgSort();
        }
    }

    protected function renderCards()
    {
        foreach ($this->packs as $pack) {
            $pack->renderHeadline();
            
            foreach ($pack as $card) {
                $card->render();
            }
        }
    }
}