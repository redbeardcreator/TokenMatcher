<?php

namespace RC\TokenMatcher\Assertion;

use RC\TokenMatcher\Assertion;

class ArgAssertion extends Assertion
{
    public function isArgument()
    {
        return $this;
    }
}
