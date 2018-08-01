<?php
namespace BlackJack;

use \BlackJack\Hand;

class Player
{
    /**
     * @var Hand
     */
    private $hand;
    
    public function __construct(Hand $hand)
    {
        $this->hand = $hand;
    }

    /**
     * @param Card $card
     * @return Player
     */
    public function addHand(Card $card)
    {
        $this->hand->add($card);
        return $this;
    }

    /**
     * @return int
     */
    public function currentScore()
    {
        return $this->hand->currentScore();
    }

    /**
     * @return boolean
     */
    public function isBust()
    {
        return $this->hand->isBust();
    }
}
