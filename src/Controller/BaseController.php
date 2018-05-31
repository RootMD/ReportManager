<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2018-05-31
 * Time: 14:58
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
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

        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];

        return $this->render('Commits/show.html.twig', [
            'title'=> ucwords(str_replace('-','',$slug)),
            'comments' => $comments,
            ]);
    }
}