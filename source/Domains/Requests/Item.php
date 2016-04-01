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

namespace PagSeguro\Domains\Requests;

trait Item
{
    private $item;

    public function __construct()
    {
        $this->item = new \PagSeguro\Resources\Factory\Request\Item();
    }

    public function addItems()
    {
        return $this->item;
    }

    public function setItems($items)
    {
        if (is_array($items)) {
            $i = array();
            foreach ($items as $key => $item) {
                if ($item instanceof \PagSeguro\Domains\Item) {
                    $i[$key] = $item;
                } else {
                    if (is_array($item)) {
                        $i[$key] = new \PagSeguro\Domains\Item($item);
                    }
                }
            }
            $this->items = $i;
        }
    }

    public function getItems()
    {
        return current($this->item);
    }

    public function ItemLenght()
    {
        return count(current($this->item));
    }
}
