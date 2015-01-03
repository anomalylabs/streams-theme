<?php namespace Anomaly\StreamsTheme\Command;

/**
 * Class BuildSectionButtonsCommand
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Command
 */
class BuildSectionButtonsCommand
{

    /**
     * The active section.
     *
     * @var
     */
    protected $section;

    /**
     * Create a new BuildSectionButtonsCommand instance.
     *
     * @param $section
     */
    function __construct($section)
    {
        $this->section = $section;
    }

    /**
     * Get the active section.
     *
     * @return mixed
     */
    public function getSection()
    {
        return $this->section;
    }
}
 