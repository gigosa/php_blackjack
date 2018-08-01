<?php
namespace BlackJack;

use PHPUnit\Framework\TestCase;

class HandTest extends TestCase
{
    public function testCurrentScore()
    {
        $cardFirst = new Card(Card::SUITS[0], Card::RANKS[2]);
        $hand = new Hand();
        $hand->add($cardFirst);
        $cardSecond = new Card(Card::SUITS[1], Card::RANKS[11]);
        $hand->add($cardSecond);
        $this->assertEquals(13, $hand->currentScore());
    }

    public function testIsBust()
    {
        $cardFirst = new Card(Card::SUITS[2], Card::RANKS[11]);
        $hand = new Hand();
        $hand->add($cardFirst);
        $cardSecond = new Card(Card::SUITS[3], Card::RANKS[12]);
        $hand->add($cardSecond);
        $this->assertFalse($hand->isBust());
        $cardThird = new Card(Card::SUITS[0], Card::RANKS[2]);
        $hand->add($cardThird);
        $this->assertTrue($hand->isBust());
    }
}
