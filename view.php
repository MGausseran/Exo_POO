<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Language Game</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Triolingo</h1>

    <?php if (!isset($_SESSION['player'])) { ?>

        <form action="" method="post" class="form-start">
            <label for="nickname">Enter your nickname:</label>
            <input type="text" name="nickname" id="nickname" required>
            <button type="submit" class="btn">Start</button>
        </form>

    <?php } elseif (isset($_SESSION['game_over'])) {
        $player = unserialize($_SESSION['player']);
        ?>
        <div class="game-over">
            <h2>Game Over, <?= $player->name ?>!</h2>
            <p>You had <?= $player->getScore()['correct'] ?> correct answers and <?= $player->getScore()['incorrect'] ?> incorrect answers.</p>

            <form action="" method="post">
                <button type="submit" name="reset" class="btn">Restart the Game</button>
            </form>
        </div>

    <?php } else {
        $player = unserialize($_SESSION['player']); ?>

        <p>Hello, <?= $player->name ?>!</p>

        <?php if (isset($_SESSION['result_message'])) { ?>
            <p class="result"><?= $_SESSION['result_message'] ?></p>
        <?php } ?>

        <p>Translate the following word to English:</p>
		<p class="word-box"><?= $_SESSION['current_word_display'] ?></p>

        <form action="" method="post" class="form-answer">
            <input type="text" name="answer" placeholder="Your translation" required>
            <button type="submit" class="btn">Submit</button>
        </form>

        <form action="" method="post" class="form-reset">
            <button type="submit" name="reset" class="btn reset-btn">Reset Game</button>
        </form>

        <p class="score">Score: <?= $player->getScore()['correct'] ?> correct, <?= $player->getScore()['incorrect'] ?> incorrect</p>
    <?php } ?>

</div>

</body>
</html>
