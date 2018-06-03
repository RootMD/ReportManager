<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2018-05-31
 * Time: 14:58
 */

namespace App\Controller;


use App\Models\Raport;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function show()
    {
        $rapports[Raport::Count()] = new Raport('2015/05/25','21:15','I ate a normal rock once. It did NOT taste like bacon!');
        $rapports[Raport::Count()] = new Raport('2015/05/26','04:14','Woohoo! I\'m going on an all - asteroid diet!');
        $rapports[Raport::Count()] = new Raport('2015/05/27','21:37','I like bacon too! Buy some from my site! bakinsomebacon.com');
        $rapports[Raport::Count()] = new Raport('1111/11/11','00:00','I Like Trains');

        return $this->render('RapportViews/show.html.twig', [
            'rapports' => $rapports,
            ]);
    }
}