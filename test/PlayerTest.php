<?php
namespace BlackJack;

use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function testCurrentScore()
    {
        $cardFirst = new Card(Card::SUITS[0], Card::RANKS[2]);
        $player = new Player();
        $player->addHand($cardFirst);
        $cardSecond = new Card(Card::SUITS[1], Card::RANKS[11]);
        $player->addHand($cardSecond);
        $this->assertEquals(13, $player->currentScore());
    }

    public function testIsBurst()
    {
        $cardFirst = new Card(Card::SUITS[2], Card::RANKS[11]);
        $player = new Player();
        $player->addHand($cardFirst);
        $cardSecond = new Card(Card::SUITS[3], Card::RANKS[12]);
        $player->addHand($cardSecond);
        $this->assertFalse($player->isBurst());
        $cardThird = new Card(Card::SUITS[0], Card::RANKS[2]);
        $player->addHand($cardThird);
        $this->assertTrue($player->isBurst());
    }
}
