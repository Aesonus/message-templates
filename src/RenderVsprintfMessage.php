<?php
/*
 * The software is Copyright (C)2019 by Digital Architects
 * The software includes all the files in the directory this file is located
 * This software makes use of open source software. Such software is governed
 * by their respective licenses
 * All Rights Reserved
 */
namespace Aesonus\Messages;

/**
 * Renders a message using vsprintf()
 *
 * @author Narya
 */
class RenderVsprintfMessage extends AbstractRenderMessage
{
    /**
     * {@inheritdoc}
     */
    public function render($data = null): string
    {
        return vsprintf($this->source->getTemplate(), $data);
    }
}
