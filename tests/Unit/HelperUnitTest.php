<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class HelperUnitTest extends TestCase
{

    public function test_slug()
    {
        $title = 'money and tech';
        $slug = SLUG($title);
        $this->assertEquals($slug,'money-and-tech');
    }
}
