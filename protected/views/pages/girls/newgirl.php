<?php
/* @var $this GirlController */
/* @var $model Girl */
/* @var $form CActiveForm */
?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&libraries=places"></script>

<script>
var placeSearch, autocomplete;
   
function initialize() {
    autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'), { types: [ 'geocode' ] });
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        fillInAddress();
    });
}

function fillInAddress() {
    var place = autocomplete.getPlace();
    $("#GirlLocation_latitude").val(place.geometry.location.lat());
    $("#GirlLocation_longitude").val(place.geometry.location.lng());
    $("#GirlLocation_name").val(place.name);
}

function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
            autocomplete.setBounds(new google.maps.LatLngBounds(geolocation, geolocation));
        });
    }
}

$(document).ready(function(){
    initialize();
});
</script>

<div class="form">

    <?php
    $form=$this->beginWidget('CActiveForm', array(
            'id'=>'girl-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
    ));
    
    echo $form->errorSummary($model);
    ?>
    
    <div id="locationField">
        <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text"></input>
    </div>

    <input type="hidden" id="teste" />

    <?php echo $form->hiddenField($model,'cd_girl',array('type'=>"hidden",'size'=>11,'maxlength'=>11)); ?>
    <?php echo $form->hiddenField($model->girlLocation,'latitude',array('type'=>"hidden", 'size'=>20,'maxlength'=>20)); ?>
    <?php echo $form->hiddenField($model->girlLocation,'longitude',array('type'=>"hidden", 'size'=>20,'maxlength'=>20)); ?>
    <?php echo $form->hiddenField($model->girlLocation,'name',array('type'=>"hidden", 'size'=>20,'maxlength'=>20)); ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Add'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->