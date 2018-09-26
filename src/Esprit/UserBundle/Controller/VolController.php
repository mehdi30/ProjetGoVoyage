<?php
/**
 * Created by PhpStorm.
 * User: Mehdi Chaabene
 * Date: 15/11/2017
 * Time: 17:02
 */

namespace Esprit\UserBundle\Controller;


use Esprit\UserBundle\EspritUserBundle;
use Esprit\UserBundle\Form\VolType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Esprit\UserBundle\Entity\Vol;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class VolController extends Controller
{
    public function afficherAction()
    {

        //creer une instance de  l'netuty manager

        $em = $this->getDoctrine()->getManager();
        $Vols = $em->getRepository("EspritUserBundle:Vol")->findAll();
        return $this->render("EspritUserBundle:Vol:affichageVol.html.twig", array("Vols" => $Vols));


    }

    public function affichePastAction()
    {

        //creer une instance de  l'netuty manager

        $em = $this->getDoctrine()->getManager();
        $Vols = $em->getRepository("EspritUserBundle:Vol")->findPastFlights();
        return $this->render("EspritUserBundle:Vol:affichagePast.html.twig", array("Vols" => $Vols));


    }
    public function afficherOneAction(Request $request)
    {
        $ref = $request->get('ref');
        $em = $this->getDoctrine()->getManager(); //persist add update remove
        $Vol = $em->getRepository("EspritUserBundle:Vol")->find($ref);
        return $this->render("EspritUserBundle:Vol:afficherOne.html.twig", array("Vol" => $Vol));
    }

    public function addVolAction(Request $request)
    {
        $Vol = new Vol();
        $form = $this->createForm(VolType::class, $Vol);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Vol);
            $em->flush();
            return $this->redirectToRoute('affichageVols');
        }
        return $this->render("EspritUserBundle:Vol:addVol.html.twig", array(
            "Form" => $form->createView()
        ));
    }

    public function deleteVolAction(Request $request)
    {
        $ref = $request->get('ref');
        $em = $this->getDoctrine()->getManager(); //persist add update remove
        $Vol = $em->getRepository("EspritUserBundle:Vol")->find($ref);
        $em->remove($Vol);
        $em->flush();
        return $this->redirectToRoute('affichageVols');
    }
    function search1Action(Request $request){
        $em = $this->getDoctrine()->getManager();
            $vols=$em->getRepository('EspritUserBundle:Vol')->findAll();
        if($request->isMethod("POST")) {
            $criteria = $request->get('criteria');
            $vols = $em->getRepository('EspritUserBundle:Vol')->findBy(array("typevol"=>$criteria));
        }
        return $this->render('EspritUserBundle:Vol:affichageVol.html.twig',array('Vols'=>$vols));

    }

    public function searchAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $vols = $em->getRepository("EspritUserBundle:Vol")->findAll();

        if($request->isMethod("post"))
        {
            $criteria = $request->get('criteria');
            $vols = $em->getRepository("EspritUserBundle:Vol")->findBy(array("villedepart"=>$criteria));
            //echo"suite au clique sue le bouton submit";
        }
        return $this->render("EspritUserBundle:Vol:AffichageS.html.twig",array(
            "Vols"=>$vols));


    }
    public function search2Action(Request $request){

        $em = $this->getDoctrine()->getManager();
        $criteria = $request->get('criteria');

        $vols = $em->getRepository("EspritUserBundle:Vol")->findAll();

        if($request->isMethod("post"))
        {           if($request=="")
        {  $vols = $em->getRepository("EspritUserBundle:Vol")->findAll();

        } else {
            $criteria = $request->get('criteria');
            $vols = $em->getRepository("EspritUserBundle:Vol")->findlike($criteria); }
            //echo"suite au clique sue le bouton submit";

        }
        return $this->render("EspritUserBundle:Vol:AffichageS.html.twig",array(
            "Vols"=>$vols));


    }
    public function searchVolCAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        //$criteria = $request->get('criteria')

        if($request->isMethod("post"))
        {


            $criteria = $request->get('criteria');
            $vols = $em->getRepository("EspritUserBundle:Vol")->findlike($criteria);
            //echo"suite au clique sue le bouton submit";
        }
        else {
            return $this->render('EspritUserBundle:Template:services.html.twig');

        }
        return $this->render("EspritUserBundle:Vol:FlightResult.html.twig",array(
            "Vols"=>$vols));


    }

    public function AddtoPastAction(Request $request)
    {
        $ref = $request->get('ref');
        $em = $this->getDoctrine()->getManager();

        $Vol = $em->getRepository("EspritUserBundle:Vol")->find($ref);

        $Vol->setNbrplaceeco("0");
        $Vol->setNbrplaceaffaire("0");
        $em->persist($Vol);
        $em->flush();
        return $this->redirectToRoute('affichagePast');
    }

    public function AddtoPast2Action(Request $request)
    {
        $ref = $request->get('ref');
        $em = $this->getDoctrine()->getManager(); //persist add update remove
        $query = $em->createQuery(
            'UPDATE EspritUserBundle:Vol v SET v.nbrplaceeco = 0 WHERE v.ref = :refv'
        );
        $query->SetParameter('refv',$request->get('$ref'));
        //$query->SetParameter('nbrplaceecon','0');

        $query->execute();


        return $this->redirectToRoute('affichagePast');
    }

    public function updateAction(Request $request)
    {
        $ref = $request->get('ref');
        $em = $this->getDoctrine()->getManager();
        $Vol = $em->getRepository("EspritUserBundle:Vol")->find($ref);
        $form = $this->createForm(VolType::class, $Vol);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($Vol);
            $em->flush();
            return $this->redirectToRoute('affichageVols');

        }
        return $this->render("EspritUserBundle:Vol:update.html.twig", array(
            "Form" => $form->createView()
        ));

    }
}