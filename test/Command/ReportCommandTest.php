<?php

namespace ToyRobotUnitTest\Command;

use ToyRobot\Command\ReportCommand;
use ToyRobot\Robot\Robot;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * Class ReportCommandTest
 */
class ReportCommandTest extends TestCase
{
    /**
     * @var Robot
     */
    private $robot;

    /**
     * @var ReportCommand
     */
    private $reportCommand;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $this->robot = Mockery::mock(Robot::class);

        $this->reportCommand = new ReportCommand(
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
        $this->robot->shouldReceive('getCurrentPositionX')->andReturn(4);
        $this->robot->shouldReceive('getCurrentPositionY')->andReturn(3);
        $this->robot->shouldReceive('getCurrentDirection')->andReturn('NORTH');

        $actualResult = $this->reportCommand->execute();

        $expectedResult = '4,3,NORTH';

        $this->assertEquals($expectedResult, $actualResult);
    }
}