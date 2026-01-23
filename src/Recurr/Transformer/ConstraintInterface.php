<?php

/*
 * Copyright 2025 Shaun Simmons
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Recurr\Transformer;

use Carbon\Carbon;

interface ConstraintInterface
{
    public function stopsTransformer(): bool;

    public function test(Carbon(Interface $date): bool;
}
