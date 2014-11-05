<?php namespace Anomaly\Streams\Addon\Theme\Streams\Command;

use Anomaly\Streams\Platform\Addon\Module\Module;

class BuildThemeNavigationCommandHandler
{

    public function handle(BuildThemeNavigationCommand $command)
    {
        $nav = [];

        foreach (app('streams.modules')->all() as $module) {

            $url    = $this->getUrl($module);
            $title  = $this->getTitle($module);
            $group  = $this->getGroup($module);
            $active = $this->getActive($module);

            $item = compact('url', 'title', 'group', 'active');

            if ($group) {

                $nav = $this->addItemToGroup($nav, $item, $module);
            } else {

                $nav[$module->getSlug()] = $item;
            }
        }

        $this->finish($nav);

        return $nav;
    }

    protected function getTitle(Module $module)
    {
        return trans($module->getName());
    }

    protected function getActive(Module $module)
    {
        return $module->isActive();
    }

    protected function getUrl(Module $module)
    {
        return url('admin/' . $module->getSlug());
    }

    protected function getGroup(Module $module)
    {
        return trans($module->getNav());
    }

    protected function addItemToGroup(array $nav, array $item, Module $module)
    {
        $nav = $this->assureNavGroup($nav, $item);

        $nav[$item['group']]['title'] = $item['group'];
        $nav[$item['group']]['items'][] = $item;
        $nav[$item['group']]['active'] = $module->isActive();

        return $nav;
    }

    protected function assureNavGroup(array $nav, array $item)
    {
        if (!isset($nav[$item['group']])) {

            $item['group'] = [
                'title' => $item['group'],
                'class' => 'has-dropdown',
                'items' => [],
            ];
        }

        return $nav;
    }

    protected function finish(&$nav)
    {
        asort($nav);

        // Dashboard module is always first.
        if (isset($nav['dashboard']) and $dashboard = $nav['dashboard']) {

            array_unshift($nav, $dashboard);

            unset($nav['dashboard']);
        }
    }
}
 