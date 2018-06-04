<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2018-06-03
 * Time: 14:17
 */

namespace App\Controller;


use App\Models\Report;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\HttpFoundation\Request;

class AddReportController extends AbstractController
{
    /**
     * @Route("/add",name="addReport")
     */
    public function new(Request $request){
        $report = new Report(new \DateTime('now'),new \DateTime('now'),null);

        $form = $this->createFormBuilder($report)
            ->add('date', DateType::class)
            ->add('time', TimeType::class)
            ->add('content', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Report'))
            ->getForm();

        return $this->render('ReportViews/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}