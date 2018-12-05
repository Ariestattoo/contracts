<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 23/11/18
 * Time: 12:07 PM
 */

namespace App\Libraries\Ethereum;


interface EthereumJsonRpcInterface
{

  public function getEthId();
  public function getMethod();
  public function verifyParameters($parameters);
  public function response();
}