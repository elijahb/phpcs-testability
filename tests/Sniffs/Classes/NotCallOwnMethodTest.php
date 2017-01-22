<?php
namespace Testability\Tests\Sniffs\Classes;

use Testability\Tests\TestCase;

class NotCallOwnMethodTest extends TestCase
{

    public function testRule()
    {
        $errorCount = $this->runner->detectErrorCountInFileForSniff(
            __DIR__.'/NotCallOwnMethodExample.php',
            'Testability.Classes.NotCallOwnMethod'
        );
        $this->assertEquals(1, $errorCount);
    }

}
