<?php

class MarkersController extends Controller
{
    public function actionPrintXml(){
        // Start XML file, create parent node
        header("Content-type: text/xml");        

        $doc = new DOMDocument('1.0');
        $node = $doc->createElement("markers");
        $parnode = $doc->appendChild($node);

        $connection = Yii::app()->db;
        
        $query = "SELECT * FROM markers WHERE 1";

        $command=$connection->createCommand($query);

        $dataReader=$command->query();

        foreach($dataReader as $row) {
            // ADD TO XML DOCUMENT NODE
          $node = $doc->createElement("marker");
          $newnode = $parnode->appendChild($node);

          $newnode->setAttribute("name", $row['name']);
          $newnode->setAttribute("address", $row['address']);
          $newnode->setAttribute("lat", $row['lat']);
          $newnode->setAttribute("lng", $row['lng']);
          $newnode->setAttribute("type", $row['type']);
        }
        $xmlfile = $doc->saveXML();
        echo $xmlfile;      
    }
    
    public function actionGoToGirlsMap(){
        $this->render('/site/girlsmap');
    }
    
}
   





