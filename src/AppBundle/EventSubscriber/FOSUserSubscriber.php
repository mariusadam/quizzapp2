<?php

namespace AppBundle\EventSubscriber;

use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use FOS\UserBundle\Model\UserInterface;

/**
 * Class FOSUserSubscriber.
 *
 * @package AppBundle\EventSubscriber
 * @author    Marius Adam  <marius.adam@evozon.com>
 */
class FOSUserSubscriber implements EventSubscriberInterface
{

    /**
     * @var UserManager
     */
    protected $userManager;

    /**
     * FOSUserSubscriber constructor.
     *
     * @param UserManager $userManager
     */
    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            FOSUserEvents::REGISTRATION_COMPLETED => 'onRegistrationCompleted',
            FOSUserEvents::CHANGE_PASSWORD_SUCCESS => 'onChangePasswordSuccess',
            FOSUserEvents::PROFILE_EDIT_SUCCESS => 'onProfileEditSuccess',
            FOSUserEvents::SECURITY_IMPLICIT_LOGIN => 'onImplicitLoginSuccess'
        ];
    }

    /**
     * @param FilterUserResponseEvent $event
     */
    public function onRegistrationCompleted(FilterUserResponseEvent $event)
    {
        /** @var \AppBundle\Entity\User $user */
        $user = $event->getUser();

        $parts = explode("@", $user->getEmail());
        $username = isset($parts[0]) ? $parts[0] : $user->getEmail();

        $user
            ->setUsername($username)
            ->addRole('ROLE_USER');

        $this->userManager->updateUser($user);
    }

    /**
     * @param FormEvent $event
     */
    public function onChangePasswordSuccess(FormEvent $event)
    {
        //todo
    }

    /**
     * @param FormEvent $event
     */
    public function onProfileEditSuccess(FormEvent $event)
    {
        //todo
    }
}