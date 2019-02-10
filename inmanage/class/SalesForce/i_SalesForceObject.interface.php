<?php
/**
 * Created by PhpStorm.
 * User: itai
 * Date: 20/12/2017
 * Time: 10:52
 */

namespace Inmanage\SalesForce\i_SalesForceObject;

interface i_SalesForceObject
{
    public function __construct(i_SalesForceObject $SalesForceObject = NULL, $get_record = true, $get_all_fields = false);
}