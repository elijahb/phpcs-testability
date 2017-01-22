<?php
namespace Testability\Sniffs\Classes;

class NotCallStaticSniff implements \PHP_CodeSniffer_Sniff
{
    public function register()
    {
        return [
            T_DOUBLE_COLON
        ];
    }

    public function process(\PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        if (strpos($tokens[$stackPtr + 1]['content'], '$') !== 0) {
            $class = $tokens[$stackPtr - 1]['content'];
            $phpcsFile->addError('Do not call static methods, use dependency injection for ' . $class, $stackPtr);
        }
    }
}
