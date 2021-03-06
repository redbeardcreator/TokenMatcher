<?php

use RC\TokenMatcher\AssertionFactory as Factory;
use RC\TokenMatcher\Assertion;

$autoloaderPath = __DIR__ . '/../vendor/autoload.php';
echo $autoloaderPath . "\n";
require_once $autoloaderPath;

$source = __FILE__;
$code = file_get_contents($source);

$parser = new PhpParser\Parser(new PhpParser\Lexer\Emulative);
$statements = $parser->parse($code);

class TestIt
{
    private $privateVar;
    protected $protectedVar;
    public $publicVar;

    public function __construct($a)
    {
        $this->privateVar = $a;
    }

    public function publicMethod()
    {
        echo $this->privateVar;
        $this->protectedMethod();
        $this->privateMethod();
    }

    protected function protectedMethod()
    {
        return "Hello!";
    }

    private function privateMethod()
    {
        return "I'm private";
    }
}

$c = new TestIt("I'm a little teapot");
$c->publicMethod();

$af = new Factory;
$s = $statements;

function assertNode($node)
{
    $af = new Factory;
    return $af->createFromNode($node);
}

function failIf(Assertion $assertion)
{
    if ($assertion->passed()) {
        throw new RuntimeException('Node matched. Failing.');
    }

    return "Pass";
}

function succeedIf(Assertion $assertion)
{
    if (!$assertion->passed()) {
        throw new RuntimeException('Node did not match. Failing. ' .
                                   $assertion->getFailureText());
    }

    return "Pass";
}

echo "\n" . succeedIf(assertNode($s[0])->isUseStatement()) . "\n";

foreach ($s as $statement) {
    $assertion = assertNode($statement)->isCall();

    $isFC = $assertion->passed();
    printf("[%s] -> %s\n", get_class($statement), $isFC ? 'yes' : 'no');
}

ini_set('display_errors', true);
ini_set('cli.pager', 'less');

assertNode($s[0]);

function testDisplayErrors($node)
{
    failIf(
        assertNode($node)
        ->isFunctionCall('ini_set')
        ->withStringArg(0, 'display_errors')
    );
}

function render($nodes)
{
    if (!is_array($nodes)) {
        $nodes = [$nodes];
    }
    $prettyPrinter = new PhpParser\PrettyPrinter\Standard;
    return $prettyPrinter->prettyPrint($nodes);
}
