<?php
namespace BlackJack;

interface PlayerInterface
{
    /**
     * 手札を加える
     */
    public function addHand(Card $card);

    /**
     * 現在のスコア
     */
    public function currentScore();

    /**
     * バースト判定
     */
    public function isBust();

    /**
     * 最後に加えたカードを返す
     */
    public function showAddedCard();
}
