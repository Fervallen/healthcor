<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;

class ApiTokenAuthenticator extends AbstractGuardAuthenticator
{
    public function supports(Request $request): bool
    {
        return true;
    }

    public function getCredentials(Request $request): array
    {
        if (!$token = $request->headers->get('X-AUTH-TOKEN')) {
            $token = null;
        }

        return ['token' => $token];
    }

    public function getUser($credentials, UserProviderInterface $userProvider): ?UserInterface
    {
        if (!$credentials['token'] || !($userProvider instanceof ApiTokenUserProvider)) {
            return null;
        }

        return $userProvider->getUserByApiToken($credentials['token']);
    }

    public function checkCredentials($credentials, UserInterface $user): bool
    {
        return true;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): JsonResponse
    {
        return new JsonResponse(
            ['message' => strtr($exception->getMessageKey(), $exception->getMessageData())],
            Response::HTTP_FORBIDDEN
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey): ?bool
    {
        return null;
    }

    public function supportsRememberMe(): bool
    {
        return false;
    }

    public function start(Request $request, AuthenticationException $authException = null): JsonResponse
    {
        return new JsonResponse(
            ['message' => 'Auth header required'],
            Response::HTTP_UNAUTHORIZED
        );
    }
}
