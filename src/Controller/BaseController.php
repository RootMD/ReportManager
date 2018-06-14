<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2018-05-31
 * Time: 14:58
 */

namespace App\Controller;


use App\Entity\Report;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends AbstractController
{
    /**
     * @Route("/", name="ReportList")
     */
    public function show()
    {
        $repository = $this->getDoctrine()->getRepository(Report::class);
        $reports = $repository->findAll();



        return $this->render('ReportViews/show.html.twig', [
                'reports' => $reports
            ]);
    }

    /**
     * @Route("/add",name="addReport")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function Add(Request $request, EntityManagerInterface $em){
        $report = new Report();
        $form = $this->createFormBuilder($report)
            ->add('date', DateType::class, array(
                'attr' => array('class' => 'form-group'
                )))
            ->add('time', TimeType::class, array(
                'attr' => array('class' => 'form-group'
                )))
            ->add('github_issue', TextType::class, array(
                'attr' => array('class' => 'form-control'
                )))
            ->add('content', TextType::class, array(
                'attr' => array('class' => 'form-control'
                )))
            ->add('save', SubmitType::class, array(
                'label' => 'Create Report',
                'attr' => array('class' => 'btn mt-3'
                )))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $report = $form->getData();
             $em->persist($report);
             $em->flush();

            return $this->redirectToRoute('ReportList');
        }


        return $this->render('ReportViews/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/remove/{id}", name="removeReport")
     * @param Request $request
     * @param $id
     * @param EntityManagerInterface $em
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function Remove(Request $request, $id, EntityManagerInterface $em){
        $repository = $this->getDoctrine()->getRepository(Report::class);
        $reportToRemove = $repository->findOneBy(['id' => $id]);
            if (!$reportToRemove) {
                throw $this->createNotFoundException(
                    'No product found for id '.$id
                );
            }
            $em->remove($reportToRemove);
            $em->flush();
            return $this->redirectToRoute('ReportList');
    }

    /**
     * @Route("/edit/{id}", name="editReport")
     * @param Request $request
     * @param $id
     * @param EntityManagerInterface $em
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function Edit(Request $request, $id, EntityManagerInterface $em){
        $repository = $this->getDoctrine()->getRepository(Report::class);



            $reportToEdit = $repository->findOneBy(['id' => $id]);
            if (!$reportToEdit) {
                throw $this->createNotFoundException(
                    'No product found for id '.$id
                );
            }
            $form = $this->createFormBuilder($reportToEdit)
                ->add('date', DateType::class, array(
                    'attr' => array('class' => 'form-group'
                    )))
                ->add('time', TimeType::class, array(
                    'attr' => array('class' => 'form-group'
                    )))
                ->add('github_issue', TextType::class, array(
                    'attr' => array('class' => 'form-control'
                    )))
                ->add('content', TextType::class, array(
                    'attr' => array('class' => 'form-control'
                    )))
                ->add('save', SubmitType::class, array(
                    'label' => 'Update Report',
                    'attr' => array('class' => 'btn mt-3'
                    )))
                ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $reportToEdit = $form->getData();
                $em->flush();

                return $this->redirectToRoute('ReportList');
            }

            return $this->render('ReportViews/add.html.twig', array(
                'form' => $form->createView(),
            ));

    }
}