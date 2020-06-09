<?php

namespace ToyRobot\Factory;

/**
 * Interface FactoryInterface
 */
interface FactoryInterface
{
    /**
     * Create object based on the type
     *
     * @param string $type
     *
     * @return object
     */
    public function create(string $type);
}
