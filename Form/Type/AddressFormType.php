<?php

namespace UAM\Bundle\AddressBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressFormType extends AbstractType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'translation_domain' => 'UAMAddressBundle',
            'data_class' => 'AddressableInterface',
            'name' => 'address',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text' , array(
            'label' => 'address.form.name.label',
            'required' => true,
        ));

        $builder->add('street', 'text' , array(
            'label' => 'address.form.street.label',
            'required' => true,
        ));

        $builder->add('complement', 'text' , array(
            'label' => 'address.form.complement.label',
            'required' => true,
        ));

        $builder->add('locality', 'text' , array(
            'label' => 'address.form.locality.label',
            'required' => true,
        ));

        $builder->add('region', 'text' , array(
            'label' => 'address.form.region.label',
            'required' => true,
        ));

        $builder->add('postal_code', 'text' , array(
            'label' => 'address.form.postal_code.label',
            'required' => true,
        ));

        $builder->add('country_id', 'choice' , array(
            'label' => 'address.form.country_id.label',
            'required' => false,
            'empty_value' => '',
            'empty_data' => null
        ));
    }

    public function getName()
    {
        return 'uam_address';
    }
}
