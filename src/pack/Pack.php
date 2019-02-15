<?php

namespace Moo\pack;

use Moo\interfaces\SortableCardInterface;
use Moo\interfaces\RenderHeadlineInterface;
use Moo\card\CardType;

/**
 * Pack class to handle card packs 
 */
class Pack implements \Iterator, \Countable, \ArrayAccess, SortableCardInterface, RenderHeadlineInterface
{
    protected $position;
    protected $sortingAscending;
    protected $packMax;
    protected $packDepth;

    /**
     * @var CardType $cardType Information about the type of cards the pack will handle
     */
    protected $cardType;

    /**
     * @var Array of cards
     */
    private $cards = array();

    public function __construct(CardType $cardType, $sortingAscending = true)
    {
        $this->position = 0;
        $this->cardType = $cardType;
        $this->sortingAscending = $sortingAscending;
        $this->packMax = $cardType::getPackMax();
        $this->packDepth = $cardType::getPackDepth();
    }
    
    public function getCardType()
    {
        return $this->cardType;
    }

    public function getPackMax()
    {
        return $this->packMax;
    }

    public function getPackDepth()
    {
        return $this->packDepth;
    }

    public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return $this->cards[$this->position];
    }
    
    public function key() {
        return $this->position;
    }
    
    public function next() {
        ++$this->position;
    }
    
    public function valid() {
        return isset($this->cards[$this->position]);
    }
    
    public function count() {
        return count($this->cards);
    }
    
    public function offsetSet($offset, $value) {
        $this->cards[$offset] = $value;
    }
    
    public function offsetExists($offset) {
        return isset($this->cards[$offset]);
    }
    
    public function offsetUnset($offset) {
        unset($this->cards[$offset]);
    }
    
    public function offsetGet($offset) {
        return isset($this->cards[$offset]) ? $this->cards[$offset] : null;
    }
    
    public function renderHeadline()
    {
        print "{$this->getCardType()->getType()}: contains " . count($this) . ' width a depth of ' . $this->getCardType()->getPackDepth().'<br>';
    }

    /**
     * {@inheritDoc}
     */
    public function bgSort() {
        // Rearrange the contents of the pack based on the bg colour 
        $tmp = array();
        
        for ($i = 0; $i < count($this); $i++) {
            for ($j = 0; $j < count($this); $j++) {
                $this_colour = hexdec(preg_replace('/#/', '', $this[$i]->getBgColour()));
                $next_colour = hexdec(preg_replace('/#/', '', $this[$j]->getBgColour()));
                        
                if ($this->sortingAscending) {
                    if ($this_colour < $next_colour) {
                        // Switch them around

                        $tmp = $this[$i];
                        $this[$i] = $this[$j];
                        $this[$j] = $tmp;
                    }
                } else {
                    if ($this_colour > $next_colour) {
                        // Switch them around
                        
                        $tmp = $this[$i];
                        $this[$i] = $this[$j];
                        $this[$j] = $tmp;
                    }
                }
            }
        }
    }
    
    /**
     * Calculate the total depth of cards in a pack
     */
    public function get_depth() {
        foreach ($this as $card) {
            $depth += $card->get_depth();
        }
        
        return $depth;
    }
}