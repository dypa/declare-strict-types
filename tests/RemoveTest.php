<?php

use Dypa\DeclareStrictTypes\Strategy\Remove;
use PHPUnit\Framework\TestCase as PHPUnit_Framework_TestCase;

class RemoveTest extends PHPUnit_Framework_TestCase
{
    private $strategy;

    public function setUp()
    {
        $this->strategy = new Remove();
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
            "<?php\n",
            ($this->strategy)("<?php\ndeclare(strict_types=1);\n\n")
        );
    }

    public function testClass()
    {
        $this->assertEquals(
            "<?php\nnamespace Foo;\nclass Foo{}\n",
            ($this->strategy)("<?php\ndeclare(strict_types=1);\nnamespace Foo;\nclass Foo{}\n")
        );
    }

    public function testPhpPhp()
    {
        $this->assertEquals(
            "<?php\necho 1;\n?>\n2\n<?php\necho 3;\n",
            ($this->strategy)("<?php\ndeclare(strict_types=1);\necho 1;\n?>\n2\n<?php\necho 3;\n")
        );
    }
    public function testPhpDoc()
    {
        $this->assertEquals(
            "<?php\n/**\n*/",
            ($this->strategy)("<?php\ndeclare(strict_types=1);\n/**\n*/")
        );
    }
}
