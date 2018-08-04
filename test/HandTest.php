<?php
namespace BlackJack;

use PHPUnit\Framework\TestCase;

class HandTest extends TestCase
{
    public function testCurrentScore()
    {
        $cardFirst = new Card(new Suit(Suit::SUITS[0]), new Rank(Rank::RANKS[2]));
        $hand = new Hand();
        $hand->add($cardFirst);
        $cardSecond = new Card(new Suit(Suit::SUITS[1]), new Rank(Rank::RANKS[11]));
        $hand->add($cardSecond);
        $this->assertEquals(13, $hand->currentScore());
    }

    public function testIsBust()
    {
        $cardFirst = new Card(new Suit(Suit::SUITS[2]), new Rank(Rank::RANKS[11]));
        $hand = new Hand();
        $hand->add($cardFirst);
        $cardSecond = new Card(new Suit(Suit::SUITS[3]), new Rank(Rank::RANKS[12]));
        $hand->add($cardSecond);
        $this->assertFalse($hand->isBust());
        $cardThird = new Card(new Suit(Suit::SUITS[0]), new Rank(Rank::RANKS[2]));
        $hand->add($cardThird);
        $this->assertTrue($hand->isBust());
    }
}
