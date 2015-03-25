<?php

namespace RC\TokenMatcher\Assertion\Stmt;

use RC\TokenMatcher\Assertion\StmtAssertion;

class EchoAssertion extends StmtAssertion
{
    public function isEchoStatement()
    {
        return $this;
    }
}
