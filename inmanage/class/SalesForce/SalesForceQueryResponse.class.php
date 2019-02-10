<?php
/**
 * Created by PhpStorm.
 * User: itai
 * Date: 19/12/2017
 * Time: 16:49
 */
namespace Inmanage\SalesForce\SalesForceQueryResponse;
use Inmanage\SalesForce\SalesForceQuery\SalesForceQuery;

class SalesForceQueryResponse
{
    public $success = NULL;
    public $totalSize = NULL;
    public $recordsArr = array();

    public function __construct(SalesForceQuery $SalesForceQuery)
    {

        $SalesForceQuery->run();
        $this->success = $SalesForceQuery->done;
        $this->totalSize = $SalesForceQuery->totalSize;
        $this->recordsArr = $SalesForceQuery->records;
    }


}