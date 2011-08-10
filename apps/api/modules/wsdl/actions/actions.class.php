<?php

/**
 * wsdl actions.
 *
 * @package    meteb
 * @subpackage wsdl
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class wsdlActions extends sfActions
{
 /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward404Unless($service = $request->getParameter('service'));
    $wsdl = sprintf('%s/wsdl/%s.wsdl', sfConfig::get('sf_data_dir'), $service);
    if (!file_exists($wsdl))
    {
      $this->forward404('WSDL "'.$wsdl.'" is not found.');
    }

    // generate the wsdl controller based on current request
    $wsdlController = $request->getUriPrefix().$request->getRelativeUrlRoot().'/'.$service.'.php';

    $dom = new DOMDocument();
    if ($dom->load($wsdl))
    {
      // query the soap:address node to change location
      $xpath = new DOMXPath($dom);
      $nodes = $xpath->query('/wsdl:definitions/wsdl:service/wsdl:port/soap:address');
      foreach ($nodes as $node)
      {
        if ($node->hasAttribute('location'))
        {
          $node->setAttribute('location', $wsdlController);
        }
      }

      // output
      $this->response->setContentType($request->getMimeType('xml'));

      return $this->renderText($dom->saveXML());
    }

    throw new sfException('"'.$wsdl.'" is not a valid xml document.');
  }
}
