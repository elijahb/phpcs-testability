<?php
namespace Testability\Tests\Sniffs\Classes;

use Testability\Tests\TestCase;

class NotCallStaticTest extends TestCase
{

    public function testRule()
    {
        $errorCount = $this->runner->detectErrorCountInFileForSniff(
            __DIR__.'/NotCallStaticExample.php',
            'Testability.Classes.NotCallStatic'
        );
        $this->assertEquals(1, $errorCount);
    }

}
