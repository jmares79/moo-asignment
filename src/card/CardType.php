<?php

namespace Moo\card;

/**
 * Class to handle card types
 */
class CardType
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
     * @var string Depth of a card
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
     * @var string The type of a card
     */
    protected $type = '';

    public function __construct($width, $height, $depth, $bgColour, $text, $type)
    {
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
        $this->bgColour = $bgColour;
        $this->text = $text;
        $this->type = $type;
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

    public function getType()
    {
        return $this->type;
    }

    public static function getPackMax()
    {
        return static::pack_max;
    }

    public static function getPackDepth()
    {
        return static::pack_depth;
    }
}
