<?php

namespace App\EventSubscriber;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserSubscribeSubscriber implements EventSubscriberInterface
{
    private UserPasswordHasherInterface $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this -> encoder = $encoder;
    }

    /**
     * @param BeforeEntityPersistedEvent|BeforeEntityUpdatedEvent $event
     */
    public function onBeforeEntityPersistanceEvent($event)
    {
        $user = $event->getEntityInstance();
        if (!$user instanceof User) {
            return;
        }

        if (empty($user->getPlainPassword())) {
            return;
        }
        //encoder le password
        $newPwd = $this ->encoder->hashPassword($user, $user->getPlainPassword());
        $user->setPassword($newPwd);
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => 'onBeforeEntityPersistanceEvent',
            BeforeEntityUpdatedEvent::class => 'onBeforeEntityPersistanceEvent',

        ];
    }
}
