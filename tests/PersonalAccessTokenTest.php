<?php

namespace Laravel\Sanctum\Tests;

use PHPUnit\Framework\TestCase;
use Laravel\Sanctum\PersonalAccessToken;

class PersonalAccessTokenTest extends TestCase
{
    public function testCanDetermineWhatItCanAndCantDo()
    {
        $token = new PersonalAccessToken;

        $token->abilities = [];

        $this->assertFalse($token->can('foo'));

        $token->abilities = ['foo'];

        $this->assertTrue($token->can('foo'));
        $this->assertFalse($token->can('bar'));
        $this->assertTrue($token->cant('bar'));
        $this->assertFalse($token->cant('foo'));

        $token->abilities = ['foo', '*'];

        $this->assertTrue($token->can('foo'));
        $this->assertTrue($token->can('bar'));
    }
}
