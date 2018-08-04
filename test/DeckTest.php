<?php
namespace BlackJack;

use PHPUnit\Framework\TestCase;

class DeckTest extends TestCase
{
    public function testDrawCard()
    {
        $deck = new Deck(['spade'], [1]);
        $this->assertInstanceOf(Card::class, $deck->drawCard());
    }

    /**
     * @expectedException \OutOfRangeException
     */
    public function testDrawCardException()
    {
        $deck = new Deck([], []);
        $deck->drawCard();
    }
}
