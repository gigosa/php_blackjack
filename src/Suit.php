<?php
namespace BlackJack;

class Suit
{
    const SUITS = ['spade', 'heart', 'dia', 'club'];

    private $suit;

    /**
     * @param string $suit
     */
    public function __construct(string $suit)
    {
        $this->suit = $suit;
    }

    /**
     * @return string
     */
    public function convertToString()
    {
        $string = '';
        switch ($this->suit) {
            case self::SUITS[0]: 
                $string = 'スペード';
                break;
            case self::SUITS[1]:
                $string = 'ハート';
                break;
            case self::SUITS[2]:
                $string = 'ダイア';
                break;
            case self::SUITS[3]:
                $string = 'クラブ';
                break;
            default:
                break;
        }
        return $string;
    }
}
