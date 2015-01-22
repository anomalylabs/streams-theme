<?php namespace Anomaly\StreamsTheme\Toolbar\Component\Section\Command;

use Anomaly\StreamsTheme\Toolbar\ToolbarBuilder;

/**
 * Class BuildSections
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Component\Section\Command
 */
class BuildSections
{

    /**
     * The toolbar builder.
     *
     * @var ToolbarBuilder
     */
    protected $builder;

    /**
     * Create a new BuildSections instance.
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
