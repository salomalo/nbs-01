<?php
?>
<form method="post" id="new_renter" data-remote="true" class="new_renter" action="<?php echo $link?>" accept-charset="UTF-8">
    <div style="margin:0;padding:0;display:inline">
      <input type="hidden" value="✓" name="utf8">
      <input type="hidden" value="FMMkutNs1Rl3JU3ZLjwl+l5+EYNdHqoqS95L8NSndUQ=" name="authenticity_token">
    </div>
    <div id="signup_step_1" class="main signupStep">
      <div class="headMessage  padBottom20">
        <h1 class="small orange">Create your free account</h1>
      </div>
      <div class="sideContainer">
        <div class="sideBox curveRt"> It's better than Craigslist. Better apartments, better search. <strong>Brittany</strong> </div>
        <div class="sideBox two curveRt"> Naked Apartments did an amazing job helping find a new apartment and I will definitely be using them again. <strong>Sarah</strong> </div>
        <div class="sideBox three curveRt"> Unlike online classifieds, Naked Apartments doesn't tolerate spam or scams. <strong>Mark</strong> </div>
      </div>
      <div class="borderTop pad10-10-15-10 relative" id="name">
        <label for="user_first_name">First Name</label>
        <input type="text" size="30" name="user[first_name]" id="user_first_name" class="text width250 idleField">
      </div>
      <div class=" borderTop pad10-10-15-10 clearfix relative">
        <label for="user_last_name">Last Name</label>
        <input type="text" size="30" name="user[last_name]" id="user_last_name" class="text width250 idleField">
      </div>
      <div class=" borderTop clearfix pad10-10-15-10 relative" id="email"> <span class="sideText"> <strong>Your email is private.</strong> <br>
        You decide whom to share it with. </span>
        <label for="user_email">Email</label>
        <input type="text" size="30" name="user[email]" id="user_email" class="text width250 idleField">
      </div>
      <div class="borderTop pad10-10-15-10 clearfix relative" id="phone"> <span class="sideText"> <strong>Your Phone number is private.</strong> <br>
        You decide whom to share it with. </span>
        <label for="user_phone_number">Phone Number</label>
        <input type="text" value="" size="30" name="user[phone_number]" id="user_phone_number" class="text width250 idleField">
      </div>
      <div class=" borderTop pad10-10-15-10 relative">
        <label for="user_Password">Password</label>
        <input type="password" size="30" name="user[password]" id="user_password" class="text width250 idleField">
      </div>
      <div class="clear"></div>
    </div>
    <div id="signup_step_2" class="main signupStep hidden">
      <div class="headMessage padBottom20">
        <h1 class="small orange">Where are you looking?</h1>
      </div>
      <div class="sideContainer">
        <div class="sideBox curveRt"> "Tips on Renting in a Web-Site World"
          <p class="marginTop10">"For Renters-to-Be, the High-Tech Lowdown" <strong>New York Times</strong></p>
        </div>
        <div class="sideBox two curveRt"> We love Naked Apartments!<strong>Refinery29 </strong> </div>
        <div class="sideBox three curveRt"> The incredible Naked Apartments. <strong>HuffPost Tech </strong> </div>
      </div>
      <div class=" borderTop pad10-10-15-10  clearfix">
        <label>Apartment Size <span class="message inline">(choose all that apply)</span></label>
        <div id="selectApartmentSize">
          <ul class="plain clearfix">
            <li class="boxed hoverable">
              <input type="checkbox" value="1" name="renter[apartment_size_ids][]" id="renter_apartment_size_id_1">
              <label for="renter_apartment_size_id_1">Studio</label>
            </li>
            <li class="boxed hoverable">
              <input type="checkbox" value="2" name="renter[apartment_size_ids][]" id="renter_apartment_size_id_2">
              <label for="renter_apartment_size_id_2">Loft</label>
            </li>
            <li class="boxed hoverable">
              <input type="checkbox" value="3" name="renter[apartment_size_ids][]" id="renter_apartment_size_id_3">
              <label for="renter_apartment_size_id_3">1br</label>
            </li>
            <li class="boxed hoverable">
              <input type="checkbox" value="4" name="renter[apartment_size_ids][]" id="renter_apartment_size_id_4">
              <label for="renter_apartment_size_id_4">2br</label>
            </li>
            <li class="boxed hoverable">
              <input type="checkbox" value="5" name="renter[apartment_size_ids][]" id="renter_apartment_size_id_5">
              <label for="renter_apartment_size_id_5">3br</label>
            </li>
            <li class="boxed hoverable">
              <input type="checkbox" value="6" name="renter[apartment_size_ids][]" id="renter_apartment_size_id_6">
              <label for="renter_apartment_size_id_6">4br</label>
            </li>
            <li class="boxed hoverable">
              <input type="checkbox" value="7" name="renter[apartment_size_ids][]" id="renter_apartment_size_id_7">
              <label for="renter_apartment_size_id_7">5br</label>
            </li>
            <li class="boxed hoverable">
              <input type="checkbox" value="8" name="renter[apartment_size_ids][]" id="renter_apartment_size_id_8">
              <label for="renter_apartment_size_id_8">6br</label>
            </li>
            <li class="boxed hoverable">
              <input type="checkbox" value="9" name="renter[apartment_size_ids][]" id="renter_apartment_size_id_9">
              <label for="renter_apartment_size_id_9">7br</label>
            </li>
            <li class="boxed hoverable">
              <input type="checkbox" value="10" name="renter[apartment_size_ids][]" id="renter_apartment_size_id_10">
              <label for="renter_apartment_size_id_10">8br</label>
            </li>
          </ul>
        </div>
      </div>
      <div class=" borderTop pad10-10-15-10">
        <label>Where are you looking?</label>
        <div class="clear"></div>
        <div class="smallLabel">
          <ul class="clearfix" id="boroughNav">
            <li data-id="1" class="active"><a href="#">Manhattan</a></li>
            <li data-id="2"><a href="#">Brooklyn</a></li>
            <li data-id="3"><a href="#">Queens</a></li>
            <li data-id="4"><a href="#">Bronx</a></li>
            <li data-id="5"><a href="#">Staten Island</a></li>
          </ul>
          <div style="" class="boroughs" id="borough_1"> <span>
            <div class="checkboxCont">
              <input type="checkbox" value="23" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Battery Park</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="6" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Chelsea</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="21" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Chinatown</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="191" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Clinton</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="18" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>East Village</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="24" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Financial District</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="76" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Flatiron</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="10" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Gramercy</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="14" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Greenwich Village</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="1" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Harlem</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="5" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Hell's Kitchen</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="25" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Inwood</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="93" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Kips Bay</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="22" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Little Italy</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="17" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Lower East Side</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="13" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Meatpacking Dist.</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="72" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Midtown</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="155" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Midtown Center</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="16" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Midtown East</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="15" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Midtown West</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="2" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Morningside Heights</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="9" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Murray Hill</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="20" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>NoHo</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="19" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Nolita</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="73" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Roosevelt Island</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="7" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>SoHo</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="192" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Theater District/Times Square</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="8" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>TriBeCa</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="74" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Tudor City</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="11" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Union Square</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="4" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Upper East Side</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="3" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Upper West Side</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="26" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Washington Heights</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="12" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>West Village</label>
            </div>
            </span>
            <div class="clear"></div>
          </div>
          <div style="display: none;" class="boroughs" id="borough_2"> <span>
            <div class="checkboxCont">
              <input type="checkbox" value="117" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Bath Beach</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="77" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Bayridge</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="46" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Bedford-Stuyvesant</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="29" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Bensonhurst</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="78" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Bergen Beach</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="36" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Boerum Hill</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="79" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Borough Park</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="118" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Brighton Beach</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="30" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Brooklyn Heights</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="119" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Brownsville</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="41" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Bushwick</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="120" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Canarsie</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="37" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Carroll Gardens</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="31" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Clinton Hill</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="38" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Cobble Hill</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="121" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Coney Island</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="45" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Crown Heights</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="122" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Cypress Hills</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="80" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Ditmas Park</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="32" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Downtown</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="33" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>DUMBO</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="123" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Dyker Heights</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="124" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>East Flatbush</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="82" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>East New York</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="42" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>East Williamsburg</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="83" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Flatbush</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="84" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Flatlands</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="34" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Fort Greene</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="147" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Fort Hamilton</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="125" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Georgetown</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="39" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Gowanus</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="126" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Gravesend</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="43" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Greenpoint</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="127" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Greenwood Heights</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="151" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Homecrest</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="85" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Kensington</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="128" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Lefferts Garden</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="152" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Manhattan Terrace</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="129" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Marine Park</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="95" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Midwood</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="130" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Mill Basin</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="86" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Ocean Parkway</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="131" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Old Mill Basin</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="27" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Park Slope</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="94" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Park Slope South</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="28" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Prospect Heights</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="87" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Prospect Leffert</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="134" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Prospect Park</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="88" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Prospect Park South</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="40" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Red Hook</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="132" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Sheepshead Bay</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="133" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Stuyvesant Heights</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="89" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Sunset Park</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="35" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Vinegar Hill</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="44" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Williamsburg</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="47" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Windsor Terrace</label>
            </div>
            </span>
            <div class="clear"></div>
          </div>
          <div style="display: none;" class="boroughs" id="borough_3"> <span>
            <div class="checkboxCont">
              <input type="checkbox" value="48" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Astoria</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="99" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Bayside</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="102" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Briarwood</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="137" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Browne Park</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="107" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Cambria Heights</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="148" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Clearview</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="98" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>College point</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="96" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Corona</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="49" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Ditmars</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="149" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Douglaston</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="101" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>East Elmhurst</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="139" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>East Flushing</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="100" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Elmhurst</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="112" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Far Rockaway</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="108" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Floral Park</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="54" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Flushing</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="55" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Forest Hills</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="190" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Fresh Meadows</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="141" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Glendale</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="92" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Hunters Point</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="53" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Jackson Heights</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="105" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Jamaica</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="97" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Kew Gardens</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="136" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Kew Gardens Hill</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="50" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Long Island City</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="113" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Maspeth</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="114" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Middle Village</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="159" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Murray Hill</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="143" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Neponsit &amp; Belle</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="110" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Ozone Park</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="144" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Pomonok</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="106" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Queens Village</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="157" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Queensboro Hill</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="91" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Rego Park</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="104" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Richmond hills</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="115" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Ridgewood</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="146" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Rockaway Park</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="109" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Rosedale</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="111" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>South Ozone Park</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="116" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Springfield Gardens</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="51" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Sunnyside</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="103" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Woodhaven</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="52" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Woodside</label>
            </div>
            </span>
            <div class="clear"></div>
          </div>
          <div style="display: none;" class="boroughs" id="borough_4"> <span>
            <div class="checkboxCont">
              <input type="checkbox" value="59" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Bedford Park</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="75" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Bronx</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="189" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Castle Hill</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="60" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Concourse</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="61" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>East Tremont</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="150" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Fairmont   Claremont Village</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="57" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Fordham</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="62" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Marble Hill</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="63" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Morrisania</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="187" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Moshulu Parkway</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="58" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Mott Haven</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="64" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Parkchester</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="65" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Pelham Bay</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="66" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Pelham Parkway</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="56" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Riverdale</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="186" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Wakefield</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="188" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Woodlawn</label>
            </div>
            </span>
            <div class="clear"></div>
          </div>
          <div style="display: none;" class="boroughs" id="borough_5"> <span>
            <div class="checkboxCont">
              <input type="checkbox" value="67" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>East Shore</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="68" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Mid-Island</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="69" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>North Shore</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="145" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>Shore Acres</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="70" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>South Shore</label>
            </div>
            <div class="checkboxCont">
              <input type="checkbox" value="71" name="renter[neighborhood_ids][]" id="renter_neighborhood_ids_" class="field text">
              <label>West Shore</label>
            </div>
            </span>
            <div class="clear"></div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div id="signup_step_3" class="main signupStep hidden">
      <div class="headMessage  padBottom20">
        <h1 class="small orange">Last step</h1>
      </div>
      <div class="sideContainer">
        <div class="sideBox curveRt"> A slew of happy renters and brokers, excited to put Craigslist behind them. <strong>New York Observer</strong> </div>
        <div class="sideBox curveRt"> NakedApartments is the cleanest, most trustworthy internet apartment search site.<strong>MARY</strong> </div>
      </div>
      <div class="borderTop pad10-10-15-10 clearfix">
        <label for="renter_maximum_rent" class="inline width250 padTop5">What's your maximum rent?</label>
        <input type="text" size="10" name="renter[maximum_rent]" id="renter_maximum_rent" default="$" class="text inline width-80 idleField">
      </div>
      <div id="estimatedMoveDate" class=" borderTop pad10-10-15-10 clearfix">
        <label for="renter_move_date" class="inline width250 padTop5">When are you looking to move?</label>
        <input type="text" size="12" name="renter[move_date]" id="renter_move_date" data-min-date="0d" class="w16em dateformat-m-sl-d-sl-Y text inline width-100 hasDatepicker idleField">
      </div>
      <div id="renterHavePet" class="borderTop pad10-10-15-10 clearfix">
        <label for="renter_have_pet">Do you have a pet?</label>
        <div class="clear"></div>
        <label class="radio">
          <input type="radio" value="1" name="renter[have_pet]" id="renter_have_pet_1">
          No</label>
        <label class="radio">
          <input type="radio" value="2" name="renter[have_pet]" id="renter_have_pet_2">
          Cat</label>
        <label class="radio">
          <input type="radio" value="3" name="renter[have_pet]" id="renter_have_pet_3">
          Dog</label>
      </div>
      <div id="renterRoommatesTotal" class="borderTop pad10-10-15-10 clearfix">
        <label for="renter_roommates_total">How many roommates are you looking with?</label>
        <div class="clear"></div>
        <label class="radio">
          <input type="radio" value="1" name="renter[roommates_total]" id="renter_roommates_total_1">
          0</label>
        <label class="radio">
          <input type="radio" value="2" name="renter[roommates_total]" id="renter_roommates_total_2">
          1</label>
        <label class="radio">
          <input type="radio" value="3" name="renter[roommates_total]" id="renter_roommates_total_3">
          2</label>
        <label class="radio">
          <input type="radio" value="4" name="renter[roommates_total]" id="renter_roommates_total_4">
          3+</label>
      </div>
      <div class=" borderTop pad10-10-15-10 clearfix">
        <h2>Sign-up your roommates/spouse for new listing alerts <span class="message inline">(optional)</span></h2>
        <div id="roommates">
          <div class="note">They'll get one email per day with the latest listings that match your criteria. <br>
            They <span class="bold black">WON'T</span> get access to your account and can easily unsubscribe.</div>
          <div style="border: 0;" class="rowLine clearfix">
            <div class="block">
              <label>Email Address</label>
              <input type="text" id="roommmatesEmail" class="idleField">
            </div>
            <div class="block"> <a id="addRoommatesEmail" class="button small blue large" href="#"><span>Add</span></a> </div>
          </div>
          <ul id="roommateEntries">
          </ul>
        </div>
      </div>
      <div class=" borderTop pad10-10-15-10 clearfix">
        <h2><a class="more" onclick="$('#finInfo').is(':hidden') ? $('#finInfo').fadeIn('fast') : $('#finInfo').fadeOut('fast'); return false;" href="#">Financial Information</a> <span class="message inline">(optional)</span></h2>
      </div>
      <div class="hidden" id="finInfo">
        <div class="  borderTop pad10-10-15-10 clearfix relative" id="salary">
          <label for="renter_gross_salary" class="inline width250 padTop5">Pre-Tax Annual Salary</label>
          <span class="sideText wide"><strong>Roommate/Co-signer?</strong><br>
          Please put your combined pre-tax annual salary</span>
          <input type="text" size="10" name="renter[gross_salary]" id="renter_gross_salary" default="$" class="width-80 inline idleField">
        </div>
        <div class=" borderTop pad10-10-15-10 borderTop clearfix" id="credit">
          <label for="renter_credit_score">How's your credit?</label>
          <ul class="plain">
            <li class="boxed medium hoverable">
              <input type="radio" value="800" name="renter[credit_score]" id="renter_credit_score_800">
              <label><strong>Excellent </strong><span class="calm">(800+)</span></label>
            </li>
            <li class="boxed medium hoverable">
              <input type="radio" value="799" name="renter[credit_score]" id="renter_credit_score_799">
              <label><strong>Very Good</strong><span class="calm">(700-799)</span></label>
            </li>
            <li class="boxed medium hoverable">
              <input type="radio" value="699" name="renter[credit_score]" id="renter_credit_score_699">
              <label><strong>Good </strong><span class="calm">(680-699)</span></label>
            </li>
            <li class="boxed medium hoverable">
              <input type="radio" value="679" name="renter[credit_score]" id="renter_credit_score_679">
              <label><strong>OK/Fair </strong><span class="calm">(620-679)</span></label>
            </li>
            <li class="boxed medium hoverable">
              <input type="radio" value="619" name="renter[credit_score]" id="renter_credit_score_619">
              <label><strong>Poor </strong><span class="calm">(580-619)</span></label>
            </li>
            <li class="boxed medium hoverable">
              <input type="radio" value="579" name="renter[credit_score]" id="renter_credit_score_579">
              <label><strong>Bad</strong><span class="calm">(500-579)</span></label>
            </li>
            <li class="boxed medium hoverable">
              <input type="radio" value="9003" name="renter[credit_score]" id="renter_credit_score_9003">
              <label><strong>Not sure</strong><span class="calm">???</span></label>
            </li>
          </ul>
        </div>
        <div class=" borderTop pad10-10-15-10 relative clearfix" id="guarantor">
          <label>Do you have a Guarantor or co-signer?<span class="message">A guarantor's pre-tax income should be 80x the monthly rent.</span> </label>
          <ul class="plain marginTop10">
            <li class="boxed bordered hoverable">
              <input type="radio" value="true" name="renter[has_guarantor]" id="renter_has_guarantor_true" class="field text">
              <label for="renter_has_guarantor_yes">Yes</label>
            </li>
            <li class="boxed bordered  hoverable">
              <input type="radio" value="false" name="renter[has_guarantor]" id="renter_has_guarantor_false" class="field text">
              <label for="renter_has_guarantor_no">No</label>
            </li>
          </ul>
        </div>
      </div>
      <div class=" borderTop pad10-10-15-10">
        <label>Anything else you want landlords/brokers to know?</label>
        <div class="marginTop10" id="commentsInfo">
          <textarea rows="5" name="renter[comments_for_broker]" id="renter_comments_for_broker" default="eg, prefer to live on the ground floor, must have a washer/dryer, etc..." cols="55" class="has_default_text idleField"></textarea>
        </div>
      </div>
      <fieldset>
        <div class="boxed wide">
          <input type="checkbox" class="field text" value="1" name="terms_confirmation" id="agreeToTerms">
          <label for="agreeToTerms"> I agree to Naked Apartments <a data-height="400" data-width="450" class="ajaxModal cboxElement" href="/ajax/renter_terms_of_service">Terms of Service</a>. </label>
        </div>
      </fieldset>
      <div class="clear"></div>
    </div>
    <input type="hidden" value="2" name="step" id="step">
    <input type="hidden" name="version" id="version">
    <div class="formActions green"> <a id="backStep" class="button  large white arrow left hidden" href="javascript: go_back_to_previous_step(this);"><span>Back</span></a> <a id="nextStep" class="button arrow onGreen submitButton large" href="#"><span>Next</span></a> <a id="createAccountStep" class="button  submitButton large hidden" href="#"><span>Create Account</span></a> <span id="ajaxLoaderContainer"></span> </div>
  </form>