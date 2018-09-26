<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 21/11/2017
 * Time: 06:07
 */

namespace Esprit\UserBundle\Controller;

use Esprit\UserBundle\Form\HotelType;
use Esprit\UserBundle\Form\HoteType;
use Symfony\Component\HttpFoundation\Request;
use Esprit\UserBundle\Entity\Hebergement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Esprit\UserBundle\Form\HebergementType;
use Esprit\UserBundle\Form\StarType;



use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class HebergementController extends Controller
{
    public function listHebergementAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $Hebergements = $em->getRepository("EspritUserBundle:Hebergement")
            ->findALL();

        return $this->render("EspritUserBundle:Hebergement:listHebergement.html.twig", array(
            "Hebergements" => $Hebergements

        ));
    }

    public function deleteHebergementAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Hebergement = $em->getRepository("EspritUserBundle:Hebergement")
            ->find($id);
        $em->remove($Hebergement);
        $em->flush();
        return ($this->redirectToRoute("listHotel"));

    }


    public function deleteHoteAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Hebergement = $em->getRepository("EspritUserBundle:Hebergement")
            ->find($id);
        $em->remove($Hebergement);
        $em->flush();
        return ($this->redirectToRoute("listHote"));

    }

    public function addHebergementAction(Request $request)
    {
        $Hebergement = new Hebergement();
        $form = $this->createForm(HebergementType::class, $Hebergement);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $dir="C:\\wamp\\wwww\\GoVoyagee\\web\\images";
            $file=$form['image']->getData();
            $Hebergement->setImage($Hebergement->getImage().".jpg");
            $file->move($dir,$Hebergement->getImage());

            $em = $this->getDoctrine()->getManager();
            $type = $request->get('type');
            if (strcasecmp("$type", "hotel"))
            {
                $em->persist($Hebergement);
                $em->flush();
                return ($this->redirectToRoute("listHotel"));
            }
            else if (strcasecmp("$type", "hote"))
            {
                $em->persist($Hebergement);
                $em->flush();
                return ($this->redirectToRoute("listHote"));

            }
        }
        return $this->render("EspritUserBundle:Hebergement:addHebergement.html.twig", array(
            "Form" => $form->createView()
        ));
    }

    public function updateHebergementAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Hebergement = $em->getRepository("EspritUserBundle:Hebergement")
            ->find($id);
       $form = $this->createForm(HotelType::class, $Hebergement);
       $form->handleRequest($request);
        if ($form->isValid()) {

                $dir="C:\\wamp\\wwww\\GoVoyagee\\web\\images";
                $file=$form['image']->getData();
                $Hebergement->setImage($Hebergement->getNom().".png");
                $file->move($dir,$Hebergement->getImage());

            $em = $this->getDoctrine()->getManager();
            $em->persist($Hebergement);
            $em->flush();
            return ($this->redirectToRoute("listHotel"));
        }

        return $this->render("EspritUserBundle:Hebergement:updateHebergement.html.twig", array(
            "Form" => $form->createView()
        ));

    }

     public function updateHoteAction(Request $request)
      {
          $id = $request->get('id');
          $em = $this->getDoctrine()->getManager();
          $Hebergement = $em->getRepository("EspritUserBundle:Hebergement")
              ->find($id);
          $form = $this->createForm(HoteType::class, $Hebergement);
          $form->handleRequest($request);
          if ($form->isValid()) {


              $dir="C:\\wamp\\wwww\\GoVoyagee\\web\\images";
              $file=$form['image']->getData();
              $Hebergement->setImage($Hebergement->getNom().".png");
              $file->move($dir,$Hebergement->getImage());


              $em = $this->getDoctrine()->getManager();
              $em->persist($Hebergement);
              $em->flush();
              return ($this->redirectToRoute("listHote"));
          }

          return $this->render("EspritUserBundle:Hebergement:updateHote.html.twig", array(
              "Form" => $form->createView()
          ));

      }

      public function listHotelAction(Request $request)
       {

           $em = $this->getDoctrine()->getManager();
           $Hebergements = $em->getRepository("EspritUserBundle:Hebergement")
               ->findBy(array('type'=>'Hotel'));

               return $this->render("EspritUserBundle:Hebergement:listHotel.html.twig", array(
                   "Hebergements" => $Hebergements


               ));

           }


    public function addHotelAction(Request $request)
    {
        $Hebergement = new Hebergement();
        $form = $this->createForm(HotelType::class, $Hebergement);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $dir="C:\\wamp\\www\\GoVoyagee\\web\\images";
            $file=$form['image']->getData();
            $Hebergement->setImage($Hebergement->getNom().".png");
            $file->move($dir,$Hebergement->getImage());

            $em = $this->getDoctrine()->getManager();
            $em->persist($Hebergement);
            $em->flush();
            return ($this->redirectToRoute("listHotel"));
        }
        return $this->render("EspritUserBundle:Hebergement:addHotel.html.twig", array(
            "Form" => $form->createView()
        ));
    }

    public function listHoteAction(Request $request)
    {
        //créer une instance de l'entity manager
        $em = $this->getDoctrine()->getManager();
        $Hebergements = $em->getRepository("EspritUserBundle:Hebergement")
            ->findBy(array('type'=>'Hote'));

            return $this->render("EspritUserBundle:Hebergement:listHote.html.twig", array(
                "Hebergements" => $Hebergements

            ));

    }

    public function addHoteAction(Request $request)
    {
        $Hebergement = new Hebergement();
        $form = $this->createForm(HoteType::class, $Hebergement);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $dir="C:\\wamp\\www\\GoVoyagee\\web\\images";
            $file=$form['image']->getData();
            $Hebergement->setImage($Hebergement->getNom().".png");
            $file->move($dir,$Hebergement->getImage());

            $em = $this->getDoctrine()->getManager();
            $em->persist($Hebergement);
            $em->flush();
            return ($this->redirectToRoute("listHote"));
        }

        return $this->render("EspritUserBundle:Hebergement:addHote.html.twig", array(
            "Form" => $form->createView()
        ));
    }

    public function searchHotelAction(Request $request)
    {
        //créer une instance de l'entity manager
        $em =$this->getDoctrine()->getManager();
        $Hebergements =$em->getRepository("EspritUserBundle:Hebergement")
         ->findBy(array('type'=>'Hotel'));

        if($request->isMethod("post"))
        {
            $criteria =$request->get("criteria");
            $em =$this->getDoctrine()->getManager();
            $Hebergements = $em->getRepository("EspritUserBundle:Hebergement")
                ->findBy(array("adresse"=>$criteria ,'type'=>'Hotel'),
             array('rating' => 'DESC')
                );


        }
        return $this->render("EspritUserBundle:Hebergement:searchHotel.html.twig",array
        (
          "Hebergements"=>$Hebergements,
        ));
    }

    public function searchHoteAction(Request $request)
    {
        //créer une instance de l'entity manager
        $em =$this->getDoctrine()->getManager();
        $Hebergements =$em->getRepository("EspritUserBundle:Hebergement")
            ->findBy(array('type'=>'Hote'));
        if($request->isMethod("post"))
        {
            $criteria =$request->get("criteria");
            $em =$this->getDoctrine()->getManager();
            $Hebergements = $em->getRepository("EspritUserBundle:Hebergement")
                ->findBy(array("adresse"=>$criteria ,'type'=>'Hote'),
                 array('rating' => 'DESC')
                );
        }
        return $this->render("EspritUserBundle:Hebergement:searchHote.html.twig",array
        ("Hebergements"=>$Hebergements,

        ));
    }

    public function HotelClientAction()
    {
        return $this->render("EspritUserBundle:Hebergement:HotelClient.html.twig") ;
    }

    public function HoteClientAction()
    {
        return $this->render("EspritUserBundle:Hebergement:HoteClient.html.twig") ;
    }

    public function listHotelClientAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $Hebergements = $em->getRepository("EspritUserBundle:Hebergement")
            ->findBy(array('type'=>'Hotel'));


        $Hebergement = new Hebergement();
        $form = $this->createForm(StarType::class, $Hebergement);
        $form->handleRequest($request);

        return $this->render("EspritUserBundle:Hebergement:listHotelClient.html.twig", array(
            "Hebergements" => $Hebergements ,
                "Form" => $form->createView()
            ));
    }

    public function listHoteClientAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $Hebergements = $em->getRepository("EspritUserBundle:Hebergement")
            ->findBy(array('type'=>'Hote'));


        $Hebergement = new Hebergement();
        $form = $this->createForm(StarType::class, $Hebergement);
        $form->handleRequest($request);

        return $this->render("EspritUserBundle:Hebergement:listHoteClient.html.twig", array(
            "Hebergements" => $Hebergements ,
            "Form" => $form->createView()
        ));
    }
    public function findHotelByAdressAction($adresse)
    {
        $em = $this->getDoctrine()->getManager();
        $hebergements = $em->getRepository("EspritUserBundle:Hebergement")
            ->findHotelByAdress($adresse);
        return $this->render("EspritUserBundle:Hebergement:listHotel.html.twig",array("hebergements"=>$hebergements));
    }


    public function findHotelByRatingAction(){

         $em = $this->getDoctrine()->getManager();
         $hebergements = $em->getRepository("EspritUserBundle:Hebergement")
             ->findHotelByRating();
         return $this->render("EspritUserBundle:Hebergement:listHotel.html.twig",array("hebergements"=>$hebergements));
    }





    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    public function allAction()
    {
        $hebergements = $this->getDoctrine()->getManager()
            ->getRepository('EspritUserBundle:Hebergement')
            ->findAll();
        $serializer = new Serializer([new ObjectNormalizer() ]);
        $formatted = $serializer->normalize($hebergements);
        return new JsonResponse($formatted);
    }



    public function findHotelAction()
    {
        $hebergements = $this->getDoctrine()->getManager()
            ->getRepository('EspritUserBundle:Hebergement')
            ->findBy(array('type'=>'Hotel'), array('rating' => 'DESC'));
        $serializer = new Serializer([new ObjectNormalizer() ]);
        $formatted = $serializer->normalize($hebergements);
        return new JsonResponse($formatted);
    }


    public function findHoteAction()
    {
        $hebergements = $this->getDoctrine()->getManager()
            ->getRepository('EspritUserBundle:Hebergement')
            ->findBy(array('type'=>'Hote'), array('rating' => 'DESC'));
        $serializer = new Serializer([new ObjectNormalizer() ]);
        $formatted = $serializer->normalize($hebergements);
        return new JsonResponse($formatted);
    }

    public function findAction($id)
    {
        $hebergements = $this->getDoctrine()->getManager()
            ->getRepository('EspritUserBundle:Hebergement')
            ->find($id);
        $serializer = new Serializer([new ObjectNormalizer() ]);
        $formatted = $serializer->normalize($hebergements);
        return new JsonResponse($formatted);
    }

  /*  public function findHotelAdressAction(Request $request)
    {
        $adresse = $request->get('adresse');
        $hebergements = $this->getDoctrine()->getManager()
            ->getRepository('EspritUserBundle:Hebergement')
          //  ->findOneByAdresse($feten);

        ->findBy(array('adresse'=>$adresse ,'type'=>'Hotel'));
        $serializer = new Serializer([new ObjectNormalizer() ]);
        $formatted = $serializer->normalize($hebergements);
        return new JsonResponse($formatted);
    }
  */

    public function findHotelAdressAction($adresse)
    {
        $hebergements = $this->getDoctrine()->getManager()
            ->getRepository('EspritUserBundle:Hebergement')
            //  ->findOneByAdresse($adresse);
            ->findBy(array('adresse'=>$adresse ,'type'=>'Hotel'));
        $serializer = new Serializer([new ObjectNormalizer() ]);
        $formatted = $serializer->normalize($hebergements);
        return new JsonResponse($formatted);
    }

    public function findHoteAdressAction($adresse)
    {
        $hebergements = $this->getDoctrine()->getManager()
            ->getRepository('EspritUserBundle:Hebergement')
            //  ->findOneByAdresse($adresse);
            ->findBy(array('adresse'=>$adresse ,'type'=>'Hote'));
        $serializer = new Serializer([new ObjectNormalizer() ]);
        $formatted = $serializer->normalize($hebergements);
        return new JsonResponse($formatted);
    }
    public function findHotelNameAction($nom)
    {
        $hebergements = $this->getDoctrine()->getManager()
            ->getRepository('EspritUserBundle:Hebergement')
            //  ->findOneByAdresse($adresse);
            ->findBy(array('nom'=>$nom ,'type'=>'Hotel'));
        $serializer = new Serializer([new ObjectNormalizer() ]);
        $formatted = $serializer->normalize($hebergements);
        return new JsonResponse($formatted);
    }

    public function findHoteNameAction($nom)
    {
        $hebergements = $this->getDoctrine()->getManager()
            ->getRepository('EspritUserBundle:Hebergement')
            //  ->findOneByAdresse($adresse);
            ->findBy(array('nom'=>$nom ,'type'=>'Hote'));
        $serializer = new Serializer([new ObjectNormalizer() ]);
        $formatted = $serializer->normalize($hebergements);
        return new JsonResponse($formatted);
    }

    public function newAction(Request $request)
    {
        $em =$this->getDoctrine()->getManager();
        $hebergement = new Hebergement();
        $hebergement->setNom($request->get('nom'));
        $hebergement->setAdresse($request->get('adresse'));
        $em->persist($hebergement);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer() ]);
        $formatted = $serializer->normalize($hebergement);
        return new JsonResponse($formatted);
    }


}