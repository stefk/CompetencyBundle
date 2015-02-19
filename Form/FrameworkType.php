<?php

namespace HeVinci\CompetencyBundle\Form;

use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @DI\Service("hevinci_form_framework")
 * @DI\Tag("form.type")
 */
class FrameworkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', ['label' => 'name'])
            ->add('description', 'textarea', [
                'label' => 'description',
                'attr' => ['class' => 'form-control']
            ])
            ->add('scale', 'entity', [
                'class' => 'HeVinci\CompetencyBundle\Entity\Scale',
                'property' => 'name',
                'label' => 'scale_',
                'translation_domain' => 'competency',
            ]);
    }

    public function getName()
    {
        return 'hevinci_form_framework';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'translation_domain' => 'platform',
            'data_class' => 'HeVinci\CompetencyBundle\Entity\Competency'
        ]);
    }
}