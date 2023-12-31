<? declare(strict_types=1);

namespace App\Security;

use App\DTO\Request\Login;
use App\Service\Interface\AuthServiceInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Serializer\SerializerInterface;

class Authenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_API_ROUTE = 'api.auth.login';
    public const LOGIN_PAGE_ROUTE = 'auth.login';

    public function __construct(
        private readonly UrlGeneratorInterface $urlGenerator,
        private readonly SerializerInterface $serializer,
        private readonly AuthServiceInterface $authService,
    ) {
    }

    public function authenticate(Request $request): Passport
    {
        $dto = $this->serializer->deserialize($request->getContent(), Login::class, 'json');

        $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $dto->username);

        return new Passport(
            new UserBadge($dto->username),
            new PasswordCredentials($dto->password),
            [
                // new CsrfTokenBadge('authenticate', $dto->csrfToken),
                new RememberMeBadge(),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        return new RedirectResponse($this->urlGenerator->generate('movie.index'));
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
    {
        if ($request->hasSession()) {
            $request->getSession()->set(SecurityRequestAttributes::AUTHENTICATION_ERROR, $exception);
        }

        return new RedirectResponse($this->getLoginPageUrl());
    }

    public function start(Request $request, AuthenticationException $authException = null): Response
    {
        return new RedirectResponse($this->getLoginPageUrl());
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_API_ROUTE);
    }

    private function getLoginPageUrl(): string
    {
        return $this->urlGenerator->generate(self::LOGIN_PAGE_ROUTE);
    }
}
