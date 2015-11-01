<?php
/**
 * Config.php
 *
 * Part of Overtrue\Wechat.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    a939638621 <a939638621@hotmail.com>
 * @copyright 2015 a939638621 <a939638621@hotmail.com>
 * @link      https://github.com/a939638621
 */

namespace Shop\Foundation;


use Overtrue\Wechat\AccessToken;
use Overtrue\Wechat\Http;

/**
 * Class Config
 * @package Shop
 * @property string $appId
 * @property string $appSecret
 * @property AccessToken $accessToken
 * @property Http $http
 */
class Config
{
    private $data;

    public function __construct($appId,$appSecret)
    {
        $this->appId = $appId;
        $this->appSecret = $appSecret;
    }

    public function getConfig()
    {
        $this->accessToken = !empty($this->accessToken) ? $this->accessToken : new AccessToken($this->appId,$this->appSecret);
        $this->http = !empty($this->http) ? $this->http : new Http($this->accessToken);

        return $this;
    }

    public function __set($name,$value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }


}