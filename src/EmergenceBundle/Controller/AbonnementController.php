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
     * @Route("/create_abonnement", name="create_abonnement")
     */
    public function createAction(Request $request)
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
}
