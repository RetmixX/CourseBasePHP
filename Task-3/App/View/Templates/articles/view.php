<?php include __DIR__ . '/../header.php'; ?>
<h1><?=$article->getTitle() ?></h1>
<p><?= $article->getText() ?></p>
<p>Автор: <?=$article->getAuthorId()[0]->getNickname()?></p>

<?php if ($user[0] !== null && $user[0]->getRole()!=3): ?>
    <a href="/article/edit/<?= $article->getId() ?>">Редактировать</a>
<?php endif; ?>
<?php include __DIR__ . '/../footer.php'; ?>
