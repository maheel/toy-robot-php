<?php

namespace ToyRobot\Command;

use ToyRobot\Constant\RobotConstant;

/**
 * Class LeftCommand
 */
class LeftCommand extends AbstractCommand
{
    const LEFT_MOVEMENTS = [
        RobotConstant::DIRECTION_NORTH => RobotConstant::DIRECTION_WEST,
        RobotConstant::DIRECTION_WEST => RobotConstant::DIRECTION_SOUTH,
        RobotConstant::DIRECTION_SOUTH => RobotConstant::DIRECTION_EAST,
        RobotConstant::DIRECTION_EAST => RobotConstant::DIRECTION_NORTH,
    ];
    
    /**
     * @inheritdoc
     */
    public function execute($arguments = [])
    {
        $newDirection = self::LEFT_MOVEMENTS[$this->robot->getCurrentDirection()];
        $this->robot->setCurrentDirection($newDirection);
    }
}
