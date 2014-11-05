<?php namespace Anomaly\Streams\Addon\Theme\Streams;

use Anomaly\Streams\Platform\Addon\Theme\ThemeTag;

class StreamsThemeTag extends ThemeTag
{

    /**
     * Return nav data for admin UI.
     *
     * @return array
     */
    public function nav()
    {
        $nav = [];

        $active = app('streams.modules')->active();

        foreach (app('streams.modules')->all() as $module) {

            $item = [
                'title' => trans($module->getName()),
                'class' => $module->getSlug() == $active->getSlug() ? true : false,
                'path'  => 'admin/' . $module->getSlug(),
            ];

            if ($group = trans($module->getNav())) {

                if (!isset($nav[$group])) {
                    $nav[$group] = [
                        'title' => $group,
                        'class' => 'has-dropdown',
                        'items' => [],
                    ];
                }

                $nav[$group]['items'][] = $item;

                if ($module->getSlug() == $active->getSlug()) {
                    $nav[$group]['class'] .= ' active';
                }
            } else {
                $nav[$module->getSlug()] = $item;
            }
        }

        asort($nav);

        // Dashboard module is always in front.
        if (isset($nav['dashboard']) and $dashboard = $nav['dashboard']) {
            array_unshift($nav, $dashboard);
            unset($nav['dashboard']);
        }

        return $nav;
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
