<?php

enum Result {
    case WIN;
    case LOSE;
    case EQUALS;
}

enum Actions: int {

    case PIERRE = 3;
    case FEUILLE = 1;
    case CISEAU = 2;

    public function eval(Actions $otherAction): Result {
        if ($this === $otherAction)
            return Result::EQUALS;
        return $this === self::from($otherAction->value) ? Result::LOSE : Result::WIN;
    }

    public static function fromName(string $name): ?Actions {
        foreach (self::cases() as $value) {
            if ($value->name === $name)
                return $value;
        }
        return null;
    }

    public static function rand(): Actions {
        $cases = self::cases();

        return $cases[rand(0, count($cases) - 1)];
    }

}

session_start(array('name' => 'id', 'save_path' => '../sessions/'));

if (!isset($_SESSION['score']))
    $score = array('player' => 0, 'bot' => 0);
else
    $score = $_SESSION['score'];

if (isset($_GET['action'])) {
    $player = Actions::fromName($_GET['action']);
    $bot = Actions::rand();
    $result = $player->eval($bot);
    error_log("Player: $player?->name");
    error_log("Bot: $bot?->name");
    error_log("Result: $result->name");
    switch ($result) {
        case Result::WIN:
            ++$score['player'];
            break;
        case Result::LOSE:
            ++$score['bot'];
            break;
    }
}

$_SESSION['score'] = $score;

if ($score['player'] >= 3 || $score['bot'] >= 3) {
    include 'score.php';
    exit();
}
include 'game.php';