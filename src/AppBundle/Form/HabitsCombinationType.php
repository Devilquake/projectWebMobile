<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HabitsCombinationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('habit1', EntityType::class, array(
            'class' => 'AppBundle\Entity\Habits',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('h')
                    ->orderBy('h.name', 'ASC');
            },
            'choice_label' => 'name'
        ))->add('habit2', EntityType::class, array(
            'class' => 'AppBundle\Entity\Habits',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('h')
                    ->orderBy('h.name', 'ASC');
            },
            'choice_label' => 'name'
        ))->add('habit3', EntityType::class, array(
            'class' => 'AppBundle\Entity\Habits',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('h')
                    ->orderBy('h.name', 'ASC');
            },
            'choice_label' => 'name'
        ))->add('save', SubmitType::class, array('label' => 'Add'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\HabitsCombination'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_habitscombination';
    }


}
