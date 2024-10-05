<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    /**
     * Summary of httpClient
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * Summary of crawler
     * @var Crawler
     */
    private $crawler;
    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscar(string $url): array
    {
        $response = $this->httpClient->request("GET", $url);

        $html = $response->getBody();
        $this->crawler->addHtmlContent($html);
        $elementosCursos = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];

        foreach ($elementosCursos as $elemento) {
            $cursos[] = $elemento->textContent;
        }

        return $cursos;
    }
}
