<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 23/11/18
 * Time: 3:16 PM
 */

namespace App\Libraries\Ethereum\JsonRpc;

use App\Libraries\Ethereum\EthereumJsonRpc;
use App\Libraries\Ethereum\EthereumJsonRpcInterface;

class GetCoinbase extends EthereumJsonRpc implements EthereumJsonRpcInterface
{

  public function getEthId()
  {
    return 64;
  }

  public function getMethod()
  {
    return "eth_coinbase";
  }

  public function verifyParameters($parameters)
  {
    return parent::verifyParameters($parameters);
  }

  public function response()
  {
    // TODO: Implement response() method.
  }

}