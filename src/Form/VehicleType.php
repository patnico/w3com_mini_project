<?php

namespace App\Form;

use App\Entity\Vehicle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('registration', null, ['label' => 'Immatriculation'])
            ->add('brand', null, ['label' => 'Marque'])
            ->add('model', null, ['label' => 'Modèle'])
            ->add('color', null, ['label' => 'Couleur'])
            /*->add('custom_equipments', EntityType::class, array(
                'class' => Equipment::class,
                'choice_label' => 'longName',
                'multiple' => true,
                'mapped' => false
                // TODO: use Vehicle addEquipment method to create custom equipments
            ))*/;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
