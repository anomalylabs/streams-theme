<?php namespace Anomaly\StreamsTheme\Toolbar\Command\Handler;

use Anomaly\StreamsTheme\Toolbar\Command\LoadToolbar;
use Anomaly\StreamsTheme\Toolbar\Component\Button\Command\LoadButtons;
use Anomaly\StreamsTheme\Toolbar\Component\Section\Command\LoadSections;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Class LoadToolbarHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Command\Handler
 */
class LoadToolbarHandler
{

    use DispatchesCommands;

    /**
     * @param LoadToolbar $command
     */
    public function handle(LoadToolbar $command)
    {
        $toolbar = $command->getToolbar();

        $this->dispatch(new LoadSections($toolbar));
        $this->dispatch(new LoadButtons($toolbar));
    }
}
