<?php

namespace App\Form;

use App\Entity\Itinerario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItinerarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('horasalida')
            ->add('horavuelta')
            ->add('diasemana')
            ->add('usuarios')
            ->add('origen')
            ->add('destino')
            ->add('puntosintermedio')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Itinerario::class,
        ]);
    }
}
