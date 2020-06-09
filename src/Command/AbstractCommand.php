<?php

namespace ToyRobot\Command;

use ToyRobot\Constant\RobotConstant;
use ToyRobot\Exception\InvalidPositionException;
use ToyRobot\Robot\Robot;

/**
 * Class AbstractCommand
 */
abstract class AbstractCommand implements CommandInterface
{
    /**
     * @var Robot
     */
    protected $robot;

    /**
     * AbstractCommand constructor
     *
     * @param Robot $robot
     */
    public function __construct(Robot $robot)
    {
        $this->robot = $robot;
    }

    /**
     * Check if a valid position
     *
     * @param int $positionX
     * @param int $positionY
     *
     * @return bool
     *
     * @throws InvalidPositionException
     */
    protected function isValidPosition(int $positionX, int $positionY)
    {
        if ($positionX < 0 ||
            $positionY < 0 ||
            ($positionX > (RobotConstant::UNITS_X - 1)) ||
            ($positionY > (RobotConstant::UNITS_Y - 1))) {
            throw new InvalidPositionException('Invalid position!');
        }

        return true;
    }
}
