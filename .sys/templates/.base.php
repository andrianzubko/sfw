
<? $this->title = '' ?>

<? $this->main = function () { ?>
  <!DOCTYPE html>
  <html>
    <head>
      <? if (!$this->e['config']['robots']) { ?>
        <meta name="robots" content="noindex,nofollow">
      <? } ?>
      <meta name="viewport" content="width=device-width">
      <title><? $this->h($this->title) ?></title>
      <base href="<? $this->h($this->e['defaults']['basic_url']) ?>/">
      <link rel="stylesheet" type="text/css" href="/.merged/<? $this->s($this->e['defaults']['merged']) ?>.all.css">
    </head>
    <? $this->body() ?>
  </html>
<? } ?>

<? $this->body = function () { ?>
  <body>
    <div>
      <? $this->content() ?>
    </div>
    <script src="/.merged/<? $this->s($this->e['defaults']['merged']) ?>.all.js"></script>
  </body>
<? } ?>
