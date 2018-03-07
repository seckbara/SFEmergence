<?php

namespace EmergenceBundle\Controller;

use Doctrine\DBAL\Types\TextType;
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

            $abonnement = new Abonnement();
            $form_aboonement = $this->createForm(AbonnementType::class, $abonnement);
            $form_aboonement->add('submit', SubmitType::class, [
                    'label' => 'Ajouter',
                    'attr' => ['class' => 'btn-block btn-success btn-sm pull-right'],
            ]);

            $this->get('session')->getFlashBag()->add('success', 'Adherent '.$this_adherent->getPrenom().' '.$this_adherent->getNom().'   à été ajouter avec succées.');

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


    /**
     * @Route("/search_adherent", name="search_adherent")
     */
    public function searchAction()
    {
        $repository = $this->getDoctrine()->getRepository(Adherent::class);
        $adherents = $repository->findAll();
        return $this->render('frontend/adherent/rechercher.html.twig', array(
            'adherents' => $adherents,
        ));
    }

    /**
     * @Route("/delete/{id}", name="delete_adherent")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(Adherent::class);
        $adherent = $repository->find($id);
        if($adherent != null){
            $em->remove($adherent);
            $em->flush();
        }
        dump($adherent);
        exit();
    }

}
