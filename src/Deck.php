<?php
namespace BlackJack;

use \BlackJack\Card;

class Deck implements DeckInterface
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
     * カードを引く
     *
     * @return Card
     */
    public function drawCard()
    {
        $current = current($this->deck);
        if (!$current) {
            throw new \OutOfRangeException('no card is remained');
        }
        next($this->deck);
        return $current;
    }
}
