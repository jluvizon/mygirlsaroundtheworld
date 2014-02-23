<?php
/* @var $this GirlController */
/* @var $model Girl */
/* @var $form CActiveForm */
?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&libraries=places"></script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'girl-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
    
<script>
    var placeSearch,autocomplete;
    var component_form = {
        'street_number': 'short_name',
        'route': 'long_name',
        'locality': 'long_name',
        'administrative_area_level_1': 'short_name',
        'country': 'long_name',
        'postal_code': 'short_name',
        'lat': 'skype'
    };
    
    function initialize() {
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'), { types: [ 'geocode' ] });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            fillInAddress();
        });
    }
    
    function fillInAddress() {
        var place = autocomplete.getPlace();
        
        for (var component in component_form) {
            document.getElementById(component).value = "";
            document.getElementById(component).disabled = false;
        }
        
        for (var j = 0; j < place.address_components.length; j++) {
            var att = place.address_components[j].types[0];
            if (component_form[att]) {
                var val = place.address_components[j][component_form[att]];
                document.getElementById(att).value = val;
            }
        }
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

  <div id="locationField">
    <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text" />
  </div>
  <table id="address">
    <tr>
      <td class="label">Street address</td>
      <td class=""><input id="street_number" /></td>
      <td><input id="route" /></td>
    </tr>    
  </table>

<?php $this->endWidget(); ?>

</div><!-- form -->