<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\API\Voice;

use Zimbra\Soap\Client\Http as ClientHttp;

/**
 * Http is a class which allows to connect Zimbra API mail functions via SOAP using pecl_http extension
 * @package   Zimbra
 * @category  API
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class Http extends Base
{
    /**
     * Http constructor.
     *
     * @param string $location The Zimbra api soap location.
     */
    public function __construct($location)
    {
        parent::__construct($location);
        $this->_client = ClientHttp::instance($this->_location);
    }
}
