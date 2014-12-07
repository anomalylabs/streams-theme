<?php namespace Anomaly\Streams\Addon\Theme\Streams;

use Illuminate\Support\ServiceProvider;

class StreamsThemeServiceProvider extends ServiceProvider
{

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
 