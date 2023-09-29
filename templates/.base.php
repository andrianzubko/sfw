
<?php $this->title = '' ?>

<?php $this->main = function () { ?>
  <!DOCTYPE html>
  <html>
    <head>
      <?php $this->head() ?>
    </head>
    <body>
      <?php $this->body() ?>
    </body>
  </html>
<?php } ?>

<?php $this->head = function () { ?>
  <?php if (!$this->config['robots']) { ?>
    <meta name="robots" content="noindex,nofollow">
  <?php } ?>
  <meta name="viewport" content="width=device-width">
  <title><?= $this->h($this->title) ?></title>
  <base href="<?= $this->sys['url'] ?>">
  <link rel="stylesheet" type="text/css" href="<?= $this->sys['merged']['all.css'] ?>">
  <link rel="shortcut icon" href="/.media/favicon.ico">
<?php } ?>

<?php $this->body = function () { ?>
  <div>
    <?php $this->content() ?>
  </div>
  <script src="<?= $this->sys['merged']['all.js'] ?>"></script>
<?php } ?>
