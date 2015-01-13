<?php namespace Anomaly\StreamsTheme\Command\Handler;

use Anomaly\Streams\Platform\Addon\Module\Module;
use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;
use Anomaly\StreamsTheme\Command\BuildSectionButtons;

/**
 * Class BuildSectionButtonsHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Command
 */
class BuildSectionButtonsHandler
{

    /**
     * The loaded modules.
     *
     * @var \Anomaly\Streams\Platform\Addon\Module\ModuleCollection
     */
    protected $modules;

    /**
     * Create a new BuildThemeNavigationHandler instance.
     *
     * @param ModuleCollection $modules
     */
    public function __construct(ModuleCollection $modules)
    {
        $this->modules = $modules;
    }

    /**
     * Handle the command.
     *
     * @param BuildSectionButtons $command
     * @return array
     */
    public function handle(BuildSectionButtons $command)
    {
        $buttons = [];

        $module = $this->modules->active();

        $section = $command->getSection();

        $sections = $module->getSections();

        /**
         * If the active section has buttons
         * then process them.
         *
         * Keep it generic but helpful.
         */
        if (isset($sections[$section]['buttons'])) {

            $section = $sections[$section];

            foreach ($section['buttons'] as $slug => $button) {

                // Build out required data.
                $button['slug'] = $slug;

                // Skip if disabled.
                if (array_get($button, 'enabled', true) == false) {

                    continue;
                }

                $class = $this->getClass($button);
                $url   = $this->getUrl($button, $section);
                $title = $this->getTitle($button, $section, $module);

                $button = compact('slug', 'class', 'url', 'title');

                $buttons[] = $button;
            }
        }

        return $buttons;
    }

    /**
     * Get the title.
     *
     * @param array  $button
     * @param        $section
     * @param Module $module
     * @return string
     */
    protected function getTitle(array $button, $section, Module $module)
    {
        return trans(array_get($button, 'title', 'streams::button.' . $button['slug']));
    }

    /**
     * Get the URL.
     *
     * @param array $button
     * @param array $section
     * @return string
     */
    protected function getUrl(array $button, array $section)
    {
        $url = array_get($button, 'url');

        if (!$url) {

            $url = $section['url'] . '/' . $button['slug'];
        }

        if (!starts_with($url, 'http')) {

            $url = url($url);
        }

        return $url;
    }

    /**
     * Get the class.
     *
     * @param array $button
     * @return mixed|null
     */
    protected function getClass(array $button)
    {
        return array_get($button, 'class', 'btn btn-success');
    }
}
 