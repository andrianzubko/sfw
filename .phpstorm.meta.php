<?php

namespace PHPSTORM_META {
    expectedArguments(\SFW\Base::my(0), 0,
        'Defaults',
    );

    override(\SFW\Base::my(0), map([
        '' => '\App\Lazy\My\@',
    ]));
}
