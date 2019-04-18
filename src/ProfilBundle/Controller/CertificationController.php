<?php

namespace ProfilBundle\Controller;

use ProfilBundle\Entity\Certification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CertificationController extends Controller
{
    public function AjouterCertificatAction(Request $request)
    {
        $certficat = new Certification();

        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();


        $certficat->setIdUser($user);

        $certficat->setNomcertif($request->get("nomcert"));
        $certficat->setOrganisme($request->get("organisme"));
        $certficat->setMoisdebut($request->get("moisd"));
        $certficat->setMoisfin($request->get("moisf"));
        $certficat->setAnneedebut($request->get("anneed"));
        $certficat->setAnneefin($request->get("anneef"));
        $certficat->setUrl($request->get("url"));

        $em->persist($certficat);
        // ajouter les donnee ala bd
        $em->flush();
        return new Response("success");


    }
    public function updatecertifAction(Request $request, $id)
    {


        $em = $this->getDoctrine()->getManager();
        $certif = $this->getDoctrine()
            ->getRepository(Certification::class)
            ->find($id);
        $user = $this->getUser();


        $certif->getIdUser($user);

        $certif->setNomcertif($request->get("nomcert"));
        $certif->setOrganisme($request->get("organisme"));
        $certif->setMoisdebut($request->get("moisd"));
        $certif->setMoisfin($request->get("moisf"));
        $certif->setAnneedebut($request->get("anneed"));
        $certif->setAnneefin($request->get("anneef"));
        $certif->setUrl($request->get("url"));

        $em->persist($certif);
        // ajouter les donnee ala bd
        $em->flush();
        return new Response("success");


    }
    public function DeletecertifAction($id)
    {
        $em = $this->getDoctrine()->getManager();


        $certif = $this->getDoctrine()->getRepository('ProfilBundle:Certification')->find($id);


        $em->remove($certif);
        $em->flush();
        return $this->redirectToRoute('profil',array('id'=>$this->getUser()->getId()));
    }



}
