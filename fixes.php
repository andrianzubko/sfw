<?php

unlink(__FILE__);

unlink('LICENSE');

unlink('README.md');

rename('composer.json', '.sys/composer.json');

rename('composer.lock', '.sys/composer.lock');

rename('vendor', '.sys/vendor');

mkdir('.merged', 0777);

mkdir('.sys/locks', 0777);

chmod('.sys/log', 0777);

exec('git init && git add . && git commit -m "new"');
