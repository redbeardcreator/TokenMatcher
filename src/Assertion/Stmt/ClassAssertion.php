<?php

namespace RC\TokenMatcher\Assertion\Stmt;

use RC\TokenMatcher\Assertion\StmtAssertion;

class ClassAssertion extends StmtAssertion
{
    public function isClassDefinition()
    {
        return $this;
    }
}
