<?php

namespace DonationBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use DonationBundle\Repository\ActionRepository;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use DonationBundle\Entity\Action;
use DonationBundle\Entity\Association;
use DonationBundle\Form\ActionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ActionController extends Controller
{


    public function AddActionAction($id,Request $request)
    {
        $action=new Action();
        $association=$this->getDoctrine()->getRepository('DonationBundle:Association')->find($id);
        $action->setIdAssociation($association);
        $Form=$this->createForm(ActionType::class,$action);
        $Form->handleRequest($request);

        if ($Form->isSubmitted()&&$Form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
           $em->persist($action);
           $em->flush();
           return $this->redirectToRoute('display_Action');
        }
        return $this->render('@Donation/Action/addAction.html.twig', array(
            'form'=>$Form->createView()
        ));
    }
    public function DisplayActionAction(Request $request)
    {   $session=$request->getSession();
        $user=$session->get('logged');
        $em=$this->getDoctrine()->getManager();
        $Actions=$em->getRepository('DonationBundle:Action')->findAll();
        return $this->render('@Donation/Action/displayAction.html.twig', array(
            'Actions' => $Actions,
            'connected' => $this->getUser(),
            'connectedAssociation' => $user
        ));

    }
    public function DisplayActionAdminAction(Request $request)
    {   $session=$request->getSession();
        $user=$session->get('logged');
        $em=$this->getDoctrine()->getManager();
        $Actions=$em->getRepository('DonationBundle:Action')->findAll();
        return $this->render('@Donation/Admin/displayActionAdmin.html.twig', array(
            'Actions' => $Actions,
            'connected' => $this->getUser(),
            'connectedAssociation' => $user
        ));

    }
    public function UpdateActionAction($id,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $a=$em->getRepository('DonationBundle:Action')->find($id);
        $Form=$this->createForm(ActionType::class,$a);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()&&$Form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('display_Action');
        }
        return $this->render('@Donation/Action/UpdateAction.html.twig', array(
            'form'=>$Form->createView()
        ));


    }
    public function DeleteActionAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        $a=$em->getRepository('DonationBundle:Action')->find($id);
        $em->remove($a);
        $em->flush();
        return $this->redirectToRoute('display_Action');

    }
    public function DeleteActionAdminAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        $a=$em->getRepository('DonationBundle:Action')->find($id);
        $em->remove($a);
        $em->flush();
        return $this->redirectToRoute('display_Action_Admin');

    }
    public function ParticipateActionAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $a=$em->getRepository('DonationBundle:Action')->find($id);
        $a->setNbvAction($a->getNbvAction()-1);
        $em->flush();
        return $this->redirectToRoute('display_Action');

    }
    public function statActionAdminAction()
    {
        $pieChart = new PieChart();
        $em = $this->getDoctrine();
        $actions = $em->getRepository(Action::class)->findAll();
        $totalVol = 0;
        foreach ($actions as $action) {
            $totalVol = $totalVol + $action->getNbvAction();
        }
        $data = array();
        $stat = ['Action', 'nbvAction'];
        $nb = 0;
        array_push($data, $stat);
        foreach ($actions as $action) {
            $stat = array();
            array_push($stat, $action->getNameAction(), (($action->getNbvAction()) * 100) / $totalVol);
            $nb = ($action->getNbvAction() * 100) / $totalVol;
            $stat = [$action->getNameAction(), $nb];
            array_push($data, $stat);
        }
        $pieChart->getData()->setArrayToDataTable(
            $data
        );
        $pieChart->getOptions()->setTitle('Percentage of volunteers per action');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#000000');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Circular Std Medium');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        return $this->render('@Donation/Admin/statAction.html.twig', array(
            'piechart' => $pieChart,
            'connected' => $this->getUser()
            ));
    }


    public function SearchAction(Request $request) {
        $session=$request->getSession();
        $user=$session->get('logged');
        if ($request->get('req')) {
            $Actions = $this->getDoctrine()->getManager()->getRepository('DonationBundle:Action')->fbQuery($request->get('req'));
            return $this->render('@Donation/Action/displayAction.html.twig', array('Actions' => $Actions,
                'connected' => $this->getUser(),
                'connectedAssociation' => $user
            ));
        }
        $Actions = $this->getDoctrine()->getManager()->getRepository('DonationBundle:Action')->findAll();
        return $this->render('@Donation/Action/displayAction.html.twig', array(
            'Actions' => $Actions,
            'connected' => $this->getUser(),
            'connectedAssociation' => $user
        ));
    }
}
