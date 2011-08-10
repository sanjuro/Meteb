<?php
/**
 * This file is part of the ckWsdlGenerator
 *
 * @package   ckWsdlGenerator
 * @author    Christian Kerl <christian-kerl@web.de>
 * @copyright Copyright (c) 2008, Christian Kerl
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   SVN: $Id: ckWsdlSoapBindingDecorator.class.php 13991 2008-12-12 17:42:40Z chrisk $
 */

/**
 * ckWsdlSoapBindingDecorator provides methods to decorate a wsdl binding definition with data specific for the soap protocol.
 *
 * @package    ckWsdlGenerator
 * @subpackage wsdl
 * @author     Christian Kerl <christian-kerl@web.de>
 */
class ckWsdlSoapBindingDecorator extends ckWsdlBindingDecorator
{
  /**
   * @see ckDOMSerializable::serialize()
   */
  public function serialize(DOMDocument $document)
  {
    $wsdl = ckXsdNamespace::get('wsdl');
    $soap = ckXsdNamespace::get('soap');
    $tns  = ckXsdNamespace::get('tns');

    $node = $document->createElementNS($wsdl->getUrl(), $wsdl->qualify($this->getNodeName()));

    $node->setAttribute('name', $this->getName());
    $node->setAttribute('type', $tns->qualify($this->getPortType()->getName()));

    $binding_node = $document->createElementNS($soap->getUrl(), $soap->qualify($this->getNodeName()));
    $binding_node->setAttribute('style', 'rpc');
    $binding_node->setAttribute('transport', ckXsdNamespace::get('soaphttp')->getUrl());

    $node->appendChild($binding_node);

    foreach($this->getPortType()->getOperations() as $operation)
    {
      $op_node = $document->createElementNS($wsdl->getUrl(), $wsdl->qualify($operation->getNodeName()));
      $op_node->setAttribute('name', $operation->getName());

      $op_soap_node = $document->createElementNS($soap->getUrl(), $soap->qualify($operation->getNodeName()));
      $op_soap_node->setAttribute('soapAction', $tns->getUrl().$operation->getName());
      $op_soap_node->setAttribute('style', 'rpc');
      $op_node->appendChild($op_soap_node);

      if(!is_null($operation->getInput()))
      {
        $in_node = $document->createElementNS($wsdl->getUrl(), $wsdl->qualify('input'));
        $in_node->appendChild($this->getSoapBodyNode($document, $operation->getInput()));

        foreach($operation->getInput()->getHeaderParts() as $header)
        {
          $header_node = $this->getSoapHeaderNode($document, $operation->getInput(), $header);
          $in_node->appendChild($header_node);
        }

        $op_node->appendChild($in_node);
      }

      if(!is_null($operation->getOutput()))
      {
        $out_node = $document->createElementNS($wsdl->getUrl(), $wsdl->qualify('output'));
        $out_node->appendChild($this->getSoapBodyNode($document, $operation->getOutput()));

        foreach($operation->getOutput()->getHeaderParts() as $header)
        {
          $header_node = $this->getSoapHeaderNode($document, $operation->getOutput(), $header);
          $out_node->appendChild($header_node);
        }

        $op_node->appendChild($out_node);
      }

      $node->appendChild($op_node);
    }

    return $node;
  }

  /**
   * Gets a soap:body element for a given wsdl message.
   *
   * @param DOMDocument   $document A xml document used to create node objects
   * @param ckWsdlMessage $message  A wsdl message
   *
   * @return DOMElement A soap:body element
   */
  private function getSoapBodyNode(DOMDocument $document, ckWsdlMessage $message)
  {
    $soap    = ckXsdNamespace::get('soap');
    $soapenc = ckXsdNamespace::get('soapenc');
    $tns     = ckXsdNamespace::get('tns');

    $body_node = $document->createElementNS($soap->getUrl(), $soap->qualify('body'));

    $parts = $message->getBodyParts();

    if(!empty($parts))
    {
      $body_node->setAttribute('parts', ckString::implode(' ', $parts));
    }

    $body_node->setAttribute('use', 'literal');
    $body_node->setAttribute('namespace', $tns->getUrl());
    $body_node->setAttribute('encodingStyle', $soapenc->getUrl());

    return $body_node;
  }

  /**
   * Gets a soap:header element for a given wsdl message part of a given wsdl message.
   *
   * @param DOMDocument   $document A xml document used to create node objects
   * @param ckWsdlMessage $message  A wsdl message
   * @param ckWsdlPart    $part     A wsdl part
   *
   * @return DOMElement A soap:header element
   */
  private function getSoapHeaderNode(DOMDocument $document, ckWsdlMessage $message, ckWsdlPart $part)
  {
    $soap    = ckXsdNamespace::get('soap');
    $soapenc = ckXsdNamespace::get('soapenc');
    $tns     = ckXsdNamespace::get('tns');

    $header_node = $document->createElementNS($soap->getUrl(), $soap->qualify('header'));
    $header_node->setAttribute('message', $tns->qualify($message->getName()));
    $header_node->setAttribute('part', $part->getName());
    $header_node->setAttribute('use', 'literal');
    $header_node->setAttribute('encodingStyle', $soapenc->getUrl());

    return $header_node;
  }
}