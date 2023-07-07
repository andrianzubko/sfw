<?php

unlink('LICENSE');

unlink('README.md');

rename('composer.json', '.sys/composer.json');

rename('composer.lock', '.sys/composer.lock');

rename('vendor', '.sys/vendor');

mkdir('.merged');

chmod('.merged', 0777);

mkdir('.sys/var');

chmod('.sys/var', 0777);

require '.bin/index.php';

unlink(__FILE__);

exec('git init && git add . && git commit -m "new"');
