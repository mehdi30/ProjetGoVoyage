<?php
/**
 * Created by PhpStorm.
 * User: Imen
 * Date: 22/11/2017
 * Time: 01:11
 */



namespace Esprit\UserBundle\Controller;
use Esprit\UserBundle\Entity\Mail;
use Esprit\UserBundle\Form\MailType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Swift_Message;
use Symfony\Component\HttpFoundation\Response;



class MailController extends Controller
{
    public function indexAction(Request $request)
    {
        $mail = new Mail();
        $form= $this->createForm(MailType::class, $mail);
        $form->handleRequest($request) ;
        if ($form->isValid()) {
            $message = \Swift_Message::newInstance()
                ->setSubject('acknowledgment of receipt')
                ->setFrom('espritplus2017@gmail.com')
                ->setTo($mail->getEmail())
                ->setBody(
                    $this->renderView(
                        'EspritUserBundle::email.html.twig',
                        array('nom' => $mail->getNom(), 'prenom'=>$mail->getPrenom())
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            return $this->redirect($this->generateUrl('esprit_user_accuse'));
        }
        return $this->render('EspritUserBundle::index.html.twig',
            array('form'=>$form->createView()));
    }

    public function successAction(){
        return new Response("Email successfully sent.Please verify your inbox :) ");
    }


}