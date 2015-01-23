<?php namespace Anomaly\StreamsTheme\Command\Handler;

use Anomaly\StreamsTheme\Toolbar\ToolbarBuilder;

/**
 * Class MakeToolbarHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Command\Handler
 */
class RenderToolbarHandler
{

    /**
     * The toolbar builder.
     *
     * @var ToolbarBuilder
     */
    protected $builder;

    /**
     * Create a new MakeToolbarHandler instance.
     *
     * @param ToolbarBuilder $builder
     */
    public function __construct(ToolbarBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function handle()
    {
        return $this->builder->render();
    }
}
