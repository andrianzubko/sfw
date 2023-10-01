<?php require __DIR__ . '/.base.html.php' ?>

<?php $this->title = $this->config['name'] ?>

<?php $this->content = function () { ?>
  <p><?= $this->h($this->context['phrase']) ?></p>
<?php } ?>
