<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Genre;
use Library_ETE\model\Data_Base\GenreDataBase; 
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class GenreController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;
        if (strpos($path_info, "generos")) {
            if (strpos($path_info, "didaticos")) {
                $response = $this->didatico();
            }else if (strpos($path_info, "literatura")) {
                $response = $this->paradidatico();
            }
        }

        return $response;
    }

    public function didatico()
    {
        $generoBD =  new GenreDataBase;
        $listGenreDidatico = $generoBD->queryGenre();
        $bodyHTTP = $this->getHTTPBodyBuffer("/genero/genero_didatico.php", ["listGenreDidatico" => $listGenreDidatico]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }
    public function paradidatico()
    {
        $bodyHTTP = $this->getHTTPBodyBuffer("/genero/genero_paradidatico.php");
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }
}
