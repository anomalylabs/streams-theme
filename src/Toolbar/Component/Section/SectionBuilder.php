<?php namespace Anomaly\StreamsTheme\Toolbar\Component\Section;

use Anomaly\StreamsTheme\Toolbar\ToolbarBuilder;

/**
 * Class SectionBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Component\Section
 */
class SectionBuilder
{

    protected $input;

    protected $factory;


    public function build(ToolbarBuilder $builder)
    {
        $toolbar  = $builder->getToolbar();
        $sections = $toolbar->getSections();


    }
}
