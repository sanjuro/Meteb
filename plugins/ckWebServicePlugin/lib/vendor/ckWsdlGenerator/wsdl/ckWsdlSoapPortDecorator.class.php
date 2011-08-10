<?php
/**
 * This file is part of the ckWsdlGenerator
 *
 * @package   ckWsdlGenerator
 * @author    Christian Kerl <christian-kerl@web.de>
 * @copyright Copyright (c) 2008, Christian Kerl
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   SVN: $Id: ckWsdlSoapPortDecorator.class.php 12155 2008-10-12 22:18:08Z chrisk $
 */

/**
 * ckWsdlSoapPortDecorator provides methods to decorate a wsdl port definition with data specific for the soap protocol.
 *
 * @package    ckWsdlGenerator
 * @subpackage wsdl
 * @author     Christian Kerl <christian-kerl@web.de>
 */
class ckWsdlSoapPortDecorator extends ckWsdlPortDecorator
{
  /**
   * @see ckDOMSerializable::serialize()
   */
  public function serialize(DOMDocument $document)
  {
    $wsdl = ckXsdNamespace::get('wsdl');
    $tns  = ckXsdNamespace::get('tns');
    $soap = ckXsdNamespace::get('soap');

    $node = $document->createElementNS($wsdl->getUrl(), $wsdl->qualify($this->getNodeName()));

    $node->setAttribute('name', $this->getName());
    $node->setAttribute('binding', $tns->qualify($this->getBinding()->getName()));

    $address = $document->createElementNS($soap->getUrl(), $soap->qualify('address'));
    $address->setAttribute('location', $this->getLocation());
    $node->appendChild($address);

    return $node;
  }
}