<?php

unlink('LICENSE');

unlink('README.md');

mkdir('var');

chmod('var', 0777);

unlink(__FILE__);

exec('git init && git add . && git commit -m "new"');
