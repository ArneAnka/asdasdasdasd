<?php

namespace App\Extensions\Markdown;

use League\CommonMark\EnvironmentInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Inline\Element\Image;

class AddImageStyleClassesRenderer
{

    /**
     * @param DocumentParsedEvent $e
     *
     * @return void
     */
    public function __invoke(DocumentParsedEvent $e)
    {
        $walker = $e->getDocument()->walker();

        while ($event = $walker->next()) {
            $node = $event->getNode();
            if ($node instanceof Image) {
                $node->data['attributes'] = array('class' => 'rounded-lg shadow border border-gray-200');
            }
        }
    }
}
