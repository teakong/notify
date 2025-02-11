<?php

/**
 * This file is part of the guanguans/notify.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\Notify\Messages;

use Guanguans\Notify\Contracts\MessageInterface;
use Guanguans\Notify\Traits\CreateStaticable;
use Guanguans\Notify\Traits\HasOptions;

class Message implements MessageInterface
{
    use HasOptions;
    use CreateStaticable;

    /**
     * Message constructor.
     */
    public function __construct(array $options = [])
    {
        $this->setOptions($options);
    }

    /**
     * {@inheritDoc}
     */
    public function transformToRequestParams()
    {
        return $this->getOptions();
    }
}
