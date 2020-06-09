<?php

namespace ToyRobot\Command;

use ToyRobot\Constant\RobotConstant;
use ToyRobot\Exception\InvalidDirectionException;

/**
 * Class PlaceCommand
 */
class PlaceCommand extends AbstractCommand
{
    /**
     * @inheritdoc
     */
    public function execute($arguments = [])
    {
        $positionX = (int) $arguments[0];
        $positionY = (int) $arguments[1];
        $direction = strtoupper($arguments[2]);
        
        $this->isValidPosition($positionX, $positionY);

        if (!in_array($direction, RobotConstant::VALID_DIRECTIONS)) {
            throw new InvalidDirectionException('Invalid direction!');
        }

        $this->robot->setCurrentPositionX($positionX);
        $this->robot->setCurrentPositionY($positionY);
        $this->robot->setCurrentDirection($direction);

        return true;
    }
}
