<?php

namespace DonationBundle\Controller;
use DonationBundle\Entity\Action;
use DonationBundle\Form\ActionType;
use UserBundle\Entity\User;
use DonationBundle\Entity\Product;
use DonationBundle\Entity\Association;
use DonationBundle\Entity\Admin;
use DonationBundle\Entity\Command;
use DonationBundle\Entity\Commandline;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
class ProductsController extends Controller
{
    
    
    public function ListeProductsAction()
    {   
        if ($this->getUser() == null ){
            return $this->redirect("/login");
        }
            
        $products = $this->getDoctrine()
                ->getRepository(Product::class)
                ->findAll();
        if ($this->getUser()->getRoles()[0] == "ROLE_USER" ){
            return $this->render('@Donation/Products/User/index.html.twig',['products' => $products,
                        'connectedAssociation' => null,
                        'connected' => $this->getUser()]
            );
        }else{
            return $this->render('@Donation/Products/Admin/index.html.twig',['products' => $products,
                        'connectedAssociation' => null,
                        'connected' => $this->getUser()]
            );
        }
        
    }
    public function AddProductAction()
    {


        $associations = $this->getDoctrine()
            ->getRepository(Association::class)
            ->findAll();
        return $this->render('@Donation/Products/Admin/ajout.html.twig',[
                "associations"=> $associations,
                'connected' => $this->getUser()]
        );
    }



    public function AddProductDbAction(Request $request ){
        if ($request->isMethod('POST')) {
            //$form->submit($request->request->get($form->getName()));

            /*if ($form->isSubmitted() && $form->isValid()) {
                // perform some action...

                return $this->redirectToRoute('task_success');
            }*/
            $entityManager = $this->getDoctrine()->getManager();
            $product = new Product();
            $product->setnameProduct($request->request->get("nameproduct"));
            $product->setquantityTotal($request->request->get("qteproduct"));
            $product->setquantityRemaining($request->request->get("restproduct"));
            $product->setpriceProduct($request->request->get("prixproduct"));
            $product->setdescriptionProduct($request->request->get("descriptionproduct"));
            $association = $this->getDoctrine()
                ->getRepository(Association::class)
                ->find($request->request->get("idassociation"));
            $admin  = $this->getDoctrine()
                ->getRepository(Admin::class)
                ->find($this->getUser()->getId());
            $product->setidAdmin($admin);
            $product->setidAssociation($association);
            $entityManager->persist($product);
            $entityManager->flush();
            return $this->redirect("/Donation/products");



        }
    }


    public function EditProductAction($id)
    {

        $product = $this->getDoctrine()
                ->getRepository(Product::class)
                ->find($id);
        $associations = $this->getDoctrine()
        ->getRepository(Association::class)
        ->findAll();
        return $this->render('@Donation/Products/Admin/edit.html.twig',['product' => $product,
                        "associations"=> $associations,
                        'connected' => $this->getUser()]
        );
    }

    public function EditProductDbAction(Request $request , $id){
        if ($request->isMethod('POST')) {
            //$form->submit($request->request->get($form->getName()));
    
            /*if ($form->isSubmitted() && $form->isValid()) {
                // perform some action...
    
                return $this->redirectToRoute('task_success');
            }*/
            $entityManager = $this->getDoctrine()->getManager();
            $product = $this->getDoctrine()
                ->getRepository(Product::class)
                ->find($id);
            $product->setnameProduct($request->request->get("nameproduct"));
            $product->setquantityTotal($request->request->get("qteproduct"));
            $product->setquantityRemaining($request->request->get("restproduct"));
            $product->setpriceProduct($request->request->get("prixproduct"));
            $product->setdescriptionProduct($request->request->get("descriptionproduct"));
            $association = $this->getDoctrine()
            ->getRepository(Association::class)
            ->find($request->request->get("idassociation"));
            $product->setidAssociation($association);
            $entityManager->flush();
            return $this->redirect("/Donation/products");



        }
    }
    public function DeleteProductAction($id){
        $product = $this->getDoctrine()
                ->getRepository(Product::class)
                ->find($id);
        //$product->delete();
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($product);
        $entityManager->flush();
        return $this->redirect("/Donation/products");




    }
    public function CommandeAction($id){
        $product = $this->getDoctrine()
                ->getRepository(Product::class)
                ->find($id);
        $commandes = $this->getDoctrine()
                    ->getRepository(Command::class)
                    ->find($id);
        return $this->render('@Donation/Products/User/commande.html.twig',['product' => $product,  
                     'connected' => $this->getUser()]
);

    }


    public function CommandeDbAction(Request $request){
        if ($request->isMethod('POST')) {
         
            $entityManager = $this->getDoctrine()->getManager();
            $commande = new Command();
            $commande->setidProduct($request->request->get("idproduct"));
            $commande->setquantityProduct($request->request->get("qteproduct"));
            $commande->setpaid($request->request->get("paid"));
            $commande->setdateCommand( new \DateTime(date("Y-m-d")) );
            $iduser = $this->getUser()->getId();
            $user = $this->getDoctrine()
                    ->getRepository(User::class)
                    ->find($iduser);
            $commande->setuser($user);
            $entityManager->persist($commande);
            $entityManager->flush();
            $product = $this->getDoctrine()
                    ->getRepository(Product::class)
                    ->find($request->request->get("idproduct"));
            $qterem = $product->getquantityRemaining() -  $request->request->get("qteproduct");
            $product->setquantityRemaining($qterem);

            $entityManager->flush();


            return $this->redirect("/Donation/product/commandline/".$commande->getidCommand());



        }

    }
    public function CommandeLineAction($id){
        $command = $this->getDoctrine()
                    ->getRepository(Command::class)
                    ->find($id);
        $commandes = $this->getDoctrine()
                    ->getRepository(Command::class)
                    ->findBy([ 'user' => $this->getUser()->getId() ]);
                    
        $product = $this->getDoctrine()
                    ->getRepository(Product::class)
                    ->find($command->getidProduct());
        return $this->render('@Donation/Products/User/commandeline.html.twig',['command' => $command,
                          'commandes' => $commandes ,
                          'product' => $product,  
                          'connected' => $this->getUser()]
);
        
    }


    public function CommandeLineDbAction(Request $request){
        if ($request->isMethod('POST')) {
         
            $entityManager = $this->getDoctrine()->getManager();

            $commande = $this->getDoctrine()
            ->getRepository(Command::class)
            ->find($request->request->get("idcommande"));


            $commandeline = new Commandline();
            $commandeline->setdateLiv(new \DateTime($request->request->get("datecommande")));
            $commandeline->setstateCommand($request->request->get("state"));
            $commandeline->settypeCommand($request->request->get("type"));
           
            $commandeline->setidCommand($commande);
            $product = $this->getDoctrine()
                ->getRepository(Product::class)
                ->find($commande->getidProduct());
            $commandeline->setidProduct($product);

            $entityManager->persist($commandeline);
            $entityManager->flush();


            return $this->redirect("/Donation/product/stripe/".$commandeline->getidCommandline());



        }

    }
    public function printAction($id){
        $commande = $this->getDoctrine()
            ->getRepository(CommandLine::class)
            ->find($id);
            return $this->render('@Donation/Products/User/print.html.twig',['cl' => $commande,  
            'connected' => $this->getUser()]
);

    }


    public function TauxProductAction($id){
        $commandes = $this->getDoctrine()
        ->getRepository(Command::class)
        ->findBy(["idProduct" => $id ]);
        $product= $this->getDoctrine()
        ->getRepository(Product::class)
        ->find($id);
        return $this->render('@Donation/Products/Admin/taux.html.twig',['cl' => $commandes,
        'p' => $product,  
        'connected' => $this->getUser()]
); 
    }

    public function EditCommandeAction($id){
        $commande = $this->getDoctrine()
            ->getRepository(Command::class)
            ->find($id);
            $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($commande->getidProduct());
            
        return $this->render('@Donation/Products/User/editcommande.html.twig',['commande' => $commande,'product' => $product,  
        'connected' => $this->getUser()]
        );
    }

    public function EditdbCommandeAction(Request $request){
       

        
        $entityManager = $this->getDoctrine()->getManager();
        $commande =  $this->getDoctrine()
                        ->getRepository(Command::class)
                        ->find($request->request->get("idcommand"));
        $lastqte = $commande->getquantityProduct();
        
        $commande->setquantityProduct($request->request->get("qteproduct"));
        $commande->setpaid($request->request->get("paid"));
        

        
        $entityManager->flush();

        $product = $this->getDoctrine()
                ->getRepository(Product::class)
                ->find($request->request->get("idproduct"));
        $qterem = $product->getquantityRemaining() -  ( $lastqte - $request->request->get("qteproduct") ) ;
        $product->setquantityRemaining($qterem);

        $entityManager->flush();


        return $this->redirect("/Donation/product/commandline/".$commande->getidCommand());
            
    }

    public function StripeAction($id){
        return $this->render('@Donation/Products/User/stripe.html.twig',[
                'id' => $id ,
                'connected' => $this->getUser()]);

    }
    
    public function searchAction(Request $request){
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizer = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizer, $encoders);

        $product = $request->request->get("product");
        $em = $this->getDoctrine()->getManager();
    
        $sql = "SELECT `*` FROM `product` WHERE `Name_Product` LIKE '%".$product."%'";
        $result = $em->getConnection()->prepare($sql);
        $result->execute();
        $products = $result->fetchAll();
        //$events = $this->getDoctrine()->getRepository(Event::class)->findAll(); 
       
        $jsonContent = $serializer->serialize($products, 'json');
        return new Response($jsonContent);

    }
    public function  DeleteCommandeAction($id){
        $entityManager = $this->getDoctrine()->getManager();
        $command = $this->getDoctrine()
                        ->getRepository(Command::class)
                        ->find($id);
         //$product->delete();
         
         $commandlines = $this->getDoctrine()
                ->getRepository(Commandline::class)
                ->findBy([ 'idCommand' => $command ]);

         $entityManager->remove($command);
         foreach($commandlines as $commandline){
             $entityManager->remove($commandline);
         }

         $entityManager->flush();
         return $this->redirect("/Donation/products");

        
    
    }
    public function  triAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $tri = $request->request->get("tri");
        if ($tri == 1 ){
            $entities = $em
            ->getRepository(Product::class)
            ->createQueryBuilder('e')
            ->addOrderBy('e.nameProduct', 'ASC')
            ->getQuery()
            ->execute();
        }else if ( $tri == 2){
            $entities = $em
            ->getRepository(Product::class)
            ->createQueryBuilder('e')
            ->addOrderBy('e.quantityRemaining', 'ASC')
            ->getQuery()
            ->execute();
        }else{
            $entities = $em
            ->getRepository(Product::class)
            ->createQueryBuilder('e')
            ->addOrderBy('e.priceProduct', 'ASC')
            ->getQuery()
            ->execute();
        }
        
       
    

        return $this->render('@Donation/Products/User/index.html.twig',['products' => $entities,
                'connected' => $this->getUser()]
        );

    }

    
   

}
