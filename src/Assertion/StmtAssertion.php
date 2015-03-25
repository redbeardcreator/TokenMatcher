<?php

namespace RC\TokenMatcher\Assertion;

use PhpParser\Node;
use RC\TokenMatcher\Assertion;

class StmtAssertion extends Assertion
{
    public function isStatement()
    {
        return $this;
    }
}
