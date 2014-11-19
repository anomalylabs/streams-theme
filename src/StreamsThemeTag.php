<?php namespace Anomaly\Streams\Addon\Theme\Streams;

use Anomaly\Streams\Addon\Theme\Streams\Command\BuildModuleMenuCommand;
use Anomaly\Streams\Addon\Theme\Streams\Command\BuildModuleSectionsCommand;
use Anomaly\Streams\Addon\Theme\Streams\Command\BuildSectionButtonsCommand;
use Anomaly\Streams\Addon\Theme\Streams\Command\BuildThemeNavigationCommand;
use Anomaly\Streams\Platform\Addon\Theme\ThemeTag;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

/**
 * Class StreamsThemeTag
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Theme\Streams
 */
class StreamsThemeTag extends ThemeTag
{

    use CommandableTrait;

    /**
     * Return navigation.
     *
     * @return array
     */
    public function nav()
    {
        return $this->execute(new BuildThemeNavigationCommand());
    }

    /**
     * Return sections for the theme.
     *
     * @return mixed
     */
    public function sections()
    {
        return $this->execute(new BuildModuleSectionsCommand());
    }

    /**
     * Return the actions for the active section.
     *
     * @return null
     */
    public function actions()
    {
        $section = $this->getActiveSection();

        return $this->execute(new BuildSectionButtonsCommand($section));
    }

    /**
     * Return the menu for the module.
     *
     * @return array
     */
    public function menu()
    {
        return $this->execute(new BuildModuleMenuCommand());
    }

    /**
     * Get the active section slug.
     *
     * @return mixed
     */
    protected function getActiveSection()
    {
        $sections = $this->sections();

        foreach ($sections as $section) {

            if ($section['active']) {

                return $section['slug'];
            }
        }

        null;
    }

    /**
     * Return the pagination meta.
     *
     * @return string
     */
    public function pagination()
    {
        $from  = 100;
        $to    = 200;
        $total = 1000;

        return trans('theme::admin.pagination', compact('from', 'to', 'total'));
    }

    /**
     * Return the footprint string.
     *
     * @return string
     */
    public function footprint()
    {
        $time   = request_time();
        $memory = memory_usage();

        return trans('theme::admin.footprint', compact('time', 'memory'));
    }
}
