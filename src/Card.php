<?php
namespace BlackJack;

class Card
{
    /**
     * @var Suit
     */
    private $suit;
    private $rank;

    /**
     * @param Suit $suit
     * @param Rank $rank
     */
    public function __construct(Suit $suit, Rank $rank)
    {
        $this->suit = $suit;
        $this->rank = $rank;
    }

    /**
     * カードをブラックジャックの点数に変換する
     * @return integer
     */
    public function convertCardScore(): int
    {
        return $this->rank->convertToScore();
    }

    /**
     * 表示用の文字列に変換する
     * @return string
     */
    public function convertToString(): string
    {
        return $this->suit->convertToString() . 'の' . $this->rank->convertToString();
    }
}
