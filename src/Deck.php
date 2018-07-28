<?php
namespace BlackJack;

use \BlackJack\Card;

class Deck
{
    private $deck = [];

    public function __construct()
    {
        foreach (Card::SUITS as $suit) {
            foreach (Card::RANKS as $rank) {
                $this->deck[] = new Card($suit, $rank);
            }
        }
    }

    /**
     * カードを引く関数
     *
     * @return Card|null
     */
    public function takeCard()
    {
        $current = current($this->deck);
        if (!$current) {
            return null;
        }
        next($this->deck);
        return $current;
    }
}
