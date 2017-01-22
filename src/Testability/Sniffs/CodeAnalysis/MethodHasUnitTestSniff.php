<?php
namespace Testability\Sniffs\CodeAnalysis;

class MethodHasUnitTestSniff implements \PHP_CodeSniffer_Sniff
{
    use NamespaceHelperTrait;

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
        if($class && $functionName != '__construct') {
            $className = $tokens[$class + 2]['content'];
            $namespaceName = $this->getNamespace($phpcsFile, $stackPtr);

            $testClass = "{$this->testsNamespace}\\$namespaceName\\{$className}Test";
            if (class_exists($testClass) && strpos($namespaceName, $this->testsNamespace) !== 0 ) {
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
