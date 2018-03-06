<?php

namespace EmergenceBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use EmergenceBundle\Entity\Situation;
use EmergenceBundle\Entity\Ville;
use EmergenceBundle\Entity\Quartier;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;





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
            ->add('ville', EntityType::class, array(
                'class' => Ville::class,
                'choice_label' => 'nom',
                'multiple' => false,
                'placeholder' => 'Veuillez selectionner une ville',
            ))
            ->add('sexe', ChoiceType::class, array(
                'choices' => array(
                    'Homme' => 'H',
                    "Femme" => 'F'
                )
            ))
            ->add('telephone')
            ->add('adresse')
            ->add('codePostal')
            ->add('email', EmailType::class)
            ->add('certificat', ChoiceType::class, array(
                'choices' => array(
                    'Oui' => "Oui",
                    'Non' => "Non"
                )
            ))
            ->add('situation', EntityType::class, array(
                'class' => Situation::class,
                'choice_label' => 'nom',
                'multiple' => false,
                'placeholder' => 'Veuillez selectionner une situation',
            ))
            ->add('quartier', EntityType::class, array(
                'class' => Quartier::class,
                'choice_label' => 'nom',
                'multiple' => false,
                'placeholder' => 'Veuillez selectionner un quartier',
            ))
            ->add('numeroSecu')
            ->add('telephoneFixe')
            ->add('cheminsCertificat')
            ->add('commentaire',TextareaType::class,array(
                'attr' => array('cols' => '5', 'rows' => '5'),
            ));
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
