<?php

namespace Moo\card;

class BusinessCardType extends CardType
{
    const pack_max = 50;
    const pack_depth = 10;

    public function __construct() {
        $this->width = 84;
        $this->height = 55;
        $this->depth = 0.2;
        $this->type = 'Businesscard';
    }
}