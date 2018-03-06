<?php

namespace EmergenceBundle\Form;

use Doctrine\DBAL\Types\DateType;
use EmergenceBundle\Repository\QuartierRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use EmergenceBundle\Entity\Quartier;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;




class AdherentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('dateNaissance')
            ->add('ville')
            ->add('sexe', ChoiceType::class, array(
                'choices' => array(
                   "Homme" => "H",
                    "Femme" => "F"
                )
            ))
            ->add('telephone')
            ->add('adresse')
            ->add('codePostal')
            ->add('email')
            ->add('certificat', ChoiceType::class, array(
                'choices' => array(
                    'Oui' => "Oui",
                    'Non' => "Non"
                )
            ))
            ->add('situation')
            ->add('quartier', ChoiceType::class, array(
                'choices' => array(
                    'Le Havre' => "1",
                    'Rouen' => "2",
                    'Caucrioville' => "3",
                    'Bleville' => "4"
                )
            ))
            ->add('numeroSecu')
            ->add('telephoneFixe')
            ->add('cheminsCertificat')
            ->add('commentaire');
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EmergenceBundle\Entity\Adherent'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'emergencebundle_adherent';
    }


}
