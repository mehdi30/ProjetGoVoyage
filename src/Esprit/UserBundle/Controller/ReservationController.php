<?php
/**
 * Created by PhpStorm.
 * User: Imen
 * Date: 17/11/2017
 * Time: 10:20
 */

namespace Esprit\UserBundle\Controller;

use Esprit\UserBundle\Form\ReservationForm;
use Esprit\UserBundle\Form\ReservationType;
use Esprit\UserBundle\Entity\Reservation;
use Esprit\UserBundle\Form\RHoteForm;
use Esprit\UserBundle\Form\RHotelForm;
use Esprit\UserBundle\Form\RVolForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
class ReservationController extends Controller
{
public function showAction(Request $request )
{
    //creer une instance de l entity manager
    $em=$this->getDoctrine()->getManager();
    $Reservations=$em->getRepository("EspritUserBundle:Reservation")->findAll();
    return $this->render("EspritUserBundle:Reservation:show.html.twig",array(
        "Reservations"=>$Reservations));





}
public function addAction(Request $request)
{

    $Reservation=new Reservation();
    $form=$this->createForm(ReservationType::class,$Reservation);

    $form->handleRequest($request);
    if($form->isValid()){
        $em=$this->getDoctrine()->getManager();
        $em->persist($Reservation);
        $em->flush();
        //return $this->redirectToRoute('show');
    }
    return $this->render("EspritUserBundle:Reservation:add.html.twig",array(
        "Form"=>$form->createView()

    ));



}
public function add2Action(Request $request)
{

    $Reservation=new Reservation();
    $form=$this->createForm(ReservationType::class,$Reservation);

    $form->handleRequest($request);
    if($form->isValid()){
        $em=$this->getDoctrine()->getManager();
        $em->persist($Reservation);
        $em->flush();
        //return $this->redirectToRoute('AfficheReservation');
    }
    return $this->render("EspritUserBundle:Reservation:add2.html.twig",array(
        "Form"=>$form->createView()

    ));



}

public function deleteAction(Request $request)
{
    $ref= $request->get('ref');
    $em= $this->getDoctrine()->getManager();
    $Reservation =$em-> getRepository('EspritUserBundle:Reservation')->find($ref);
    $em->remove($Reservation);
    $em->flush();
    return $this->redirectToRoute('AfficheReservation');

    //return $this->render("EspritUserBundle:Reservation:delete.html.twig");

}
public function updateAction(Request $request)
{
    $ref= $request->get('ref');
   //$type= $request->get('type');



    $em= $this->getDoctrine()->getManager();
    $Reservation =$em-> getRepository('EspritUserBundle:Reservation')->find($ref);
    $type=$Reservation->getTypee();
    if(trim(strtoupper($type))=="HOTEL")
        {
            $form= $this->createForm(RHotelForm::class,$Reservation);
            $form->handleRequest($request);
            if($form->isValid()){
                $em->persist($Reservation);
                $em->flush();
                return $this->redirectToRoute('AfficheReservation');

            }

            return $this->render("EspritUserBundle:Reservation:updateRHotel.html.twig",array(
                "Form"=>$form->createView()

            ));

        }
        elseif (trim(strtoupper($type))=="HOTE")
        { $form= $this->createForm(RHoteForm::class,$Reservation);

            $form->handleRequest($request);
            if($form->isValid()){
                $em->persist($Reservation);
                $em->flush();
                return $this->redirectToRoute('AfficheReservation');

            }

            return $this->render("EspritUserBundle:Reservation:updateRHote.html.twig",array(
                "Form"=>$form->createView()

            ));}
        else
        {
        $form= $this->createForm(RVolForm::class,$Reservation);
            $form->handleRequest($request);
            if($form->isValid()){
                $em->persist($Reservation);
                $em->flush();
                return $this->redirectToRoute('AfficheReservation');

            }

            return $this->render("EspritUserBundle:Reservation:updateRVol.html.twig",array(
                "Form"=>$form->createView()

            ));
        }






    //return $this->render("EspritUserBundle:Reservation:update.html.twig");

}
public function searchAction(Request $request)
{ //creer une instance de l entity manager
    $em=$this->getDoctrine()->getManager();
    $Reservations=$em->getRepository("EspritUserBundle:Reservation")->findAll();
    if($request->isMethod("POST")){
        // echo "suite au click sur le bouton rechercher";
        $criteria=$request->get('criteria');

        $Reservations=$em->getRepository("EspritUserBundle:Reservation")->findBy(array("type"=>$criteria));
    }

    return $this->render("EspritUserBundle:Reservation:search.html.twig",array(
        "Reservations"=>$Reservations));


}

public function addRVolAction(Request $request)
{
    $ref= $request->get('ref');
    //$type= $request->get('type');

    $Reservation=new Reservation();
    $form=$this->createForm(RVolForm::class,$Reservation);

    $form->handleRequest($request);
    if($form->isValid()){
        $em=$this->getDoctrine()->getManager();
        $em->persist($Reservation);
        $em->flush();
        //return $this->redirectToRoute('AfficheReservation');
    }
    return $this->render("EspritUserBundle:Reservation:addRVol.html.twig",array(
        "Form"=>$form->createView(),"ref"=>$ref

    ));



}

public function addRHotelAction(Request $request)
{
    $ref= $request->get('ref');
    $Reservation=new Reservation();
    $form=$this->createForm(RHotelForm::class,$Reservation);

    $form->handleRequest($request);
    if($form->isValid()){
        $em=$this->getDoctrine()->getManager();
        $em->persist($Reservation);
        $em->flush();
        //return $this->redirectToRoute('AfficheReservation');
    }
    return $this->render("EspritUserBundle:Reservation:addRHotel.html.twig",array(
        "Form"=>$form->createView(),"ref"=>$ref

    ));



}
public function addRHoteAction(Request $request)
{
    $ref= $request->get('ref');
    $Reservation=new Reservation();
    $form=$this->createForm(RHoteForm::class,$Reservation);

    $form->handleRequest($request);
    if($form->isValid()){
        $em=$this->getDoctrine()->getManager();
        $em->persist($Reservation);
        $em->flush();
        //return $this->redirectToRoute('AfficheReservation');
    }
    return $this->render("EspritUserBundle:Reservation:addRHote.html.twig",array(
        "Form"=>$form->createView(),"ref"=>$ref

    ));



}

public function pdfHomeAction(Request $request)
{
    $snappy = $this->get('knp_snappy.pdf');
    $em=$this->getDoctrine()->getManager();
    $Reservations=$em->getRepository("EspritUserBundle:Reservation")->findAll();
    $html = $this->renderView('EspritUserBundle:Reservation:showpdf.html.twig', array("Reservations"=>$Reservations
        //..Send some data to your view if you need to //
    ));

    $filename = 'myFirstSnappyPDF';

    return new Response(
        $snappy->getOutputFromHtml($html),
        200,
        array(
            'Content-Type'          => 'application/pdf',
            'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
        )
    );

}



}