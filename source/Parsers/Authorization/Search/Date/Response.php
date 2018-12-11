<?php
/**
 * Created by PhpStorm.
 * User: esilva
 * Date: 25/04/16
 * Time: 11:18
 */

namespace PagSeguro\Parsers\Authorization\Search\Date;

/**
 * Class Response
 * @package PagSeguro\Parsers\Authorization\Search\Date
 */
class Response
{
    /**
     * @var
     */
    private $date;

    /**
     * @var
     */
    private $resultsInThisPage;

    /**
     * @var
     */
    private $authorizations;

    /**
     * @var
     */
    private $currentPage;
    
    /**
     * @var
     */
    private $totalPages;

    /**
     * @return mixed
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @param mixed $currentPage
     * @return Response
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return Response
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultsInThisPage()
    {
        return $this->resultsInThisPage;
    }

    /**
     * @param mixed $resultsInThisPage
     * @return Response
     */
    public function setResultsInThisPage($resultsInThisPage)
    {
        $this->resultsInThisPage = $resultsInThisPage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalPages()
    {
        return $this->totalPages;
    }

    /**
     * @param mixed $totalPages
     * @return Response
     */
    public function setTotalPages($totalPages)
    {
        $this->totalPages = $totalPages;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorizations()
    {
        return $this->authorizations;
    }


    /**
     * @param $authorizations
     * @return $this
     */
    public function setAuthorizations($authorizations)
    {
        if ($authorizations) {
            if (is_object($authorizations)) {
                self::addAuthorization($authorizations);
            } else {
                foreach ($authorizations as $auth) {
                    self::addAuthorization($auth);
                }
            }
        }
        return $this;
    }

    /**
     * @param $authorization
     */
    private function addAuthorization($authorization)
    {
        $response = new \PagSeguro\Parsers\Authorization\Search\Response();
        $response->setCode(current($authorization->code))
            ->setCreationDate(current($authorization->creationDate))
            ->setReference(current($authorization->reference))
            ->setAccount(current($authorization->account))
            ->setPermissions(current($authorization->permissions));
        $this->authorizations[] = $response;
    }
}
