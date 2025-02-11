<?php

/**
 * This file is part of the guanguans/notify.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\Notify\Messages\FeiShu;

use Guanguans\Notify\Messages\Message;

class TextMessage extends Message
{
    /**
     * @var string
     */
    protected $type = 'text';

    /**
     * @var string[]
     */
    protected $defined = [
        'text',
    ];

    public function __construct(string $text)
    {
        parent::__construct([
            'text' => $text,
        ]);
    }

    /**
     * @return array{msg_type: mixed, content: mixed[]}
     */
    public function transformToRequestParams(): array
    {
        return [
            'msg_type' => $this->type,
            'content' => $this->getOptions(),
        ];
    }
}
