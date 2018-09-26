<?php
/**
 * Created by PhpStorm.
 * User: nizar
 * Date: 10/11/2017
 * Time: 23:41
 */

namespace Esprit\UserBundle\Controller;
use Esprit\UserBundle\Entity\ModeleRepository;
use Esprit\UserBundle\Entity\Offreh;
use Esprit\UserBundle\Entity\Offrev;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TemplateController extends Controller
{
    public function homeAction()
    {
        return $this->render('EspritUserBundle:Template:home.html.twig');
    }

    public function servicesAction()
    {
        return $this->render('EspritUserBundle:Template:services.html.twig');
    }
    public function contactAction()
    {
        return $this->render('EspritUserBundle:Template:contact.html.twig');
    }
    public function guideAction()
    {
        return $this->render('EspritUserBundle:Template:guide.html.twig');
    }
    public function experienceAction()
    {
        return $this->render('EspritUserBundle:Template:experience.html.twig');
    }
    public function hoteAction()
    {
        return $this->render('EspritUserBundle:Template:hote.html.twig');
    }
    public function hotelAction()
    {
        return $this->render('EspritUserBundle:Template:hotel.html.twig');
    }
    public function back_homeAction()
    {
        return $this->render('EspritUserBundle:Template:back_home.html.twig');
    }
    public function addoffreAction(Request $request)
    {

        $Offreh = new Offreh();
        $Offrev = new Offrev();
        $em =$this->getDoctrine()->getManager();
        $vols=$em->getRepository("EspritUserBundle:Vol")->findAll();
        $heber=$em->getRepository("EspritUserBundle:Hebergement")->findAll();
        if($request->isMethod('POST')){
            if ($request->get('selector55')=="Flight") {
                $reference=$request->get('List');
                $vol= $em->getRepository('EspritUserBundle:Vol')->findOneBy(array('numvol' => "$reference"));

                $Offrev->setDuree($request->get('Duration'));
                $Offrev->setSpecification($request->get('Discount'));
                $Offrev->setType($request->get('selector55'));
                $Offrev->setDatedebut(new \DateTime($request->get('Start_Date')));
                $Offrev->setDatefin(new \DateTime($request->get('End_Date')));
                $Offrev->setRefVol($vol);
                $em->merge($Offrev);

            } else
            {
                $reference=$request->get('List');
                $heberg= $em->getRepository('EspritUserBundle:Hebergement')->findOneBy(array('nom' => "$reference"));
                $Offreh->setDuree($request->get('Duration'));
                $Offreh->setSpecification($request->get('Discount'));
                $Offreh->setType($request->get('selector55'));
                $Offrev->setDatedebut(new \DateTime($request->get('Start_Date')));
                $Offrev->setDatefin(new \DateTime($request->get('End_Date')));
                $Offreh->setRefHeberg($heberg);
                $em->merge($Offreh);
            }
            $em->flush();
            return $this->redirectToRoute('listoffre');
        }

        return $this->render('EspritUserBundle:Template:AddOffre.html.twig',array("vols"=>$vols,"heber"=>$heber));
    }
    public function listoffreAction(Request $request)
    {
        //creer ine instance de l'entity manager
        $em = $this->getDoctrine()->getManager();
        $offres=$em->getRepository("EspritUserBundle:Offrev")->findAll();
        $offres1=$em->getRepository("EspritUserBundle:Offreh")->findAll();
        if($request->isMethod("post"))
        {


            $criteria = $request->get('criteria');
            $offres = $em->getRepository("EspritUserBundle:Offrev")->findlike($criteria);
            $offres1 = $em->getRepository("EspritUserBundle:Offreh")->findlike($criteria);

            //echo"suite au clique sue le bouton submit";
        }
        return $this->render('EspritUserBundle:Template:listOffre.html.twig',array("offres"=>$offres,"offres1"=>$offres1));

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

    public function deleteoffreAction(Request $request)
    {

        $ref = $request->get('id');
        $type=$request->get('type');

        $em1 =$this->getDoctrine()->getManager();



        if (strcmp("$type","Flight"))
        {
            $Offre =$em1->getRepository('EspritUserBundle:Offrev')->find($ref);
            $em1->remove($Offre);
        }

        else {

            $Offre1 = $em1->getRepository('EspritUserBundle:Offreh')->find($ref);
            $em1->remove($Offre1);
        }
        $em1->flush();
        return $this->redirectToRoute('listoffre');

    }
    public function updateoffreAction(Request $request)
    {   $id = $request->get('id');

        $em =$this->getDoctrine()->getManager();
        $Offreh = $em->getRepository("EspritUserBundle:Offreh")->find($id);
        $Offrev = $em->getRepository("EspritUserBundle:Offrev")->find($id);
        $vols=$em->getRepository("EspritUserBundle:Vol")->findAll();
        $heber=$em->getRepository("EspritUserBundle:Hebergement")->findAll();
        if($request->isMethod('POST')){
            if ($request->get('selector55')=="Flight") {
                $reference=$request->get('List');
                $vol= $em->getRepository('EspritUserBundle:Vol')->findOneBy(array('numvol' => "$reference"));
                $Offrev->setDuree($request->get('Duration'));
                $Offrev->setSpecification($request->get('Discount'));
                $Offrev->setType($request->get('selector55'));
                $Offrev->setDatedebut(new \DateTime($request->get('Start_Date')));
                $Offrev->setDatefin(new \DateTime($request->get('End_Date')));
                $Offrev->setRefVol($vol);
                $em->merge($Offrev);
            } else
            {
                $reference=$request->get('List');
                $heberg= $em->getRepository('EspritUserBundle:Hebergement')->findOneBy(array('nom' => "$reference"));
                $Offreh->setDuree($request->get('Duration'));
                $Offreh->setSpecification($request->get('Discount'));
                $Offreh->setType($request->get('selector55'));
                $Offreh->setDatedebut(new \DateTime($request->get('Start_Date')));
                $Offreh->setDatefin(new \DateTime($request->get('End_Date')));
                $Offreh->setRefHeberg($heberg);
                $em->merge($Offreh);
            }
            $em->flush();
            return $this->redirectToRoute('listoffre');
        }

        return $this->render('EspritUserBundle:Template:UpdateOffre.html.twig',array("vols"=>$vols,"heber"=>$heber));
    }
    public function calendarAction()
    {

        return $this->render('EspritUserBundle:Template:calendar.html.twig');

    }
}