<?php

namespace RC\TokenMatcher\Assertion\Expr;

use RC\TokenMatcher\Assertion\ExprAssertion;

class FuncCallAssertion extends ExprAssertion
{
    public function isCall()
    {
        return $this;
    }

    public function isFunctionCall()
    {
        return $this;
    }
}
