<?php

use Dypa\DeclareStrictTypes\Strategy\Add;
use PHPUnit\Framework\TestCase as PHPUnit_Framework_TestCase;

class AddTest extends PHPUnit_Framework_TestCase
{
    private $strategy;

    public function setUp()
    {
        $this->strategy = new Add();
    }

    public function testNonPhp()
    {
        $this->assertEquals(
            'some text',
            ($this->strategy)('some text')
        );
    }

    public function testEmptyPhp()
    {
        $this->assertEquals(
            "<?php\n\ndeclare(strict_types=1);\n",
            ($this->strategy)("<?php\n\n")
        );
    }

    public function testClass()
    {
        $this->assertEquals(
            "<?php\ndeclare(strict_types=1);\nnamespace Foo;\nclass Foo{}\n",
            ($this->strategy)("<?php\nnamespace Foo;\nclass Foo{}\n")
        );
    }

    public function testPhpPhp()
    {
        $this->assertEquals(
            "<?php\ndeclare(strict_types=1);\necho 1;\n?>\n2\n<?php\necho 3;\n",
            ($this->strategy)("<?php\necho 1;\n?>\n2\n<?php\necho 3;\n")
        );
    }
    public function testPhpDoc()
    {
        $this->assertEquals(
            "<?php\ndeclare(strict_types=1);\n/**\n*/",
            ($this->strategy)("<?php\n/**\n*/")
        );
    }

    public function testWhenDeclareDoNothing()
    {
        $this->assertEquals(
            "<?php\n\n\ndeclare(strict_types=1);\n",
            ($this->strategy)("<?php\n\n\ndeclare(strict_types=1);\n")
        );
    }

    public function testWindowsRn()
    {
        $this->assertEquals(
            "<?php\r\ndeclare(strict_types=1);\n",
            ($this->strategy)("<?php\r\n")
        );
    }
}