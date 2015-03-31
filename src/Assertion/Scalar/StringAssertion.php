<?php

namespace RC\TokenMatcher\Assertion\Scalar;

use RC\TokenMatcher\Assertion\ScalarAssertion;

class StringAssertion extends ScalarAssertion
{
    public function isString()
    {
        return $this;
    }

    public function withValue($value)
    {
        if ($this->node->value !== $value) {
            $this->assert('String did not match value');
        }
        return $this;
    }
}
