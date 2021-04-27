<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/app.css">

    <title>Laravel</title>
</head>
<body>
    <?php foreach ($posts as $post): ?>
        <h1>
            <a href="/posts/<?= $post->slug ?>">
                <?= $post->title ?>
            </a>
        </h1>

        <div><?= $post->excerpt ?></div>
    <?php endforeach; ?>
</body>
</html>
