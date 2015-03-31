<?php

namespace RC\TokenMatcher\Assertion;

use RC\TokenMatcher\Assertion;

class NameAssertion extends Assertion
{
    public function isName()
    {
        return $this;
    }
}
