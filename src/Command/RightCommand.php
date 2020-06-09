<?php

namespace ToyRobot\Command;

use ToyRobot\Constant\RobotConstant;

/**
 * Class RightCommand
 */
class RightCommand extends AbstractCommand
{
    const RIGHT_MOVEMENTS = [
        RobotConstant::DIRECTION_NORTH => RobotConstant::DIRECTION_EAST,
        RobotConstant::DIRECTION_EAST => RobotConstant::DIRECTION_SOUTH,
        RobotConstant::DIRECTION_SOUTH => RobotConstant::DIRECTION_WEST,
        RobotConstant::DIRECTION_WEST => RobotConstant::DIRECTION_NORTH,
    ];

    /**
     * @inheritdoc
     */
    public function execute($arguments = []) {
        $newDirection = self::RIGHT_MOVEMENTS[$this->robot->getCurrentDirection()];
        $this->robot->setCurrentDirection($newDirection);
    }
}
