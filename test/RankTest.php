<?php
namespace BlackJack;

use PHPUnit\Framework\TestCase;

class RankTest extends TestCase
{
    public function testConvertToString()
    {
        $rank = new Rank(Rank::RANKS[0]);
        $this->assertEquals('A', $rank->convertToString());
    }
}
