<?php
session_destroy();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Score !</title>
</head>
<body>
    <a>Player: <?= $score['player'] ?></a>
    <a>Bot: <?= $score['bot'] ?></a>

    <h1>Winner: <?= $score['player'] >= 3 ? 'Player' : 'Bot' ?></h1>
</body>
</html>