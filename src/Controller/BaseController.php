<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2018-05-31
 * Time: 14:58
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('First thing');
    }

    /**
     * @Route("/{slug}")
     */
    public function show($slug)
    {
        return new Response(sprintf(
            'bla %s',
            $slug
        ));
    }
}