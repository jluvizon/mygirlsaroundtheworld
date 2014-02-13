<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function findMarkers() {
    
    $connection = Yii::app()->db;
    
    $query = "SELECT * FROM markers WHERE 1";
    
    $command=$connection->createCommand($query);
    
    return $command->query()->readAll(); 
    
}