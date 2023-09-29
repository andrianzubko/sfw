<?php require __DIR__ . '/.message.php' ?>

<?php $this->body = function () { ?>
  <p><?= $this->h($this->context['message']) ?></p>
<?php } ?>
