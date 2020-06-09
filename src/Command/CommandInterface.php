<?php

namespace ToyRobot\Command;

/**
 * Interface CommandInterface
 */
interface CommandInterface
{
    /**
     * Execute the command
     *
     * @param array $arguments
     *
     * @return mixed
     */
    public function execute($arguments = []);
}
