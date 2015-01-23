<?php namespace Anomaly\StreamsTheme\Toolbar\Component\Section;

use Anomaly\StreamsTheme\Toolbar\Component\Section\Contract\SectionInterface;
use Illuminate\Support\Collection;

/**
 * Class SectionCollection
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Component\Section
 */
class SectionCollection extends Collection
{

    /**
     * Return the active section.
     *
     * @return SectionInterface|null
     */
    public function active()
    {
        foreach ($this->items as $item) {
            if ($item instanceof SectionInterface && $item->isActive()) {
                return $item;
            }
        }

        return $this->first();
    }
}
