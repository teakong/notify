<?php

/**
 * This file is part of the guanguans/notify.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\Notify\Clients;

class NowPushClient extends Client
{
    /**
     * @var string
     */
    public const REQUEST_URL_TEMPLATE = 'https://www.api.nowpush.app/v3/%s';

    public function __construct(array $options = [])
    {
        $this->sending(static function (self $client): void {
            $client->setHttpOptions([
                'headers' => [
                    'Authorization' => 'Bearer '.$client->getToken(),
                ],
            ]);
        });

        parent::__construct($options);
    }

    public function getRequestUrl(): string
    {
        return sprintf(self::REQUEST_URL_TEMPLATE, 'sendMessage');
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->wrapSendCallbacksWithRequestAsync(function () {
            return $this->getHttpClient()->get(sprintf(self::REQUEST_URL_TEMPLATE, 'getUser'));
        });
    }
}
