<?php

namespace UAM\Bundle\AddressBundle\Twig\Extension;

use Twig_Extension;

use Twig_SimpleFilter;

class AddressExtension extends Twig_Extension
{
    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter('address', array($this, 'format')),
        );
    }

    public function format($address, $format = null, $locale = null)
    {
        $city = $address->getLocality();
        $state = $address->getRegion();
        $zip = $address->getPostalCode();

        $formatted_address = $city . ' ' . $state . ' ' . $zip;

        return $formatted_address;
    }

    public function getName()
    {
        return 'address';
    }
}