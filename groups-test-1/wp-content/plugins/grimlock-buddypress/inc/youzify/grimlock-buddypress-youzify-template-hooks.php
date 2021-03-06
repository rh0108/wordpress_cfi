<?php
/**
 * Grimlock BuddyPress template hooks for Youzify.
 *
 * @package grimlock-buddypress
 */

/**
 * Login Form Modal Hooks
 *
 * @see grimlock_buddypress_youzify_grimlock_login_form_modal
 *
 */
if ( youzify_is_membership_system_active() ) {
	remove_action( 'grimlock_login_form_modal_template', 'grimlock_login_form_modal', 10 );
	add_action( 'grimlock_login_form_modal_template', 'grimlock_buddypress_youzify_grimlock_login_form_modal', 10 );
}

/**
 * Remove send message button that we add because youzify already adds its own
 */
remove_action( 'bp_directory_members_actions', 'grimlock_buddypress_member_send_message_button', 10 );
