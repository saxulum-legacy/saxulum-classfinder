<?php

namespace Saxulum\Tests\ClassFinder;

use Saxulum\ClassFinder\ClassFinder;

class ClassFinderTest extends \PHPUnit_Framework_TestCase
{
    public function testClassFinder()
    {
        $phpCode = file_get_contents(__DIR__ . '/data/Sample.php');
        $classes = ClassFinder::findClasses($phpCode);

        $this->assertCount(10, $classes);
        $this->assertEquals('What\A\SpecialNamespace\Test1', $classes[0]);
        $this->assertEquals('What\A\SpecialNamespace\Test2', $classes[1]);
        $this->assertEquals('What\A\SpecialNamespace\Test3', $classes[2]);
        $this->assertEquals('Yet\Another\SpecialNamespace\Test4', $classes[3]);
        $this->assertEquals('Yet\Another\SpecialNamespace\Test5', $classes[4]);
        $this->assertEquals('Single\Line\Test\X', $classes[5]);
        $this->assertEquals('Add\More\LineBreaks\Y', $classes[6]);
        $this->assertEquals('Add\More\LineBreaks\Z', $classes[7]);
        $this->assertEquals('Without\Braces\SomeClass', $classes[8]);
        $this->assertEquals('Another\Without\Braces\WhatAClass', $classes[9]);
    }
}
