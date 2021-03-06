<?php

require_once( dirname(__FILE__) . '/../includes/functions.php' );

function myplugin_add_meta_box() {

	$screens = array( POST_TYPE_NZHA_MAIN_POST );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'myplugin_sectionid',
			__( 'Home Appraisal Form' , 'myplugin_textdomain' ),
			'myplugin_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );

function myplugin_meta_box_callback( $post ) {

	wp_nonce_field( 'myplugin_save_meta_box_data', 'myplugin_meta_box_nonce' );

	$address = get_post_meta( $post->ID, '_my_meta_property_address_value_key', true );
	$longtitude = get_post_meta( $post->ID, '_my_meta_property_longtitude_value_key', true );
	$latitude = get_post_meta( $post->ID, '_my_meta_property_latitude_value_key', true );
	$typeofproperty = get_post_meta( $post->ID, '_my_meta_property_type_value_key', true );
	$condition = get_post_meta( $post->ID, '_my_meta_property_condition_value_key', true );
	$size = get_post_meta( $post->ID, '_my_meta_property_size_value_key', true );
	$suburb = get_post_meta( $post->ID, '_my_meta_property_suburb_value_key', true );
	$bedrooms = get_post_meta( $post->ID, '_my_meta_property_bedrooms_value_key', true );
	$bathrooms = get_post_meta( $post->ID, '_my_meta_property_bathrooms_value_key', true );
	$carspaces = get_post_meta( $post->ID, '_my_meta_property_carspaces_value_key', true );
	$specialfeatures = get_post_meta( $post->ID, '_my_meta_property_specialfeatures_value_key', true );
	$otherfeatures = get_post_meta( $post->ID, '_my_meta_property_otherfeatures_value_key', true );
	$relationship = get_post_meta( $post->ID, '_my_meta_property_relationship_value_key', true );
	$plans = get_post_meta( $post->ID, '_my_meta_property_plans_value_key', true );
	$timeframe = get_post_meta( $post->ID, '_my_meta_property_timeframe_value_key', true );
	$datesold = get_post_meta( $post->ID, '_my_meta_property_datesold_value_key', true );
	$price = get_post_meta( $post->ID, '_my_meta_property_price_value_key', true );

	echo '<table class="wp-list-table widefat fixed striped pages pa_home_appraisal_table">';
	echo '<tr><td>';
	echo '<label for="myplugin_address_field">';
	_e( 'Address', 'myplugin_textdomain' );
	echo ' : </label> ';
	echo '<input id="searchTextField" class="searchTextField" type="text" name="myplugin_address_field" value="' . esc_attr( $address ) . '" size="100">';
	//echo '<input type="text" id="myplugin_address_field" name="myplugin_address_field" value="' . esc_attr( $address ) . '" size="100" />';
	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_longtitude_field">';
	_e( 'Longtitude', 'myplugin_textdomain' );
	echo ' : </label> ';
	echo '<input type="text" id="myplugin_longtitude_field" name="myplugin_longtitude_field" value="' . esc_attr( $longtitude ) . '" size="100" />';
	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_latitude_field">';
	_e( 'Latitude', 'myplugin_textdomain' );
	echo ' : </label> ';
	echo '<input type="text" id="myplugin_latitude_field" name="myplugin_latitude_field" value="' . esc_attr( $latitude ) . '" size="100" />';
	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_typeofproperty_field">';
	_e( 'Type of Property', 'myplugin_textdomain' );
	echo ' : </label> ';
	
	$typeofproperty = explode(',', $typeofproperty);
	foreach ( getPropertyType() as $key => $value)
	{
		if (in_array($key, $typeofproperty))
		{
			$checked = "checked";
		}
		else
		{
			$checked = "";
		}
		
		echo '<input type="checkbox" ' . $checked . ' id="myplugin_typeofproperty_field" name="myplugin_typeofproperty_field[]" value="' . $key . '" />' . $value;		
	}
	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_conditionoftheproperty_field">';
	_e( 'Condition of the Property', 'myplugin_textdomain' );
	echo ' : </label> ';

	$condition = explode(',', $condition);
	foreach ( getPropertyCondition() as $key => $value)
	{
		if (in_array($key, $condition))
		{
			$checked = "checked";
		}
		else
		{
			$checked = "";
		}
		echo '<input type="checkbox" ' . $checked . ' id="myplugin_conditionoftheproperty_field" name="myplugin_conditionoftheproperty_field[]" value="' . $key . '" />' . $value;		
	}
	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_size_field">';
	_e( 'Size', 'myplugin_textdomain' );
	echo ' : </label> ';

	$size = explode(',', $size);
	foreach ( getPropertySize() as $key => $value)
	{
		if (in_array($key, $size))
		{
			$checked = "checked";
		}
		else
		{
			$checked = "";
		}
		echo '<input type="checkbox" ' . $checked . ' id="myplugin_size_field" name="myplugin_size_field[]" value="' . $key . '" />' . $value;		
	}
	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_suburb_field">';
	_e( 'Suburb', 'myplugin_textdomain' );
	echo ' : </label> ';
	echo '<input type="text" id="myplugin_suburb_new_field" name="myplugin_suburb_field" value="' . esc_attr( $suburb ) . '" size="100" />';
	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_bedrooms_field">';
	_e( 'Bedrooms', 'myplugin_textdomain' );
	echo ' : </label> ';

	$bedrooms = explode("," , $bedrooms);
	
	foreach (getPropertyFeaturesValue('bedrooms') as $num => $value)
	{
		if (in_array($num, $bedrooms))
		{
				$checked = "checked";
		}
		else
		{
			$checked = "";
		}
		echo '<input type="checkbox" ' . $checked . ' id="myplugin_bedrooms_field" name="myplugin_bedrooms_field[]" value="' . $num . '" />' . $value;		
	}
	
	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_bathrooms_field">';
	_e( 'Bathrooms', 'myplugin_textdomain' );
	echo ' : </label> ';
	
	$bathrooms = explode("," , $bathrooms);
	
	foreach (getPropertyFeaturesValue('bathrooms') as $num => $value)
	{
		if (in_array($num, $bathrooms))
		{
				$checked = "checked";
		}
		else
		{
			$checked = "";
		}
		echo '<input type="checkbox" ' . $checked . ' id="myplugin_bathrooms_field" name="myplugin_bathrooms_field[]" value="' . $num . '" />' . $value;		
	}

	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_carspaces_field">';
	_e( 'Car Spaces', 'myplugin_textdomain' );
	echo ' : </label> ';
	
	$carspaces = explode("," , $carspaces);
	
	foreach (getPropertyFeaturesValue('carports') as $num => $value)
	{
		if (in_array($num, $carspaces))
		{
				$checked = "checked";
		}
		else
		{
			$checked = "";
		}
		echo '<input type="checkbox" ' . $checked . ' id="myplugin_carspaces_field" name="myplugin_carspaces_field[]" value="' . $num . '" />' . $value;		
	}
	echo '</div>';
	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_specialfeatures_field">';
	_e( 'Special Features', 'myplugin_textdomain' );
	echo ' : </label> ';

	$specialfeatures = explode(',', $specialfeatures);
	foreach ( getSpecialFeatures() as $key => $value)
	{
		if (in_array($key, $specialfeatures))
		{
			$checked = "checked";
		}
		else
		{
			$checked = "";
		}
		echo '<input type="checkbox" ' . $checked . ' id="myplugin_specialfeatures_field" name="myplugin_specialfeatures_field[]" value="' . $key . '" />' . $value;		
	}
	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_otherfeatures_field">';
	_e( 'Other Features', 'myplugin_textdomain' );
	echo ' : </label> ';
	echo '<input type="text" id="myplugin_otherfeatures_field" name="myplugin_otherfeatures_field" value="' . esc_attr( $otherfeatures ) . '" size="100" />';
	echo '</div>';
	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_relationship_field">';
	_e( 'Relationship', 'myplugin_textdomain' );
	echo ' : </label> ';

	$relationship = explode(',', $relationship);
	foreach ( getRelationship() as $key => $value)
	{
		if (in_array($key, $relationship))
		{
			$checked = "checked";
		}
		else
		{
			$checked = "";
		}
		echo '<input type="checkbox" ' . $checked . ' id="myplugin_relationship_field" name="myplugin_relationship_field[]" value="' . $key . '" />' . $value;		
	}
	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_plans_field">';
	_e( 'Plans for the Property', 'myplugin_textdomain' );
	echo ' : </label> ';

	$plans = explode(',', $plans);
	foreach ( getPlans() as $key => $value)
	{
		if (in_array($key, $plans))
		{
			$checked = "checked";
		}
		else
		{
			$checked = "";
		}
		echo '<input type="checkbox" ' . $checked . ' id="myplugin_plans_field" name="myplugin_plans_field[]" value="' . $key . '" />' . $value;		
	}
	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_timeframe_field">';
	_e( 'Time Frame', 'myplugin_textdomain' );
	echo ' : </label> ';

	$timeframe = explode(',', $timeframe);
	foreach ( getTimeframe() as $key => $value)
	{
		if (in_array($key, $timeframe))
		{
			$checked = "checked";
		}
		else
		{
			$checked = "";
		}
		echo '<input type="checkbox" ' . $checked . ' id="myplugin_timeframe_field" name="myplugin_timeframe_field[]" value="' . $key . '" />' . $value;		
	}
	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_datesold_field">';
	_e( 'Date Sold', 'myplugin_textdomain' );
	echo ' : </label> ';
	echo '<input type="date" id="myplugin_datesold_field" name="myplugin_datesold_field" value="' . esc_attr( $datesold ) . '" size="100" />';
	echo '</div>';
	echo '</td></tr>';

	echo '<tr><td>';
	echo '<label for="myplugin_price_field">';
	_e( 'Price', 'myplugin_textdomain' );
	echo ' : </label> ';
	echo '<input type="text" id="myplugin_price_field" name="myplugin_price_field" value="' . esc_attr( $price ) . '" size="100" />';
	echo '</div>';
	echo '</td></tr>';

	echo '<input type="hidden" name="myplugin_new_form_field" />';

	echo '</table>';

}

function myplugin_save_meta_box_data( $post_id ) {

	if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'myplugin_save_meta_box_data' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	if ( ! isset( $_POST['myplugin_new_form_field'] ) ) {
		return;
	}

	$address = sanitize_text_field( $_POST['myplugin_address_field'] );
	$longtitude = sanitize_text_field( $_POST['myplugin_longtitude_field'] );
	$latitude = sanitize_text_field( $_POST['myplugin_latitude_field'] );
	$typeofproperty = isset($_POST['myplugin_typeofproperty_field']) ? implode("," , array_map('sanitize_text_field' , $_POST['myplugin_typeofproperty_field'])) : "";
	$condition = isset($_POST['myplugin_conditionoftheproperty_field']) ? implode("," , array_map('sanitize_text_field' , $_POST['myplugin_conditionoftheproperty_field'])) : "";
	$size = isset($_POST['myplugin_size_field']) ? implode("," , array_map('sanitize_text_field' , $_POST['myplugin_size_field'] )) : "";
	$suburb = sanitize_text_field( $_POST['myplugin_suburb_field'] );
	$bedrooms = isset($_POST['myplugin_bedrooms_field']) ? implode("," , array_map('sanitize_text_field' , $_POST['myplugin_bedrooms_field'] )) : "";
	$bathrooms = isset($_POST['myplugin_bathrooms_field']) ? implode("," , array_map('sanitize_text_field' , $_POST['myplugin_bathrooms_field'] )) : "";
	$carspaces = isset($_POST['myplugin_carspaces_field']) ? implode("," , array_map('sanitize_text_field' , $_POST['myplugin_carspaces_field'] )) : "";
	$specialfeatures = isset($_POST['myplugin_specialfeatures_field']) ? implode("," , array_map('sanitize_text_field' , $_POST['myplugin_specialfeatures_field'] )) : "";
	$otherfeatures = sanitize_text_field( $_POST['myplugin_otherfeatures_field'] );
	$relationship = isset($_POST['myplugin_relationship_field']) ? implode("," , array_map('sanitize_text_field' , $_POST['myplugin_relationship_field'] )) : "";
	$plans = isset($_POST['myplugin_plans_field']) ? implode("," , array_map('sanitize_text_field' , $_POST['myplugin_plans_field'] )) : "";
	$timeframe = isset($_POST['myplugin_timeframe_field']) ? implode("," , array_map('sanitize_text_field' , $_POST['myplugin_timeframe_field'] )) : "";
	$datesold = sanitize_text_field( $_POST['myplugin_datesold_field'] );
	$price = sanitize_text_field( $_POST['myplugin_price_field'] );

	update_post_meta( $post_id, '_my_meta_property_address_value_key', $address );
	update_post_meta( $post_id, '_my_meta_property_longtitude_value_key', $longtitude );
	update_post_meta( $post_id, '_my_meta_property_latitude_value_key', $latitude );
	update_post_meta( $post_id, '_my_meta_property_type_value_key', $typeofproperty );
	update_post_meta( $post_id, '_my_meta_property_condition_value_key', $condition );
	update_post_meta( $post_id, '_my_meta_property_size_value_key', $size );
	update_post_meta( $post_id, '_my_meta_property_suburb_value_key', $suburb );
	update_post_meta( $post_id, '_my_meta_property_bedrooms_value_key', $bedrooms );
	update_post_meta( $post_id, '_my_meta_property_bathrooms_value_key', $bathrooms );
	update_post_meta( $post_id, '_my_meta_property_carspaces_value_key', $carspaces );
	update_post_meta( $post_id, '_my_meta_property_specialfeatures_value_key', $specialfeatures );
	update_post_meta( $post_id, '_my_meta_property_otherfeatures_value_key', $otherfeatures );
	update_post_meta( $post_id, '_my_meta_property_relationship_value_key', $relationship );
	update_post_meta( $post_id, '_my_meta_property_plans_value_key', $plans );
	update_post_meta( $post_id, '_my_meta_property_timeframe_value_key', $timeframe );
	update_post_meta( $post_id, '_my_meta_property_datesold_value_key', $datesold );
	update_post_meta( $post_id, '_my_meta_property_price_value_key', $price );

}
add_action( 'save_post', 'myplugin_save_meta_box_data' );