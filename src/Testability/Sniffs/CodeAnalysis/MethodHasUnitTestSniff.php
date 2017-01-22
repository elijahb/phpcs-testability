<?php
namespace Testability\Sniffs\CodeAnalysis;

class MethodHasUnitTestSniff implements \PHP_CodeSniffer_Sniff
{
    public $testsNamespace = 'Tests';

    public function register()
    {
        return [
            T_FUNCTION
        ];
    }

    public function process(\PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $functionName = $tokens[$stackPtr + 2]['content'];
        $class = $phpcsFile->findPrevious(T_CLASS, $stackPtr);
        if($class) {
            $className = $tokens[$class + 2]['content'];
            $namespace = $tokens[$phpcsFile->findPrevious(T_NAMESPACE, $stackPtr) + 2]['content'];
            $testClass = "{$this->testsNamespace}\\$namespace\\{$className}Test";
            if (class_exists($testClass) && $namespace != 'Tests' ) {
                foreach (get_class_methods($testClass) as $method) {
                    if (strpos($method, 'test'.ucfirst($functionName)) === 0) {
                        return ;
                    }
                }
                $phpcsFile->addError("Missing unit test for method {$functionName}", $stackPtr);
            }
        }

    }
}
