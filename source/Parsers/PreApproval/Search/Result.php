<?php
/**
 * 2007-2016 [PagSeguro Internet Ltda.]
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author    PagSeguro Internet Ltda.
 * @copyright 2007-2016 PagSeguro Internet Ltda.
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 *
 */

namespace PagSeguro\Parsers\PreApproval\Search;

/**
 * Class Result
 * @package PagSeguro\Parsers\PreApproval\Search
 */
class Result
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
    private $preApprovals;
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
    public function getPreApprovals()
    {
        return $this->preApprovals;
    }

    /**
     * @param mixed $preApprovals
     * @return Response
     */
    public function setPreApprovals($preApprovals)
    {
        if ($preApprovals) {
            if (is_object($preApprovals)) {
                self::addPreApproval($preApprovals);
            } else {
                foreach ($preApprovals as $preApproval) {
                    self::addPreApproval($preApproval);
                }
            }
        }
        return $this;
    }

    /**
     * @param $preApproval
     */
    private function addPreApproval($preApproval)
    {
        $response = new Response();
        $response->setName(current($preApproval->name))
            ->setCode(current($preApproval->code))
            ->setDate(current($preApproval->date))
            ->setTracker(current($preApproval->tracker))
            ->setStatus(current($preApproval->status))
            ->setReference(current($preApproval->reference))
            ->setLastEventDate(current($preApproval->lastEventDate))
            ->setCharge(current($preApproval->charge));

        $this->preApprovals[] = $response;
    }
}
