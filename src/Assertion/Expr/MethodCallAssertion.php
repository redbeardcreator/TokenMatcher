<?php

namespace RC\TokenMatcher\Assertion\Expr;

use RC\TokenMatcher\Assertion\ExprAssertion;

class MethodCallAssertion extends ExprAssertion
{
    public function isCall()
    {
        return $this;
    }

    public function isMethodCall()
    {
        return $this;
    }
}
