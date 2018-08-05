<?php
namespace BlackJack;

use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function testShowAddedCard()
    {
        $player = new Player(new Hand, 'プレイヤー');
        $player->addHand(new Card(new Suit('heart'), new Rank(1)));
        $this->assertEquals('ハートのA', $player->showAddedCard());
    }
}
