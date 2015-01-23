<?php namespace Anomaly\StreamsTheme\Toolbar\Command\Handler;

use Anomaly\StreamsTheme\Toolbar\Command\BuildToolbar;
use Anomaly\StreamsTheme\Toolbar\Component\Button\Command\BuildButtons;
use Anomaly\StreamsTheme\Toolbar\Component\Section\Command\BuildSections;
use Anomaly\StreamsTheme\Toolbar\Component\Section\Command\SetActiveSection;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class BuildToolbarHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Command\Handler
 */
class BuildToolbarHandler
{

    use DispatchesCommands;

    /**
     * @param BuildToolbar $command
     */
    public function handle(BuildToolbar $command)
    {
        $builder = $command->getBuilder();

        $this->dispatch(new BuildSections($builder));
        $this->dispatch(new SetActiveSection($builder));

        $this->dispatch(new BuildButtons($builder));
    }
}
