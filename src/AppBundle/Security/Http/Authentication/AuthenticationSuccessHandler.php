<?php

namespace AppBundle\Security\Http\Authentication;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler;

/**
 * Class AuthenticationSuccessHandler.
 *
 * @package AppBundle\Security\Http\Authentication
 * @author    Marius Adam  <marius.adam@evozon.com>
 */
class AuthenticationSuccessHandler extends DefaultAuthenticationSuccessHandler
{
    /**
     * @var AuthorizationChecker
     */
    protected $authorizationChecker;

    /**
     * @param AuthorizationChecker $checker
     *
     * @return $this
     */
    public function setAuthorizationChecker(AuthorizationChecker $checker)
    {
        $this->authorizationChecker = $checker;

        return $this;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        if($this->authorizationChecker->isGranted('ROLE_ADMIN', $token->getUser())) {
            $this->setOptions([
                'default_target_path' => '/admin'
            ]);
        }

        return parent::onAuthenticationSuccess($request, $token);
    }
}