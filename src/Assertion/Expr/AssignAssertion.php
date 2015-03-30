<?php

namespace RC\TokenMatcher\Assertion\Expr;

use RC\TokenMatcher\Assertion\ExprAssertion;

class AssignAssertion extends ExprAssertion
{
    public function isAssignment()
    {
        return $this;
    }
}
