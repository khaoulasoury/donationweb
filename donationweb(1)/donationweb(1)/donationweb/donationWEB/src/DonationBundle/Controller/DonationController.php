<?php


namespace DonationBundle\Controller;

use DonationBundle\DonationBundle;
use DonationBundle\Entity\Event;
use DonationBundle\Entity\Activity;
use DonationBundle\Form\ActivityType;
use DonationBundle\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DonationController extends Controller
{

    public function eventAction(Request $request)
    {
        $user=$this->getUser();

        if ($user==null){
            return $this->render('@Donation/Event/smplist.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'connected' => $this->getUser()
            ]);

        }else if($user->hasRole('ROLE_ADMIN')){
            return new Response("hello admin");
        }else{
            return $this->render('@Donation/Event/list.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'connected' => $this->getUser()
            ]);
        }
    }


    public function addeventAction(Request $request)
    {
        $user=$this->getUser();

        if ($user==null){
            return $this->render('default/addevent.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'connected' => $this->getUser()
            ]);

        }else if($user->hasRole('ROLE_ADMIN')){
            return new Response("hello admin");
        }else{
            return $this->render('default/addevent.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'connected' => $this->getUser()
            ]);
        }
    }

    public function addactivityAction(Request $request)
    {
        $user=$this->getUser();

        if ($user==null){
            return $this->render('default/addactivity.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'connected' => $this->getUser()
            ]);

        }else if($user->hasRole('ROLE_ADMIN')){
            return new Response("hello admin");
        }else{
            return $this->render('default/addactivity.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
                'connected' => $this->getUser()
            ]);
        }
    }

    public function ajoutAction(Request $request)
    {
            $user=$this->getUser();
            $session=$request->getSession();
            $asso=$session->get('logged');
            $id = $request->get('id');
            $event = new Event();
            $form = $this->createform(EventType::class,$event);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid())
            {
                $em=$this->getDoctrine()->getManager();
                $file = $event->getPoster();
                $filename= md5(uniqid()) . '.' . $file->guessExtension();
                $file->move($this->getParameter('photos_directory'), $filename);
                $event->setPoster($filename);
                $em->persist($event);
                $em->flush();
                $this->addFlash('info', 'Created Successfully !');
                return $this->redirectToRoute('donation_listpage');
            }
            return$this->render("@Donation/Event/addevent.html.twig",array(
                'form'=>$form->createView(),
                'connected' => $this->getUser(),
                'connectedAssociation' => $asso
            ));
        }

    public function listpostAction(Request $request)
    {
        $user=$this->getUser();
        $session=$request->getSession();
        $asso=$session->get('logged');
        $em=$this->getDoctrine()->getManager();
        $posts=$em->getRepository('DonationBundle:Event')->findAll();
        return $this->render('@Donation/Event/list.html.twig', array(
            "posts" =>$posts,
            'connected' => $this->getUser(),
            'connectedAssociation' => $asso
        ));

    }
    public function smpllistAction(Request $request)
    {
        $user=$this->getUser();
        $session=$request->getSession();
        $asso=$session->get('logged');
        $em=$this->getDoctrine()->getManager();
        $posts=$em->getRepository('DonationBundle:Event')->findAll();
        return $this->render('@Donation/Event/smplist.html.twig', array(
            "posts" =>$posts,
            'connected' => $this->getUser(),
            'connectedAssociation' => $asso
        ));

    }
    public function updateAction(Request $request, $id)
    {
        $user=$this->getUser();
        $session=$request->getSession();
        $asso=$session->get('logged');
        $em=$this->getDoctrine()->getManager();
        $p= $em->getRepository('DonationBundle:Event')->find($id);
        $form=$this->createForm(EventType::class,$p);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $file = $p->getPoster();
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $p->setPoster($filename);
            $em= $this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush();
           return $this->redirectToRoute('donation_listpage');

        }
        return $this->render('@Donation/Event/update.html.twig', array(
            "form"=> $form->createView(),
            'connected' => $this->getUser(),
            'connectedAssociation' => $asso
        ));
    }
    public function deletepostAction(Request $request)
    {
        $user=$this->getUser();
        $session=$request->getSession();
        $asso=$session->get('logged');
        $id = $request->get('id');
        $em= $this->getDoctrine()->getManager();
        $Post=$em->getRepository('DonationBundle:Event')->find($id);
        $em->remove($Post);
        $em->flush();
        return $this->redirectToRoute('donation_listpage', array(
            'connected' => $this->getUser(),
            'connectedAssociation' => $asso
        ));
    }
    public function detailsAction(Request $request,$id)
    {

        $user=$this->getUser();
        $session=$request->getSession();
        $asso=$session->get('logged');
        $em= $this->getDoctrine()->getManager();
        $p=$em->getRepository('DonationBundle:Event')->find($id);
        $pp=$em->getRepository('DonationBundle:Activity')->find($id);
        return $this->render('@Donation/Event/details.html.twig', array(
            'nameEv'=>$p->getNameEv(),
            'dateEv'=>$p->getDateEv(),
            'typeEv'=>$p->getTypeEv(),
            'equipementEv'=>$p->getEquipementEv(),
            'poster'=>$p->getPoster(),
            'descripionEv'=>$p->getDescriptionEv(),
            'idEv'=>$p->getIdEv(),
            'nameAc'=>$pp->getNameAc(),
            'typeAc'=>$pp->getTypeAc(),
            'duration'=>$pp->getDuration(),
            'descriptionAc'=>$pp->getDescriptionAc(),
            'connected' => $this->getUser(),
            'connectedAssociation' => $asso
        ));


    }

    public function ajoutacAction(Request $request)
    {
        $user=$this->getUser();
        $session=$request->getSession();
        $asso=$session->get('logged');
        $id = $request->get('id');
        $activity = new Activity();
        $temp = $this->createform(ActivityType::class,$activity);
        $temp->handleRequest($request);
        if($temp->isSubmitted() && $temp->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($activity);
            $em->flush();
            $this->addFlash('info', 'Created Successfully !');
            return $this->redirectToRoute('donation_listpage');
        }
        return$this->render("@Donation/Activity/addactivity.html.twig",array(
            'temp'=>$temp->createView(),
            'connected' => $this->getUser(),
            'connectedAssociation' => $asso
        ));

    }
    public function adminajoutAction(Request $request)
    {
        $event = new Event();
        $form = $this->createform(EventType::class,$event);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $file = $event->getPoster();
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $event->setPoster($filename);
            $em->persist($event);
            $em->flush();
            //$this->addFlash('info', 'Created Successfully !');
            return $this->redirectToRoute('donation_displaypage');
        }
        return$this->render("@Donation/Admin/adminaddevent.html.twig",array(
            'form'=>$form->createView(),
            'connected' => $this->getUser()
        ));
    }
    public function adminajoutacAction(Request $request)
    {
        $activity = new Activity();
        $temp = $this->createform(ActivityType::class,$activity);
        $temp->handleRequest($request);
        if($temp->isSubmitted() && $temp->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($activity);
            $em->flush();
            $this->addFlash('info', 'Created Successfully !');
            return $this->redirectToRoute('donation_displaypage');
        }
        return$this->render("@Donation/Admin/adminaddactivity.html.twig",array(
            'temp'=>$temp->createView(),
            'connected' => $this->getUser()
        ));

    }
    public function displayAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('DonationBundle:Event')->findAll();
        return $this->render('@Donation/Admin/display.html.twig', array(
            "posts" => $posts,
            'connected' => $this->getUser()
        ));
    }
    public function displayacAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('DonationBundle:Activity')->findAll();
        return $this->render('@Donation/Admin/displayac.html.twig', array(
            "posts" => $posts,
            'connected' => $this->getUser()
        ));
    }
    public function admindeleteAction(Request $request)
    {
        $id = $request->get('id');
        $em= $this->getDoctrine()->getManager();
        $Post=$em->getRepository('DonationBundle:Event')->find($id);
        $em->remove($Post);
        $em->flush();
        return $this->redirectToRoute('donation_displaypage');
    }
    public function admindeleteacAction(Request $request)
    {
        $id = $request->get('id');
        $em= $this->getDoctrine()->getManager();
        $Post=$em->getRepository('DonationBundle:Activity')->find($id);
        $em->remove($Post);
        $em->flush();
        return $this->redirectToRoute('donation_displayacpage');
    }
    public function adminupdateAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $p= $em->getRepository('DonationBundle:Event')->find($id);
        $form=$this->createForm(EventType::class,$p);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $file = $p->getPoster();
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $p->setPoster($filename);
            $em= $this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush();
            return $this->redirectToRoute('donation_displaypage');

        }
        return $this->render('@Donation/Admin/adminupdate.html.twig', array(
            "form"=> $form->createView(),
            'connected' => $this->getUser()

        ));
    }
    public function adminupdateacAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $p= $em->getRepository('DonationBundle:Activity')->find($id);
        $form=$this->createForm(ActivityType::class,$p);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em= $this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush();
            return $this->redirectToRoute('donation_displayacpage');

        }
        return $this->render('@Donation/Admin/adminupdateac.html.twig', array(
            "form"=> $form->createView(),
            'connected' => $this->getUser()

        ));
    }


    public function calendarAction()
   {
       return $this->render('@Donation/Event/calendar.html.twig', array(
            'connected' => $this->getUser()

        ));

    }


    public function indexxAction(Request $request) {
        $user=$this->getUser();
        $session=$request->getSession();
        $asso=$session->get('logged');
        $id = $request->get('id');
        if ($request->get('req')) {
            $posts = $this->getDoctrine()->getManager()->getRepository('DonationBundle:Event')->findByQuery($request->get('req'));
            return $this->render('@Donation/Event/smplist.html.twig', array('posts' => $posts,
                'connected' => $this->getUser(),

            ));
        }
        $posts = $this->getDoctrine()->getManager()->getRepository('DonationBundle:Event')->findAll();
        return $this->render('@Donation/Event/smplist.html.twig', array('posts' => $posts,
        'connected' => $this->getUser()
        ));
    }
    public function indexxxAction(Request $request) {
        if ($request->get('req')) {
            $posts = $this->getDoctrine()->getManager()->getRepository('DonationBundle:Event')->findByQuery($request->get('req'));
            return $this->render('@Donation/Admin/display.html.twig', array('posts' => $posts,
                'connected' => $this->getUser(),

            ));
        }
        $posts = $this->getDoctrine()->getManager()->getRepository('DonationBundle:Event')->findAll();
        return $this->render('@Donation/Admin/display.html.twig', array('posts' => $posts,
            'connected' => $this->getUser(),

        ));
    }
    public function indexxxxAction(Request $request) {
        $user=$this->getUser();
        $session=$request->getSession();
        $asso=$session->get('logged');
        $id = $request->get('id');
        if ($request->get('req')) {
            $posts = $this->getDoctrine()->getManager()->getRepository('DonationBundle:Event')->findByQuery($request->get('req'));
            return $this->render('@Donation/Event/list.html.twig', array('posts' => $posts,
                'connected' => $this->getUser(),
                'connectedAssociation' => $asso
            ));
        }
        $posts = $this->getDoctrine()->getManager()->getRepository('DonationBundle:Event')->findAll();
        return $this->render('@Donation/Event/list.html.twig', array('posts' => $posts,
            'connected' => $this->getUser(),
            'connectedAssociation' => $asso
        ));
    }
    public function addMembershipAction(Event $event)
    {
        $user = $this->getUser();
        $event->addMember($user);
        $this->getDoctrine()->getManager()->flush();
        return new Response();
    }


    public function deleteMembershipAction(Event $event)
    {
        $user = $this->getUser();
        $event->removeMember($user);
        $this->getDoctrine()->getManager()->flush();
        return new Response();
    }
}