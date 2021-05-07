<?php

namespace App\Extensions\Markdown;

use League\CommonMark\EnvironmentInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Block\Element\Heading;

class AddHeadingStyleClassesRenderer
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
            if ($node instanceof Heading) {
                $node->data['attributes'] = array('class' => 'text-xl font-extrabold');
            }
        }
    }
}
