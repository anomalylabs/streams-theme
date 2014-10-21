<?php namespace Anomaly\Streams\Theme\Streams;

use Anomaly\Streams\Platform\Addon\Tag\ThemeTag;

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

        foreach (\Module::all()->enabled() as $module) {
            $item = [
                'title' => $module->name,
                'class' => !$module->isActive() ? : 'active',
                'path'  => 'admin/' . $module->slug,
            ];

            if ($menu = trans($module->getMenu())) {
                if (!isset($navigation[$menu])) {
                    $navigation[$menu] = [
                        'title' => $menu,
                        'class' => 'has-dropdown',
                        'items' => [],
                    ];
                }

                $navigation[$menu]['items'][] = $item;

                if ($module->isActive()) {
                    $navigation[$menu]['class'] .= ' active';
                }
            } else {
                $navigation[$module->slug] = $item;
            }
        }

        sort($navigation);

        return $navigation;
    }

    /**
     * Return sections for the theme.
     *
     * @return mixed
     */
    public function sections()
    {
        $sections = evaluate(\Module::active()->getSections());

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
        $actions = evaluate_key(\Module::active()->sections()->active(), 'actions');

        if ($actions) {
            foreach ($actions as &$action) {
                $action['title'] = trans(evaluate_key($action, 'title', 'misc.untitled'));
            }
        }

        return $actions;
    }
}
