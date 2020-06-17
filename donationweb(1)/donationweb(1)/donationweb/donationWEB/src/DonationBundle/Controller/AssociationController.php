<?php

namespace DonationBundle\Controller;

use DonationBundle\Entity\Association;
use DonationBundle\Form\AssociationType;
use DonationBundle\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class AssociationController extends Controller
{
    public function LoginAssociationAction(Request $request)
    {
        $association = new Association();
        $Form = $this->createForm(LoginType::class, $association);
        $Form->handleRequest($request);

        if ($Form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $associationdb = new Association();
            $associationdb = $em->getRepository("DonationBundle:Association")->findOneBy([
                'emailAssociation' => $association->getEmailAssociation()
            ]);

            if ($associationdb->getPasswordAssociation() == $association->getPasswordAssociation()) {
                $session = $request->getSession();
                $session->set('logged', $associationdb);
                return $this->redirectToRoute('homepage_Association');
            }
        }

        return $this->render('@Donation/Association/loginAssociation.html.twig', array(
            'form' => $Form->createView()
        ));
    }

    public function RegisterAssociationAction(Request $request)
    {
        $association = new Association();
        $association->setDateInscrit(new \DateTime());
        $Form = $this->createForm(AssociationType::class, $association);
        $Form->handleRequest($request);

        if ($Form->isSubmitted() && $Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($association);
            $em->flush();
            $message = \Swift_Message::newInstance()
                ->setSubject('Some Subject')
                ->setTo('tarek.loukil11@gmail.com')
                ->setFrom('tarek.loukil@esprit.tn')
                ->setBody('asdas');
            $this->get('mailer')->send($message);
            return $this->redirectToRoute('homepage');
        }
        return $this->render('@Donation/Association/registerAssociation.html.twig', array(
            'form' => $Form->createView(),

        ));
    }

    public function IndexAssociationAction(Request $request)
    {
        $session = $request->getSession();
        $user = $session->get('logged');
        return $this->render('@Donation/Association/indexAssociation.html.twig', array(
            'connected' => $user
        ));
    }

    public function DisplayAssociationAction(Request $request)
    {
        $session=$request->getSession();
        $user=$session->get('logged');
        $em = $this->getDoctrine()->getManager();
        $Associations = $em->getRepository('DonationBundle:Association')->findAll();
        return $this->render('@Donation/Association/displayAssociation.html.twig', array(
            'Associations' => $Associations,
            'connected' => $this->getUser(),
            'connectedAssociation' => $user
        ));
    }

    public function DisplayAssociationAdminAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $Associations = $em->getRepository('DonationBundle:Association')->findAll();
        return $this->render('@Donation/Admin/displayAssociationAdmin.html.twig', array(
            'Associations' => $Associations,
            'connected' => $this->getUser()
        ));
    }

    public function UpdateAssociationAction(Request $request)
    {
        $session = $request->getSession();
        $user = $session->get('logged');
        $em = $this->getDoctrine()->getManager();
        $a = $em->getRepository('DonationBundle:Association')->find($user);
        $Form = $this->createForm(AssociationType::class, $a);
        $Form->handleRequest($request);
        if ($Form->isSubmitted() && $Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('display_Association');
        }
        return $this->render('@Donation/Association/UpdateAssociation.html.twig', array(
            'form' => $Form->createView()
        ));

    }

    public function DeleteAssociationAction(Request $request)
    {
        $session = $request->getSession();
        $user = $session->get('logged');
        $em = $this->getDoctrine()->getManager();
        $a = $em->getRepository('DonationBundle:Association')->find($user);
        $em->remove($a);
        $em->flush();
        $session->invalidate();
        return $this->redirectToRoute('homepage');

    }

    public function LogoutAssociationAction(Request $request)
    {
        $session=$request->getSession();
        $user=$session->get('logged');
        $session = $request->getSession();
        $session->invalidate();
        return $this->redirectToRoute('login_association', array(
        'connectedAssociation' => $user));
    }

    public function DeleteAssociationAdminAction($id, Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $a = $em->getRepository('DonationBundle:Association')->find($id);
        $em->remove($a);
        $em->flush();
        return $this->redirectToRoute('display_Association_Admin');

    }

}