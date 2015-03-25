<?php

namespace RC\TokenMatcher\Assertion\Stmt;

use RC\TokenMatcher\Assertion\StmtAssertion;

class UseAssertion extends StmtAssertion
{
    public function isUseStatement()
    {
        return $this;
    }
}
