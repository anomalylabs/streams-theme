<?php namespace Anomaly\StreamsTheme\Toolbar\Component\Button\Command\Handler;

use Anomaly\StreamsTheme\Toolbar\Component\Button\ButtonBuilder;
use Anomaly\StreamsTheme\Toolbar\Component\Button\Command\BuildButtons;

/**
 * Class BuildButtonsHandler
 *
 * @link          http://anomaly.is/streams-Platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Component\Button\Listener\Command
 */
class BuildButtonsHandler
{

    /**
     * The button builder.
     *
     * @var \Anomaly\StreamsTheme\Toolbar\Component\Button\ButtonBuilder
     */
    protected $builder;

    /**
     * Create a new BuildButtonsHandler instance.
     *
     * @param ButtonBuilder $builder
     */
    public function __construct(ButtonBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Build buttons and load them to the toolbar.
     *
     * @param BuildButtons $command
     */
    public function handle(BuildButtons $command)
    {
        $this->builder->build($command->getBuilder());
    }
}
