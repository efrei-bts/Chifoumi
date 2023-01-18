<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Playing</title>
</head>
<body>
    <h4>Current score: </h4>
    <ul>
        <li><a>Player: <?= $score['player'] ?></a></li>
        <li><a>Bot: <?= $score['bot'] ?></a></li>
    </ul>
    <h4>Action: </h4>
    <ul>
        <?php
            foreach (Actions::cases() as $action) {
                ?>
                <li><a href="/?action=<?= $action->name ?>"><?= $action->name ?></a></li>
                <?php
            }
        ?>
    </ul>
</body>
</html>