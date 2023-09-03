
<?php $this->title = '' ?>

<?php $this->main = function () { ?>
  <!DOCTYPE html>
  <html>
    <head>
      <?php if (!$this->e['config']['robots']) { ?>
        <meta name="robots" content="noindex,nofollow">
      <?php } ?>
      <meta name="viewport" content="width=device-width">
      <title><?= $this->h($this->title) ?></title>
      <base href="<?= $this->h($this->e['sys']['url']) ?>/">
      <link rel="stylesheet" type="text/css" href="<?= $this->e['sys']['merged']['all.css'] ?>">
      <link rel="shortcut icon" href="/.media/favicon.ico">
    </head>
    <?php $this->body() ?>
  </html>
<?php } ?>

<?php $this->body = function () { ?>
  <body>
    <div>
      <?php $this->content() ?>
    </div>
    <script src="<?= $this->e['sys']['merged']['all.js'] ?>"></script>
  </body>
<?php } ?>
