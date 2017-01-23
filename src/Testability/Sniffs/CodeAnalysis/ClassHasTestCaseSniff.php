<?php
namespace Testability\Sniffs\CodeAnalysis;

class ClassHasTestCaseSniff implements \PHP_CodeSniffer_Sniff
{
    use NamespaceHelperTrait;

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

        if ($tokens[$stackPtr - 2] && $tokens[$stackPtr - 2]['code'] != T_ABSTRACT) {

            $namespaceName = $this->getNamespace($phpcsFile, $stackPtr);

            if (!class_exists("{$this->testsNamespace}\\$namespaceName\\{$class}Test") && strpos($namespaceName, $this->testsNamespace) !== 0) {
                $phpcsFile->addError("Test case for {$class} missing or wasn't loaded", $stackPtr);
            }
        }
    }
}
