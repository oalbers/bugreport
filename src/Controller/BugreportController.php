<?php
// src/Controller/BugreportController.php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BugreportController extends AbstractController
{

	/**
	* @Route("/Bugreport", name="app_Bugreport")
	*/

	public function index()
	{
	    $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
		return new Response('COOL');
	}
	
}
