WARNING
=======

Code in early development. Expect API to change.

TokenMatcher
============

TokenMatcher is intended to be a simple wrapper around PhpParser. The hope is to simplify the use
of that wonderful library when you are trying to assert whether a given node matches a particular
set of criteria.

In working on [Parse](https://github.com/psecio/parse), we have [made
complaints](https://github.com/psecio/parse/issues/24) on occasion about how difficult it can be
to use [PhpParser](https://github.com/nikic/PHP-Parser), at least in our particular case. So I
took it upon myself to wrap PhpParser with something that is hopefully a bit easier to use.

Current State
-------------

Right now, TokenMaster is in the experimental stages, although I believe I've got a good start.

Use
---

So, how to use it? I'm still working on defining that. However, the general flow will be
something like:

```php
use RC\TokenMatcher\AssertionFactory;

$assertionFactory = new AssertionFactory;

$parser = new PhpParser\Parser(new PhpParser\Lexer\Emulative);
$statements = $parser->parse($code);

$assertion = $assertionFactory->createFromNode($statements[0]);
$assertion->isFunctionCall();

if ($assertion->passed()) {
    echo "Success!";
} else {
    echo "Failure!";
}
```

You can look in `Examples/Sample.php` to see an idea for a more fluent flow.

I've been experimenting using [PsySH](http://psysh.org/). I'll start it and include
`examples\Sample.php`. Then I start poking at things. PsySH is currently a development dependency,
so it can be invoked from the root with `vendor/bin/psysh'. However, this will go away as soon as
I've settled on the core API. At that point I'll start focusing on unit tests instead.
