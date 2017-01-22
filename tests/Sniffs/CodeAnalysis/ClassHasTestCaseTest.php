<?php
namespace Testability\Tests\Sniffs\CodeAnalysis;

use Testability\Tests\TestCase;

class ClassHasTestCaseTest extends TestCase
{

    public function  setUp()
    {
        parent::setUp();
        require_once __DIR__.'/ClassHasTestCaseExample.php';
    }

    public function testRule()
    {
        $errorCount = $this->runner->detectErrorCountInFileForSniff(
            __DIR__.'/ClassHasTestCaseExample.php',
            'Testability.CodeAnalysis.ClassHasTestCase'
        );
        $this->assertEquals(1, $errorCount);
    }

}
