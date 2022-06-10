<?php
/**
 * ELEMENT - Button
 *
 * Elements are analagous to 'Atoms' in Brad Frost's Atomic Design Methodology.
 *
 * @link https://atomicdesign.bradfrost.com/chapter-2/#atoms
 *
 * @package ABS
 */

use function abs\functions\return_formatted_atts;
use function abs\functions\return_formatted_args;
use function abs\template_tags\display_svg;

$abs_defaults = [
	'class'         => [ 'abs-element', 'abs-element-button' ],
	'id'            => '',
	'title'         => false,
	'href'          => false,
	'target'        => false,
	'type'          => false,
	'icon'          => [],
	'icon_position' => 'after', // before, after.
	'alpine'        => [],
	'role'          => '',
	'aria'          => [
		'controls' => '',
		'disabled' => false,
		'expanded' => false,
	],
];

$abs_args = return_formatted_args( $args, $abs_defaults );

// Make sure element should render.
if ( $abs_args['title'] || $abs_args['icon'] ) :

	if ( ! empty( $abs_args['icon'] ) ) :
		$abs_args['class'][] = 'icon';
		$abs_args['class'][] = 'icon-' . $abs_args['icon_position'];
	endif;

	// Set up element attributes.
	$abs_atts = return_formatted_atts( [ 'id', 'href', 'target', 'class', 'type', 'aria', 'alpine', 'role' ], $abs_args );

	?>
	<<?php echo $abs_args['href'] ? 'a' : 'button'; ?> <?php echo $abs_atts; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php
		if ( $abs_args['title'] ) :
			echo esc_html( $abs_args['title'] );
		endif;

		if ( ! empty( $abs_args['icon'] ) ) :
			display_svg( $abs_args['icon'] );
		endif;
		?>
	</<?php echo $abs_args['href'] ? 'a' : 'button'; ?>>

<?php endif; ?>
