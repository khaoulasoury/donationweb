<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $session=$request->getSession();
        $asso=$session->get('logged');
        $user=$this->getUser();

        if ($user==null){
            return $this->render('default/index.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'connected' => $this->getUser(),
                'connectedAssociation' => $asso
            ]);

        }else if($user->hasRole('ROLE_ADMIN')){
            return $this->render('@Donation/Admin/Home.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'connected' => $this->getUser(),
                'connectedAssociation' => $asso
            ]);
        }else{
            return $this->render('default/index.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'connected' => $this->getUser(),
                'connectedAssociation' => $asso
            ]);
        }
    }


    /**
     * @Route("/About", name="aboutpage")
     */
    public function aboutAction(Request $request)
    {
        $user=$this->getUser();
        $session=$request->getSession();
        $asso=$session->get('logged');
        $user=$this->getUser();
        if ($user==null){
            return $this->render('default/about.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'connected' => $this->getUser(),
                'connectedAssociation' => $asso
            ]);

        }else if($user->hasRole('ROLE_ADMIN')){
            return new Response("hello admin");
        }else{
            return $this->render('default/about.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'connected' => $this->getUser(),
                'connectedAssociation' => $asso
            ]);
        }
    }

    /**
     * @Route("/Contact", name="contactpage")
     */
    public function contactAction(Request $request)
    {
        $user=$this->getUser();
        $session=$request->getSession();
        $asso=$session->get('logged');
        $user=$this->getUser();

        if ($user==null){
            return $this->render('default/contact.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'connected' => $this->getUser(),
                'connectedAssociation' => $asso
            ]);

        }else if($user->hasRole('ROLE_ADMIN')){
            return new Response("hello admin");
        }else{
            return $this->render('default/contact.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'connected' => $this->getUser(),
                'connectedAssociation' => $asso
            ]);
        }
    }



    /**
     * @Route("/Admin", name="dashboardpage")
     */
    public function dashboardAction(Request $request)
    {
        $user=$this->getUser();
        return $this->render('default/dashboard.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'connected' => $this->getUser()
        ]);

    }

}
