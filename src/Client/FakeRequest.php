<?php
/**
 * Billy
 *
 * PHP version 5
 *
 * @category  Billy
 * @package   Billy
 * @author    Lars Olesen <lars@intraface.dk>
 * @copyright 2014 Lars Olesen
 * @license   MIT Open Source License https://opensource.org/licenses/MIT
 * @version   GIT: <git_id>
 * @link      http://github.com/lsolesen/Billy
 */

namespace Billy\Client;

/**
 * Billy: Mocked out request.
 *
 * @category  Billy
 * @package   Billy
 * @author    Lars Olesen <lars@intraface.dk>
 * @copyright 2014 Lars Olesen
 */
class FakeRequest
{
    protected $accessToken;
    protected $outputFile = 'request.txt';

    /**
     * Construct a Billy Request with an API key and an API version.
     *
     * @param string $accessToken Access token from Billy
     */
    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Run a fake custom request.
     *
     * @param string $method  Either GET, POST, PUT or DELETE
     * @param string $address Sub-address to call, e.g. invoices or invoices/ID
     * @param array  $params  Parameters to be sent to Billy API
     *
     * @return \stdClass Response from Billy API
     */
    public function call($method, $address, $params = null)
    {
        $call = array(
          "mode" => $method,
          "address" => $address
        );
        if ($params) {
            $call["params"] = $params;
        }

        $handle = fopen($this->outputFile, "a");
        fwrite($handle, json_encode($call) . "\n");
        fclose($handle);

        $response = new \stdClass();
        if ($method == "POST") {
            $response->id = "12345-ABCDEFGHIJKLMNOP";
            $response->success = true;
        } else {
            $addressParts = explode("?", $address);
            $type = $addressParts[0];
            $response->$type = array();
            $response->status = 200;
        }
        return $response;
    }
}
