<?php

namespace PHPSTORM_META {
    expectedArguments(\SFW\Base::my(0), 0,
        // add here your Lazy classes names for autocomplete
        'Environment',
    );

    override(\SFW\Base::my(0), map([
        '' => '\App\Lazy\My\@',
    ]));
}
