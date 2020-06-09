<?php
require 'vendor/autoload.php';

use ToyRobot\Csv\Reader\CsvReader;
use ToyRobot\Factory\CommandFactory;
use ToyRobot\Invoker\Invoker;
use ToyRobot\Robot\Robot;
use ToyRobot\Service\RobotSimulatorService;

$arguments = $argv;

$invoker = new Invoker();
$robot = new Robot();
$commandFactory = new CommandFactory($robot);
$csvReader = new CsvReader();

$robotSimulatorService = new RobotSimulatorService($invoker, $commandFactory, $csvReader);
$response = $robotSimulatorService->execute($arguments);
echo $response . PHP_EOL;