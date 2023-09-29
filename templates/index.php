<?php require __DIR__ . '/.base.php' ?>

<?php $this->title = $this->config['name'] ?>

<?php $this->content = function () { ?>
  <p><?= $this->h($this->context['phrase']) ?></p>
<?php } ?>
