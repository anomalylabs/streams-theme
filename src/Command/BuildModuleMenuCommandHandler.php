<?php namespace Anomaly\Streams\Addon\Theme\Streams\Command;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class BuildModuleMenuCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Theme\Streams\Command
 */
class BuildModuleMenuCommandHandler
{

    /**
     * Handle the command.
     *
     * @param BuildModuleMenuCommand $command
     */
    public function handle(BuildModuleMenuCommand $command)
    {
        $menu = [];

        $module = app('streams.modules')->active();

        /**
         * Loop through any module menu items and format
         * them for the view.
         *
         * Keep it generic but helpful.
         */
        foreach ($module->getMenu() as $slug => $item) {

            $item['slug'] = $slug;

            $item = evaluate($item);

            // Skip if disabled.
            if (evaluate_key($item, 'enabled', true) == false) {

                continue;
            }

            $active = false;
            $url    = $this->getUrl($item, $module);
            $title  = $this->getTitle($item, $module);

            $item = compact('slug', 'url', 'title', 'active');

            $menu[$slug] = $item;
        }

        return $menu;
    }

    /**
     * Get the title.
     *
     * @param array  $item
     * @param Module $module
     * @return string
     */
    protected function getTitle(array $item, Module $module)
    {
        return trans(evaluate_key($item, 'title', $module->lang('menu.' . $item['slug'])));
    }

    /**
     * Get the URL.
     *
     * @param array  $item
     * @param Module $module
     * @return string
     */
    protected function getUrl(array $item, Module $module)
    {
        return url(evaluate_key($item, 'url', 'admin/' . $module->getSlug() . '/' . $item['slug']));
    }

    /**
     * Set the active menu item based on the longest item
     * URL found to be contained within the current URL.
     *
     * @param array $menu
     */
    protected function setActive(array &$menu)
    {
        $slug   = null;
        $active = null;

        $url = app('request')->url();

        foreach ($menu as $item) {

            if (str_contains($url, $item['url']) and strlen($item['url']) > strlen($active)) {

                $slug   = $item['slug'];
                $active = $item['url'];
            }
        }

        $menu[$slug]['active'] = true;
    }
}
 