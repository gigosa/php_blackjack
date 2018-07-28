<?php
namespace BlackJack;

use \BlackJack\Card;

class Player
{
    /**
     * 手札のCardObjの配列
     * @var Card[] array
     */
    private $handCard = [];
    private $isBurst = false;

    /**
     * カードを手札に加える
     * @param Card $card
     * @return Player
     */
    public function addHand(Card $card): Player
    {
        $this->handCard[] = $card;
        return $this;
    }

    /**
     * @return integer
     */
    public function currentScore(): int
    {
        $currentScore = 0;
        foreach ($this->handCard as $hand) {
            $currentScore += $hand->convertCardScore;
        }
        return $currentScore;
    }

    /**
     * バースト判定
     * @return bool
     */
    public function isBurst()
    {
        $currentScore = $this->currentScore();
        if ($currentScore <= 21) {
            return false;
        }
        return true;
    }
}
