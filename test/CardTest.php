<?php
namespace BlackJack;

use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    public function convertCardScoreProvider()
    {
        return [
            [Card::SUITS[0], Card::RANKS[0], 1],
            [Card::SUITS[1], Card::RANKS[12], 10]
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
            [Card::SUITS[0], Card::RANKS[0], 'スペードのA'],
            [Card::SUITS[1], Card::RANKS[12], 'ハートのK']
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
