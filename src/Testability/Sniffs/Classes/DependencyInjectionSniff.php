<?php
namespace Testability\Sniffs\Classes;

class DependencyInjectionSniff implements \PHP_CodeSniffer_Sniff
{
    public function register()
    {
        return [
            T_NEW
        ];
    }

    public function process(\PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $class = $tokens[$stackPtr + 2]['content'];
        $throw = $tokens[$stackPtr - 2];
        if ($throw && $throw['content'] != 'throw') {
            $phpcsFile->addError('Use dependency injection for ' . $class, $stackPtr);
        }
    }
}
