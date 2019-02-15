<?php

require_once __DIR__.'/vendor/autoload.php';

$miniCardType = new Moo\card\MiniCardType();
$businessCardType = new Moo\card\BusinessCardType();

$miniCardPack = new Moo\pack\Pack($miniCardType, false);
$businessCardPack = new Moo\pack\Pack($businessCardType, true);

$cardController = new Moo\CardController(array($miniCardPack, $businessCardPack));

$cardController->printCards();
