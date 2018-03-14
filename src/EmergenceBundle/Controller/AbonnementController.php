<?php

namespace EmergenceBundle\Controller;

use EmergenceBundle\Entity\Abonnement;
use EmergenceBundle\Entity\Expirer;
use EmergenceBundle\Form\ExpirerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use EmergenceBundle\Form\AbonnementType;
use EmergenceBundle\Entity\Adherent;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



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

    /**
     * @Route("/expired_abonnement", name="expired_abonnement")
     */
    public function expiredAction()
    {
        $repository = $this->getDoctrine()->getRepository(Expirer::class);
        $mois = $repository->findAll();
        $expire = new Expirer();
        $form = $this->createForm(ExpirerType::class, $expire);
        $form->add('submit', SubmitType::class, [
            'label' => 'Rechercher',
            'attr' => ['class' => 'btn-block btn-default btn-sm pull-right'],
        ]);
        return $this->render('frontend/abonnement/expired.html.twig',
            array('form' => $form->createView(),
                  'mois' => $mois,
            )
        );
    }

    /**
     * @Route("/search_expired/{id}", name="search_expired")
     */
    public function searchexpiredAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Adherent::class);
        $adherent = $repository->find($id);
        dump($adherent);
        exit();
    }
}
