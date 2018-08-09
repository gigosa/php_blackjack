<?php
require_once 'vendor/autoload.php';

use BlackJack\GameMaster;
use BlackJack\Player;
use BlackJack\Dealer;
use BlackJack\Deck;
use BlackJack\Hand;
use BlackJack\Card;
use BlackJack\Suit;
use BlackJack\Rank;

$gm = new GameMaster(new Deck(Suit::SUITS, Rank::RANKS), new Dealer(new Hand(), 'ディーラー'), new Player(new Hand(), 'プレイヤー'));
$gm->start();
exit;
