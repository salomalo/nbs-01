<?php
/**
 * @version		$Id: default.php $
 * @package		Joomla.Site
 * @subpackage	com_rental
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		muinx
 * This component was generated by http://joomlavietnam.net/ - 2012
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

$now = time();
$Itemid = JRequest::getInt('Itemid');

require_once(JPATH_COMPONENT_SITE . DS . 'helpers' . DS . 'simple-gmap-api' . DS . "simpleGMapAPI.php");
require_once(JPATH_COMPONENT_SITE . DS . 'helpers' . DS . 'simple-gmap-api' . DS . "simpleGMapGeocoder.php");

$map = new simpleGMapAPI();
$geo = new simpleGMapGeocoder();

$map->setWidth(400);
$map->setHeight(400);
$map->setBackgroundColor('#d0d0d0');
$map->setMapDraggable(true);
$map->setDoubleclickZoom(false);
$map->setScrollwheelZoom(true);

$map->showDefaultUI(false);
$map->showMapTypeControl(true, 'DROPDOWN_MENU');
$map->showNavigationControl(true, 'DEFAULT');
$map->showScaleControl(true);
$map->showStreetViewControl(true);

$map->setZoomLevel(10); // not really needed because showMap is called in this demo with auto zoom
$map->setInfoWindowBehaviour('SINGLE_CLOSE_ON_MAPCLICK');
$map->setInfoWindowTrigger('CLICK');

//$map->addMarkerByAddress("Toronto, NY");
//$map->addMarkerByAddress("Bloomfield, NY");
//$map->addMarkerByAddress("Gramacy, NY");

//get geocode
$geo_1 = $geo->getGeoCoords("Harrison, NY");
$geo_2 = $geo->getGeoCoords("Mamaroneck, NY");


//$map->addMarkerByAddress("Bronx, NewYork", "Universität Bielefeld", "<a href=\"http://www.uni-bielefeld.de\" target=\"_blank\">http://www.uni-bielefeld.de</a>", "");
//$map->addMarker(52.0149436, 8.5275128, "Sparrenburg Bielefeld", "Sparrenburg, 33602 Bielefeld, Deutschland<br /><img src=\"http://www.bielefeld.de/ftp/bilder/sehenswuerdigkeiten/sehenswuerdigkeiten/sparrenburg-bielefeld-435.gif\"", "http://google-maps-icons.googlecode.com/files/museum-archeological.png");


//$map->addMarker(52.0149436, 8.5275128, "Sparrenburg Bielefeld", "Sparrenburg, 33602 Bielefeld, Deutschland<br /><img src=\"http://www.bielefeld.de/ftp/bilder/sehenswuerdigkeiten/sehenswuerdigkeiten/sparrenburg-bielefeld-435.gif\"", "http://google-maps-icons.googlecode.com/files/museum-archeological.png");

$opts = array('fillColor'=>'#0000dd', 'fillOpacity'=>0.2, 'strokeColor'=>'#A6A1C4', 'strokeOpacity'=>1, 'strokeWeight'=>1, 'clickable'=>true);
$map->addCircle($geo_1['lat'], $geo_1['lng'], 2000, "Test 1", $opts);

$map->addCircle($geo_2['lat'], $geo_2['lng'], 2000, "Test 2", $opts);

// $moduleContents = '';
// $modules =& JModuleHelper::getModules('mod-rental-filter'); 

// foreach ($modules as $module) 
// { 
// 	$moduleContents .= JModuleHelper::renderModule($module); 
// }
// echo $moduleContents;

//<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
?>

<!-- BEGIN: filters -->
<form name="frm-filter" method="post" action="<?php echo JRoute::_('index.php?option=com_rental&view=apartments&Itemid=' . JRequest::getInt('Itemid')); ?>">
<div class="curveBottom" id="searchWrapperOuter">
  <div class="curveBottom" id="searchWrapper">
    <form method="get" action="/renter/listings/search" enctype="application/x-www-form-urlencoded" id="search">
      <input type="hidden" value="" name="broker_id" id="broker_id">
      <div id="formContainer">
        <div class="searchBox wide">
          <label>Borough</label>
          <div id="boroughDropdown" rel="#bid" class="fancyDropdown"> <span class="selected">All</span>
            <div class="clear"></div>
            <ul style="display: none;" class="fancyDropdownOptions">
              <li data-id="0">All</li>
              <?php foreach ($this->categories as $category): ?>
              <li data-id="<?php echo $category->id; ?>"><?php echo $category->title; ?></li>
              <?php endforeach; ?>
            </ul>
            <input type="hidden" value="0" name="bid" id="bid">
          </div>
        </div>
        <div class="searchBox wide">
          <label>Neighborhood</label>
          <div id="neighborhoodDropdown" rel="#nids" class="fancyDropdownMultiple"> <span class="selected">&nbsp;</span>
            <div class="clear"></div>
            <div style="display: none;" class="fancyDropdownMultiplePane">
              <div class="fancyDropdownOptions">
                <div class="buttons"> <span class="closeDropdown"><a href="#">Done/Close</a></span> <a class="button white noIcon medium selectAll" href="#"><span>Select All</span></a> <a class="button white noIcon medium unselectAll" href="#"><span>UnSelect All</span></a>
                  <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div id="neighborhoodOptions"></div>
              </div>
              <div class="clear"></div>
            </div>
            <input type="hidden" value="" name="nids" id="nids">
          </div>
        </div>
        <div class="searchBox wide">
          <label>Size</label>
          <div id="apartmentSizeDropdown" rel="#aids" class="fancyDropdownMultiple"> <span class="selected">&nbsp;</span>
            <div class="clear"></div>
            <div style="display: none;" class="fancyDropdownMultiplePane">
              <div class="fancyDropdownOptions">
                <div class="buttons"> <span class="closeDropdown"><a href="#">Done/Close</a></span>
                  <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <ul>
                	 <?php 
	                $arrBedrooms = JEUtil::getBedrooms();
	                foreach ($arrBedrooms as $key => $bedroom):
	                ?>
                  <li><input type="checkbox" name="jform[bedroom][]" value="<?php echo $key; ?>"><?php echo $bedroom; ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
              <div class="clear"></div>
            </div>
            <input type="hidden" value="0" name="aids" id="aids">
          </div>
        </div>
        <div class="lastBox">
          <label>Rent</label>
          <input type="text" size="6" name="jform[min_rent]" id="minRent" default="$" class="idleField">
          to </div>
        <div class="searchBox wide">
          <label>&nbsp;</label>
          <input type="text" size="6" name="jform[max_rent]" id="maxRent" default="$" class="idleField">
        </div>
        <div class="searchBox wide">
          <label>I want to move by</label>
          <div style="width: 125px;">
            <input type="text" size="13" name="jform[move_date]" id="dateAvailable" default="" class="w16em dateformat-m-sl-d-sl-Y text hasDatepicker idleField">
          </div>
        </div>
        <div id="searchBoxRenter"> <a class="button search submitButton" href="#"><span>Search</span></a>
          <div class="clear"></div>
          <a class="close" href="<?php echo JRoute::_('index.php?option=com_rental&view=apartments&Itemid='.JRequest::getInt('Itemid')); ?>">clear</a> </div>
      </div>
      
      <!-- filters -->
      <div class="clear"></div>
      <fieldset class="searchFilters" id="renterFilters">
        <div class="container1">
          <div class="searchBox">
            <input type="checkbox" value="1" name="jform[photos]" id="photos" class="field text">
            Must have photos </div>
          <div class="searchBox">
            <input type="checkbox" value="1" name="jform[no_fee]" id="no_fee" class="field text">
            No fee only </div>
        </div>
        <div class="container2">
          <div class="searchBox menu">
            <label>Amenities</label>
            <div id="amenityDropdown" rel="#amids" class="fancyDropdownMultiple"> <span class="selected">&nbsp;</span>
              <div class="clear"></div>
              <div style="display: none;" class="fancyDropdownMultiplePane">
                <div class="fancyDropdownOptions">
                  <div class="buttons"> <span class="closeDropdown"><a href="#">Done/Close</a></span>
                    <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
                  <ul id="amenities">
                  	<?php foreach ($this->amenities as $amenity): ?>
                    <li><input type="checkbox" name="jform[amenity][]" value="<?php echo $amenity->id; ?>"><?php echo $amenity->title; ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <div class="clear"></div>
              </div>
              <input type="hidden" value="0" name="amids" id="amids">
            </div>
          </div>
          <div style="margin-left: 55px;" class="searchBox menu">
            <label>Pets</label>
            <div id="petsDropdown" rel="#pets" class="fancyDropdownMultiple"> <span class="selected">All</span>
              <div class="clear"></div>
              <div style="display: none;" class="fancyDropdownMultiplePane">
                <div class="fancyDropdownOptions">
                  <div class="buttons"> <span class="closeDropdown"><a href="#">Done/Close</a></span>
                    <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
                  <ul>
                    <li>
                      <input type="checkbox" value="jform[dogs]">
                      Dogs Ok</li>
                    <li>
                      <input type="checkbox" value="jform[cats]">
                      Cats Ok</li>
                  </ul>
                </div>
                <div class="clear"></div>
              </div>
              <input type="hidden" value="" name="jform[pets]" id="pets">
            </div>
          </div>
        </div>
      </fieldset>
      <div class="clear"></div>
    </form>
  </div>
</div>
</form>
<!-- END: filters -->
<div class="clear"></div>

<!-- BEGIN: listing -->
<table id="listingSERPOuter">
  <tbody>
    <tr>
      <td class="head" colspan="2"><h1>14406  apartments</h1>
        <div class="block"> </div>
        <div class="block"> <a href="/rental-agents" class="button blue HOF small"><span>Work with the top agents!</span></a> </div>
        <div class="resultsPagination"> 
        	<?php echo $this->pagination->getPagesLinks(); ?>
        </div>
        <div class="clear"></div></td>
    </tr>
    <tr> 
      <!-- cell containing listings table-->
      <td><!-- table containing listings -->
        
        <table cellspacing="0" cellpadding="0" border="0" id="listingSERPTable" class="newStyle">
          <thead>
            <tr>
              <th colspan="2"> <span class="small">SORT BY</span>
                <ul>
                  <li><a class="bold" href="/renter/listings/search?order=desc&amp;page=1&amp;sort=listing_date"> Time on Site </a></li>
                  <li><a class="bold" href="/renter/listings/search?order=desc&amp;page=1&amp;sort=quality"> Quality Score </a></li>
                  <li><a class=" " href="/renter/listings/search?order=asc&amp;page=1&amp;sort=neighborhood"> Neighborhood </a></li>
                  <li><a class=" " href="/renter/listings/search?order=asc&amp;page=1&amp;sort=size"> Size </a></li>
                  <li><a class=" " href="/renter/listings/search?order=asc&amp;page=1&amp;sort=rent"> Rent </a></li>
                </ul>
              </th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($this->items as $item):?>
          	<?php //print_r($item);die;
				$link = JRoute::_('index.php?option=com_rental&view=apartment&id=' . (int) $item->id . '&Itemid=' . $Itemid);
				$aboutTime = ( $now - strtotime($item->created) ) / (24 * 60 * 60);
				
				if ($aboutTime < 1)
					$time = round($aboutTime * 60) . ' hours';
				else
					$time = round($aboutTime) . ' days';
					
				//get defautl images
				$images = @unserialize($item->images);
					
				$defaultImage = '';
					
				if (is_array($images) && !empty($images))
					$defaultImage = $images[0];
					
				
			?>
            <tr id="listing_<?php echo $item->id?>_row1" class="listingRow" data-id="<?php echo $item->id?>" data-latitude="<?php //echo $item->latitude?>" data-longitude="<?php //echo $item->longitude?>">
              <td class="border thumbnail">
              	<a class=" " href="<?php echo $link?>">
              		<?php if ($defaultImage): ?>
					<img src="images/com_rental/upload/<?php echo $defaultImage['image']; ?>" width="90" height="68" />
					<?php else :?>
              		<img alt="Thumb" src="http://s3.amazonaws.com/nakedapartments/images/8647659/thumb.jpg?1336491320">
              		<?php endif; ?>
              	</a>
              </td>
              <td class="border flag">
              	<span class="listingTitle">
              		<a class=" " href="<?php echo $link?>">
              			<?php echo (int)$this->escape($item->bedrooms) . 'br , ' . $this->escape($item->retal_location_title) . ', $' . $this->escape($item->price); ?>
              		</a>
              	</span>
                <div class="newCell listingDate"> about <?php echo $time; ?> <span class="calm">on site</span> </div>
                <div class="newCell brokerCont"> <a href="<?php echo JRoute::_('index.php?option=com_rental&view=broker&layout=profile&id=' . (int) $item->agent_id);?>" title="View this broker's profile" class=" "><?php echo $item->agent; ?></a> <span class="noRating"></span> <span class="duplicates"><span class="dupes"><strong>3 other brokers</strong> offer a similar listing at this address</span></span> </div>
                <div class="" data-id="734432">
                  <div class="newCell amenities"> Doorman, Elevator, Laundry Room, Small Dogs &amp; Cats </div>
                </div>
                <div class="hidden mapMarkerHtml">
                  <div class="center"> <img src="http://s3.amazonaws.com/nakedapartments/images/8647659/thumb.jpg?1336491320" alt=""> <br>
                    <a class=" " href="<?php echo $link?>">
              			<?php echo (int)$this->escape($item->bedrooms) . 'br, ' . $this->escape($item->retal_location_title) . ', $' . $this->escape($item->price); ?>
              		</a> 
              	  </div>
                </div></td>
            </tr>
           <?php endforeach;?>
          </tbody>
        </table>
        
        <!-- end of table containing listings  --></td>
      <!-- cell containing map -->
      <td>
      	<div id="float-gmap">
			<?php
		$map->printGMapsJS();
		// 	showMap with auto zoom enabled
		$map->showMap(true);
		?>
		</div>
      </td>
    </tr>
  </tbody>
</table>
<!-- END: listing -->

<!-- BEGIN: Pagination -->
<div class="resultsPagination" id="paginationBottom">
 <?php echo $this->pagination->getPagesLinks(); ?>
</div>
<!-- END: Pagination -->
<div class="clear"></div>
