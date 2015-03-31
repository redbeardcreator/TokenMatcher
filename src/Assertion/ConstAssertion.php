<?php

namespace RC\TokenMatcher\Assertion;

use RC\TokenMatcher\Assertion;

class ConstAssertion extends Assertion
{
    public function isConstant()
    {
        return $this;
    }
}
