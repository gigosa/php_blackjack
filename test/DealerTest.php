<?php
namespace BlackJack;

use PHPUnit\Framework\TestCase;

class DealerTest extends TestCase
{
    public function testWantsToDraw()
    {
        $dealer = new Dealer(new Hand, 'ディーラー');
        $dealer->addHand(new Card(new Suit(Suit::SUITS[0]), new Rank(Rank::RANKS[10])));
        $this->assertTrue($dealer->wantsToDraw());
        $dealer->addHand(new Card(new Suit(Suit::SUITS[2]), new Rank(Rank::RANKS[5])));
        $this->assertTrue($dealer->wantsToDraw());
        $dealer->addHand(new Card(new Suit(Suit::SUITS[0]), new Rank(Rank::RANKS[0])));
        $this->assertFalse($dealer->wantsToDraw());
    }
}
