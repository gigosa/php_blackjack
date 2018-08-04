<?php
namespace BlackJack;

use \BlackJack\Card;

class Deck
{
    private $deck = [];

    public function __construct(array $suits,array $ranks)
    {
        foreach ($suits as $suit) {
            foreach ($ranks as $rank) {
                $this->deck[] = new Card(new Suit($suit), new Rank($rank));
            }
        }
    }

    public function shuffle()
    {
        shuffle($this->deck);
    }

    /**
     * カードを引く関数
     *
     * @return Card|null
     */
    public function drawCard()
    {
        $current = current($this->deck);
        if (!$current) {
            return null;
        }
        next($this->deck);
        return $current;
    }
}
