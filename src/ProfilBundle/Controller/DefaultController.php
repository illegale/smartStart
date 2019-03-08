<?php

namespace ProfilBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/profil", name="page")
     * @param Request $request
     */
    public function indexAction(Request $request)
    {
    die('fuck');
    }
}
