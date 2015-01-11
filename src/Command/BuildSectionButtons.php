<?php namespace Anomaly\StreamsTheme\Command;

/**
 * Class BuildSectionButtons
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Command
 */
class BuildSectionButtons
{

    /**
     * The active section.
     *
     * @var
     */
    protected $section;

    /**
     * Create a new BuildSectionButtons instance.
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
 