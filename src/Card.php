<?php
namespace BlackJack;

class Card
{
    const SUITS = ['spade', 'heart', 'diamond', 'club'];
    const RANKS = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];
    const ACE = 1;
    const JACK = 11;
    const QUEEN = 12;
    const KING = 13;

    private $suit;
    private $rank;

    /**
     * @param string $suit
     * @param integer $rank
     */
    public function __construct(string $suit, int $rank)
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
        if ($this->rank >= self::JACK) {
            return 10;
        }
        return $this->rank;
    }

    /**
     * 表示用の文字列に変換する
     * @return string
     */
    public function convertDisplayString(): string
    {
        $string = "";
        switch ($this->suit) {
            case self::SUITS[0]:
                $string .= 'スペード';
                break;
            case self::SUITS[1]:
                $string .= 'ハート';
                break;
            case self::SUITS[2]:
                $string .= 'ダイヤ';
                break;
            case self::SUITS[3]:
                $string .= 'クラブ';
                break;
            default:
                break;
        }
        $string .= 'の';
        switch ($this->rank) {
            case self::ACE:
                $string .= 'A';
                break;
            case self::JACK:
                $string .= 'J';
                break;
            case self::QUEEN:
                $string .= 'Q';
                break;
            case self::KING:
                $string .= 'K';
                break;
            default:
                $string .= $rank;
                break;
        }
        return $string;
    }
}
