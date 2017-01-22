<?php
namespace Testability\Sniffs\CodeAnalysis;

trait NamespaceHelperTrait
{
    public function getNamespace(\PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $index = $phpcsFile->findPrevious(T_NAMESPACE, $stackPtr) + 2;
        $namespaceName = '';
        do {
            $namespaceName .= $tokens[$index]['content'];
            $index ++;
        } while (!in_array($tokens[$index]['code'], [T_SEMICOLON, T_OPEN_CURLY_BRACKET, T_WHITESPACE]));

        return $namespaceName;
    }
}