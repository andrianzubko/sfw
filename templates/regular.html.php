
<?php $this->title = '' ?>

<?php $this->main = function () { ?>
  <!DOCTYPE html>
  <html>
    <head>
      <?php if (!$this->my['config']['robots']) { ?>
        <meta name="robots" content="noindex,nofollow">
      <?php } ?>
      <title><?= $this->h($this->title) ?></title>
      <base href="<?= $this->sys['url'] ?>">
      <link rel="stylesheet" type="text/css" href="<?= $this->sys['merged']['all.css'] ?>">
      <link rel="shortcut icon" href="/.media/favicon.ico">
    </head>
    <body>
      <div>
        <?php $this->contents() ?>
      </div>
      <script src="<?= $this->sys['merged']['all.js'] ?>"></script>
    </body>
  </html>
<?php } ?>
