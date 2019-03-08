<?php

namespace EvenementBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/page", name="page")
     * @param Request $request
     */
    public function indexAction(Request $request)
    {
        die('todos');
    }

}
