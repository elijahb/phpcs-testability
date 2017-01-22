<?php
namespace Testability\Sniffs\Classes;

class LimitCallChainSniff implements \PHP_CodeSniffer_Sniff
{
    public $limit = 1;

    public function register()
    {
        return [
            T_VARIABLE
        ];
    }

    public function process(\PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        if ($tokens[$stackPtr + 1 ]['code'] != T_OBJECT_OPERATOR) {
            return ;
        }
        $lastPoint = $stackPtr;
        $deep = 0;

        if ($tokens[$stackPtr]['content'] == '$this') {
            $deep = -1;
        }

        do {
            if ($tokens[$lastPoint]['code'] == T_OBJECT_OPERATOR) {
                $deep ++;
            }
            $lastPoint ++;
        } while (!in_array($tokens[$lastPoint]['code'], [T_SEMICOLON, T_OPEN_PARENTHESIS, T_CLOSE_PARENTHESIS]));

        if ($deep > $this->limit) {
            $phpcsFile->addError('Do not chain properties, build a getter/setter instead', $stackPtr);
        }
    }
}
