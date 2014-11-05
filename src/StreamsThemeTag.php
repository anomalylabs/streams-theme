<?php namespace Anomaly\Streams\Addon\Theme\Streams;

use Anomaly\Streams\Addon\Theme\Streams\Command\BuildThemeNavigationCommand;
use Anomaly\Streams\Platform\Addon\Theme\ThemeTag;
use Anomaly\Streams\Platform\Traits\CommandableTrait;

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
        $module = app('streams.modules')->active();

        $sections = $module->getSections();

        if ($sections) {
            foreach ($sections as $key => &$section) {
                $section['title'] = trans('module.' . $module->getSlug() . '::section.' . $key);
                $section['class'] = \Request::path() != $section['path'] ? : 'active';
                $section['path']  = key_value($section, 'path');
            }
        }

        return $sections;
    }

    /**
     * Return the actions for the active section.
     *
     * @return null
     */
    public function actions()
    {
        $actions = [];

        if ($actions) {
            foreach ($actions as &$action) {
                $action['title'] = trans(evaluate_key($action, 'title', 'misc.untitled'));
            }
        }

        return $actions;
    }

    /**
     * Return the menu for the module.
     *
     * @return array
     */
    public function menu()
    {
        $menu = [];

        $module = app('streams.modules')->active();

        foreach ($module->getMenu() as $item) {
            $menu[] = [
                'title' => trans($item['title']),
                'url'   => url($item['path']),
            ];
        }

        return $menu;
    }
}
