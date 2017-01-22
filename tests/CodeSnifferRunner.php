<?php
namespace Testability\Tests;

use PHP_CodeSniffer;

class CodeSnifferRunner
{
    /**
     * @var PHP_CodeSniffer
     */
    protected $codeSniffer;

    public function __construct()
    {
        $this->codeSniffer = new PHP_CodeSniffer();
    }

    public function detectErrorCountInFileForSniff($testedFile, $sniffName)
    {
        return $this->processCodeSniffer($testedFile, $sniffName)->getErrorCount();
    }

    private function processCodeSniffer($testedFile, $sniffName)
    {
        $this->codeSniffer->initStandard(__DIR__.'/../src/Testability', [$sniffName]);
        return $this->codeSniffer->processFile($testedFile);
    }
}
