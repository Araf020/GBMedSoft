<?php

namespace Http\Message\Formatter;

use Http\Message\Formatter;
use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * A formatter that prints the complete HTTP message.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class FullHttpMessageFormatter implements Formatter
{
    /**
     * The maximum length of the body.
     *
     * @var int|null
     */
    private $maxBodyLength;

    /**
     * @param int|null $maxBodyLength
     */
    public function __construct($maxBodyLength = 1000)
    {
        $this->maxBodyLength = $maxBodyLength;
    }

    /**
     * {@inheritdoc}
     */
    public function formatRequest(RequestInterface $request)
    {
        $message = sprintf(
            "%s %s HTTP/%s\n",
            $request->getMethod(),
            $request->getRequestTarget(),
            $request->getProtocolVersion()
        );

        foreach ($request->getHeaders() as $name => $values) {
            $message .= $name.': '.implode(', ', $values)."\n";
        }

        return $this->addBody($request, $message);
    }

    /**
     * {@inheritdoc}
     */
    public function formatResponse(ResponseInterface $response)
    {
        $message = sprintf(
            "HTTP/%s %s %s\n",
            $response->getProtocolVersion(),
            $response->getStatusCode(),
            $response->getReasonPhrase()
        );

        foreach ($response->getHeaders() as $name => $values) {
            $message .= $name.': '.implode(', ', $values)."\n";
        }

        return $this->addBody($response, $message);
    }

    /**
     * Add the message body if the stream is seekable.
     *
     * @param string $message
     *
     * @return string
     */
    private function addBody(MessageInterface $request, $message)
    {
        $message .= "\n";
        $stream = $request->getBody();
        if (!$stream->isSeekable() || 0 === $this->maxBodyLength) {
            // Do not read the stream
            return $message;
        }

        $data = $stream->__toString();
        $stream->rewind();

        if (preg_match('/[\x00-\x1F\x7F]/', $data)) {
            return $message.'[binary stream omitted]';
        }

        if (null === $this->maxBodyLength) {
            return $message.$data;
        }

        return $message.mb_substr($data, 0, $this->maxBodyLength);
    }
}
