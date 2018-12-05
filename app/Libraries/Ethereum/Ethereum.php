<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 23/11/18
 * Time: 10:22 AM
 */

namespace App\Libraries\Ethereum;


use Datto\JsonRpc\Client;

/**
 * Class EthereumNode
 *
 * @package App\Libraries\Ethereum
 */
class Ethereum
{

  /**
   * @var \Socket\Raw\Socket
   */
  private $interface;


  /**
   * EthereumNode constructor.
   *
   * @param $protocol
   */
  public function __construct($protocol)
  {
    $factory = new \Socket\Raw\Factory();
    $this->interface = $factory->createClient($protocol);
  }

  /**
   * @param Client $message
   */
  public function send(Client $message)
  {
    $bytesWritten = $this->interface->write($message->getEthMessage());
    $response = $this->interface->read(8192);
    $message->setResponse($response);
    return $message;
  }
}