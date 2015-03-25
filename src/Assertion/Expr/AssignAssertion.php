<?php

namespace RC\TokenMatcher\Assertion\Expr;

use PhpParser\Node;
use RC\TokenMatcher\Assertion\ExprAssertion;

class AssignAssertion extends ExprAssertion
{
    public function isAssignment()
    {
        return $this;
    }
}
