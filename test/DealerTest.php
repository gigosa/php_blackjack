<?php
namespace BlackJack;

use PHPUnit\Framework\TestCase;

class DealerTest extends TestCase
{
    public function testWantsToDraw()
    {
        $dealer = new Dealer(new Hand);
        $dealer->addHand(new Card(Card::SUITS[0], Card::RANKS[10]));
        $this->assertTrue($dealer->wantsToDraw());
        $dealer->addHand(new Card(Card::SUITS[2], Card::RANKS[5]));
        $this->assertTrue($dealer->wantsToDraw());
        $dealer->addHand(new Card(Card::SUITS[0], Card::RANKS[0]));
        $this->assertFalse($dealer->wantsToDraw());
    }
}
