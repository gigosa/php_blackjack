<?php
require_once 'vendor/autoload.php';

use BlackJack\Player;
use BlackJack\Deck;
use BlackJack\Card;

$user = new Player;
$dealer = new Player;
$deck = new Deck;
for ($i = 0; $i < 2; $i++) {
    list($suit, $number) = $deck->takeCard();
    $user->addHand($suit, $number);
    echo 'あなたの引いたカードは' . Card::convertDisplayString($suit, $number) . "です\n";
}

for ($i = 0; $i < 2; $i++) {
    list($suit, $number) = $deck->takeCard();
    $dealer->addHand($suit, $number);
    if ($i == 0) {
        echo 'ディーラーの引いたカードは' . Card::convertDisplayString($suit, $number) . "です\n";
    } else {
        echo 'ディーラーの引いたカードは' . Card::convertDisplayString($suit, $number) . "です\n";
        echo 'ディーラーの2枚目のカードは伏せられています' . "\n";
    }
}

echo 'ヒットしますか？スタンドしますか？(h/s):';

$isEnd = false;
$result = 0;
$decision = trim(fgets(STDIN));
do {
    if ($decision != 'h' && $decision != 's') {
        echo 'ヒットかスタンドを選択してください(h/s):';
        $decision = trim(fgets(STDIN));
        continue;
    }
    if ($decision === 'h') {
        list($suit, $number) = $deck->takeCard();
        $user->addHand($suit, $number);
        echo 'あなたの引いたカードは' . Card::convertDisplayString($suit, $number) . "です\n";
        if ($user->isBurst()) {
            echo 'あなたはバーストしました' . "\n";;
            $isEnd = true;
            $result = -1;
            continue;
        }
        echo 'ヒットしますか？スタンドしますか？(h/s):';
        $decision = trim(fgets(STDIN));
    }
    if ($decision == 's') {
        list($suit, $number) = $deck->takeCard();
        $dealer->addHand($suit, $number);
        echo 'ディーラーの引いたカードは' . Card::convertDisplayString($suit, $number) . "です\n";
        if ($dealer->isBurst()) {
            echo 'ディーラーはバーストしました' . "\n";;
            $isEnd = true;
            $result = 1;
            continue;
        }
        if ($dealer->calculateScore() >= 17) {
            $isEnd = true;
            $userScore = abs(21 - $user->calculateScore());
            $dealerScore = abs(21 - $dealer->calculateScore());
            if ($userScore > $dealerScore) {
                $result = -1;
            } elseif ($userScore < $dealerScore) {
                $result = 1;
            } else {
                $result = 0;
            }
        }
    }
} while (!$isEnd);

echo 'あなたの得点は' . $user->calculateScore() . 'です' . "\n";
echo 'ディーラーの得点は' . $dealer->calculateScore() . 'です' . "\n";
if ($result == 1) {
    echo 'あなたの勝利です！' . "\n";
} elseif ($result == -1) {
    echo 'ディーラーの勝利です！' . "\n";
} elseif ($result == 0) {
    echo '引き分けです' . "\n";
}
