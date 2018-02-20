<?php

namespace EmergenceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use EmergenceBundle\Form\AdherentType;
use EmergenceBundle\Entity\Adherent;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


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

        return $this->render('default/frontend/adherent/adherent.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/list", name="create_adherent")
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
            dump($adherent->getId());
            return $this->render('default/frontend/adherent/list.html.twig');
        }


    }
}
