<?php
/**
 * BuddyPress - Users Messages
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 * @version 3.0.0
 */

// @codingStandardsIgnoreFile
// Allow plugin text domain in theme.
?>

	<div id="subnav" aria-label="<?php esc_attr_e( 'Member secondary navigation', 'buddypress' ); ?>" role="navigation" class="d-flex flex-column flex-lg-row mb-4 mt-0">

		<div class="item-list-tabs primary-list-tabs no-ajax d-flex">
			<ul>
				<?php bp_get_options_nav(); ?>
			</ul>
		</div>

		<?php if ( bp_is_messages_inbox() || bp_is_messages_sentbox() ) : ?>

			<div class="message-search ml-lg-auto dir-filter-search mt-4 mt-lg-0"><?php bp_message_search_form(); ?></div>

		<?php endif; ?>

	</div><!-- .item-list-tabs -->

<?php
switch ( bp_current_action() ) :

	// Inbox/Sentbox.
	case 'inbox':
	case 'sentbox':
		do_action( 'bp_before_member_messages_content' );

		if ( bp_is_messages_inbox() ) : ?>
		<h2 class="bp-screen-reader-text"><?php esc_html_e( 'Messages inbox', 'buddypress' ); ?></h2>
	<?php elseif ( bp_is_messages_sentbox() ) : ?>
		<h2 class="bp-screen-reader-text"><?php esc_html_e( 'Sent Messages', 'buddypress' ); ?></h2>
	<?php endif; ?>

		<div class="messages">
			<?php bp_get_template_part( 'members/single/messages/messages-loop' ); ?>
		</div><!-- .messages -->

		<?php
		do_action( 'bp_after_member_messages_content' );
		break;

	// Single Message View.
	case 'view':
		bp_get_template_part( 'members/single/messages/single' );
		break;

	// Compose.
	case 'compose':
		bp_get_template_part( 'members/single/messages/compose' );
		break;

	// Sitewide Notices.
	case 'notices':
		do_action( 'bp_before_member_messages_content' ); ?>
		<h2 class="bp-screen-reader-text"><?php esc_html_e( 'Sitewide Notices', 'buddypress' ); ?></h2>

		<div class="messages">
			<?php bp_get_template_part( 'members/single/messages/notices-loop' ); ?>
		</div><!-- .messages -->

		<?php
		do_action( 'bp_after_member_messages_content' );
		break;

	// Any other.
	default:
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch;
