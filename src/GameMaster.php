<?php
namespace BlackJack;

class GameMaster
{
    /**
     * @var Deck
     */
    private $deck;
    /**
     * @var Dealer
     */
    private $dealer;
    /**
     * @var Player
     */
    private $player;

    public function __construct(DeckInterface $deck, PlayerInterface $dealer, PlayerInterface $player)
    {
        $this->deck = $deck;
        $this->dealer = $dealer;
        $this->player = $player;
    }

    public function start()
    {
        $this->deck->shuffle();
        $this->dealCard($this->player);
        $this->dealCard($this->player);
        $this->dealCard($this->dealer);
        $this->dealCard($this->dealer);
    }

    public function dealCard(PlayerInterface $player)
    {
        $card = $this->deck->drawCard();
        $player->addHand($card);
        echo $player->showAddedCard() . "\n";
    }

    public function askDraw()
    {
        echo 'ヒットしますか？ スタンドしますか？(h/s)';
        $decision = trim(fgets(STDIN));
        return $this->player->wantsToDraw($decision);
    }
}
