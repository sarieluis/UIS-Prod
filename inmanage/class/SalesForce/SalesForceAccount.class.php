<?php
/**
 * Created by PhpStorm.
 * User: itai
 * Date: 19/12/2017
 * Time: 16:49
 */
namespace Inmanage\SalesForce\SalesForceAccount;
use Inmanage\SalesForce\SalesForceConfig;
use Inmanage\SalesForce\SalesForceObject\SalesForceObject;

include_once ($_SERVER['DOCUMENT_ROOT'] .'/inmanage/class/SalesForce/SalesForceObject.class.php');

class SalesForceAccount extends SalesForceObject
{
    public  $baseUriArr = array(
        'sobjects',
        'Account',
        'id',
        '{Id}'
    );

    public $Id;
    public $IsDeleted;
    public $MasterRecordId;
    public $Name;
    public $LastName;
    public $FirstName;
    public $Salutation;
    public $MiddleName;
    public $Suffix;
    public $Type;
    public $RecordTypeId;
    public $ParentId;
    public $BillingStreet;
    public $BillingCity;
    public $BillingState;
    public $BillingPostalCode;
    public $BillingCountry;
    public $BillingStateCode;
    public $BillingCountryCode;
    public $BillingLatitude;
    public $BillingLongitude;
    public $BillingGeocodeAccuracy;
    public $ShippingStreet;
    public $ShippingCity;
    public $ShippingState;
    public $ShippingPostalCode;
    public $ShippingCountry;
    public $ShippingStateCode;
    public $ShippingCountryCode;
    public $ShippingLatitude;
    public $ShippingLongitude;
    public $ShippingGeocodeAccuracy;
    public $ShippingAddress;
    public $Phone;
    public $Website;
    public $PhotoUrl;
    public $Industry;
    public $NumberOfEmployees;
    public $Description;
    public $CurrencyIsoCode;
    public $OwnerId;
    public $CreatedDate;
    public $CreatedById;
    public $LastModifiedDate;
    public $LastModifiedById;
    public $SystemModstamp;
    public $LastActivityDate;
    public $LastViewedDate;
    public $LastReferencedDate;
    public $PersonContactId;
    public $IsPersonAccount;
    public $PersonMailingStreet;
    public $PersonMailingCity;
    public $PersonMailingState;
    public $PersonMailingPostalCode;
    public $PersonMailingCountry;
    public $PersonMailingStateCode;
    public $PersonMailingCountryCode;
    public $PersonMailingLatitude;
    public $PersonMailingLongitude;
    public $PersonMailingGeocodeAccuracy;
    public $country;
    public $countryCode;
    public $geocodeAccuracy;
    public $latitude;
    public $longitude;
    public $postalCode;
    public $state;
    public $stateCode;
    public $street;
    public $PersonMobilePhone;
    public $PersonEmail;
    public $PersonTitle;
    public $PersonDepartment;
    public $PersonDoNotCall;
    public $PersonLastCURequestDate;
    public $PersonLastCUUpdateDate;
    public $PersonEmailBouncedReason;
    public $PersonEmailBouncedDate;
    public $Jigsaw;
    public $JigsawCompanyId;
    public $AccountSource;
    public $SicDesc;
    public $Count_Won_Assesment__c;
    public $Account_Status__c;
    public $Website_User_ID__c;
    public $Website_Password__c;
    public $Birth_Date__c;
    public $Education_Level__c;
    public $Profession__c;
    public $Language__c;
    public $Person_Age__c;

    public function __construct($salesforce_object_id)
    {
        $this->Id = $salesforce_object_id;
        parent::__construct();
    }


}