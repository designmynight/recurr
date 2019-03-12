<?php

namespace Recurr\Test\Transformer\Filter;

use Carbon\Carbon;
use Recurr\Transformer\Constraint\BetweenConstraint;

class BetweenConstraintTest extends \PHPUnit_Framework_TestCase
{
    public function testBetween()
    {
        $after  = new Carbon('2014-06-10');
        $before = new Carbon('2014-06-17');

        $constraint = new BetweenConstraint($after, $before, false);
        $testResult = $constraint->test(new Carbon('2014-06-17'));

        $this->assertFalse($testResult);
    }

    public function testBetweenInc()
    {
        $after  = new Carbon('2014-06-10');
        $before = new Carbon('2014-06-17');

        $constraint = new BetweenConstraint($after, $before, true);
        $testResult = $constraint->test(new Carbon('2014-06-17'));

        $this->assertTrue($testResult);
    }
}
