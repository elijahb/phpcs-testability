<?php
namespace Testability\Sniffs\Classes;

class NotCallOwnMethodSniff implements \PHP_CodeSniffer_Sniff
{
    public function register()
    {
        return [
            T_VARIABLE
        ];
    }

    public function process(\PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        if ($tokens[$stackPtr]['content'] == '$this') {
            if ($tokens[$stackPtr + 3]['code'] == T_OPEN_PARENTHESIS) {
                $phpcsFile->addError('Do not call methods of the same class, build a service and inject it instead', $stackPtr);
            }
        }
    }
}
