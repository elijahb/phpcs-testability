<?php
namespace Testability\Tests\Sniffs\CodeAnalysis;

use Testability\Tests\TestCase;

class MethodHasUnitTestTest extends TestCase
{

    public function  setUp()
    {
        parent::setUp();
        require_once __DIR__.'/MethodHasUnitTestExample.php';
    }

    public function testRule()
    {
        $errorCount = $this->runner->detectErrorCountInFileForSniff(
            __DIR__.'/MethodHasUnitTestExample.php',
            'Testability.CodeAnalysis.MethodHasUnitTest'
        );
        $this->assertEquals(1, $errorCount);
    }

}
