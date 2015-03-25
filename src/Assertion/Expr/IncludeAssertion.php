<?php

namespace RC\TokenMatcher\Assertion\Expr;

use RC\TokenMatcher\Assertion\ExprAssertion;

class IncludeAssertion extends ExprAssertion
{
    public function isIncludeStatement()
    {
        return $this;
    }
}
