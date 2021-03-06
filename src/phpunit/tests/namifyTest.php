<?php

namespace tests;

use generators\caser;
use PHPUnit\Framework\TestCase;

class namifyTest extends TestCase
{
    public function setup(): void
    {
    }

    public function testNamify1()
    {
        $name = "a quick brown fox";
        $remove_prefix = false;
        $ucfirst = false;
        $glue = "";

        $caser = new caser();
        $name = $caser->namify($name, $remove_prefix, $ucfirst, $glue);

        $this->assertEquals("aquickbrownfox", $name);
    }

    public function testNamify2()
    {
        $name = "a quick brown fox";
        $remove_prefix = false;
        $ucfirst = false;
        $glue = "_";

        $caser = new caser();
        $name = $caser->namify($name, $remove_prefix, $ucfirst, $glue);

        $this->assertEquals("a_quick_brown_fox", $name);
    }

    public function testNamify3()
    {
        $name = "a quick brown fox";
        $remove_prefix = false;
        $ucfirst = true;
        $glue = "_";

        $caser = new caser();
        $name = $caser->namify($name, $remove_prefix, $ucfirst, $glue);

        $this->assertEquals("A_Quick_Brown_Fox", $name);
    }

    public function testNamify4()
    {
        $name = "a quick brown fox";
        $remove_prefix = false;
        $ucfirst = true;
        $glue = "";

        $caser = new caser();
        $name = $caser->namify($name, $remove_prefix, $ucfirst, $glue);

        $this->assertEquals("AQuickBrownFox", $name);
    }

    public function testNamify1RemovePrefix()
    {
        $name = "a quick brown fox";
        $remove_prefix = true;
        $ucfirst = false;
        $glue = "";

        $caser = new caser();
        $name = $caser->namify($name, $remove_prefix, $ucfirst, $glue);

        $this->assertEquals("quickbrownfox", $name);
    }

    public function testNamify2RemovePrefix()
    {
        $name = "a quick brown fox";
        $remove_prefix = true;
        $ucfirst = false;
        $glue = "_";

        $caser = new caser();
        $name = $caser->namify($name, $remove_prefix, $ucfirst, $glue);

        $this->assertEquals("quick_brown_fox", $name);
    }

    public function testNamify3RemovePrefix()
    {
        $name = "a quick brown fox";
        $remove_prefix = true;
        $ucfirst = true;
        $glue = "_";

        $caser = new caser();
        $name = $caser->namify($name, $remove_prefix, $ucfirst, $glue);

        $this->assertEquals("Quick_Brown_Fox", $name);
    }

    public function testNamify4RemovePrefix()
    {
        $name = "a quick brown fox";
        $remove_prefix = true;
        $ucfirst = true;
        $glue = "";

        $caser = new caser();
        $name = $caser->namify($name, $remove_prefix, $ucfirst, $glue);

        $this->assertEquals("QuickBrownFox", $name);
    }

    public function testNamify5RemovePrefix()
    {
        $name = "a quick brown fox";
        $remove_prefix = true;
        $ucfirst = true;
        $glue = "";

        $caser = new caser();
        $name = $caser->namify($name, $remove_prefix, $ucfirst, $glue);

        $this->assertEquals("QuickBrownFox", $name);
    }
}
