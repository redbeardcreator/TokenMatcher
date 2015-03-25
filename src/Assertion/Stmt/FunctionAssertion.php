<?php

namespace RC\TokenMatcher\Assertion\Stmt;

use RC\TokenMatcher\Assertion\StmtAssertion;

class FunctionAssertion extends StmtAssertion
{
    public function isFunctionDefinition()
    {
        return $this;
    }
}
