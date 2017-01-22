<?php
namespace Testability\Tests;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    protected $runner;

    public function __construct()
    {
        parent::__construct();
        $this->runner = new CodeSnifferRunner();
    }

}
