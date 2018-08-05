<?php
namespace BlackJack;

use \BlackJack\Hand;

class Player implements PlayerInterface
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
     * @param string $decision
     * @return boolean
     */
    public function wantsToDraw($decision)
    {
        if ($decision === 'h') {
            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
