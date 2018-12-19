<?php
/**
 * Snipcart plugin for Craft CMS 3.x
 *
 * @link      https://workingconcept.com
 * @copyright Copyright (c) 2018 Working Concept Inc.
 */

namespace workingconcept\snipcart\models\shipstation;

use workingconcept\snipcart\models\Address as SnipcartAddress;

/**
 * ShipStation Address Model
 * https://www.shipstation.com/developer-api/#/reference/model-address
 */
class Address extends \craft\base\Model
{
    // Constants
    // =========================================================================

    const ADDRESS_NOT_VALIDATED = 'Address not yet validated';
    const ADDRESS_VALIDATED = 'Address validated successfully';
    const ADDRESS_VALIDATION_WARNING = 'Address validation warning';
    const ADDRESS_VALIDATION_FAILED = 'Address validation failed';


    // Properties
    // =========================================================================

    /**
     * @var string|null Name of person.
     */
    public $name;

    /**
     * @var string|null Name of company.
     */
    public $company;

    /**
     * @var string|null First line of address.
     */
    public $street1;

    /**
     * @var string|null Second line of address.
     */
    public $street2;

    /**
     * @var string|null Third line of address.
     */
    public $street3;

    /**
     * @var string|null City
     */
    public $city;

    /**
     * @var string|null State
     */
    public $state;

    /**
     * @var string|null Postal Code
     */
    public $postalCode;

    /**
     * @var string Country Code. The two-character ISO country code is required.
     */
    public $country;

    /**
     * @var string|null Telephone number.
     */
    public $phone;

    /**
     * @var bool|null Specifies whether the given address is residential.
     */
    public $residential;

    /**
     * @var string|null Identifies whether the address has been verified by ShipStation (read only). See class constants.
     */
    public $addressVerified;


    // Public Methods
    // =========================================================================

    /**
     * @param SnipcartAddress $address
     */
    public function populateFromSnipcartAddress(SnipcartAddress $address)
    {
        $this->name       = $address->name;
        $this->street1    = $address->address1;
        $this->street2    = $address->address2;
        $this->city       = $address->city;
        $this->state      = $address->province;
        $this->postalCode = $address->postalCode;
        $this->phone      = $address->phone;
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['name', 'street1', 'street2', 'street3', 'city', 'state', 'postalCode', 'phone', 'addressVerified'], 'string', 'max' => 255],
            [['name', 'street1', 'city', 'state', 'postalCode'], 'required'],
            [['residential'], 'boolean'],
            [['company', 'street2', 'street3'], 'default', 'value' => null],
            [['country'], 'default', 'value' => 'US'],
            [['country'], 'string', 'length' => 2],
        ];
    }

}