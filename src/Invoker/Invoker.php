<?php

namespace ToyRobot\Invoker;

use ToyRobot\Command\CommandInterface;

/**
 * Class Invoker
 */
class Invoker
{
    /**
     * @var CommandInterface
     */
    private $command;

    /**
     * Set command
     *
     * @param CommandInterface $command
     */
    public function setCommand(CommandInterface $command)
    {
        $this->command = $command;
    }

    /**
     * @param array $arguments
     *
     * @return bool|string
     */
    public function run($arguments = [])
    {
        return $this->command->execute($arguments);
    }
}
