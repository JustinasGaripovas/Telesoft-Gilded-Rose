<?php

namespace App\Enum;

/**
 * Perhaps these "setting" values should be stored not here, but in storage file or env file or database.
 *
 * Class ItemValueEnum
 * @package App\Enum
 */
class ItemValueEnum
{
    const DAYS = 10;

    const SELL_IN_NORMAL_AGING = -1;
    const SELL_IN_EVENT_RANGES = [6,11];

    const QUALITY_NORMAL_AGING = -1;
    const QUALITY_CEILING = 50;
    const QUALITY_FLOOR = 0;
    const QUALITY_PRO_AGING_AGING = 1;
    const QUALITY_EVENT_VALUE = [3,2];
    const QUALITY_EVENT_VALUE_DEFAULT = 1;
    const QUALITY_EVENT_RANGES = [3,2];
    const QUALITY_LEGENDARY = 80;
}