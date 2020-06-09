<?php

namespace ToyRobotUnitTest\Command;

use ToyRobot\Command\PlaceCommand;
use ToyRobot\Robot\Robot;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * Class PlaceCommandTest
 */
class PlaceCommandTest extends TestCase
{
    /**
     * @var Robot
     */
    private $robot;

    /**
     * @var PlaceCommand
     */
    private $placeCommand;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $this->robot = Mockery::mock(Robot::class);

        $this->placeCommand = new PlaceCommand(
            $this->robot
        );
    }

    /**
     * @inheritdoc
     */
    public function tearDown()
    {
        Mockery::close();
    }

    /**
     * Test for execute
     */
    public function testExecute()
    {
        $arguments = ['0', '0', 'NORTH'];

        $this->robot->shouldReceive('setCurrentPositionX')->andReturn();
        $this->robot->shouldReceive('setCurrentPositionY')->andReturn();
        $this->robot->shouldReceive('setCurrentDirection')->andReturn();

        $actualResult = $this->placeCommand->execute($arguments);
        
        $this->assertTrue($actualResult);
    }

    /**
     * Test for invalid direction exception for execute method
     *
     * @expectedException \ToyRobot\Exception\InvalidDirectionException
     */
    public function testExecuteForInvalidDirection()
    {
        $arguments = ['0', '0', 'TEST'];
        $this->placeCommand->execute($arguments);
    }

    /**
     * Test for invalid direction exception for execute method
     *
     * @expectedException \ToyRobot\Exception\InvalidPositionException
     */
    public function testExecuteForInvalidPosition()
    {
        $arguments = ['-1', '0', 'NORTH'];
        $this->placeCommand->execute($arguments);
    }
}
