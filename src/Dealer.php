<?php
namespace BlackJack;

use \BlackJack\Hand;

class Dealer implements PlayerInterface
{
    /**
     * @var Hand
     */
    private $hand;
    private $name;
    
    public function __construct(Hand $hand, string $name)
    {
        $this->hand = $hand;
        $this->name = $name;
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

    public function showAddedCard()
    {
        $addedCard = $this->hand->getLatestHand();
        if (!$addedCard) {
            throw new \OutOfRangeException('no added card');
        }
        if ($this->hand->currentNumberOfCards() == 2) {
            return '2枚目のカードは伏せられています';
        }
        return $addedCard->convertToString();
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

    public function getName()
    {
        return $this->name;
    }
}
