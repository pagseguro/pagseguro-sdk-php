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

namespace PagSeguro\Resources\Responsibility\Configuration;

use PagSeguro\Configuration\Wrapper;
use PagSeguro\Resources\Responsibility\Handler;

class File implements Handler
{
    private $successor;

    public function successor($next)
    {
        $this->successor = $next;
        return $this;
    }

    public function handler($action, $class)
    {
        if (file_exists(PS_CONFIG_PATH . "Wrapper.php")) {
            $wrapper = new Wrapper;
            return array_merge(
                \PagSeguro\Helpers\Wrapper::environment($wrapper),
                \PagSeguro\Helpers\Wrapper::credentials($wrapper),
                \PagSeguro\Helpers\Wrapper::charset($wrapper),
                \PagSeguro\Helpers\Wrapper::log($wrapper)
            );
        }
        return $this->successor->handler($action, $class);
    }
}
