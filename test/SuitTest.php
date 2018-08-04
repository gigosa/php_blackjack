<?php
namespace BlackJack;

use PHPUnit\Framework\TestCase;

class SuitTest extends TestCase
{
    public function testConvertToString()
    {
        $suit = new Suit('spade');
        $this->assertEquals('スペード', $suit->convertToString());
    }
}
