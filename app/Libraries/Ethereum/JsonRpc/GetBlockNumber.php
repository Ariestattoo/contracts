<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 23/11/18
 * Time: 9:15 AM
 */

namespace App\Libraries\Ethereum\JsonRpc;


use App\Libraries\Ethereum\EthereumJsonRpc;
use App\Libraries\Ethereum\EthereumJsonRpcInterface;

class GetBlockNumber extends EthereumJsonRpc implements EthereumJsonRpcInterface
{

  public function getEthId()
  {
    return 83;
  }

  public function getMethod()
  {
    return "eth_blockNumber";
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