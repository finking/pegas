<?php

namespace Pegas\TaskBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
	public function indexAction()
	{
		return $this->render('TaskBundle:Main:index.html.twig');
	}
	
	public function userformAction()
	{
		return $this->render('TaskBundle:Main:userform.html.twig');
	}
	
	public function thanksAction()
	{
		return $this->render('TaskBundle:Main:thanks.html.twig');
	}
	
	
}