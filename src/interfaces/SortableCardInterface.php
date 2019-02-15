<?php

namespace Moo\interfaces;

interface SortableCardInterface
{
    /**
     * Sort the contents of a pack in either accending or decending (depending on flag set) greyscale colour order. 
     * NOTE: this will not work with non-greyscale colours so don't use it for that!
     */
    public function bgSort();
}