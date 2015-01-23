<?php namespace Anomaly\StreamsTheme\Toolbar\Component\Section\Command\Handler;

use Anomaly\StreamsTheme\Toolbar\Component\Section\Command\SetActiveSection;

/**
 * Class SetActiveSectionHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Component\Section\Command\Handler
 */
class SetActiveSectionHandler
{

    /**
     * Handle the command.
     *
     * @param SetActiveSection $command
     */
    public function handle(SetActiveSection $command)
    {
        $builder  = $command->getBuilder();
        $toolbar  = $builder->getToolbar();
        $sections = $toolbar->getSections();

        $sections->first()->setActive(true);
    }
}
