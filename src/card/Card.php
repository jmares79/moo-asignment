<?php

namespace Moo\card;

use Moo\interfaces\CardRendererInterface;

class Card extends AbstractCard implements CardRendererInterface
{
    public function render()
    {
        print '<div style="border: 1px solid #000000; padding: 2px; margin: 2px; width:' . 
                $this->getWidth() . 'px; height: ' . $this->getHeight() . 'px; background-color: ' . 
                $this->getBgColour() . '">' . $this->getText() . '</div>';
    }
}