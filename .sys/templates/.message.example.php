<? require __DIR__ . '/.message.php' ?>

<? $this->body = function () { ?>
  <p><? $this->h($this->e['message']) ?></p>
<? } ?>
