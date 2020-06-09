<?php

namespace ToyRobot\Factory;

use ToyRobot\Command\CommandInterface;
use ToyRobot\Exception\InvalidCommandException;
use ToyRobot\Exception\InvalidCommandInstanceException;
use ToyRobot\Robot\Robot;

/**
 * Class CommandFactory
 */
class CommandFactory implements FactoryInterface
{
    /**
     * @var string
     */
    const COMMAND_NAMESPACE = 'ToyRobot\Command';

    /**
     * @var string
     */
    const CLASS_SUFFIX = 'Command';
    
    /**
     * @var Robot
     */
    private $robot;

    /**
     * CommandFactory constructor
     *
     * @param Robot $robot
     */
    public function __construct(Robot $robot)
    {
        $this->robot = $robot;
    }

    /**
     * Create object based on the type
     *
     * @param string $type
     *
     * @return CommandInterface
     *
     * @throws InvalidCommandException
     * @throws InvalidCommandInstanceException
     */
    public function create(string $type) : CommandInterface
    {
        $commandObject = sprintf(
            '%s\%s%s',
            self::COMMAND_NAMESPACE,
            ucfirst($type),
            self::CLASS_SUFFIX
        );

        if (!class_exists($commandObject)) {
            throw new InvalidCommandException(
                sprintf('Command not found: %s', $type)
            );
        }

        $commandObject = new $commandObject($this->robot);

        if (!$commandObject instanceof CommandInterface) {
            throw new InvalidCommandInstanceException(
                sprintf('Command must implement %s', CommandInterface::class)
            );
        }

        return $commandObject;
    }
}
