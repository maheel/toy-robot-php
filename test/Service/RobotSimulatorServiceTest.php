<?php

namespace ToyRobotUnitTest\Service;

use ToyRobot\Csv\Reader\CsvReader;
use ToyRobot\Factory\CommandFactory;
use ToyRobot\Factory\FactoryInterface;
use ToyRobot\Invoker\Invoker;
use ToyRobot\Robot\Robot;
use ToyRobot\Service\RobotSimulatorService;
use Mockery;
use PHPUnit\Framework\TestCase;

/**
 * Class RobotSimulatorServiceTest
 */
class RobotSimulatorServiceTest extends TestCase
{
    /**
     * @var Invoker
     */
    private $invoker;

    /**
     * @var FactoryInterface
     */
    private $commandFactory;

    /**
     * @var CsvReader
     */
    private $csvReader;

    /**
     * @var RobotSimulatorService
     */
    private $robotSimulatorService;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $this->invoker = new Invoker();
        $this->commandFactory = new CommandFactory(new Robot());
        $this->csvReader = Mockery::mock(CsvReader::class);

        $this->robotSimulatorService = new RobotSimulatorService(
            $this->invoker,
            $this->commandFactory,
            $this->csvReader
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
     * Test fot execute
     *
     * @param array $commands
     * @param string $expectedResult
     *
     * @dataProvider commandsDataProvider
     */
    public function testExecute(array $commands, string $expectedResult)
    {
        $arguments = [
            'index.php',
            'robot_commands',
        ];

        $this->csvReader->shouldReceive('getData')->andReturn($commands);

        $actualResult = $this->robotSimulatorService->execute($arguments);

        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * Data provider for commands
     *
     * @return array
     */
    public function commandsDataProvider() : array
    {
        return [
            'Test 1' => [
                'testData' => [
                    'PLACE 0,0,NORTH',
                    'MOVE',
                    'REPORT'
                ],
                'expectedResult' => '0,1,NORTH'
            ],
            'Test 2' => [
                'testData' => [
                    'PLACE 0,0,NORTH',
                    'LEFT',
                    'REPORT'
                ],
                'expectedResult' => '0,0,WEST'
            ],
            'Test 3' => [
                'testData' => [
                    'PLACE 1,2,EAST ',
                    'MOVE',
                    'MOVE',
                    'LEFT',
                    'MOVE',
                    'REPORT'
                ],
                'expectedResult' => '3,3,NORTH'
            ]
        ];
    }
}
