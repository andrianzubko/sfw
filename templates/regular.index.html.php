<?php require __DIR__ . '/regular.html.php' ?>

<?php $this->title = $this->config['name'] ?>

<?php $this->content = function () { ?>
  <p><?= $this->h($this->context['phrase']) ?></p>
<?php } ?>
