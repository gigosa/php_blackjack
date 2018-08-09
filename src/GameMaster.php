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

    /**
     * ブラックジャックを実行
     */
    public function start()
    {
        $this->deck->shuffle();
        $this->dealCard($this->player);
        $this->dealCard($this->player);
        $this->dealCard($this->dealer);
        $this->dealCard($this->dealer);
        $canHit = true;
        while (!$this->player->isBust() && $this->askDraw()) {
            $this->dealCard($this->player);
        }
        if ($this->player->isBust()) {
            echo $this->player->getName() . 'はバーストしました' . "\n";
            return;
        }
        while (!$this->dealer->isBust() && $this->dealer->wantsToDraw()) {
            $this->dealCard($this->dealer);
        }
        if ($this->dealer->isBust()) {
            echo $this->dealer->getName() . 'はバーストしました' . "\n";
            return;
        }
        echo $this->player->getName() . 'の得点は' . $this->player->currentScore() . 'です' . "\n";
        echo $this->dealer->getName() . 'の得点は' . $this->dealer->currentScore() . 'です' . "\n";
        $this->judgeWinner();
        return;
    }

    /**
     * カードを配布する
     * @param PlayerInterface $player
     */
    public function dealCard(PlayerInterface $player)
    {
        $card = $this->deck->drawCard();
        $player->addHand($card);
        echo $player->showAddedCard() . "\n";
    }

    /**
     * ヒットするかスタンドするか尋ねる
     */
    public function askDraw()
    {
        echo 'ヒットしますか？ スタンドしますか？(h/s)';
        $decision = trim(fgets(STDIN));
        return $this->player->wantsToDraw($decision);
    }

    /**
     * 勝者を判定する
     */
    public function judgeWinner()
    {
        if ($this->player->currentScore() > $this->dealer->currentScore()) {
            echo $this->player->getName() . 'の勝利です!' . "\n";
            return;
        }
        if ($this->dealer->currentScore() > $this->player->currentScore()) {
            echo $this->dealer->getName() . 'の勝利です!' . "\n";
            return;
        }
        echo '引き分けです' . "\n";
        return;
    }
}
