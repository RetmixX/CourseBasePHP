<?php include __DIR__ . '/../header.php'; ?>
<h1><?=$article->getTitle() ?></h1>
<p><?= $article->getText() ?></p>
<p>Автор: <?=$article->getAuthorId()[0]->getNickname()?></p>
<?php include __DIR__ . '/../footer.php'; ?>
