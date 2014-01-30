<?php

namespace What\A\SpecialNamespace
{
    class Test1
    {
        protected $var1;
        protected $var2;

        public function __construct()
        {

        }
    }

    class Test2 {}

    class Test3
    {
        protected function testMethod() {}
    }
}

namespace Yet\Another\SpecialNamespace
{
    use What\A\SpecialNamespace;

    class Test4 extends SpecialNamespace\Test1
    {
        protected $var5;
        protected $var6;
        protected $var7;
    }

    class Test5 extends SpecialNamespace\Test2
    {

    }
}