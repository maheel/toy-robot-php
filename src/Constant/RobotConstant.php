<?php

namespace ToyRobot\Constant;

/**
 * Class RobotConstant
 */
final class RobotConstant
{
    /**
     * @var int
     */
    const UNITS_X = 5;

    /**
     * @var int
     */
    const UNITS_Y = 5;

    /**
     * @var int
     */
    const ORIGIN_X_POSITION = 0;

    /**
     * @var int
     */
    const ORIGIN_Y_POSITION = 0;

    /**
     * @var string
     */
    const DIRECTION_NORTH = 'NORTH';

    /**
     * @var string
     */
    const DIRECTION_SOUTH = 'SOUTH';

    /**
     * @var string
     */
    const DIRECTION_EAST = 'EAST';

    /**
     * @var string
     */
    const DIRECTION_WEST = 'WEST';

    /**
     * @var array
     */
    const VALID_DIRECTIONS = [
        self::DIRECTION_NORTH,
        self::DIRECTION_SOUTH,
        self::DIRECTION_EAST,
        self::DIRECTION_WEST
    ];
}
