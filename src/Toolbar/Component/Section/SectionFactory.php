<?php namespace Anomaly\StreamsTheme\Toolbar\Component\Section;

/**
 * Class SectionFactory
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Component\Section
 */
class SectionFactory
{

    public function make(array $parameters)
    {
        if ($view = $this->views->get(array_get($parameters, 'view'))) {
            $parameters = array_replace_recursive($view, array_except($parameters, 'view'));
        }

        $view = app()->make(array_get($parameters, 'view', $this->view), $parameters);

        $this->hydrate($view, $parameters);

        return $view;
    }

    /**
     * Hydrate the view with it's remaining parameters.
     *
     * @param ViewInterface $view
     * @param array         $parameters
     */
    protected function hydrate(ViewInterface $view, array $parameters)
    {
        foreach ($parameters as $parameter => $value) {

            $method = camel_case('set_' . $parameter);

            if (method_exists($view, $method)) {
                $view->{$method}($value);
            }
        }
    }
}
