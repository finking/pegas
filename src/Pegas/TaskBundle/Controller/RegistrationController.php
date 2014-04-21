<?php

namespace Pegas\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pegas\TaskBundle\Info\User;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends Controller
{
    public function userformAction(Request $request)
    {
        $user = new User();   

        $form = $this->createFormBuilder($user)
            ->add('name', 'text')
            ->add('last_name', 'text')
            ->add('email', 'email')
            ->getForm();

		if ($request->getMethod() == 'POST') 
		{
			//$form->bindRequest($request);
			$form->bind($this->getRequest());
			
			$mailer = $this->get('mailer');

			$message = \Swift_Message::newInstance()
				->setSubject('Регистрация нового пользователя')
				->setFrom(array('tutoring64@gmail.com'=> 'Администрация тестового сайта'))
				->setTo('myrassilka@yandex.ru')
				->setBody($this->renderView('TaskBundle:Main:letter.html.twig', array('form' => $form->createView())))
			;
			$mailer->send($message);

			if ($form->isValid()) 
			{		
				return $this->redirect($this->generateUrl('thanks'));
			}
		}	

        return $this->render('TaskBundle:Main:userform.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}