<?php namespace Anomaly\StreamsTheme;

use Illuminate\Support\ServiceProvider;

/**
 * Class StreamsThemeServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme
 */
class StreamsThemeServiceProvider extends ServiceProvider
{

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        app('twig')->addExtension(app('Anomaly\StreamsTheme\StreamsThemePlugin'));
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
            'Anomaly\StreamsTheme\Listener\TableListener'
        );
    }
}
 