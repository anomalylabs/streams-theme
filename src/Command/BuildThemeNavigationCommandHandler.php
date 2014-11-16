<?php namespace Anomaly\Streams\Addon\Theme\Streams\Command;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class BuildThemeNavigationCommandHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Theme\Streams\Command
 */
class BuildThemeNavigationCommandHandler
{

    /**
     * Handle the command.
     *
     * @param BuildThemeNavigationCommand $command
     * @return array
     */
    public function handle(BuildThemeNavigationCommand $command)
    {
        $nav = [];

        /**
         * Loop through the modules and build a navigation
         * array with the basic information available.
         *
         * Keep it generic but helpful.
         */
        foreach (app('streams.modules')->all() as $module) {

            // Build the required data.
            $url    = $this->getUrl($module);
            $title  = $this->getTitle($module);
            $group  = $this->getGroup($module);
            $active = $this->getActive($module);

            $item = compact('url', 'title', 'group', 'active');

            /**
             * If the module defined a $navigation property it
             * get's put into a dropdown of the same name.
             *
             * Otherwise just lop it onto the navigation array.
             */
            if ($group) {

                $this->addItemToGroup($nav, $item, $module);
            } else {

                $this->addItem($nav, $item, $module);
            }
        }

        // Finish up formatting.
        $this->finish($nav);

        return $nav;
    }

    /**
     * Get the title.
     *
     * @param Module $module
     * @return string
     */
    protected function getTitle(Module $module)
    {
        return trans($module->getName());
    }

    /**
     * Determine whether this is the
     * current location of the user.
     *
     * @param Module $module
     * @return bool
     */
    protected function getActive(Module $module)
    {
        return $module->isActive();
    }

    /**
     * Get the URL.
     *
     * @param Module $module
     * @return string
     */
    protected function getUrl(Module $module)
    {
        return url('admin/' . $module->getSlug());
    }

    /**
     * Get the group.
     *
     * @param Module $module
     * @return string
     */
    protected function getGroup(Module $module)
    {
        return trans($module->getNavigation());
    }

    /**
     * Add a menu item to a dropdown group.
     *
     * @param array  $nav
     * @param array  $item
     * @param Module $module
     */
    protected function addItemToGroup(array &$nav, array $item, Module $module)
    {
        $this->assureNavGroupExists($nav, $item, $module);

        $nav[$item['group']]['items'][$module->getSlug()] = $item;
    }

    /**
     * Make sure the group we are adding to
     * actually exists.
     *
     * @param array  $nav
     * @param array  $item
     * @param Module $module
     */
    protected function assureNavGroupExists(array &$nav, array $item, Module $module)
    {
        if (!isset($nav[$item['group']])) {

            $nav[$item['group']] = [
                'title'  => $item['group'],
                'active' => false,
                'items'  => [],
            ];
        }

        if ($module->isActive()) {

            $nav[$item['group']]['active'] = $module->isActive();
        }
    }

    /**
     * Add an item to the navigation.
     *
     * @param array  $nav
     * @param array  $item
     * @param Module $module
     */
    protected function addItem(array &$nav, array $item, Module $module)
    {
        $nav[$item['title']] = $item;
    }

    /**
     * Finish formatting by sorting the navigation by
     * the module slug and pushing Dashboard to the front.
     *
     * @param $nav
     */
    protected function finish(&$nav)
    {
        ksort($nav);

        // Dashboard module is always first.
        if (isset($nav['dashboard']) and $dashboard = $nav['dashboard']) {

            array_unshift($nav, $dashboard);

            unset($nav['dashboard']);
        }
    }
}
 