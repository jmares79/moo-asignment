<?php

namespace Moo\card;

/**
 * Class that sets the fixed values of a MiniCard Attribute 
 */
class MiniCardType extends CardType
{
    const pack_max = 100;
    const pack_depth = 20;
    
    public function __construct() {
        $this->width = 70;
        $this->height = 28;
        $this->depth = 0.2;
        $this->type = 'Minicard';
    }
}
