<?php

namespace RC\TokenMatcher\Assertion;

use PhpParser\Node;
use RC\TokenMatcher\Assertion;

class ExprAssertion extends Assertion
{
    public function isExpression()
    {
        return $this;
    }
}
