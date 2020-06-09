<?php

namespace ToyRobot\Command;

/**
 * Class ReportCommand
 */
class ReportCommand extends AbstractCommand
{
    /**
     * @inheritdoc
     */
    public function execute($arguments = [])
    {
        $currentPositionOutPut = sprintf(
            '%s,%s,%s',
            $this->robot->getCurrentPositionX(),
            $this->robot->getCurrentPositionY(),
            $this->robot->getCurrentDirection()
        );

        return $currentPositionOutPut;
    }
}
