<?php

namespace ToyRobot\Service;

use ToyRobot\Command\CommandInterface;
use ToyRobot\Csv\Reader\CsvReader;
use ToyRobot\Factory\FactoryInterface;
use ToyRobot\Invoker\Invoker;

/**
 * Class RobotSimulatorService
 */
class RobotSimulatorService
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
     * RobotSimulatorService constructor
     *
     * @param Invoker $invoker
     * @param FactoryInterface $commandFactory
     * @param CsvReader $csvReader
     */
    public function __construct(Invoker $invoker, FactoryInterface $commandFactory, CsvReader $csvReader)
    {
        $this->invoker = $invoker;
        $this->commandFactory = $commandFactory;
        $this->csvReader = $csvReader;
    }

    /**
     * Execute commands
     *
     * @param array $arguments
     *
     * @return string|null
     */
    public function execute(array $arguments)
    {
        try {
            $response = null;

            $commands = $this->getCommandsFromCSV($arguments[1]);

            foreach($commands as $command) {
                try {
                    $command = explode(' ', $command);
                    $commandName = $command[0];
                    $commandArguments = !empty($command[1]) ? explode(',', $command[1]) : [];

                    /** @var CommandInterface $commandObject */
                    $commandObject = $this->commandFactory->create($commandName);

                    $this->invoker->setCommand($commandObject);
                    $response = $this->invoker->run($commandArguments);
                } catch (\Exception $ex) {
                    echo $ex->getMessage();
                }
            }

            return $response;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Get commands from the CSV file
     *
     * @param $fileName
     *
     * @return array
     */
    private function getCommandsFromCSV($fileName) : array 
    {
        $fileName = sprintf('%s.csv', $fileName);

        return $this->csvReader->getData($fileName);
    }
}
