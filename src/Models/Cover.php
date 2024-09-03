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

    public function __construct(private DOMDocument $tree, public array $params) {}

    public function toElement(): DOMElement
    {
        $element = $this->tree->createElement(static::TAG);
        $element->setAttribute('version', '1.0');

        $emitter = $this->tree->createElement(static::TAG_EMITTER, $this->params['rut_emisor']);
        $element->appendChild($emitter);

        $sender = $this->tree->createElement(static::TAG_SENDER, $this->params['rut_despachador']);
        $element->appendChild($sender);

        $receiver = $this->tree->createElement(static::TAG_RECEIVER, $this->params['rut_receptor']);
        $element->appendChild($receiver);

        $authorized_at = $this->tree->createElement(static::TAG_AUTHORIZED_AT, $this->params['fecha_autorizacion']);
        $element->appendChild($authorized_at);

        $resolution_number = $this->tree->createElement(static::TAG_RESOLUTION_NUMBER, $this->params['numero_resolucion']);
        $element->appendChild($resolution_number);

        return $element;
    }
}
