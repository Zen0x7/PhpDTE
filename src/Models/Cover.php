<?php

namespace DTE\Models;

use DOMDocument;
use DOMElement;

class Cover
{
    public const string TAG = 'Caratula';

    public const string TAG_EMITTER = 'RutEmisor';

    public const string TAG_SENDER = 'RutEnvia';

    public const string TAG_RECEIVER = 'RutReceptor';

    public const string TAG_AUTHORIZED_AT = 'FchResol';

    public const string TAG_RESOLUTION_NUMBER = 'NroResol';

    public function __construct(public string $emitter, public string $sender, public string $receiver, public string $authorization_at, public string $resolution_number) {}

    public function toElement(DOMDocument $document): DOMElement
    {
        $element = $document->createElement(static::TAG);
        $element->setAttribute('version', '1.0');

        $emitter = $document->createElement(static::TAG_EMITTER, $this->emitter);
        $element->appendChild($emitter);

        $sender = $document->createElement(static::TAG_SENDER, $this->sender);
        $element->appendChild($sender);

        $receiver = $document->createElement(static::TAG_RECEIVER, $this->receiver);
        $element->appendChild($receiver);

        $authorized_at = $document->createElement(static::TAG_AUTHORIZED_AT, $this->authorization_at);
        $element->appendChild($authorized_at);

        $resolution_number = $document->createElement(static::TAG_RESOLUTION_NUMBER, $this->resolution_number);
        $element->appendChild($resolution_number);

        return $element;
    }
}
