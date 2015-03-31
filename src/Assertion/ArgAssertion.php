<?php

namespace RC\TokenMatcher\Assertion;

use RC\TokenMatcher\Assertion;

class ArgAssertion extends Assertion
{
    public function isArgument()
    {
        return $this;
    }

    public function getValue()
    {
        return $this->factory->createFromNode($this->node->value);
    }
}
