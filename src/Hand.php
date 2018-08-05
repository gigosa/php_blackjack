<?php
namespace BlackJack;

use \BlackJack\Card;

class Hand
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
     * @return void
     */
    public function add(Card $card)
    {
        $this->handCard[] = $card;
    }

    /**
     * 最も最近引いたカードを返す
     * @return Card
     */
    public function getLatestHand()
    {
        return end($this->handCard);
    }

    /**
     * 現在の手札枚数を返す
     * @return int
     */
    public function currentNumberOfCards()
    {
        return count($this->handCard);
    }

    /**
     * @return integer
     */
    public function currentScore(): int
    {
        $currentScore = 0;
        foreach ($this->handCard as $card) {
            $currentScore += $card->convertCardScore();
        }
        return $currentScore;
    }

    /**
     * バースト判定
     * @return bool
     */
    public function isBust()
    {
        $currentScore = $this->currentScore();
        if ($currentScore <= 21) {
            return false;
        }
        return true;
    }
}
