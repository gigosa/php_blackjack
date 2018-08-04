<?php
namespace BlackJack;

use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    public function convertCardScoreProvider()
    {
        return [
            [new Suit(Suit::SUITS[0]), new Rank(Rank::RANKS[0]), 1],
            [new Suit(Suit::SUITS[1]), new Rank(Rank::RANKS[12]), 10]
        ];
    }

    /**
     * @dataProvider convertCardScoreProvider
     */
    public function testConvertCardScore($suit, $rank, $expected)
    {
        $card = new Card($suit, $rank);
        $this->assertEquals($expected, $card->convertCardScore());
    }

    public function convertDisplayStringProvider()
    {
        return [
            [new Suit(Suit::SUITS[0]), new Rank(Rank::RANKS[0]), 'スペードのA'],
            [new Suit(Suit::SUITS[1]), new Rank(Rank::RANKS[12]), 'ハートのK']
        ];
    }

    /**
     * @dataProvider convertDisplayStringProvider
     */
    public function testConvertDisplayString($suit, $rank, $expected)
    {
        $card = new Card($suit, $rank);
        $this->assertEquals($expected, $card->convertDisplayString());
    }
}
