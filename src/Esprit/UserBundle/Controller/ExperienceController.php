<?php

namespace Esprit\UserBundle\Controller;


use Esprit\UserBundle\Entity\Comment;
use Esprit\UserBundle\Form\ExperienceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Esprit\UserBundle\Entity\Experience;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;

/**
 * Created by PhpStorm.
 * User: Kouka
 * Date: 18/11/2017
 * Time: 20:34
 */

class ExperienceController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction (Request $request) {
        //Creer une instance de l'Entity manager
        $em= $this->getDoctrine()->getManager();
        $Experiences = $em->getRepository("EspritUserBundle:Experience")->findAll();
       // $dql ="SELECT exp FROM UserBundle:Experience bp";
       // $query = $em->createQuery($dql);
        /**
        *@var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator = $this->get('knp_paginator');
        $result=$paginator->paginate(
            $Experiences,
            //$query,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',3)

        );
        dump(get_class($paginator));
        return $this->render("EspritUserBundle:Experience:list.html.twig",array(
            "Experiences"=>$result
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction (Request $request)
    {
        $id=$request->get('id');
        $em=$this->getDoctrine()->getManager();

        $Experience = $em->getRepository('EspritUserBundle:Experience')->find($id);
        $image=$Experience->getImage();
        $path=$this->getParameter('image_directory').'/'.$image;
        //unlink(''.$path);
        /** @var Filesystem $fs */
        $fs=new Filesystem();
        $fs->remove(array($path));
        $em->remove($Experience);
        $em->flush();
        $this->addFlash('notice','BlogPost Removed');
        return $this->redirectToRoute('listExperience');
    }
    public function adeleteAction (Request $request)
    {
        $id=$request->get('id');
        $em=$this->getDoctrine()->getManager();

        $Experience = $em->getRepository('EspritUserBundle:Experience')->find($id);
        $image=$Experience->getImage();
        $path=$this->getParameter('image_directory').'/'.$image;
        //unlink(''.$path);
        /** @var Filesystem $fs */
        $fs=new Filesystem();
        $fs->remove(array($path));
        $em->remove($Experience);
        $em->flush();
        $this->addFlash('notice','BlogPost Removed');
        return $this->redirectToRoute('alistExperience');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction (Request $request)
    {
        $Experience = new Experience();
        $form=$this->createForm(ExperienceType::class,$Experience);
        $form->handleRequest($request);
        if($form->isValid()){
            /**
             * @var UploadedFile $file
             */
            $file=$Experience->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('image_directory'),$fileName
            );
            $Experience->setImage($fileName);
            $em= $this->getDoctrine()->getManager();
            $em->persist($Experience);
            $em->flush();
            $this->addFlash('notice','BlogPost Added');

            return $this->redirectToRoute('listExperience');

        }
        return $this -> render("EspritUserBundle:Experience:add.html.twig",array ("form"=>$form->createView()));
    }
    public function updateAction (Request $request){
        $id=$request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Experience=$em->getRepository('EspritUserBundle:Experience')->find($id);
        $form = $this->createForm(ExperienceType::class,$Experience);
        $form->handleRequest($request);
        if($form->isValid()){
            $em= $this->getDoctrine()->getManager();
            $em->persist($Experience);
            $em->flush();
            $this->addFlash('notice','BlogPost Updated');

            return $this->redirectToRoute('listExperience');
        }
        return $this->render('EspritUserBundle:Experience:update.html.twig',array("form"=>$form->createView()));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findAction (Request $request) {
        $em=$this->getDoctrine()->getManager();
        $Experiences=$em->getRepository("EspritUserBundle:Experience")->findAll();
        if($request->isMethod("POST"))
        {
            $criteria=$request->get('criteria');
            $em=$this->getDoctrine()->getManager();

            $Experiences=$em->getRepository("EspritUserBundle:Experience")
                ->findBy(array("title"=>$criteria));

            $this->addFlash('notice','BlogPost Found');

            // echo "suite au clic sur le bouton de type submit";

        }
        $paginator = $this->get('knp_paginator');
        $result=$paginator->paginate(
            $Experiences,
            //$query,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',3)

        );
        dump(get_class($paginator));

        return $this->render("EspritUserBundle:Experience:find.html.twig",array("Experiences"=>$result));
    }
    public function likeAction(Request $request)
    {
        $id=$request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Experience = $em->getRepository("EspritUserBundle:Experience")->find($id);

            $Experience->setLikeCount($Experience->getLikeCount()+ 1);
            $em->persist($Experience);
            $em->flush();
        $this->addFlash('notice','BlogPost Liked');

        return $this->redirectToRoute('listExperience');

}
    public function dislikeAction(Request $request)
    {
        $id=$request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Experience = $em->getRepository("EspritUserBundle:Experience")->find($id);

            $Experience->setDislikeCount($Experience->getDislikeCount()+ 1);
            $em->persist($Experience);
            $em->flush();
        $this->addFlash('notice','BlogPost Disliked');

        return $this->redirectToRoute('listExperience');

    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function moreAction (Request $request) {
        $id=$request->get('id');

        $Experience = $this->getDoctrine()->getRepository("EspritUserBundle:Experience")->find($id);

        return $this->render("EspritUserBundle:Experience:more.html.twig",
            array(
                'Experience'=>$Experience
            ));
    }

    public function reportAction(Request $request)
    {
        $id=$request->get('id');
        $em = $this->getDoctrine()->getManager();
        $Experience = $em->getRepository("EspritUserBundle:Experience")->find($id);

        $Experience->setReported($Experience->getReported()+ 1);
        $em->persist($Experience);
        $em->flush();
        $this->addFlash('notice','BlogPost Reported');

        return $this->redirectToRoute('listExperience');

    }
    public function filterAction (Request $request) {

        $em=$this->getDoctrine()->getManager();
        $Experiences=$em->getRepository("EspritUserBundle:Experience")->findBy(
            array(),
            array('likecount' => 'DESC')
        );
            $this->addFlash('notice','BlogPosts Ordered By Popularity');

            // echo "suite au clic sur le bouton de type submit";

        $paginator = $this->get('knp_paginator');
        $result=$paginator->paginate(
            $Experiences,
            //$query,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',3)

        );
        dump(get_class($paginator));

        return $this->render("EspritUserBundle:Experience:list.html.twig",array("Experiences"=>$result));
    }
    public function filterdateAction (Request $request) {

        $em=$this->getDoctrine()->getManager();
        $Experiences=$em->getRepository("EspritUserBundle:Experience")->findBy(
            array(),
            array('date' => 'ASC')
        );
        $this->addFlash('notice','BlogPosts Ordered By Date');

        // echo "suite au clic sur le bouton de type submit";

        $paginator = $this->get('knp_paginator');
        $result=$paginator->paginate(
            $Experiences,
            //$query,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',3)

        );
        dump(get_class($paginator));

        return $this->render("EspritUserBundle:Experience:list.html.twig",array("Experiences"=>$result));
    }
    public function filterreportedAction (Request $request) {
        $reported=$request->get('reported');

        $em=$this->getDoctrine()->getManager();
        $Experiences=$em->getRepository("EspritUserBundle:Experience")->findBy(
            array(),
            array('reported' =>'reported>?50' )
        );
        $this->addFlash('notice','BlogPosts Ordered By >50 Reports');

        // echo "suite au clic sur le bouton de type submit";

        $paginator = $this->get('knp_paginator');
        $result=$paginator->paginate(
            $Experiences,
            //$query,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',3)

        );
        dump(get_class($paginator));

        return $this->render("EspritUserBundle:Experience:list.html.twig",array("Experiences"=>$result));
    }
    public function alistAction (Request $request) {
        //Creer une instance de l'Entity manager
        $em= $this->getDoctrine()->getManager();
        $Experiences = $em->getRepository("EspritUserBundle:Experience")->findAll();
        // $dql ="SELECT exp FROM UserBundle:Experience bp";
        // $query = $em->createQuery($dql);
        /**
         *@var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator = $this->get('knp_paginator');
        $result=$paginator->paginate(
            $Experiences,
            //$query,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',3)

        );
        dump(get_class($paginator));
        return $this->render("EspritUserBundle:Experience:alist.html.twig",array(
            "Experiences"=>$result
        ));
    }
    public function addcommentAction ($ide) {
        $Comment = new Comment();
        //date_default_timezone_set('Africa/Tunis');
        //$user = $this->getUser();
        //$id = $user->getId();
        //date_default_timezone_set('Africa/Tunis');
        $em = $this->getDoctrine()->getManager();
        $em1 = $this->getDoctrine()->getManager();
        $Experience = $em1->getRepository('EspritUserBundle:Experience')->find($ide);
        $Comment = $em1->getRepository('EspritUserBundle:PostComment')->findBy(array('idexperience' => $ide));
        $date = new \DateTime('now', (new \DateTimeZone('Africa/Tunis')));
        if (isset($_POST['content'])) {
            //$postcomment->setIdUser($user);
            $Comment->setContent($_POST['content']);
            $Comment->setIdexperience($Experience);
            $Comment->setDate($date);
            $em->persist($Comment);
            $em->flush();
            return $this->redirectToRoute("moreExperience", array('id' => $ide));


        }

    }
}

