<?php
namespace Testability\Tests\Sniffs\Classes;

use Testability\Tests\TestCase;

class DependencyInjectionTest extends TestCase
{

    public function testRule()
    {
        $errorCount = $this->runner->detectErrorCountInFileForSniff(
            __DIR__.'/DependencyInjectionExample.php',
            'Testability.Classes.DependencyInjection'
        );
        $this->assertEquals(1, $errorCount);
    }

}
