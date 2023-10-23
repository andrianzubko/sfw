<?php require __DIR__ . '/regular.html.php' ?>

<?php $this->title = $this->my['config']['name'] ?>

<?php $this->contents = function () { ?>
  <p><?= $this->h($this->context['phrase']) ?></p>
<?php } ?>
