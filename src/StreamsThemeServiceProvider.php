<?php namespace Anomaly\Streams\Addon\Theme\Streams;

use Illuminate\Support\ServiceProvider;

/**
 * Class StreamsThemeServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Theme\Streams
 */
class StreamsThemeServiceProvider extends ServiceProvider
{

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        app('twig')->addExtension(app('Anomaly\Streams\Addon\Theme\Streams\StreamsThemePlugin'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        app('events')->listen(
            'Anomaly.Streams.Platform.Ui.Table.Event.*',
            'Anomaly\Streams\Addon\Theme\Streams\Listener\TableListener'
        );
    }
}
 