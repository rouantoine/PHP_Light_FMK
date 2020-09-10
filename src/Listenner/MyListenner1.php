<?php
namespace Listenner;


use Event\ResponseEvent;

class MyListenner1
{
    public function onResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();
        
        if ($response->isRedirection()
            || ($response->headers->has('Content-Type') && false === strpos($response->headers->get('Content-Type'), 'html'))
            || 'html' !== $event->getRequest()->getRequestFormat()
            ) {
                return;
            }
            
            $response->setContent($response->getContent().' Listenner1 ');
    }
}