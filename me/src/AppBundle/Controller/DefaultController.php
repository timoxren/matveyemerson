<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/feed_back", name="feed_back")
     */
    function sendAction(Request $req)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Запрос с сайта matveyemerson.com')
            ->setFrom($mail_from)
            ->setTo($email)
            ->setBody('Обратная свящь с сайта', 'text/html');

        $this->get('mailer')->send($message);

        return new Response('');
    }

}
