<?php

namespace RC\TokenMatcher\Assertion;

use RC\TokenMatcher\Assertion;

class ScalarAssertion extends Assertion
{
    public function isScalar()
    {
        return $this;
    }
}
