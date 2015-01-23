<?php namespace Anomaly\StreamsTheme\Toolbar\Component\Section;

use Anomaly\StreamsTheme\Toolbar\Component\Section\Guesser\HrefGuesser;
use Anomaly\StreamsTheme\Toolbar\Component\Section\Guesser\TextGuesser;

/**
 * Class SectionGuesser
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Component\Section
 */
class SectionGuesser
{

    /**
     * The text guesser.
     *
     * @var TextGuesser
     */
    protected $text;

    /**
     * The HREF guesser.
     *
     * @var HrefGuesser
     */
    protected $href;

    /**
     * Create a new SectionGuesser instance.
     *
     * @param TextGuesser $text
     * @param HrefGuesser $href
     */
    function __construct(TextGuesser $text, HrefGuesser $href)
    {
        $this->text = $text;
        $this->href = $href;
    }

    /**
     * Guess section properties.
     *
     * @param array $sections
     * @return array
     */
    public function guess(array $sections)
    {
        foreach ($sections as &$section) {
            $this->text->guess($section);
            $this->href->guess($section);
        }

        return $sections;
    }
}
