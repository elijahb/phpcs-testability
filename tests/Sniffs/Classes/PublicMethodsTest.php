<?php
namespace Testability\Tests\Sniffs\Classes;

use Testability\Tests\TestCase;

class PublicMethodsTest extends TestCase
{

    public function testRule()
    {
        $errorCount = $this->runner->detectErrorCountInFileForSniff(
            __DIR__.'/PublicMethodsExample.php',
            'Testability.Classes.PublicMethods'
        );
        $this->assertEquals(1, $errorCount);
    }

}
