<?php

namespace Tests\Recurr\Transformer\Filter;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Recurr\Transformer\Constraint\BeforeConstraint;

class BeforeConstraintTest extends TestCase
{
    public function testBefore(): void
    {
        $before = new Carbon('2014-06-17');

        $constraint = new BeforeConstraint($before, false);
        $testResult = $constraint->test(new Carbon('2014-06-17'));

        $this->assertFalse($testResult);
    }

    public function testBeforeInc(): void
    {
        $before = new Carbon('2014-06-17');

        $constraint = new BeforeConstraint($before, true);
        $testResult = $constraint->test(new Carbon('2014-06-17'));

        $this->assertTrue($testResult);
    }
}
