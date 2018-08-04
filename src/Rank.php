<?php
namespace BlackJack;

class Rank
{
    const RANKS = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];

    private $rank;

    /**
     * @param int $rank
     */
    public function __construct(int $rank)
    {
        $this->rank = $rank;
    }

    public function convertToString()
    {
        $string = '';
        switch ($this->rank) {
            case self::RANKS[0]: 
                $string = 'A';
                break;
            case self::RANKS[10]:
                $string = 'J';
                break;
            case self::RANKS[11]:
                $string = 'Q';
                break;
            case self::RANKS[12]:
                $string = 'K';
                break;
            default:
                break;
        }
        return $string;
    }

    public function convertToScore()
    {
        if ($this->rank >= self::RANKS[10]) {
            return 10;
        }
        return $this->rank;
    }
}
