<?php
namespace BlackJack;

use \BlackJack\Hand;

class Player implements PlayerInterface
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
     * @return self
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
