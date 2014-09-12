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
        $street = $address->getStreet();
        $city = $address->getLocality();
        $state = $address->getRegion();
        $zip = $address->getPostalCode();
        $country = $address->getCountryId();

        $formatted_address = $street . ', ' . $city . ', ' . $state . ', ' . $zip . ', ' . $country;

        return $formatted_address;
    }

    public function getName()
    {
        return 'address';
    }
}