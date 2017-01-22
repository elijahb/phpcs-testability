<?php
namespace Testability\Sniffs\Classes;

class PublicMethodsSniff implements \PHP_CodeSniffer_Sniff
{
    public function register()
    {
        return [
            T_PRIVATE
        ];
    }

    public function process(\PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $method = $tokens[$stackPtr + 2];
        if ($method && $method['code'] == T_FUNCTION) {
            $phpcsFile->addError("Refactor {$method['content']} to be public of some other service", $stackPtr);
        }
    }
}
