<?php require __DIR__ . '/notify.html.php' ?>

<?php $this->body = function () { ?>
  <p><?= $this->h($this->context['message']) ?></p>
<?php } ?>
