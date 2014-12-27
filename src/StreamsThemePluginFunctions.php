<?php namespace Anomaly\Streams\Addon\Theme\Streams;

use Laracasts\Commander\CommanderTrait;

/**
 * Class StreamsThemePluginFunctions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Theme\Streams
 */
class StreamsThemePluginFunctions
{

    use CommanderTrait;

    /**
     * The theme object.
     *
     * @var StreamsTheme
     */
    protected $theme;

    /**
     * Create a new StreamsThemePluginFunctions instance.
     *
     * @param StreamsTheme $theme
     */
    public function __construct(StreamsTheme $theme)
    {
        $this->theme = $theme;
    }

    /**
     * Return navigation.
     *
     * @return array
     */
    public function nav()
    {
        return $this->execute('Anomaly\Streams\Addon\Theme\Streams\Command\BuildThemeNavigationCommand');
    }

    /**
     * Return sections for the theme.
     *
     * @return mixed
     */
    public function sections()
    {
        return $this->execute('Anomaly\Streams\Addon\Theme\Streams\Command\BuildModuleSectionsCommand');
    }

    /**
     * Return the actions for the active section.
     *
     * @return null
     */
    public function actions()
    {
        $section = $this->getActiveSection();

        return $this->execute(
            'Anomaly\Streams\Addon\Theme\Streams\Command\BuildSectionButtonsCommand',
            compact('section')
        );
    }

    /**
     * Return the pagination meta.
     *
     * @return string
     */
    public function pagination()
    {
        $pagination = $this->theme->pullMeta('pagination', []);

        if (!$pagination) {

            return null;
        }

        $from  = array_get($pagination, 'from');
        $to    = array_get($pagination, 'to');
        $total = array_get($pagination, 'total');

        return trans('theme::admin.pagination', compact('from', 'to', 'total'));
    }

    /**
     * Return the footprint string.
     *
     * @return string
     */
    public function footprint()
    {
        $time   = $this->requestTime();
        $memory = $this->memoryUsage();

        return trans('theme::admin.footprint', compact('time', 'memory'));
    }

    /**
     * Get the active section slug.
     *
     * @return mixed
     */
    protected function getActiveSection()
    {
        $sections = $this->sections();

        foreach ($sections as $section) {

            if ($section['active']) {

                return $section['slug'];
            }
        }

        null;
    }

    /**
     * Return the elapsed request time.
     *
     * @return string
     */
    protected function requestTime()
    {
        return number_format(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 2) . ' s';
    }

    /**
     * Return the memory usage of the request.
     *
     * @return string
     */
    protected function memoryUsage()
    {
        $unit = array('b', 'kb', 'mb');

        $size = memory_get_usage(true);

        return round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }
}
