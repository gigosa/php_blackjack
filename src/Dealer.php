<?php
namespace BlackJack;

use \BlackJack\Hand;

class Dealer
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
     * @return Dealer
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

    /**
     * カードを引くかどうか
     * ディーラーは手札のスコアが最低17まで引くルール
     * @return void
     */
    public function wantsToDraw()
    {
        if ($this->currentScore() >= 17) {
            return false;
        }
        return true;
    }
}
