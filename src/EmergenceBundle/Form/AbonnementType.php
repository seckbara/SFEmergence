<?php

namespace EmergenceBundle\Form;

use EmergenceBundle\Entity\Activite;
use EmergenceBundle\Entity\TypeAbonnement;
use EmergenceBundle\Entity\TypePaiement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AbonnementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('certificat', ChoiceType::class, array(
                'choices' => array('Oui' => 'Oui', 'Non' => 'Non'),
            ))
            ->add('activite', EntityType::class, array(
                'class' => Activite::class,
                'choice_label' => 'nom',
                'multiple' => false,
                'placeholder' => 'Veuillez selectionner une activité',
            ))
            ->add('dateCertficat')
            ->add('typeAbonnement', EntityType::class, array(
                'class' => TypeAbonnement::class,
                'choice_label' => 'nom',
                'multiple' => false,
                'placeholder' => 'Veuillez selectionner le type d\'abonnement',
            ))
            ->add('dateAbonnement')
            ->add('duree', ChoiceType::class, array(
                'choices' => array('3 mois' => '3', '6 mois' => '6', '12 mois' => '12'),
            ))
            ->add('typePaiement', EntityType::class, array(
                'class' => TypePaiement::class,
                'choice_label' => 'nom',
                'multiple' => false,
                'placeholder' => 'Veuillez selectionner le type de paiement',
            ))
            ->add('montant');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EmergenceBundle\Entity\Abonnement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'emergencebundle_abonnement';
    }


}
