<?php

/**
 * File Summary
 *
 * File description.
 *
 * @package LifterLMS/Classes
 *
 * @since 1.0.0-beta.1
 * @version 1.0.0-beta.2
 *
 * @property LLMS_Group $group Group object.
 */

defined( 'ABSPATH' ) || exit;

$seats = $group->get_seats();
function user_has_role( $role_name ) {
	$user_meta  = get_userdata( get_current_user_id() );
	$user_roles = $user_meta->roles;
	return in_array( $role_name, $user_roles );
}
?>
<?php
if ( user_has_role( 'student' ) ) {
	return;}
?>
<div class="llms-group-card card--group-profile-seats">
	<header class="llms-group-card-header">
		<h3 class="llms-group-card-title">
			<i class="fa fa-users" aria-hidden="true"></i>
			<?php _e( 'Seats', 'lifterlms-groups' ); ?>
			<span id="llms-groups-seats-used"><?php echo $seats['used']; ?></span> / <span id="llms-groups-seats-total"><?php echo $seats['total']; ?></span>
		</h3>
		<? if (current_user_can('manage_group_seats', $group->get('id'))) : ?>
		<button class="llms-group-button ghost llms-group-card-action add-seats" data-micromodal-trigger="llms-group-seats-modal" id="llms-group-add-seats">
			<span class="llms-group-text"><?php _e( 'Add Seats', 'lifterlms-groups' ); ?></span>
			<i class="fa fa-plus" aria-hidden="true"></i>
		</button>
		<?php endif; ?>
	</header>
</div>
