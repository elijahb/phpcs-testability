# PHP CodeSniffer - Sniffs for testable code

## Introduction

This project provides sniffs for some design patterns that improve
unit test code testability:

* Use dependency injection (do not create instances using **new**)
* Limit the length for a call chain ($this->property->service->method->troubles)
* Do not call methods of the same class (this is a sign that your code is too complicated and you should split it
in different services)
* Not use static calls (Service::method())
* Use only public methods (private methods cannot be really unit tested, and they indicate that you should be thinking about
creating a new service)

It also provides two other sniffs, useful for CI environments:

* Check that a test case exists for every class
* Check that there is at least one test for every method

## How to use

1. Install [PHPCodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
2. Install phpcs-testability using Composer

```
composer require --dev elijahb/phpcs-testability
```

3. Add the standard to your custom PHPCodeSniffer ruleset.xml file

```
<rule ref="./vendor/elijahb/phpcs-testability"/>

```

## Recommendations

You could also use another two sniffs to complement the ones in this projects:

* Generic.Metrics.NestingLevel (with a nesting level of 2)
* Generic.Metrics.CyclomaticComplexity (with a complexity level of 3)

Using all this sniffs, ideally inside a CI environment, you will be assured
to have maintainable and fully unit tested code.
