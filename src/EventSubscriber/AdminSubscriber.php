<?php

namespace App\EventSubscriber;

use App\Model\GetDateInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AdminSubscriber implements EventSubscriberInterface {

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setEntityCreatedAt'],
            BeforeEntityUpdatedEvent::class => ['setEntityUpdatededAt']
        ];
    }
    
    public function setEntityCreatedAt(BeforeEntityPersistedEvent $event) {

        $entity = $event->getEntityInstance();

        if (!$entity instanceof GetDateInterface) {
            return;
        }

        $entity->setCreatedAt(new \DateTime());
    }

    public function setEntityUpdatededAt(BeforeEntityUpdatedEvent $event) {

        $entity = $event->getEntityInstance();

        if (!$entity instanceof GetDateInterface) {
            return;
        }

        $entity->setUpdatedAt(new \DateTime());
    }
}