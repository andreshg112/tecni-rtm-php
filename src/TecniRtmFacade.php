<?php

namespace Andreshg112\TecniRtm;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Andreshg112\TecniRtm\Skeleton\SkeletonClass
 */
class TecniRtmFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tecni-rtm';
    }
}
