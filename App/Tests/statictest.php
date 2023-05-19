<?php

class Test
{

    private static $test;


    public static function FirstTest(string $testString)
    {
        self::$test = $testString;
    }

    public static function GetResults()
    {
        return self::$test;
    }
}


Test::FirstTest("Peter");

echo Test::GetResults();