<?php

namespace EmergenceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EmergenceBundle\Form\AdherentType;
use EmergenceBundle\Entity\Adherent;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use EmergenceBundle\Form\AbonnementType;
use EmergenceBundle\Entity\Abonnement;



class AdherentController extends Controller
{
    /**
     * @Route("/add", name="adherent")
     */
    public function indexAction()
    {
        $adherent = new Adherent();
        $form = $this->createForm(AdherentType::class, $adherent);
        $form->add('submit', SubmitType::class, [
            'label' => 'Ajouter',
            'attr' => ['class' => 'btn-block btn-success btn-sm pull-right'],
        ]);

        return $this->render('frontend/adherent/adherent.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/abonnement", name="create_adherent")
     */
    public function createAction(Request $request)
    {
        if ($request->isMethod('POST')){
            $adherent = new Adherent();
            $form = $this->createForm(AdherentType::class, $adherent);
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($adherent);
            $em->flush();

            $this_adherent = $em->getRepository(Adherent::class)->find($adherent->getId());

            $adherent = new Abonnement();
            $form_aboonement = $this->createForm(AbonnementType::class, $adherent);
            $form_aboonement->add('submit', SubmitType::class, [
                    'label' => 'Ajouter',
                    'attr' => ['class' => 'btn-block btn-success btn-sm pull-right'],
            ]);

            return $this->render('frontend/abonnement/abonnement.html.twig',
                array(
                    'adherent' => $this_adherent,
                    'form' => $form_aboonement->createView(),
                )
            );
        }
        else {
            return $this->render('frontend/profile/profile.html.twig');
        }


    }
}
