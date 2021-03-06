<?php

namespace ProfilBundle\Controller;

use ProfilBundle\Entity\Langue;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LangueController extends Controller
{
    public function AjouterLangueAction(Request $request)
    {
        $langue = new Langue();

        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();


        $langue->setIdUser($user);

        $langue->setLangue($request->get("langue"));
        $langue->setNiveau($request->get("niveau"));

        $em->persist($langue);
        // ajouter les donnee ala bd
        $em->flush();
        return new Response("success");


    }
    public function updateLangueAction(Request $request, $id)
    {


        $em = $this->getDoctrine()->getManager();
        $langue = $this->getDoctrine()
            ->getRepository(Langue::class)
            ->find($id);
        $user = $this->getUser();


        $langue->getIdUser($user);

        $langue->setLangue($request->get("langue"));
        $langue->setNiveau($request->get("niveau"));

        $em->persist($langue);
        // ajouter les donnee ala bd
        $em->flush();
        return new Response("success");


    }
    public function DeleteLangueAction($id)
    {
        $em = $this->getDoctrine()->getManager();


        $langue = $this->getDoctrine()->getRepository(Langue::class)->find($id);


        $em->remove( $langue);
        $em->flush();
        return $this->redirectToRoute('profil',array('id'=>$this->getUser()->getId()));
    }

}
