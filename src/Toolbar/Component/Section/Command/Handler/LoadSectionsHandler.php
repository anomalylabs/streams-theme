<?php namespace Anomaly\StreamsTheme\Toolbar\Component\Section\Command\Handler;

use Anomaly\StreamsTheme\Toolbar\Component\Section\Command\LoadSections;

/**
 * Class LoadSectionsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Component\Section\Command\Handler
 */
class LoadSectionsHandler
{

    /**
     * Handle the command.
     *
     * @param LoadSections $command
     */
    public function handle(LoadSections $command)
    {
        $toolbar = $command->getToolbar();

        $sections = $toolbar->getSections();
        $data     = $toolbar->getData();

        $data->put('sections', $sections);
    }
}
