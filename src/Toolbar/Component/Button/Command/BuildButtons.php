<?php namespace Anomaly\StreamsTheme\Toolbar\Component\Button\Command;

use Anomaly\StreamsTheme\Toolbar\ToolbarBuilder;

/**
 * Class BuildButtons
 *
 * @link          http://anomaly.is/streams-Platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Component\Button\Command
 */
class BuildButtons
{

    /**
     * The toolbar builder.
     *
     * @var ToolbarBuilder
     */
    protected $builder;

    /**
     * Create a new BuildButtons instance.
     *
     * @param ToolbarBuilder $builder
     */
    public function __construct(ToolbarBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Get the toolbar builder.
     *
     * @return ToolbarBuilder
     */
    public function getBuilder()
    {
        return $this->builder;
    }
}
