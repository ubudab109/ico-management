<?php



/**
 * Set any link as active menu by adding active class
 * @param [uri] $uri current uri
 * @param string $output CSS class name
 */

if (!function_exists('set_active')) {
    function set_active($uri, $output = 'side-menu--active')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if ((request()->is($u))) {
                    return $output;
                }
            }
        } else {
            if ((request()->is($uri))) {
                return $output;
            }
        }
    }
}


/**
 * Set any link as active in mobile menu by adding active class
 * @param [uri] $uri current uri
 * @param string $output CSS class name
 */
if (!function_exists('set_active_mobile')) {
    function set_active_mobile($uri, $output = 'menu--active')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if ((request()->is($u))) {
                    return $output;
                }
            }
        } else {
            if ((request()->is($uri))) {
                return $output;
            }
        }
    }
}

/**
 * Sub Menu Open
 * @param [uri] $uri current uri
 * @param string $output CSS class name
 * menu__sub-open
 */
if (!function_exists('side_menu_open')) {
    function side_menu_open($uri, $output = 'side-menu__sub-open')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if ((request()->is($u))) {
                    return $output;
                }
            }
        } else {
            if ((request()->is($uri))) {
                return $output;
            }
        }
    }
}

/**
 * Sub Menu Open in Mobile
 * @param [uri] $uri current uri
 * @param string $output CSS class name
 */
if (!function_exists('mobile_menu_open')) {
    function mobile_menu_open($uri, $output = 'menu__sub-open')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if ((request()->is($u))) {
                    return $output;
                }
            }
        } else {
            if ((request()->is($uri))) {
                return $output;
            }
        }
    }
}
