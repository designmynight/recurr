<?php

namespace Tests\Recurr;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Recurr\Recurrence;
use Recurr\RecurrenceCollection;

class RecurrenceCollectionTest extends TestCase
{
    protected RecurrenceCollection $collection;

    public function setUp(): void
    {
        $this->collection = new RecurrenceCollection(
            [
                new Recurrence(new Carbon('2014-01-01'), new Carbon('2014-01-15')),
                new Recurrence(new Carbon('2014-02-01'), new Carbon('2014-02-15')),
                new Recurrence(new Carbon('2014-03-01'), new Carbon('2014-03-15')),
                new Recurrence(new Carbon('2014-04-01'), new Carbon('2014-04-15')),
                new Recurrence(new Carbon('2014-05-01'), new Carbon('2014-05-15')),
            ]
        );
    }

    public function testStartsBetween(): void
    {
        $expected = [
            new Recurrence(new Carbon('2014-02-01'), new Carbon('2014-02-15')),
            new Recurrence(new Carbon('2014-03-01'), new Carbon('2014-03-15')),
            new Recurrence(new Carbon('2014-04-01'), new Carbon('2014-04-15')),
        ];

        $after = new Carbon('2014-01-01');
        $before = new Carbon('2014-05-01');
        $result = $this->collection->startsBetween($after, $before);

        $this->assertEquals($expected, array_values($result->toArray()));
    }

    public function testStartsBetweenInc(): void
    {
        $expected = [
            new Recurrence(new Carbon('2014-01-01'), new Carbon('2014-01-15')),
            new Recurrence(new Carbon('2014-02-01'), new Carbon('2014-02-15')),
            new Recurrence(new Carbon('2014-03-01'), new Carbon('2014-03-15')),
            new Recurrence(new Carbon('2014-04-01'), new Carbon('2014-04-15')),
            new Recurrence(new Carbon('2014-05-01'), new Carbon('2014-05-15')),
        ];

        $after = new Carbon('2014-01-01');
        $before = new Carbon('2014-05-01');
        $result = $this->collection->startsBetween($after, $before, true);

        $this->assertEquals($expected, array_values($result->toArray()));
    }

    public function testStartsBefore(): void
    {
        $expected = [
            new Recurrence(new Carbon('2014-01-01'), new Carbon('2014-01-15')),
            new Recurrence(new Carbon('2014-02-01'), new Carbon('2014-02-15')),
        ];

        $result = $this->collection->startsBefore(new Carbon('2014-03-01'));

        $this->assertEquals($expected, array_values($result->toArray()));
    }

    public function testStartsBeforeInc(): void
    {
        $expected = [
            new Recurrence(new Carbon('2014-01-01'), new Carbon('2014-01-15')),
            new Recurrence(new Carbon('2014-02-01'), new Carbon('2014-02-15')),
            new Recurrence(new Carbon('2014-03-01'), new Carbon('2014-03-15')),
        ];

        $result = $this->collection->startsBefore(new Carbon('2014-03-01'), true);

        $this->assertEquals($expected, array_values($result->toArray()));
    }

    public function testStartsAfter(): void
    {
        $expected = [
            new Recurrence(new Carbon('2014-04-01'), new Carbon('2014-04-15')),
            new Recurrence(new Carbon('2014-05-01'), new Carbon('2014-05-15')),
        ];

        $result = $this->collection->startsAfter(new Carbon('2014-03-01'));

        $this->assertEquals($expected, array_values($result->toArray()));
    }

    public function testStartsAfterInc(): void
    {
        $expected = [
            new Recurrence(new Carbon('2014-03-01'), new Carbon('2014-03-15')),
            new Recurrence(new Carbon('2014-04-01'), new Carbon('2014-04-15')),
            new Recurrence(new Carbon('2014-05-01'), new Carbon('2014-05-15')),
        ];

        $result = $this->collection->startsAfter(new Carbon('2014-03-01'), true);

        $this->assertEquals($expected, array_values($result->toArray()));
    }

    public function testEndsBetween(): void
    {
        $expected = [
            new Recurrence(new Carbon('2014-02-01'), new Carbon('2014-02-15')),
            new Recurrence(new Carbon('2014-03-01'), new Carbon('2014-03-15')),
            new Recurrence(new Carbon('2014-04-01'), new Carbon('2014-04-15')),
        ];

        $after = new Carbon('2014-01-15');
        $before = new Carbon('2014-05-15');
        $result = $this->collection->endsBetween($after, $before);

        $this->assertEquals($expected, array_values($result->toArray()));
    }

    public function testEndsBetweenInc(): void
    {
        $expected = [
            new Recurrence(new Carbon('2014-01-01'), new Carbon('2014-01-15')),
            new Recurrence(new Carbon('2014-02-01'), new Carbon('2014-02-15')),
            new Recurrence(new Carbon('2014-03-01'), new Carbon('2014-03-15')),
            new Recurrence(new Carbon('2014-04-01'), new Carbon('2014-04-15')),
            new Recurrence(new Carbon('2014-05-01'), new Carbon('2014-05-15')),
        ];

        $after = new Carbon('2014-01-15');
        $before = new Carbon('2014-05-15');
        $result = $this->collection->endsBetween($after, $before, true);

        $this->assertEquals($expected, array_values($result->toArray()));
    }

    public function testEndsBefore(): void
    {
        $expected = [
            new Recurrence(new Carbon('2014-01-01'), new Carbon('2014-01-15')),
            new Recurrence(new Carbon('2014-02-01'), new Carbon('2014-02-15')),
        ];

        $result = $this->collection->endsBefore(new Carbon('2014-03-15'));

        $this->assertEquals($expected, array_values($result->toArray()));
    }

    public function testEndsBeforeInc(): void
    {
        $expected = [
            new Recurrence(new Carbon('2014-01-01'), new Carbon('2014-01-15')),
            new Recurrence(new Carbon('2014-02-01'), new Carbon('2014-02-15')),
            new Recurrence(new Carbon('2014-03-01'), new Carbon('2014-03-15')),
        ];

        $result = $this->collection->endsBefore(new Carbon('2014-03-15'), true);

        $this->assertEquals($expected, array_values($result->toArray()));
    }

    public function testEndsAfter(): void
    {
        $expected = [
            new Recurrence(new Carbon('2014-04-01'), new Carbon('2014-04-15')),
            new Recurrence(new Carbon('2014-05-01'), new Carbon('2014-05-15')),
        ];

        $result = $this->collection->endsAfter(new Carbon('2014-03-15'));

        $this->assertEquals($expected, array_values($result->toArray()));
    }

    public function testEndsAfterInc(): void
    {
        $expected = [
            new Recurrence(new Carbon('2014-03-01'), new Carbon('2014-03-15')),
            new Recurrence(new Carbon('2014-04-01'), new Carbon('2014-04-15')),
            new Recurrence(new Carbon('2014-05-01'), new Carbon('2014-05-15')),
        ];

        $result = $this->collection->endsAfter(new Carbon('2014-03-15'), true);

        $this->assertEquals($expected, array_values($result->toArray()));
    }
}
