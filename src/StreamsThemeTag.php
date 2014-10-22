<?php namespace Anomaly\Streams\Addon\Theme\Streams;

use Streams\Addon\Tag\Theme\ThemeTag;

class StreamsThemeTag extends ThemeTag
{
    /**
     * Return navigation data for UI.
     *
     * @return array
     */
    public function navigation()
    {
        $navigation = [];

        $active = app('streams.module.active');

        foreach (app('streams.modules')->all() as $module) {
            $item = [
                'title' => $module->name,
                'class' => $module->slug != $active->slug ? : 'active',
                'path'  => 'admin/' . $module->slug,
            ];

            if ($group = trans($module->getGroup())) {
                if (!isset($navigation[$group])) {
                    $navigation[$group] = [
                        'title' => $group,
                        'class' => 'has-dropdown',
                        'items' => [],
                    ];
                }

                $navigation[$group]['items'][] = $item;

                if ($module->slug == $active->slug) {
                    $navigation[$group]['class'] .= ' active';
                }
            } else {
                $navigation[$module->slug] = $item;
            }
        }

        asort($navigation);

        // Dashboard module is always in front.
        if (isset($navigation['dashboard']) and $dashboard = $navigation['dashboard']) {
            array_unshift($navigation, $dashboard);
            unset($navigation['dashboard']);
        }

        return $navigation;
    }

    /**
     * Return sections for the theme.
     *
     * @return mixed
     */
    public function sections()
    {
        $sections = evaluate(app('streams.module.active')->getSections());

        if ($sections) {
            foreach ($sections as &$section) {
                $section['title'] = trans(key_value($section, 'title', 'misc.untitled'));
                $section['class'] = !str_contains(\Request::path(), $section['path']) ? : 'active';
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

        foreach (app('streams.module.active')->getMenu() as $item) {
            $menu[] = [
                'title' => trans($item['title']),
                'url'   => url($item['url']),
            ];
        }

        return $menu;
    }
}
