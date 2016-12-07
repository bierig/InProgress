<?php

/**
 * Formats XML output into a readable form
 *
 * @param $simpleXmlObject instance of SimpleXmlObject that is going to be pretty printed 
 * @return string of pretty printed / indented xml-elements
 */
function formatXML(&$simpleXmlObject){
  
  // make sure the XML is of the expected type
  if( ! is_object($simpleXmlObject) ){
    return "";
  }
  
  //Format XML to save indented tree rather than one line
  $dom = new DOMDocument('1.0');
  $dom->preserveWhiteSpace = false;
  $dom->formatOutput = true;
  $dom->loadXML($simpleXmlObject->asXML());

  return $dom->saveXML();
}

/*

How to pretty format a single entry only , then hang it into an exsting XML ???

// load original XML
  $xml = simplexml_load_file("./data/feedbacks.xml") or die("ERROR: Cannot load Feedbacks.xml.");

  // create a new feedback node
  $feedback = simplexml_load_string("<feedback></feedback>");
  $feedback->addChild('module', $module);
  $feedback->addChild('semester', $semester);
  $feedback->addChild('text', $text);
  $feedback->addChild('rating', $rating);

  // pretty format the feedback node
  $formatFeedback = formatXML($feedback);
    
  // add the pretty format feedback node to the exisitng XML
  $xml->addChild($formatFeedback);

  // save XML file
  $xml->asXml('./data/feedbacks.xml');
*/


?>