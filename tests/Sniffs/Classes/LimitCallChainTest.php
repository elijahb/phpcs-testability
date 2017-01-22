<?php
namespace Testability\Tests\Sniffs\Classes;

use Testability\Tests\TestCase;

class LimitCallChainTest extends TestCase
{

    public function testRule()
    {
        $errorCount = $this->runner->detectErrorCountInFileForSniff(
            __DIR__.'/LimitCallChainExample.php',
            'Testability.Classes.LimitCallChain'
        );
        $this->assertEquals(1, $errorCount);
    }

}
