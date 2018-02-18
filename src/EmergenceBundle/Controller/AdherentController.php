<?php

namespace EmergenceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EmergenceBundle\Form\AdherentType;
use EmergenceBundle\Entity\Adherent;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class AdherentController extends Controller
{
    /**
     * @Route("/add", name="add_adherent")
     */
    public function indexAction()
    {
        //return $this->render('default/frontend/adherent/adherent.html.twig');
        $adherent = new Adherent();
        $form = $this->createForm(AdherentType::class, $adherent);
        $form->add('submit', SubmitType::class, [
            'label' => 'Ajouter',
            'attr' => ['class' => 'btn-block btn-success btn-sm pull-right'],
        ]);


        return $this->render('default/frontend/adherent/adherent.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
