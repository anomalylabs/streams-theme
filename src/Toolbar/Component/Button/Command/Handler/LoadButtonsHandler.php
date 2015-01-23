<?php namespace Anomaly\StreamsTheme\Toolbar\Component\Button\Command\Handler;

use Anomaly\StreamsTheme\Toolbar\Component\Button\Command\LoadButtons;

/**
 * Class LoadButtonsHandler
 *
 * @link          http://anomaly.is/streams-Platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Component\Button\Command\Handler
 */
class LoadButtonsHandler
{

    /**
     * Handle the command.
     *
     * @param LoadButtons $command
     */
    public function handle(LoadButtons $command)
    {
        $toolbar = $command->getToolbar();

        $buttons = $toolbar->getButtons();
        $data    = $toolbar->getData();

        $data->put('buttons', $buttons);
    }
}
