<?php

namespace ToyRobot\Robot;

/**
 * Class Robot
 */
class Robot
{
    /**
     * @var string
     */
    private $currentPositionX;

    /**
     * @var string
     */
    private $currentPositionY;

    /**
     * @var string
     */
    private $currentDirection;
    
    /**
     * @return string
     */
    public function getCurrentPositionX()
    {
        return $this->currentPositionX;
    }

    /**
     * @param string $currentPositionX
     */
    public function setCurrentPositionX($currentPositionX)
    {
        $this->currentPositionX = $currentPositionX;
    }

    /**
     * @return string
     */
    public function getCurrentPositionY()
    {
        return $this->currentPositionY;
    }

    /**
     * @param string $currentPositionY
     */
    public function setCurrentPositionY($currentPositionY)
    {
        $this->currentPositionY = $currentPositionY;
    }

    /**
     * @return string
     */
    public function getCurrentDirection()
    {
        return $this->currentDirection;
    }

    /**
     * @param string $currentDirection
     */
    public function setCurrentDirection($currentDirection)
    {
        $this->currentDirection = $currentDirection;
    }
}
