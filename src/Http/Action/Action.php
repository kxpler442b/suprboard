<?php

declare(strict_types = 1);

namespace App\Http\Action;

use Slim\Views\Twig;
use GuzzleHttp\Psr7\Request;
use Psr\Log\LoggerInterface;
use GuzzleHttp\Psr7\Response;
use App\Http\Action\ActionPayload;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

abstract class Action
{
    protected EntityManager $em;
    protected Twig $twig;
    protected LoggerInterface $logger;
    protected Request $request;
    protected Response $response;
    protected array $args;

    public function __construct(ContainerInterface $c, LoggerInterface $logger)
    {
        $this->em = $c->get(EntityManager::class);
        $this->twig = $c->get(Twig::class);
        $this->logger = $logger;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->request = $request;
        $this->response = $response;
        $this->args = $args;


        return $this->action();
    }

    abstract protected function action(): Response;

    /**
     * Returns the parsed form data as an array.
     *
     * @return void
     */
    protected function getFormData()
    {
        /**
         * TODO: Write a function that is compatible with GuzzleHttp
         */
    }

    /**
     * Checks if an argument exists.
     *
     * @param string $name
     * 
     * @return void
     */
    protected function resolveArg(string $name)
    {
        if(!isset($this->args[$name])) {

        }

        return $this->args[$name];
    }

    protected function respondWithData($data = null, int $statusCode = 200): Response
    {
        $payload = new ActionPayload($statusCode, $data);

        return $this->respond($payload);
    }

    protected function respondWithView(string $template, array $data = []): Response
    {
        return $this->twig->render($this->response, $template, $data);
    }

    protected function respond(ActionPayload $payload): Response
    {
        $json = json_encode($payload, JSON_PRETTY_PRINT);
        $this->response->getBody()->write($json);

        return $this->response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus($payload->getStatusCode());
    }
}