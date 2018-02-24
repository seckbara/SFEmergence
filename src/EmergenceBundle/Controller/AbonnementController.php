<?php

namespace EmergenceBundle\Controller;

use EmergenceBundle\Entity\Abonnement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EmergenceBundle\Form\AdherentType;
use EmergenceBundle\Form\AbonnementType;
use EmergenceBundle\Entity\Adherent;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


class AbonnementController extends Controller
{

    /**
     * @Route("/create_abonnement/{id}", name="create_abonnement")
     */
    public function createAction(Request $request, $id)
    {
        if ($request->isMethod('POST')){

            $repository = $this->getDoctrine()->getRepository(Adherent::class);
            $adherent = $repository->find($id);

            $abonnement = new Abonnement();
            $abonnement->setAdherent($adherent);

            $form = $this->createForm(AbonnementType::class, $abonnement);
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($abonnement);
            $em->flush();

            return $this->redirectToRoute('search_abonnement');

        }

    }


    /**
     * @Route("/search_abonnement", name="search_abonnement")
     */
    public function searchAction()
    {
            $repository = $this->getDoctrine()->getRepository(Abonnement::class);
            $abonnement = $repository->findAll();

            return $this->render('frontend/abonnement/rechercher.html.twig', array(
                'abonnements' => $abonnement,
            ));

    }
}
