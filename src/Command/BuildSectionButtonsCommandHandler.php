<?php namespace Anomaly\Streams\Addon\Theme\Streams\Command;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class BuildSectionButtonsCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Theme\Streams\Command
 */
class BuildSectionButtonsCommandHandler
{

    /**
     * Handle the command.
     *
     * @param BuildSectionButtonsCommand $command
     * @return array
     */
    public function handle(BuildSectionButtonsCommand $command)
    {
        $buttons = [];

        $module = app('streams.modules')->active();

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

                $button = evaluate($button);

                // Skip if disabled.
                if (evaluate_key($button, 'enabled', true) == false) {

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
        return trans(evaluate_key($button, 'title', 'button.' . $button['slug']));
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
        $url = evaluate_key($button, 'url');

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
        return evaluate_key($button, 'class', 'btn btn-success');
    }
}
 