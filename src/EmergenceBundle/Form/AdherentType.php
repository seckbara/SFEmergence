<?php

namespace EmergenceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdherentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('prenom')->add('dateNaissance')->add('ville')->add('sexe')->add('telephone')->add('adresse')->add('codePostal')->add('email')->add('certificat')->add('situation')->add('quartier')->add('numeroSecu')->add('telephoneFixe')->add('cheminsCertificat')->add('commentaire');
    }/**
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
