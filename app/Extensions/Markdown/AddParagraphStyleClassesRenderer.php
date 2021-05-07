<?php

namespace App\Extensions\Markdown;

use League\CommonMark\EnvironmentInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Block\Element\Paragraph;

class AddParagraphStyleClassesRenderer
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
            if ($node instanceof Paragraph) {
                $node->data['attributes'] = array('class' => 'mb-2');
            }
        }
    }
}
