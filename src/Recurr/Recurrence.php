<?php

/*
 * Copyright 2025 Shaun Simmons
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Recurr;

use Carbon\Carbon;

/**
 * @author Shaun Simmons <gh@simshaun.com>
 */
class Recurrence
{
    protected Carbon|\DateTimeImmutable $start;

    protected Carbon|\DateTimeImmutable $end;

    public function __construct(
        Carbon|\DateTimeImmutable|null $start = null,
        Carbon|\DateTimeImmutable|null $end = null,
        protected int $index = 0,
    ) {
        if ($start) {
            $this->setStart($start);
        }

        if ($end) {
            $this->setEnd($end);
        }
    }

    public function getStart(): Carbon|\DateTimeImmutable
    {
        return $this->start;
    }

    public function setStart(Carbon|\DateTimeImmutable $start): void
    {
        $this->start = $start;
    }

    public function getEnd(): Carbon|\DateTimeImmutable
    {
        return $this->end;
    }

    public function setEnd(Carbon|\DateTimeImmutable $end): void
    {
        $this->end = $end;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function setIndex(int $index): void
    {
        $this->index = $index;
    }
}
