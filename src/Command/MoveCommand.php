<?php

namespace ToyRobot\Command;

use ToyRobot\Constant\RobotConstant;

/**
 * Class MoveCommand
 */
class MoveCommand extends AbstractCommand
{
    /**
     * @inheritdoc
     */
    public function execute($arguments = [])
    {
        $currentPositionX = (int) $this->robot->getCurrentPositionX();
        $currentPositionY = (int) $this->robot->getCurrentPositionY();
        $currentDirection = $this->robot->getCurrentDirection();

        switch ($currentDirection) {
            case RobotConstant::DIRECTION_NORTH:
                $currentPositionY += 1;
                break;
            case RobotConstant::DIRECTION_EAST:
                $currentPositionX += 1;
                break;
            case RobotConstant::DIRECTION_SOUTH:
                $currentPositionY -= 1;
                break;
            case RobotConstant::DIRECTION_WEST:
                $currentPositionX -= 1;
                break;
        }

        $this->isValidPosition($currentPositionX, $currentPositionY);

        $this->robot->setCurrentPositionX($currentPositionX);
        $this->robot->setCurrentPositionY($currentPositionY);
        
        return true;
    }
}
