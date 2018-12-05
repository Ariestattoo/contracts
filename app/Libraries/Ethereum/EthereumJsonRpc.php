<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 23/11/18
 * Time: 12:31 PM
 */

namespace App\Libraries\Ethereum;


use Datto\JsonRpc\Client;

class EthereumJsonRpc extends Client
{


  public $message;
  public $response;

  /**
   * JsonRpc constructor.
   *
   * @param $parameters
   */
  public function __construct($parameters = [])
  {
    parent::__construct();

    $this->verifyParameters($parameters);
    $this->query($this->getEthId(),$this->getMethod(),$parameters);
    $this->message = $this->encode();

  }

  public function verifyParameters($parameters)
  {
    return is_array($parameters);
  }

  /**
   * @return mixed
   */
  public function getEthMessage()
  {
    return $this->message;
  }

  /**
   * @param mixed $message
   */
  public function setMessage($message): void
  {
    $this->message = $message;
  }

  /**
   * @return mixed
   */
  public function getResponse()
  {
    return $this->response;
  }

  /**
   * @param mixed $response
   */
  public function setResponse($response): void
  {
    $this->response = $response;
  }

}