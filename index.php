 <script>
// Change the selector if needed
var $table = $('table.scroll'),
    $bodyCells = $table.find('tbody tr:first').children(),
    colWidth;



// Adjust the width of thead cells when window resizes
$(window).resize(function() {
    // Get the tbody columns width array
    colWidth = $bodyCells.map(function() {
        return $(this).width();
    }).get();

    // Set the width of thead columns
    $table.find('thead tr').children().each(function(i, v) {
        $(v).width(colWidth[i]);
    });
}).resize(); // Trigger resize handler

</script>
<?php //$company_currency = findcompany_currency($_SESSION['company_id']); 



									$LOCATION_LATI = "48.8567";
									$LOCATION_LONG = "2.3508" ;
									
									
									
									 
								
								if($_SESSION['company_id'] == '95'){
									
									 
									//$LOCATION_LATI = "50.850340";
									//$LOCATION_LONG = "4.351710" ;

                                                                        $LOCATION_LATI = "4.051056";
                                                                        $LOCATION_LONG = "9.767869" ;
									
									 
									}
								

                                                                  if($_SESSION['company_id'] == '96'){
									
									 
									$LOCATION_LATI = "51.507351";
									$LOCATION_LONG = "-0.127758" ;
									
									 
									}

                                                                        if($_SESSION['company_id'] == '97'){
									
									 
									$LOCATION_LATI = "4.051056";
									$LOCATION_LONG = "9.767869" ;
									
									 
									}
                                                                        if($_SESSION['company_id'] == '98'){
									
									 
									$LOCATION_LATI = "50.886650";
									$LOCATION_LONG = "4.447180" ;
									
									 
									}
                                                                        if($_SESSION['company_id'] == '103'){
									
									 
									$LOCATION_LATI = "45.659930";
									$LOCATION_LONG = "6.348720" ;
									
									 
									}
                                                                       if($_SESSION['company_id'] == '104'){
									
									 
									$LOCATION_LATI = "50.653860";
									$LOCATION_LONG = "3.073470" ;
									
									 
									}
								
							
								 


?>
<div class="container taxi_dispatcher">
    <div class="row">
        <!-- form: -->
        <div class="lft_outer">
            <div class="col-md-4 col-md-4-inner">

					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li id="ab_tab"><a href="#add_booking" style="cursor:pointer;" id="add_booking_tab" role="tab" data-toggle="tab">Add booking</a></li>
						<li id="eb_tab">
                                                    <!--a href="#edit_booking" role="tab" id="edit_booking_tab" data-toggle="tab">Edit Booking</a-->
						</li>
						<?php if($_SESSION['user_type']=="A"){ ?>
						<li>
							<select  style="cursor:pointer;" name="select_company" id="select_company" onchange="all_booking_manage_list();driver_list_with_status();">
								<option value="0">All Company</option>
								<?php foreach($get_active_company_details as $company){ ?>
										<option value="<?php echo $company['cid']; ?>"><?php echo 'SSSSSSSSSSDDDDFFGGGGHHHHJJJYYTTTRRR555'.ucfirst($company['company_name']); ?></option>
								<?php } ?>
							</select>
						</li>
						<?php }else{ ?>
							<input name="select_company" id="select_company" type="hidden" value="<?php echo $_SESSION['company_id']; ?>" >
						<?php } ?>
						<li>
							<select  style="cursor:pointer;" name="select_taxi_model" id="select_taxi_model" onchange="driver_list_with_status();">
								<option value=""> 
								
								All Vehicle</option>
								<?php foreach($model_details as $model){ ?>
										<option value="<?php echo $model['model_id']; ?>"><?php echo ucfirst($model['model_name']); ?></option>
								<?php } ?>
							</select>
						</li>

					</ul>
					<!-- Tab panes -->

                                                  <!--div class="hover_tool_tip">
                                                        <ul>
                                                            <li><a title="City List" href="#">City List</a></li>
                                                            <li><a title="City List" href="#">City List</a></li>
                                                            <li><a title="City List" href="#">City List</a></li>
                                                            <li><a title="City List" href="#">City List</a></li>
                                                            <li><a title="City List" href="#">City List</a></li>
                                                        </ul>
                                                       <span>&nbsp;</span>
                                                   </div-->

					<div id="add_book_tab" class="">
                                        <a href="javascript:;" title="close" id="close_button" class="popup_close_button close_side_bar">&nbsp;</a>
						<form id="defaultForm" method="post" class="form-horizontal" action="<?php echo URL_BASE; ?>taxidispatch/dashboard" enctype="multipart/form-data" --onSubmit="check_passengerexit()">
                                        <div class="row">
                                            <h4><?php echo strtoupper(__('passengers_information')); ?></h4>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="<?php echo __('name_label'); ?>"  autocomplete="off" />
                                            </div>
                                            <input name="passenger_id" id="passenger_id" type="hidden" >
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="email" id="email" placeholder="<?php echo __('email_id'); ?>" autocomplete="off" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="phone" id="phone"  maxlength="15" placeholder="<?php echo __('mobile'); ?>" autocomplete="off" />
                                            </div>
                                             <?php /** booking details **/ ?>
                                            <h4><?php echo strtoupper(__('booking_details')); ?></h4>
                                            <div class="form-group col-lg-5_taxi_dispatcher">
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" id="current_location" name="current_location" autocomplete="off"  placeholder="<?php echo __('enter_currentlocation'); ?>" />
                                                </div>
                                                <div class="col-lg-5" style="margin-right: 0;">
                                                    <input type="text" class="form-control" id="drop_location" name="drop_location" autocomplete="off" placeholder="<?php echo __('enter_droplocation'); ?>" />
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" class="form-control" id="notes" name="notes" autocomplete="off"  placeholder="<?php echo __('note_driver'); ?>"  />
                                                </div>
                                                <div class="col-lg-12">
                                                    <input class="form-control"  data-format="yyyy-mm-dd hh:mm" type="text" name="pickup_date" id="pickup_date" autocomplete="off" placeholder="<?php echo __('pickup_time'); ?>"></input>
                                                </div>
                                                	<input type="hidden" id="dispatch_id" name="dispatch" value="" />
                                                	<input type="hidden" id="create_id" name="create" value="" />
												<div class="col-lg-12">
													<?php $field_type =''; if(isset($postvalue) && array_key_exists('taxi_model',$postvalue)){ $field_type =  $postvalue['taxi_model']; } ?>
													<select style="padding:0;" name="taxi_model" id="taxi_model" class="form-control" title="<?php echo __('select_the_taximodel'); ?>" OnChange="change_minfare(this.value,'');">
														<option value=""><?php echo __('select_vehicle_label'); ?></option>
														<?php
															foreach($model_details as $list) { ?>
														<option value="<?php echo $list['model_id']; ?>" <?php if($field_type == $list['model_id']) { echo 'selected=selected'; } else if($list['model_name'] == "Taxi") { ?>selected <?php } ?>><?php echo ucfirst($list['model_name']); ?></option>
														<?php } ?>
													</select>
												</div>


                                                <div class="col-lg-5">
													<label style="margin-top:8px;"><?php echo __('luggage'); ?> : </label>
                                                    <input type="text" class="form-control" name="luggage" id="luggage" style="float:left;width:170px;margin-left:23px;" value="2" autocomplete="off"  placeholder="<?php echo __('luggage'); ?>"   />
                                                </div>
                                                <div class="col-lg-5" style="margin-right: 0;">
													<label style="margin-top:8px;"><?php echo __('passengers'); ?> : </label>
                                                    <input type="text" class="form-control" name="no_passengers" id="no_passengers" style="float:left;width:170px;margin-left:5px;"  value="2" autocomplete="off" placeholder="<?php echo __('passengers'); ?>"  />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="row" style="width:100%; padding-left: 0;">
                                                <!--h4><?php echo strtoupper(__('vehicle')); ?></h4-->

                                            <?php /**  VEHICLE details **/ ?>

                                            <?php /*
                                            <!-- Booking type-->
                                            <div class="col-lg-5" style="margin-right:0px;">
                                                <h4><?php echo strtoupper(__('booking_type')); ?></h4>
                                                <div class="form-group">
                                                    <div class="col-lg-12">
                                                        <input type="radio" name="recurrent" value="1" <?php if(isset($postvalue) && array_key_exists('recurrent',$postvalue)) {  if($postvalue['recurrent'] == 1) { echo 'checked'; } } else { echo 'checked'; } ?> /> <?php echo __('single'); ?>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="radio" name="recurrent" value="2" /> <?php echo __('recurrent'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            * * */ ?>
                                        </div>
                                        <?php /**  Payment **/ ?>
                                        <div class="row row_payment" style="padding-left: 0;">
                                            <div class="col-lg-5">
                                                <h4><?php echo strtoupper(__('payment')); ?></h4>
                                                <ul class="payment_inner">
                                                    <li>
                                                        <label><?php echo __('journey'); ?>:&nbsp;</label><span id="find_duration"><?php echo __('zero_mins'); ?></span>
                                                    </li>
                                                    <li>
                                                        <label><?php echo __('distance'); ?>:&nbsp;</label><span id="find_km"></span>
                                                    </li>
                                                    <li>
                                                        <label><?php echo __('tax'); ?>:&nbsp;</label><span id="vat_tax"><?php echo $company_tax; ?></span><span>%</span>
                                                    </li>
                                                    <li>
                                                        <label><?php echo __('fare'); ?>:&nbsp;</label><span id="min_fare" class=""><?php echo '0'; ?></span><span><?php echo $company_currency; ?></span>
                                                    </li>
                                                    <li>
														<label><?php echo __('fixedprice'); ?> :</label><span><input type="text" title="<?php echo __('enter_override_price'); ?>" class="onlynumbers" name="fixedprice" id="fixedprice" value=""  maxlength="6" placeholder="<?php echo __('override_price'); ?>" autocomplete="off" /></span>
														<span style="padding-left:3px;"><?php /*echo $company_currency = findcompany_currency($_SESSION['company_id']);*/ ?></span>
													</li>
													 <li>
														<label><?php echo __('total'); ?> :</label><span id="total_price" class=""><?php echo '0'; ?></span><!--<span><?php echo  $company_currency = findcompany_currency($_SESSION['company_id']);
 ?></span>-->
													</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="map_addbooking_outer" --class="col-lg-5 col-lg-5_map">
                                            <div id="map_addbooking"></div>
                                        </div>
                                        </div>
                                        <?php /** booking details **/ ?>
                                        <?php /**  VEHICLE details **/ ?>
                                        <!-- Booking type-->

                                        <div class="form-group">
                                            <!--div id="directions"></div-->
                                            <?php /** hidden fields **/ ?>
                                            <div style="display:none;">
                                                <table>
                                                    <tr>
                                                        <td>Start altitude:</td>
                                                        <td id="start"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>End altitude:</td>
                                                        <td id="end"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Maximum latitude:</td>
                                                        <td id="max"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Minimum latitude:</td>
                                                        <td id="min"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Distance:</td>
                                                        <td id="distance"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total ascent:</td>
                                                        <td id="ascent"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total descent:</td>
                                                        <td id="descent"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <ul id="acc" style="display:none;">
                                            <li><label><?php echo __('description'); ?> :</label><span id="desc">Rate Kilometer</span></li>
                                            <li><label><?php echo __('value'); ?> :</label><span><?php echo $company_currency; ?></span><span id="min_value"></span></li>
                                            <li><label><?php echo __('subtotal'); ?> :</label><span><?php echo $company_currency; ?></span><span id="sub_total"></span></li>
                                        </ul>
                                        <input type="hidden" name="payment_type" value=""/>
                                        <!--<input type="hidden" name="fixedprice" value=""/>-->
                                        <input type="hidden" name="find_duration_secs" id="find_duration_secs" value=""/>
                                        <input type="hidden" name="pickup_time" value="23"/>
                                        <input type="hidden" name="pickup_lat" id="pickup_lat" value="">
                                        <input type="hidden" name="pickup_lng" id="pickup_lng" value="">
                                        <input type="hidden" name="drop_lat" id="drop_lat" value="">
                                        <input type="hidden" name="drop_lng" id="drop_lng" value="">
                                        <input type="hidden" name="info" id="info" value="">
                                        <input type="hidden" name="model_minfare" id="model_minfare" value="0" >
                                        <input type="hidden" name="distance_km" id="distance_km" value="0" >
                                        <input type="hidden" name="total_fare" id="total_fare" value="0" >
                                        <input type="hidden" name="total_duration" id="total_duration" value="0" >
                                        <input type="hidden" name="city_id" id="city_id" value="" >
                                        <input type="hidden" name="cityname" id="cityname" value="" >
                                        <input type="hidden" name="payment_sec" id="payment_sec" value="" >
                                        <input type="hidden" name="company_tax" id="company_tax" value="<?php echo $company_tax; ?>" >
                                        <input type="hidden" name="default_company_unit" id="default_company_unit" value="<?php echo UNIT_NAME; ?>" >
                                        <input type="hidden" name="recurrent" value="1"/>
                                        <?php /*<input type="hidden" name="luggage" value=""/>
                                        <input type="hidden" name="no_passengers" value=""/> */ ?>
                                        <input type="hidden" name="driver_id" id="driver_id" value=""/>
                                        <input type="hidden" name="admin_company_id" id="admin_company_id" value=""/>

                                        <?php /*  <div class="form-group">
                                            <div class="col-lg-9 col-lg-offset-3">
                                            <div id="errors"></div>
                                            </div>
                                            </div> */ ?>
                                        <div class="form-group">
                                            <?php /*
                                                <div class="col-lg-9">
                                                	<button type="submit" class="btn btn-primary" name="signup" value="Add Booking">Add Booking</button>
                                                </div>
                                                */ ?>
                                            <div class="col-lg-9">
                                                <button type="submit" class="btn btn-primary" name="create" id="create" value="<?php echo __('create'); ?>" ><?php echo __('create'); ?></button>
                                            </div>
                                            <div class="col-lg-9">
                                                <button type="submit" class="btn btn-primary" name="dispatch" id="dispatch" value="<?php echo __('dispatch'); ?>" ><?php echo __('dispatch'); ?></button>
                                            </div>
                                            <div class="col-lg-9">
                                                <button type="button" class="btn btn-primary" name="reset" id="reset" value="<?php echo __('button_reset'); ?>" ><?php echo __('button_reset'); ?></button>
                                            </div>
                                        </div>
                                    </form>
					</div>
					<div id="edit_book_tab" class="">
                                            <a href="javascript:;" title="close" class="popup_close_button close_side_bar">&nbsp;</a>
						<form id="defaultForm_edit" method="post" class="form-horizontal" action="<?php echo URL_BASE; ?>taxidispatch/dashboard" enctype="multipart/form-data" --onSubmit="change_email_phone_exit()">
									<div class="row">
										<h4><?php echo strtoupper(__('passengers_information')); ?></h4>
										<div class="form-group">
											<input type="text" class="form-control" name="edit_firstname" id="edit_firstname" placeholder="<?php echo __('name_label'); ?>"  autocomplete="off" />
										</div>
										<input name="edit_passenger_id" id="edit_passenger_id" type="hidden" >
										<div class="form-group">
											<input type="text" class="form-control" name="edit_email" id="edit_email" placeholder="<?php echo __('email_id'); ?>" autocomplete="off" />
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="edit_phone" id="edit_phone" maxlength="15" placeholder="<?php echo __('mobile'); ?>" />
										</div>
                                        <?php /** booking details **/ ?>
										<h4><?php echo strtoupper(__('booking_details')); ?></h4>
										<div class="form-group col-lg-5_taxi_dispatcher">
											<div class="col-lg-5">
												<input type="text" class="form-control" id="edit_current_location" name="edit_current_location" autocomplete="off"  placeholder="<?php echo __('enter_currentlocation'); ?>" />
											</div>
											<div class="col-lg-5" style="margin-right: 0;">
												<input type="text" class="form-control" id="edit_drop_location" name="edit_drop_location" autocomplete="off" placeholder="<?php echo __('enter_droplocation'); ?>" />
											</div>
											<div class="col-lg-12">
												<input type="text" class="form-control" name="edit_notes" id="edit_notes" autocomplete="off"  placeholder="<?php echo __('note_driver'); ?>"  />
											</div>
											<div class="col-lg-12">
												<input class="form-control"  data-format="yyyy-mm-dd hh:mm" type="text" name="edit_pickup_date" id="edit_pickup_date" autocomplete="off" placeholder="<?php echo __('pickup_time'); ?>"></input>
											</div>
											<input type="hidden" id="update_dispatch_id" name="update_dispatch" value="" />

											<div class="col-lg-12">
												<?php $field_type =''; if(isset($postvalue) && array_key_exists('taxi_model',$postvalue)){ $field_type =  $postvalue['taxi_model']; } ?>
												<select style="padding:0;" name="edit_taxi_model" id="edit_taxi_model" class="form-control" title="<?php echo __('select_the_taximodel'); ?>" OnChange="change_minfare(this.value,'edit');">
													<option value=""><?php echo __('select_vehicle_label'); ?></option>
													<?php
														foreach($model_details as $list) { ?>
													<option value="<?php echo $list['model_id']; ?>" <?php if($field_type == $list['model_id']) { echo 'selected=selected'; } ?>><?php echo ucfirst($list['model_name']); ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="col-lg-5">
												<label style="margin-top:8px;"><?php echo __('luggage'); ?> : </label>
												<input type="text" class="form-control" style="float:left;width:170px;margin-left:23px;" name="edit_luggage" id="edit_luggage" autocomplete="off"  placeholder="<?php echo __('luggage'); ?>"   />
											</div>
											<div class="col-lg-5" style="margin-right: 0;">
												<label style="margin-top:8px;"><?php echo __('passengers'); ?> : </label>
												<input type="text" class="form-control" style="float:left;width:170px;margin-left:5px;" name="edit_no_passengers" id="edit_no_passengers" autocomplete="off" placeholder="<?php echo __('passengers'); ?>"  />
											</div>
										</div>
									</div>
									<div class="row">

										<div class="row" style="width:100%; padding-left: 0px;">
											<?php /*
											<h4><?php echo strtoupper(__('vehicle')); ?></h4>
											<div class="form-group">
												<div class="col-lg-12">
													<?php $field_type =''; if(isset($postvalue) && array_key_exists('taxi_model',$postvalue)){ $field_type =  $postvalue['taxi_model']; } ?>
													<select style="padding:0;" name="edit_taxi_model" id="edit_taxi_model" class="form-control" title="<?php echo __('select_the_taximodel'); ?>" OnChange="change_minfare(this.value,'edit');">
														<option value=""><?php echo __('select_label'); ?></option>
														<?php
															foreach($model_details as $list) { ?>
														<option value="<?php echo $list['model_id']; ?>" <?php if($field_type == $list['model_id']) { echo 'selected=selected'; } ?>><?php echo ucfirst($list['model_name']); ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											*/ ?>
										<?php /*
										<!--Booking type-->
										<div class="col-lg-5" style="margin-right:0px;">
											<h4><?php echo strtoupper(__('booking_type')); ?></h4>
											<div class="form-group">
												<div class="col-lg-12">
													<input type="radio" name="edit_recurrent" value="1" <?php if(isset($postvalue) && array_key_exists('recurrent',$postvalue)) {  if($postvalue['recurrent'] == 1) { echo 'checked'; } } else { echo 'checked'; } ?> /> <?php echo __('single'); ?>
												</div>
												<div class="col-lg-12">
													<input type="radio" name="edit_recurrent" value="2" /> <?php echo __('recurrent'); ?>
												</div>
											</div>
										</div>
										* */ ?>
									</div>
                                                                            <div class="row row_payment" style="padding-left: 0;">
										<div class="col-lg-5">
											<h4><?php echo strtoupper(__('payment')); ?></h4>
											<ul class="payment_inner">
												<li>
													<label><?php echo __('journey'); ?>:&nbsp;</label><span id="edit_find_duration"><?php echo __('zero_mins'); ?></span>
												</li>
												<li>
													<label><?php echo __('distance'); ?>:&nbsp;</label><span id="edit_find_km"></span>
												</li>
												<li>
													<label><?php echo __('tax'); ?>:&nbsp;</label><span id="edit_vat_tax"><?php echo $company_tax; ?></span><span>%</span>
												</li>
												<li>
													<label><?php echo __('fare'); ?>:&nbsp;</label><span id="edit_min_fare" class=""><?php echo '0'; ?></span><span><?php echo $company_currency; ?></span>
												</li>
												<li>
													<label><?php echo __('fixedprice'); ?> :</label><span><input type="text" title="<?php echo __('enter_override_price'); ?>" class="onlynumbers" name="edit_fixedprice" id="edit_fixedprice" value=""  maxlength="6" placeholder="<?php echo __('override_price'); ?>" autocomplete="off" /></span>
													<!--<span style="padding-left:3px;"><?php echo $company_currency = findcompany_currency($_SESSION['company_id']); ?></span>-->
												</li>
												 <li>
													<label><?php echo __('total'); ?> :</label><span id="edit_total_price" class=""><?php echo '0'; ?></span><span><?php /* echo $company_currency = findcompany_currency($_SESSION['company_id']);*/ ?></span>
												</li>
											</ul>
										</div>
										<div class="map_addbooking_outer" --class="col-lg-5 col-lg-5_map">
                                            <div id="map_editbooking"></div>
                                        </div>
									</div>
									</div>
									<?php /** booking details **/ ?>
									<?php /**  VEHICLE details **/ ?>
									<!--Booking type-->

									<?php /**  Payment **/ ?>
									<div class="form-group">
										<!--div id="directions"></div-->
										<?php /** hidden fields **/ ?>
										<div style="display:none;">
											<table>
												<tr>
													<td>Start altitude:</td>
													<td id="start"></td>
												</tr>
												<tr>
													<td>End altitude:</td>
													<td id="end"></td>
												</tr>
												<tr>
													<td>Maximum latitude:</td>
													<td id="max"></td>
												</tr>
												<tr>
													<td>Minimum latitude:</td>
													<td id="min"></td>
												</tr>
												<tr>
													<td>Distance:</td>
													<td id="distance"></td>
												</tr>
												<tr>
													<td>Total ascent:</td>
													<td id="ascent"></td>
												</tr>
												<tr>
													<td>Total descent:</td>
													<td id="descent"></td>
												</tr>
											</table>
										</div>
									</div>
									<ul id="acc" style="display:none;">
										<li><label><?php echo __('description'); ?> :</label><span id="desc">Rate Kilometer</span></li>
										<li><label><?php echo __('value'); ?> :</label><span><?php echo $company_currency; ?></span><span id="min_value"></span></li>
										<li><label><?php echo __('subtotal'); ?> :</label><span><?php echo $company_currency; ?></span><span id="sub_total"></span></li>
									</ul>
									<input type="hidden" name="edit_payment_type" value=""/>
									<!--<input type="hidden" name="edit_fixedprice" value=""/>-->
									<input type="hidden" name="edit_find_duration_secs" id="edit_find_duration_secs" value=""/>
									<input type="hidden" name="edit_pickup_time" value=""/>
									<input type="hidden" name="edit_pickup_lat" id="edit_pickup_lat" value="">
									<input type="hidden" name="edit_pickup_lng" id="edit_pickup_lng" value="">
									<input type="hidden" name="edit_drop_lat" id="edit_drop_lat" value="">
									<input type="hidden" name="edit_drop_lng" id="edit_drop_lng" value="">
									<input type="hidden" name="edit_info" id="info" value="">
									<input type="hidden" name="edit_model_minfare" id="edit_model_minfare" value="" >
									<input type="hidden" name="edit_distance_km" id="edit_distance_km" value="" >
									<input type="hidden" name="edit_total_fare" id="edit_total_fare" value="" >
									<input type="hidden" name="edit_total_duration" id="edit_total_duration" value="" >
									<input type="hidden" name="edit_city_id" id="edit_city_id" value="" >
									<input type="hidden" name="edit_cityname" id="edit_cityname" value="" >
									<input type="hidden" name="edit_payment_sec" id="edit_payment_sec" value="" >
									<input type="hidden" name="edit_company_tax" id="edit_company_tax" value="<?php echo $company_tax; ?>" >
									<input type="hidden" name="edit_default_company_unit" id="edit_default_company_unit" value="<?php echo UNIT_NAME; ?>" >
									<input type="hidden" name="edit_recurrent" value="1"/>
									<?php /*<input type="hidden" name="edit_luggage" value=""/>
                                    <input type="hidden" name="edit_no_passengers" value=""/> */ ?>
                                    <input type="hidden" name="edit_pass_logid" id="edit_pass_logid" value=""/>
                                    <input type="hidden" name="edit_admin_company_id" id="edit_admin_company_id" value=""/>

									<?php /*  <div class="form-group">
										<div class="col-lg-9 col-lg-offset-3">
										<div id="errors"></div>
										</div>
										</div> */ ?>
									<div class="form-group">
										<?php /*
											<div class="col-lg-9">
												<button type="submit" class="btn btn-primary" name="signup" value="Add Booking">Add Booking</button>
											</div>
											*/ ?>
										<div class="col-lg-9">
											<button type="submit" class="btn btn-primary" id="update_submit" name="update" value="<?php echo __('button_update'); ?>" ><?php echo __('button_update'); ?></button>
										</div>
										<div class="col-lg-9">
											<button type="submit" class="btn btn-primary" name="update_dispatch" id="update_dispatch" value="<?php echo __('dispatch'); ?>" ><?php echo __('dispatch'); ?></button>
										</div>
										<div class="col-lg-9">
											<button type="submit" class="btn btn-primary" name="cancel_button" id="cancel_button" value="<?php echo __('cancel'); ?>" ><?php echo __('cancel'); ?></button>
										</div>
										<div class="col-lg-9">
											<button type="button" class="btn btn-primary edit_reset_btn" name="reset" value="<?php echo __('button_reset'); ?>" ><?php echo __('button_reset'); ?></button>
										</div>
									</div>
									</form>
					</div>

					<?php /*
					<div class="tab-content" id="tab-content_scroll">
						<!--div class="tab-pane" id="add_booking"-->
						<div class="tab-pane" id="add_booking">

						</div>
						<div class="tab-pane" id="edit_booking">

						</div>
					</div>

					*/ ?>
				<?php /*
				<div class="panel-group" id="steps">
                        <!-- Step 1 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#steps" href="#add_booking">Add Booking #1</a></h4>
                            </div>
                            <div id="add_booking" class="panel-collapse collapse in">
                                <div class="panel-body">

                                </div>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#steps" href="#edit_booking">Edit Booking #1</a></h4>
                            </div>
                            <div id="edit_booking" class="panel-collapse collapse">
                                <div class="panel-body">

                                </div>
                            </div>
                        </div>


            </div>
            */ ?>
            </div>
            <!-- /.panel -->

            <div id="map-section" class="col-md-8 col-md-8_scroll map_manage_booking driver_status_height_outer_top">
                <div class="widget margin-bottom">
                  <input type="hidden" name="select_driver_status" id="select_driver_status" value="">
                    <div id="on_going_trip_map" >
                        <div class="ongoing">
                            <div id="on_going_trip"></div>
                            <div id="on_going_place"></div>
                        </div>
                        <?php if(SHOW_MAP !=1) { ?>
                        <div id="map-canvas" style="width:100%;height:500px;"></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
             <div id="taxi_scroll_one" class="driver_status driver_status_height">
                <!-- Nav tabs
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#free_in_driver" id="free_in_driver_tab" role="tab" data-toggle="tab">Free IN</a></li>
                    <li><a href="#free_out_driver" role="tab" id="free_out_driver_tab" data-toggle="tab">Free OUT</a></li>
                    <li><a href="#active_driver" role="tab" id="active_driver_tab" data-toggle="tab">Active</a></li>
                </ul> -->
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="all_drivers">
                    </div>
                    <div class="tab-pane" id="free_in_driver">
                        <!--ul>
                            <li>
                            	<span>Driver Name</span>
                            	<span>Status</span>
                            </li>
                            <li>
                            	<span>Abu</span>
                            	<span>Free</span>
                            </li>
                            </ul-->
                    </div>
                    <div class="tab-pane" id="free_out_driver"></div>
                    <div class="tab-pane" id="active_driver"></div>


                </div>
            </div>
            <!--<div id="taxi_scroll_one" class="driver_status driver_status_height">
                <div class="caller_id">
                    <h4>Caller Id</h4>
                    <ul>
                        <li>
                            <span class="pro_pic">&nbsp;</span>
                            <span class="number">8675045094</span>
                            <span class="phone_icon">&nbsp;</span>
                        </li>
                    </ul>
                </div>
            </div>-->
            <!--Manage Booking-->
		<div class="manage_booking_bottom_outer">
			<div class="manage_booking_bottom manage_booking_bottom_scroll">
            <div class="taxi_scroll_one_top">
                <table cellspacing="0" cellpadding="0" width="100%" align="center" class="dispatch_icons">
                                    <tr>
										<td>
											<div class="heading_icon_one"><input type="checkbox" name="status_color" checked value="0" onchange="all_booking_manage_list()"></div>
											<label>Assign </label>
										</td>
										<td>
											<div class="heading_icon_two"><input type="checkbox" name="status_color" checked value="6, 7, 10" onchange="all_booking_manage_list()"></div>
											<label>Reassign</label>
										</td>
										<?php /*
										<td>
											<div class="heading_icon_three"><input type="checkbox" name="status_color" value="7" onchange="all_booking_manage_list()"></div>
											<label>Waiting for response</label>
										</td>
										*/ ?>
										<td>
											<div class="heading_icon_four"><input type="checkbox" name="status_color" checked value="9" onchange="all_booking_manage_list()"></div>
											<label>Trip Confirmed</label>
										</td>
										<td>
											<div class="heading_icon_five"><input type="checkbox" name="status_color" checked value="3" onchange="all_booking_manage_list()"></div>
											<label>Start To Pickup</label>
										</td>
										<td>
											<div class="heading_icon_six"><input type="checkbox" name="status_color" checked value="2" onchange="all_booking_manage_list()"></div>
											<label>In Progress</label>
										</td>
										<td>
											<div class="heading_icon_sevan"><input type="checkbox" name="status_color" checked value="1" onchange="all_booking_manage_list()"></div>
											<label>Trip Completed</label>
										</td>
										<td>
											<div class="heading_icon_eight"><input type="checkbox" name="status_color" checked value="5" onchange="all_booking_manage_list()"></div>
											<label>Waiting for Payment</label>
										</td>
										<td>
											<input type="hidden" name="status_color_cancel" id="status_color_cancel" value="8">
											<div class="heading_icon_nine"><input type="checkbox" checked name="status_cancel" id="status_cancel" value="C,R" onchange="all_booking_manage_list()"></div>
											<label>Trip Cancelled</label>
										</td>
									</tr>
                                </table>
            </div>

            <div class="manage_booking_outer col-md-12 map_manage_booking">
                <div class="form-control_bott">
                    <div id="change_result">
                        <div class="widget">
                            <?php /*<div class="title">
                                <div style="width:auto; float:right; margin: 4px 3px;">
                                	<div class="button greyishB"></div>
                                </div>
                                </div>         */ ?>
                            <div class="overflow-block overflow-block_outer">
                                <table cellspacing="0" cellpadding="0" class="scroll" width="100%" align="center" id="changetr">
                                    <thead id="list_thead">
                                        <tr>
                                            <td align="center"><?php echo __('time'); ?></td>
                                            <td align="center"><?php echo __('trip_id'); ?></td>
                                            <td align="center"><?php echo __('passenger'); ?></td>
                                            <?php if($_SESSION['user_type']=="A"){ ?>
                                            <td align="center"><?php echo __('company_name'); ?></td>
                                            <?php } ?>
                                            <td align="center"><?php echo __('driver'); ?></td>
                                            <td align="center"><?php echo __('reachable_mobile'); ?></td>
                                            <td align="center"><?php echo __('Current_Location'); ?></td>
                                            <td align="center"><?php echo __('Drop_Location'); ?></td>
                                            <td align="center"><?php echo __('distance'); ?></td>
                                            <td align="center"><?php echo __('fare').'('.$company_currency.')'; ?></td>
                                            <td align="center"><?php echo __('status'); ?></td>
                                            <td align="center"><?php echo __('luggage'); ?></td>
                                            <td align="center"><?php echo __('passengers'); ?></td>
                                             <td align="center"><?php echo __('notes'); ?></td>
                                            <td align="center" colspan="2"><?php echo __('action_label'); ?></td>
                                        </tr>
                                    </thead>
                                    <tbody class="all_booking_manage_scroll" id="all_booking_manage_list">
					<!---Manage Booking datas append here-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
			        <!--Manage Tab-->

        <!--Manage Tab-->
			</div>
            <!--Manage Booking-->
		<?php /* <div class="rgt_outer">
            <div class="friends-blog driver_status_bottom">
                <div class="recent_activity">
                    <h4>Recent Activity</h4>
                    <ul class="driver_status_height driver_status_height_re_act" id="recent_activity_content">
                        <!--Recent Activity Content Load Here-->
                        <!--li><span>Test</span></li-->
                    </ul>
                </div>
            </div>
        </div> */?>
		</div>
        </div>
    </div>
    <!-- :form -->
</div>

<script type="text/javascript" src="<?php echo URL_BASE;?>public/js/tdispatch_addbooking_new.js"></script>
<script type="text/javascript" src="<?php echo URL_BASE;?>public/js/new_script.js"></script>

<script>
	$(document).ready(function () {

                       

		<?php if(isset($show_popup['trip_id'])) { ?>
		edit_booking_from_manage('<?php echo $show_popup['trip_id']; ?>');
		<?php } ?>
		/*$( "#taxi_scroll_manage" ).scroll(function() {
		  //$(this).addClass( "sample" );
                      if ($(this).scrollTop() > 1){
                            $('.fixed_header').addClass("sticky");
                        }
                        else{
                            $('.fixed_header').removeClass("sticky");
                        }
		}); */
		//map_recur();//For intial load
		/*For load initial functions start*/
		//driver_status_dets();
		//recent_activity()


                  



		driver_list_with_status();
		all_booking_manage_list();
                

		/*For load initial functions end*/
		//fixed price
		$("#fixedprice" ).keyup(function() {
               this.value = this.value.replace(/[`~!@#$%^&*()_|+\-=?;:'",<>\{\}\[\]\\\/A-Z]/gi, '');
       });

		$('#fixedprice').on('keyup',function(){
			var price = $(this).val();
			if(price == '' || price ==0)
			{
				//$('#show_suggestion').hide();
				$('#min_fare').removeClass('strike');
				var tot_price = $('#total_fare').val();
				$('#total_price').html(tot_price);

			}
			else
			{	//$('#show_suggestion').hide();
				$('#total_price').html(price);
				$('#min_fare').addClass('strike');
			}
		});
		//edit
		$('#edit_fixedprice').on('keyup',function(){
			var price = $(this).val();
			if(price == '' || price ==0)
			{
				//$('#show_suggestion').hide();
				$('#edit_min_fare').removeClass('strike');
				//var tot_price = $('#total_fare').val();
				var tot_price = $('#edit_min_fare').text();
				$('#edit_total_price').html(tot_price);

			}
			else
			{	//$('#show_suggestion').hide();
				$('#edit_total_price').html(price);
				$('#edit_min_fare').addClass('strike');
			}
		});

		$("#edit_fixedprice" ).keyup(function() {
               this.value = this.value.replace(/[`~!@#$%^&*()_|+\-=?;:'",<>\{\}\[\]\\\/A-Z]/gi, '');
       });
		//fixed price

		//to prevent enter
		$(window).keydown(function(event) {
            if (event.keyCode == 13) {
				return false;
                //event.preventDefault();
            }
        });

        $('#myModal').modal('show');

         $('#defaultForm').validate({ // initialize the plugin
         //alert('as');
			rules: {
				firstname: {
					required: true,
				},
				email: {
					//required: true,
					email: true
				},
				phone: {
					required: true,
				},
				current_location: {
					required: true,
				},
				taxi_model: {
					required: true,
				},
				pickup_date: {
					required: true,
				},
			},
			messages: {
				firstname: {
					required: "The first name cannot be empty",
				},
				email: {
					//required: "The email cannot be empty",
					email: "Your email address must be in the format of name@domain.com"
				},
				phone: {
					required: "The phone number cannot be empty",
				},
				current_location: {
					required: "Enter the Pickup Location",
				},
				taxi_model: {
					required: "Select the Taxi Model",
				},
				pickup_date: {
					required: "Select the Pickup Date",
				},
			}
		});

		$('#defaultForm_edit').validate({ // initialize the plugin
			rules: {
				edit_firstname: {
					required: true,
				},
				edit_email: {
					//required: true,
					email: true
				},
				edit_phone: {
					required: true,
				},
				edit_current_location: {
					required: true,
				},
				edit_taxi_model: {
					required: true,
				},
				edit_pickup_date: {
					required: true,
				},
			},
			messages: {
				edit_firstname: {
					required: "The first name cannot be empty",
				},
				edit_email: {
					//required: "The email cannot be empty",
					email: "Your email address must be in the format of name@domain.com"
				},
				edit_phone: {
					required: "The phone number cannot be empty",
				},
				edit_current_location: {
					required: "Enter the Pickup Location",
				},
				edit_taxi_model: {
					required: "Select the Taxi Model",
				},
				edit_pickup_date: {
					required: "Select the Pickup Date",
				},
			}
		});

        $("#close_button,#reset").on('click',function(){
			//to reset the form fields
			$("#firstname").val("");
			$("#email").val("");
			$("#phone").val("");
			$("#current_location").val("");
			$("#drop_location").val("");
			$("#notes").val("");
			//to display default pickup time as current date
			var today = new Date();
			var Y = today.getFullYear(),
			    month = today.getMonth()+1,
			    dateVal = today.getDate(),
				h = today.getHours(),
				m = today.getMinutes(),
				s = today.getSeconds();
				month = (month < 10) ? "0" + month : month;
				dateVal = (dateVal < 10) ? "0" + dateVal : dateVal;
				h = (h < 10) ? "0" + h : h;
				m = (m < 10) ? "0" + m : m;
				s = (s < 10) ? "0" + s : s;
			var pickupTime = Y + "-" + month + "-" + dateVal + " " + h + ":" + m + ":" + s;
			$("#pickup_date").val(pickupTime);
			$("#taxi_model").val("1");
			 $("#email").removeAttr("readonly");
			 $("#firstname").removeAttr("readonly");
			 $("#phone").removeAttr("readonly");
			//to reset the distance and fare texts
			$("#find_duration").html("<?php echo __('zero_mins'); ?>");
			$("#find_km").html("");
			$("#vat_tax").html("0");
			$("#min_fare").html("0");
			$("#fixedprice").val("");
			$("#luggage").val("");
			$("#no_passengers").val("");
			$("#total_price").html("0");
			//to hide the error messages
			$("label.error").html("");
			initialize();
		});

		$(".edit_reset_btn").on('click',function(){
			var findid = $('#edit_pass_logid').val();
			var dataS = "passenger_logid="+trim(findid);
			$.ajax
			({
				type: "GET",
				url: "<?php echo URL_BASE;?>taxidispatch/edit_booking",
				data: dataS,
				cache: false,
				async: true,
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				success: function(response)
				{
					var data=response;
					var details=data[0];
					//console.log(details);
					$("#add_booking").removeClass("in");
					$("#edit_booking").addClass("in");
					//to add id for reset button in edit
					$('#edit_passenger_id').val(details.passengers_id);
					$('#edit_pass_logid').val(details.pass_logid);
					$('#edit_total_fare').val(details.approx_fare);
					$('#edit_distance_km').val(details.approx_distance);

					$('#edit_firstname').val(details.passenger_name);
					$('#edit_email').val(details.passenger_email);
					$('#edit_phone').val(details.passenger_phone);

					$('#edit_current_location').val(details.current_location);
					$('#edit_pickup_lat').val(details.pickup_latitude);
					$('#edit_pickup_lng').val(details.pickup_longitude);

					$('#edit_drop_location').val(details.drop_location);
					$('#edit_pickup_date').val(details.pickup_time);
					$('#edit_luggage').val(details.luggage);
					$('#edit_no_passengers').val(details.no_passengers);
					$('#edit_notes').val(details.notes_driver);
					$('#edit_taxi_model').val(details.taxi_modelid);

					$('#edit_city_id').val(details.search_city);
					$('#edit_total_duration').val(details.approx_duration);
					$('#edit_find_duration').html(details.approx_duration);
					$('#edit_find_km').html(details.approx_distance);
					$('#edit_min_fare').html(details.approx_fare);
					$('#edit_fixedprice').val(details.fixedprice);
					if(details.fixedprice != 0) {
						$('#edit_total_price').html(details.fixedprice);
						$('#edit_min_fare').addClass('strike');
					} else {
						$('#edit_min_fare').removeClass('strike');
						$('#edit_total_price').html(details.approx_fare);
					}
				}
			});
		});

        $("#pickup_date").on('change',function(){
			var pickupDate = $(this).val();//datetime is in yyyy-mm-dd hh:ii:ss format
			var dateString = pickupDate,
			dateParts = dateString.split(' '),
			timeParts = dateParts[1].split(':'),
			date;
			dateParts = dateParts[0].split('-');

			date = new Date(dateParts[0], parseInt(dateParts[1], 10) - 1, dateParts[2], timeParts[0], timeParts[1], timeParts[2]);
			var today = new Date();
			if(date.getTime() > today.getTime()){
				$('#dispatch').attr('disabled','disabled');
			} else {
				$('#dispatch').removeAttr('disabled');
			}
		});

       $("#dispatch").on('click',function(){
			var addValid = $("#defaultForm").valid({});
			if(addValid) {
				$('#dispatch').attr('disabled','disabled');
				$('#dispatch_id').val("Dispatch");
				document.getElementById('defaultForm').submit();
			}
			return addValid;
		});
        $("#update_dispatch").on('click',function(){
			var editValid = $("#defaultForm_edit").valid({});
			if(editValid) {
				$('#update_dispatch').attr('disabled','disabled');
				$('#update_dispatch_id').val("Dispatch");
				document.getElementById('defaultForm_edit').submit();
			}
			return editValid;
		});
        $("#create").on('click',function(){
			var addValid = $("#defaultForm").valid({});
			if(addValid) {
				$('#create').attr('disabled','disabled');
				$('#dispatch').attr('disabled','disabled');
				$('#create_id').val("Dispatch");
				document.getElementById('defaultForm').submit();
			}
			return addValid;
		});


		$("#edit_pickup_date").on('change',function(){
			var pickupDate = $(this).val();//datetime is in yyyy-mm-dd hh:ii:ss format
			var dateString = pickupDate,
			dateParts = dateString.split(' '),
			timeParts = dateParts[1].split(':'),
			date;
			dateParts = dateParts[0].split('-');

			date = new Date(dateParts[0], parseInt(dateParts[1], 10) - 1, dateParts[2], timeParts[0], timeParts[1], timeParts[2]);
			var today = new Date();
			if(date.getTime() > today.getTime()){
				$('#update_dispatch').attr('disabled','disabled');
			} else {
				$('#update_dispatch').removeAttr('disabled');
			}
		});




                              

	});
	var locations = {}; //A repository for markers (and the data from which they were contructed).

	$('#drop_location').on('change', function() {
		var a=$('#drop_location').val();
		if(a == ""){
			$('#drop_lat').val('');
			$('#drop_lng').val('');
			$('#distance_km').val('0');
			$('#total_fare').val('0');
			$('#min_fare').html('0');
			$('#find_km').html('0');
			$('#find_duration').html('0');
		}
	});

	$('#edit_drop_location').on('change', function() {
		var a=$('#edit_drop_location').val();
		if(a == ""){
			$('#edit_drop_lat').val('');
			$('#edit_drop_lng').val('');
			$('#edit_distance_km').val('0');
			$('#edit_total_fare').val('0');
			$('#edit_min_fare').html('0');
			$('#edit_find_km').html('0');
			$('#edit_find_duration').html('0');
		}
	});

	$('#taxi_model').on('change', function() {
		var a=$('#taxi_model').val();
		if(a == ""){
			$('#total_fare').val('0');
			$('#min_fare').html('0');
		}
	});

	$('#edit_taxi_model').on('change', function() {
		var a=$('#edit_taxi_model').val();
		if(a == ""){
			$('#edit_total_fare').val('0');
			$('#edit_min_fare').html('0');
		}
	});




                


	//initial dataset for markers
	var locs = {
		<?php 	$b=1;
			$a=count($all_company_map_list);
			if(count($all_company_map_list) > 0) {
			for($i=0;$i<$a;$i++){ ?>
			    <?php echo $b; ?>: {
					<?php
					$book_now="";
					if($all_company_map_list[$i]['driver_status']=="F" && $all_company_map_list[$i]['shift_status']=="IN"){
						$driver_info='<span style="color:green">'.__('free_in').'</span>';
						//$book_now='<button type="button" class="btn btn-outline btn-primary btn-xs" name="bookingnow" onclick="bookingnow_click(this.id);" id="driverid_'.$all_company_map_list[$i]['driver_id'].'" >'.__('booknow').'</button>';
					}elseif($all_company_map_list[$i]['driver_status']=="F" && $all_company_map_list[$i]['shift_status']=="OUT"){
						$driver_info='<span style="color:blue">'.__('free_out').'</span>';
					}elseif($all_company_map_list[$i]['driver_status']=="B"){
						$driver_info='<span style="color:#07841E">'.__('trip_assigned').'</span>';
					}elseif($all_company_map_list[$i]['driver_status']=="A"){
						$driver_info='<span style="color:red">'.__('hired').'</span>';
					}
					$update_date=$all_company_map_list[$i]['update_date'];
					$drv_info='<span class="info-content">'.ucfirst($all_company_map_list[$i]['name']).'</span>';
					$drv_info.='</br>';
					$drv_info.='<span class="info-content">'.$driver_info.'</span>';
					$drv_info.='</br>';
					$drv_info.='<span class="info-content">'.$update_date.'</span>';
					if($book_now !=""){
						$drv_info.='</br>';
						//$drv_info.='<span class="info-content">'.$book_now.'</span>';
					}
					?>
					//info: '<?php echo $all_company_map_list[$i]['name'] ; ?>',
					info: '<?php echo $drv_info; ?>',
					lat: <?php echo $all_company_map_list[$i]['latitude'] ; ?>,
					lng: <?php echo $all_company_map_list[$i]['longitude'] ; ?>,
					status: '<?php echo $all_company_map_list[$i]['driver_status'] ; ?>',
					shift_status: '<?php echo $all_company_map_list[$i]['shift_status'] ; ?>'
			    },
			<?php $b++; } } ?>
	};



            


	var MainMap = new google.maps.Map(document.getElementById('map-canvas'), {
	    zoom: 10,
	    maxZoom: 18,
	    minZoom: 1,
	    streetViewControl: false,
	    //center: new google.maps.LatLng(<?php echo LOCATION_LATI;?>,<?php echo LOCATION_LONG;?>),
	    center: new google.maps.LatLng(<?php echo $LOCATION_LATI;?>,<?php echo $LOCATION_LONG;?>),
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	});


         

	function change_email_phone_exit()
	{

		//alert("sdf");
		event.preventDefault();
		/*alert("asddf");return false;
		var dataS = "pass_email="+pass_email+"&pass_phone="+pass_phone+"&pass_id="+pass_id;
		var url_path = "<?php echo URL_BASE; ?>taxidispatch/check_pass_phone_email_exist";
		$.ajax({
			type: "GET",
			url:url_path,
			data: dataS,
			async: true,
			success:function(data){
				alert(data);return false;
				if(data != 0){
					alert("Email/Phone already exist");
					return false;
				}
			},
			error:function() {
				//alert('failed');
			}
		}); */



	}

	var infowindow = new google.maps.InfoWindow();

	setMarkers(locs,1); // 1 as-Deafult Search Drivers

	function map_recur()
	{
		//alert('map_recur');
		var status = $("#select_driver_status").val();
		if(status !=""){
			var driver_status=$("#select_driver_status").val();
		}else{
			var driver_status="";
		}

		var model = $("#select_taxi_model").val();
		if(model !=""){
			var taxi_model=$("#select_taxi_model").val();
		}else{
			var taxi_model="";
		}

		var company = $("#select_company").val();
		if(company !=""){
			var taxi_company=$("#select_company").val();
		}else{
			var taxi_company="";
		}

		//driver_status_dets();
		//all_booking_manage_list();

		$('#admin_company_id').val(taxi_company);
		$('#edit_admin_company_id').val(taxi_company);

		if(driver_status!='')
		{
			//$('#map-canvas').html('<img src="'+SrcPath+'/public/css/img/ajax-loaders/ajax-loader-1.gif" >');
			var Path = "<?php echo URL_BASE; ?>";

			if(driver_status!=""){
				var dataS = "driver_status="+driver_status+"&taxi_company="+taxi_company;
				var url_path = Path+"taxidispatch/driver_status_details_search_new";
			}

			var markers=new Array();
			$.ajax({
				type: "GET",
				url:url_path,
				data: dataS,
				async: true,
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				success:function(data){
					//For remove old markers
					removeMarkers(locations);
					setMarkers(data); // 2-As Driver status Search
					if(data != "")
					{
						$('#on_going_trip').html('');
					}
					else
					{
						$('#on_going_trip').html('No driver found');
					}
				},
				error:function() {
					//alert('failed');
				}
			});
		}else{
			//alert('map_recur else');
			var Path = "<?php echo URL_BASE; ?>";
			var url_path = Path+"taxidispatch/view_all_driverss";
			var dataS = "taxi_model="+taxi_model+"&taxi_company="+taxi_company;
			var markers;

			$.ajax({
				url:url_path,
				type: "GET",
				data: dataS,
				async: true,
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				success:function(response){
					//For remove old markers
					removeMarkers(locations);
					setMarkers(response); // 2-As Driver status Search
					if(response != "")
					{
						$('#on_going_trip').html('');
					}
					else
					{
						$('#on_going_trip').html('<?php echo __('no_login_drivers'); ?>');
					}
				},
				error:function() { //alert('failed');
				},
			});
		}
	}

	function driver_status_dets()
	{
		var company = $("#select_company").val();
		if(company !=""){
			var taxi_company=$("#select_company").val();
		}else{
			var taxi_company="";
		}

		var taxi_model = $("#select_taxi_model").val();

		var Path = "<?php echo URL_BASE; ?>";
		var all_drivers = "";
		var dataS = "driver_status="+all_drivers+"&taxi_company="+taxi_company+"&taxi_model="+taxi_model;
		var url_path = Path+"taxidispatch/driver_status_search_details";
		$.ajax({
			type: "GET",
			url:url_path,
			data: dataS,
			async: true,
			success:function(data){

				if(data != ""){
					var response = data.split("#");
					$('#all_drivers').html(response[0]);
					$('#driver_dets_count').html(response[1]);
				}
			},
			error:function() {
				//alert('failed');
			}
		});
	}

	function driver_list_with_status()
	{
		var taxi_company=$("#select_company").val();
		var taxi_model = $("#select_taxi_model").val();
		var driver_status = $("#select_driver_status").val();

		var Path = "<?php echo URL_BASE; ?>";

		var dataS = "driver_status="+driver_status+"&taxi_company="+taxi_company+"&taxi_model="+taxi_model;
		var url_path = Path+"taxidispatch/driver_list_with_status";
		$.ajax({
			type: "GET",
			url:url_path,
			data: dataS,
			async: true,
			success:function(data){
				if(data != ""){
					var response = data.split("#");
				    $('#all_drivers').html(response[1]);
					$('#driver_dets_count').html(response[2]);
					var locations_val = $.parseJSON(response[0]);
					//For remove old markers

					removeMarkers(locations);
					setMarkers(locations_val); // 2-As Driver status Search
					if(locations_val != "")
					{
						$('#on_going_trip').html('');
					}
					else
					{
						$('#on_going_trip').html('<?php echo __('no_login_drivers'); ?>');
					}
				}
			},
			error:function() {
				//alert('failed');
			}
		});
	}

	function recent_activity()
	{
		var Path = "<?php echo URL_BASE; ?>";
		var dataS = "";
		var url_path = Path+"taxidispatch/get_recent_activity";
		var response;
		$.ajax({
			type: "GET",
			url: url_path,
			data: dataS,
			cache: false,
			dataType: 'html',
			success: function(response){
				$('#recent_activity_content').html(response);
			}
		});
	}

	function all_booking_manage_list()
	{
		 
		
		 

		var company = $("#select_company").val();
		//alert(company);
		if(company !=""){
			var taxi_company=$("#select_company").val();
		}else{
			var taxi_company="";
		}

		var favorite = [];
		$.each($("input[name='status_color']:checked"), function(){
			favorite.push($(this).val());
		});
		var status_color_cancel = $('#status_color_cancel').val();
		favorite.push(status_color_cancel);

		var status_color=favorite.join(", ");

		var status_cancel = [];
		$.each($("input[name='status_cancel']:checked"), function(){
			status_cancel.push($(this).val());
		});

		//alert(status_cancel);
		var Path = "<?php echo URL_BASE; ?>";
		var dataS = "travel_status="+status_color+"&status_cancel="+status_cancel+"&taxi_company="+taxi_company;
		var url_path = Path+"taxidispatch/all_booking_list_manage";
		var response;
		$.ajax({
			type: "GET",
			url: url_path,
			data: dataS,
			cache: false,
			dataType: 'html',
			success: function(response){

				var data = response.split("@");
				if(data[0] == 0) {
					$("#list_thead").hide();
				} else {
					$("#list_thead").show();
				}
				$('#all_booking_manage_list').html(data[1]);

				var $table = $('table.scroll'),
				$bodyCells = $table.find('tbody tr:first').children(),
				colWidth;

			 // Get the tbody columns width array
				colWidth = $bodyCells.map(function() {
					return $(this).width();
				}).get();

				// Set the width of thead columns
				$table.find('thead tr').children().each(function(i, v) {
					$(v).width(colWidth[i]);
				});
			}
		});
	}

	function setMarkers(locObj) {
	    $.each(locObj, function (key, loc) {
		//console.log(loc);
	        if (!locations[key] && loc.lat !== undefined && loc.lng !== undefined) {
	            //Marker has not yet been made (and there's enough data to create one).
				//var driverid=loc.driver_id;


		//console.log(loc.totalconformcount);
				//console.log(driverid);
				//Driver Status icon change when(Active,Free,Busy)
				if(loc.status=="A"){
					var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/red.png'; ?>"; //RED
					//var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/red_car.png'; ?>"; //RED
				}else if(loc.status=="F" && loc.shift_status == 'OUT'){
					var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/yellow.png'; ?>"; //BLUE
					//var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/blu_car.png'; ?>"; //BLUE
				}else if(loc.status=="B"){
					var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/brown.png'; ?>"; // GREEN
					//var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/green_car.png'; ?>"; // GREEN
				}else if(loc.status=="F" && loc.shift_status == 'IN' && loc.totalconformcount !=0){
					var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/purple.png'; ?>"; // YELLOW
					//var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/orange_car.png'; ?>"; // YELLOW
				}else if(loc.status=="F" && loc.shift_status == 'IN'){
					var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/green.png'; ?>"; // YELLOW
					//var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/orange_car.png'; ?>"; // YELLOW
				}else{
					var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/blue.png'; ?>"; // YELLOW
					//var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/orange_car.png'; ?>"; // YELLOW
				}

	            //Create marker
	            loc.marker = new google.maps.Marker({
					//zoom: 11,
	                position: new google.maps.LatLng(loc.lat, loc.lng),
	                map: MainMap,
	                icon: status_icon,
	            });

	            //Attach click listener to marker
	            google.maps.event.addListener(loc.marker, 'mouseover', (function (key) {
	                return function () {
	                    infowindow.setContent(locations[key].info);
	                    infowindow.open(MainMap, locations[key].marker);
	                }
	            })(key));

	            //Remember loc in the `locations` so its info can be displayed and so its marker can be deleted.
	            locations[key] = loc;
	        } else if (locations[key] && loc.remove) {
	            //Remove marker from map
	            if (locations[key].marker) {
	                locations[key].marker.setMap(null);
	            }
	            //Remove element from `locations`
	            delete locations[key];
	        } else if (locations[key]) {
	            //Update the previous data object with the latest data.
	            $.extend(locations[key], loc);
	            if (loc.lat !== undefined && loc.lng !== undefined) {
	                //Update marker position (maybe not necessary but doesn't hurt).
	                locations[key].marker.setPosition(
	                new google.maps.LatLng(loc.lat, loc.lng));
	            }
	            if(loc.status !== undefined) {
					//Driver Status icon change when(Active,Free,Busy)
					if(loc.status=="A"){
						var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/red.png'; ?>"; //RED
						//var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/red_car.png'; ?>"; //RED
					}else if(loc.status=="F" && loc.shift_status == 'OUT'){
						var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/blue.png'; ?>"; //BLUE
						//var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/blu_car.png'; ?>"; //BLUE
					}else if(loc.status=="B"){

						var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/brown.png'; ?>"; // GREEN
						//var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/green_car.png'; ?>"; // GREEN
					}else if(loc.status=="F" && loc.shift_status == 'IN'){
						var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/green.png'; ?>"; // YELLOW
						//var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/orange_car.png'; ?>"; // YELLOW
					}else{
						var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/orange.png'; ?>"; // YELLOW
						//var status_icon="<?php echo BOOTSTRAP_IMGPATH.'/orange_car.png'; ?>"; // YELLOW
					}
	                locations[key].marker.setIcon(status_icon);
	            }
	            //locations[key].info looks after itself.
	        }
	    });
	}
	function removeMarkers(locObj)
	{
		$.each(locObj, function (key, loc) {
			if (locations[key].marker) {
				locations[key].marker.setMap(null);
			}
			//Remove element from `locations`
			delete locations[key];
		});
	}

	function bookingnow_click(drv_id)
	{
		var driver_id = drv_id.split('_').pop();
		$('#driver_id').val(driver_id);

		var addbook=$("#add_book_tab").attr("class");
		if(addbook=="add_book_active"){
			$("#add_book_tab").removeClass('add_book_active');
			$("#add_book_tab").hide();
			$("#ab_tab").removeClass('active');
		}else{
			$("#edit_book_tab").hide();
			$("#edit_book_tab").removeClass('edit_book_active');
			$("#add_book_tab").addClass('add_book_active');
			$("#add_book_tab").show();
			$("#ab_tab").addClass('active');
		}
	}

	$('#cancel_button').click(function() {
		var cancel_Submit = confirm('<?php echo __('sure_want_cancel'); ?>');
		if(cancel_Submit == true)
		{
			var pass_logid = $('#edit_pass_logid').val();
			var url= URL_BASE+"taxidispatch/cancel_booking/?pass_logid="+pass_logid;
			$.post(url, {
			}, function(response){
			document.location.href=URL_BASE+"taxidispatch/dashboard";
			});
		} else {
			<?php if($_SESSION['user_type'] == 'A') { ?>
			//to deselect the selected company
			$("#select_company").val("0");
			//to get the default data - start
			driver_list_with_status();
			all_booking_manage_list();
			<?php } ?>
			$("#edit_book_tab").removeClass('edit_book_active');
			$("#eb_tab").removeClass('active');
			//to get the default data - end
			$("#edit_book_tab").hide();
			$("#add_booking_tab").html('Add Booking');
			return false;
		}
	});

	google.maps.event.addListener(MainMap, "click", function(event)
	{
		//alert('ok');
		var lat = event.latLng.lat();
		var lng = event.latLng.lng();
		$('#current_location').blur();
		codeLatLng(lat,lng,'current_location');

		//set_hidden(lat,lng);
	});
	google.maps.event.addListener(MainMap, "rightclick", function(event)
	{
		var lat = event.latLng.lat();
		var lng = event.latLng.lng();
		$('#drop_location').blur();
		codeLatLng(lat,lng,'drop_location');
		clearMarkers();

	});

	function codeLatLng(lat,lng,id)
	{
		 var latlng = new google.maps.LatLng(lat, lng);
		  geocoder.geocode({'latLng': latlng}, function(results, status) {
			//  console.log(results);
			if (status == google.maps.GeocoderStatus.OK) {
				//alert(google.maps.GeocoderStatus);
			  if (results[1])
			  {
				 $('#'+id).val(results[1].formatted_address);
				 pickup_drop_location_marker(results[1].formatted_address,id,latlng)
				 $('#'+id+'_lat').val(lat);
				 $('#'+id+'_lng').val(lng);

			  } else {
				alert('<?php echo __("no_result_found"); ?>');
			  }
			  attempts = 0;
			}
			else if (status === google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
				  setTimeout(function() {
						codeLatLng(lat,lng,id);
				  }, 200);
			}
			 else {
			  alert('<?php echo __("gecoder_failed"); ?>' + status);
			  attempts = 0;
			}
		  });
	}

	function pickup_drop_location_marker(place, id, latlng) {
		var iconBase = '<?php echo PUBLIC_IMGPATH.' / ' ; ?>';
		if (id == 'drop_location') {
			end = latlng;
		}
		if (id == 'current_location') {
			start = latlng;
		}
		// First, remove any existing markers from the map.
		for (var i = 0; i < markerArray.length; i++) {
			markerArray[i].setMap(null);
		}
		markerArray = [];
		var request = {
			origin: start,
			destination: end,
			travelMode: google.maps.TravelMode.DRIVING
		};
		clearMarkers();
		directionsService.route(request, function(response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
				//var warnings = document.getElementById('warnings_panel');
				//warnings.innerHTML = '<b>' + response.routes[0].warnings + '</b>';
				directionsDisplay.setDirections(response);
				showSteps(response);
			}
		});
	}

	function showSteps(directionResult) {
	  markerArray = [];
	  var myRoute = directionResult.routes[0].legs[0];
	  for (var i = 0; i < myRoute.steps.length; i++) {
		var marker = new google.maps.Marker({
		  position: myRoute.steps[i].start_location,
		  map: MainMap
		});
		clearMarkers();
		attachInstructionText(marker, myRoute.steps[i].instructions);
		markerArray[i] = marker;
	  }
	}

	function attachInstructionText(marker, text) {
	  google.maps.event.addListener(marker, 'click', function() {
		// Open an info window when the marker is clicked on,
		// containing the text of the step.
		stepDisplay.setContent(text);
		stepDisplay.open(MainMap, marker);
	  });
	}

	// For 10 seconds interval for without refresh
	setInterval(function()
	{
		//map_recur(),
		//driver_status_dets(),
		//recent_activity(),
		driver_list_with_status(),
		all_booking_manage_list()
	},10000); // For 5 seconds interval   */

	//function to get edit booking tab open while edit booking from manage booking page
	function edit_booking_from_manage(findid)
	{
		var dataS = "passenger_logid="+trim(findid);
		$("#eb_tab").addClass('active');
		$("#add_booking_tab").html('Edit Booking');
		$.ajax
		({
			type: "GET",
			url: "<?php echo URL_BASE;?>taxidispatch/edit_booking",
			data: dataS,
			cache: false,
			async: true,
			contentType: "application/json; charset=utf-8",
			dataType: "json",
			success: function(response)
			{
				$("#edit_book_tab").show();
				var data=response;
				var details=data[0];
				//console.log(details);
				$("#add_booking").removeClass("in");
				$("#edit_booking").addClass("in");

				$('#edit_passenger_id').val(details.passengers_id);
				$('#edit_pass_logid').val(details.pass_logid);
				$('#edit_total_fare').val(details.approx_fare);
				$('#edit_distance_km').val(details.approx_distance);

				$('#edit_firstname').val(details.passenger_name);
				$('#edit_email').val(details.passenger_email);
				$('#edit_phone').val(details.passenger_phone);

				$('#edit_current_location').val(details.current_location);
				$('#edit_pickup_lat').val(details.pickup_latitude);
				$('#edit_pickup_lng').val(details.pickup_longitude);

				$('#edit_drop_location').val(details.drop_location);
				$('#edit_pickup_date').val(details.pickup_time);
				$('#edit_luggage').val(details.luggage);
				$('#edit_no_passengers').val(details.no_passengers);
				$('#edit_notes').val(details.notes_driver);
				$('#edit_taxi_model').val(details.taxi_modelid);

				$('#edit_city_id').val(details.search_city);
				$('#edit_total_duration').val(details.approx_duration);
				$('#edit_find_duration').html(details.approx_duration);
				$('#edit_find_km').html(details.approx_distance);
				$('#edit_min_fare').html(details.approx_fare);
				$('#edit_fixedprice').val(details.fixedprice);
				if(details.fixedprice != 0) {
					$('#edit_total_price').html(details.fixedprice);
					$('#edit_min_fare').addClass('strike');
				} else {
					$('#edit_min_fare').removeClass('strike');
					$('#edit_total_price').html(details.approx_fare);
				}
				//to get the company value as selected in company drop down
				if(details.company_id != 0) {
					$("#select_company").val(details.company_id);
					map_recur();
				}


				var travel_status=details.travel_status;
				 if(travel_status == 7){
					$("#cancel_button").hide();
					$('#update_dispatch').removeAttr('disabled');
					var dateString = details.pickup_time,
					dateParts = dateString.split(' '),
					timeParts = dateParts[1].split(':'),
					date;
					dateParts = dateParts[0].split('-');

					date = new Date(dateParts[0], parseInt(dateParts[1], 10) - 1, dateParts[2], timeParts[0], timeParts[1], timeParts[2]);
					var today = new Date();
					if(date.getTime() > today.getTime()){
						$('#update_dispatch').attr('disabled','disabled');
					} else {
						$('#update_dispatch').removeAttr('disabled');
					}
				}else{
					$('#update_dispatch').attr('disabled','disabled');
				}
			}
		});
	}

</script>
<!---Popup on Driver Search--->

<?php //echo $show_popup['show_pass_logid'];exit;
if(isset($show_popup['show_pass_logid'])) { ?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo __('choose_driver_from_list'); ?></h4>
      </div>
      <div class="modal-body">
			<div class="controls">
				<div class="new_input_field">
				  <span class="add-on"></span>
				  <input type="text" name="search_driver" id="search_driver" value="" onKeyUp="driver_details_new()">
				</div>
				<input type="hidden" name="passenger_log_id" id="passenger_log_id" value="<?php echo $show_popup['show_pass_logid']; ?>">
			</div>
			<div id="show_process">
			<div id="driver_details"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
		driver_details_new();
    });
 </script>
<?php } ?>


<?php
if(isset($show_popup['splid'])) { ?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="model_close_one" --data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo __('choose_driver_from_list'); ?></h4>
      </div>
      <div class="modal-body">
			<div class="controls">
				<div class="new_input_field">
				  <span class="add-on"></span>
				  <input type="text" name="search_driver" id="search_driver" value="" onKeyUp="driver_details_new()">
				</div>
				<input type="hidden" name="passenger_log_id" id="passenger_log_id" value="<?php echo $show_popup['splid']; ?>">
				<input type="hidden" name="admin_companyid" id="admin_companyid" value="<?php echo $show_popup['taxi_company']; ?>">
			</div>
			<div id="show_process">
			<div id="driver_details"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default"  id="model_close_two" --data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
    driver_details_new();
    });


/**************************** Search Driver when the dispatcher going to select the driver *******************************/

$('#driver_details p').click(function() {

                             

							var detailsid = this.id;
							var findimg = detailsid.split('_');

							var pass_logid = $('#passenger_log_id').val();

							var dataS = "pass_logid="+pass_logid+"&driver_id="+findimg[0]+"&taxi_id="+findimg[1]+"&driver_away_in_km="+findimg[2];

							$("#show_process").html('<img src="<?php echo IMGPATH; ?>loader.gif">');
							$.ajax
							({
								type: "GET",
								url: "<?php echo URL_BASE;?>taxidispatch/updatebooking",
								data: dataS,
								cache: false,
								dataType: 'html',
								success: function(response)
								{
									$("#show_process").html('');
									//console.log(response);
									//document.location.href="<?php echo URL_BASE;?>tdispatch/managebooking/#stuff";
									 window.location="<?php echo URL_BASE;?>taxidispatch/dashboard";
								}

							});
						});
/***************************************************************************/
 </script>

<?php } ?>
	
