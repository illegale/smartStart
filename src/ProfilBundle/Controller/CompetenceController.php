<?php

namespace ProfilBundle\Controller;

use ProfilBundle\Entity\Competence;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CompetenceController extends Controller
{
    public function AjouterCompetenceAction(Request $request)
    {
        $competence = new Competence();

        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();


        $competence->setIdUser($user);

        $competence->setNomcompetence($request->get("nomcomp"));


        $em->persist($competence);
        // ajouter les donnee ala bd
        $em->flush();
        return new Response("success");


    }
    public function updateCompAction(Request $request, $id)
    {


        $em = $this->getDoctrine()->getManager();
        $comp = $this->getDoctrine()
            ->getRepository(Competence::class)
            ->find($id);
        $user = $this->getUser();


        $comp->getIdUser($user);

        $comp->setNomcompetence($request->get("nomcomp"));


        $em->persist($comp);
        // ajouter les donnee ala bd
        $em->flush();
        return new Response("success");


    }
    public function DeleteCompAction($id)
    {
        $em = $this->getDoctrine()->getManager();


        $comp = $this->getDoctrine()->getRepository(Competence::class)->find($id);


        $em->remove($comp);
        $em->flush();
        return $this->redirectToRoute('profil',array('id'=>$this->getUser()->getId()));
    }

}
