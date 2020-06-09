<?php

namespace ToyRobotUnitTest\Command;

use ToyRobot\Command\MoveCommand;
use ToyRobot\Robot\Robot;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * Class MoveCommandTest
 */
class MoveCommandTest extends TestCase
{
    /**
     * @var Robot
     */
    private $robot;

    /**
     * @var MoveCommand
     */
    private $moveCommand;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $this->robot = Mockery::mock(Robot::class);

        $this->moveCommand = new MoveCommand(
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
     *
     * @param array $robotPosition
     *
     * @dataProvider executeDataProvider
     */
    public function testExecute(array $robotPosition)
    {
        $this->robot->shouldReceive('getCurrentPositionX')->andReturn($robotPosition['x']);
        $this->robot->shouldReceive('getCurrentPositionY')->andReturn($robotPosition['y']);
        $this->robot->shouldReceive('getCurrentDirection')->andReturn($robotPosition['f']);
        $this->robot->shouldReceive('setCurrentPositionX')->andReturn();
        $this->robot->shouldReceive('setCurrentPositionY')->andReturn();

        $actualResult = $this->moveCommand->execute();

        $this->assertTrue($actualResult);
    }

    /**
     * Data provider for commands
     *
     * @return array
     *
     * @dataProvider executeDataProvider
     */
    public function executeDataProvider() : array
    {
        return [
            'Test 1' => [
                'robotPosition' => [
                    'x' => 2,
                    'y' => 3,
                    'f' => 'NORTH',
                ]
            ],
            'Test 2' => [
                'robotPosition' => [
                    'x' => 2,
                    'y' => 3,
                    'f' => 'WEST',
                ]
            ],
            'Test 3' => [
                'robotPosition' => [
                    'x' => 1,
                    'y' => 2,
                    'f' => 'EAST',
                ]
            ]
        ];
    }

    /**
     * Test for invalid direction exception for execute method
     *
     * @param array $robotPosition
     *
     * @expectedException \ToyRobot\Exception\InvalidPositionException
     *
     * @dataProvider executeInvalidDataProvider
     */
    public function testExecuteForInvalidPosition(array $robotPosition)
    {
        $this->robot->shouldReceive('getCurrentPositionX')->andReturn($robotPosition['x']);
        $this->robot->shouldReceive('getCurrentPositionY')->andReturn($robotPosition['y']);
        $this->robot->shouldReceive('getCurrentDirection')->andReturn($robotPosition['f']);
        $this->robot->shouldReceive('setCurrentPositionX')->andReturn();
        $this->robot->shouldReceive('setCurrentPositionY')->andReturn();

        $arguments = ['0', '0', 'TEST'];
        $this->moveCommand->execute($arguments);
    }

    /**
     * Data provider for commands
     *
     * @return array
     */
    public function executeInvalidDataProvider() : array
    {
        return [
            'Test 1' => [
                'robotPosition' => [
                    'x' => 2,
                    'y' => 4,
                    'f' => 'NORTH',
                ]
            ],
            'Test 2' => [
                'robotPosition' => [
                    'x' => 0,
                    'y' => 3,
                    'f' => 'WEST',
                ]
            ],
            'Test 3' => [
                'robotPosition' => [
                    'x' => 4,
                    'y' => 2,
                    'f' => 'EAST',
                ]
            ],
            'Test 4' => [
                'robotPosition' => [
                    'x' => 1,
                    'y' => 0,
                    'f' => 'SOUTH',
                ]
            ]
        ];
    }
}
