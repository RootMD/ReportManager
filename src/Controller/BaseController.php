<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2018-05-31
 * Time: 14:58
 */

namespace App\Controller;


use App\Models\Report;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    /**
     * @Route("/", name="ReportList")
     */
    public function show()
    {
        $reports[Report::Count()] = new Report('2015/05/25','21:15','First Dude');
        $reports[Report::Count()] = new Report('2015/05/26','04:14','Second Here, Mate');
        $reports[Report::Count()] = new Report('2015/05/27','21:37','Im not ur Mate, Pal');
        $reports[Report::Count()] = new Report('1111/11/11','00:00','I Like Trains');

        return $this->render('ReportViews/show.html.twig', [
            'reports' => $reports,
            ]);
    }
}