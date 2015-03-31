<?php

namespace RC\TokenMatcher\Assertion;

use RC\TokenMatcher\Assertion;

class ParamAssertion extends Assertion
{
    public function isParam()
    {
        return $this;
    }
}
