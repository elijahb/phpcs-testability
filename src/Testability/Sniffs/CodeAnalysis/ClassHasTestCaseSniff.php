<?php
namespace Testability\Sniffs\CodeAnalysis;

class ClassHasTestCaseSniff implements \PHP_CodeSniffer_Sniff
{
    public $testsNamespace = 'Tests';

    public function register()
    {
        return [
            T_CLASS
        ];
    }

    public function process(\PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $class = $tokens[$stackPtr + 2]['content'];
        $namespace = $tokens[$phpcsFile->findPrevious(T_NAMESPACE, $stackPtr) + 2]['content'];
        if (!class_exists("{$this->testsNamespace}\\$namespace\\{$class}Test") && $namespace != 'Tests' ) {
            $phpcsFile->addError("Test case for {$class} missing or wasn't loaded", $stackPtr);
        }
    }
}
