<?php
$requires[] = 'image-widget/image-widget.php';

foreach ( $requires as $require_one ) {
	require_once CORE_PLUGINS_PATH . $require_one;
}
