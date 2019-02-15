<?php

namespace Moo\card;

use Moo\card\CardType;
use Moo\interfaces\CardRendererInterface;

/**
 * Abstract class for modeling a card
 */ 
abstract class AbstractCard implements CardRendererInterface
{
    /**
     * @var int Width of a card
     */
    protected $width = null;
    
    /**
     * @var int Height of a card
     */
    protected $height = null;
    
    /**
     * @var Depth of a card
     */
    protected $depth = null;

    /**
     * @var string The background colour of a card
     */
    protected $bgColour = '#ffffff';

    /**
     * @var string The text of a card
     */
    protected $text = '';

    /**
     * @var string The text of a card
     */
    protected $type = '';

    public function __construct(CardType $cardType)
    {
        $this->width = $cardType->getWidth();
        $this->height = $cardType->getHeight();
        $this->depth = $cardType->getDepth();
        $this->bgColour = $cardType->getBgColour();
        $this->text = $cardType->getText();
        $this->type = $cardType->getType();
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function setDepth($depth)
    {
        $this->depth = $depth;
    }

    public function setBgColour($bgColour)
    {
        $this->bgColour = $bgColour;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getDepth()
    {
        return $this->depth;
    }

    public function getBgColour()
    {
        return $this->bgColour;
    }

    public function getText()
    {
        return $this->text;
    }
} 