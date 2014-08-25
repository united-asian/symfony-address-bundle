<?php

namespace UAM\Bundle\AddressBundle\Form\Type;

use Propel\PropelBundle\Form\BaseAbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressFormType extends BaseAbstractType
{
    protected $options = array(
        'data_class' => 'AddressableInterface',
        'name' => 'address',
    );

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'translation_domain' => 'address',
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
            'label' => 'address.form.country.label',
            'required' => false,
            'attr' => array(
                'class' => 'country'
            ),
            'empty_value' => 'Choose Country',
            'empty_data' => null
        ));

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $map = $event->getData();
            $form = $event->getForm();

            $form->add('submit', 'submit', array(
                'label' => $map->isNew() ? 'address.actions.save' : 'address.actions.Edit',
            ));
        });

    }

    public function getName()
    {
        return 'address';
    }
}
