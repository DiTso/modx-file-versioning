<?php
/* 
 * @name: FileVersioning
 * @desc: <strong>1.0</strong> Appends filetime to filename for versioning
 * Macht aus style.css style.1234567890.css
 * braucht eine Modifikation in der .htaccess
 
# ----------------------------------------------------------------------
# Built-in filename-based cache busting
# ----------------------------------------------------------------------

# If you're not using the build script to manage your filename version revving,
# you might want to consider enabling this, which will route requests for
# /css/style.20110203.css to /css/style.css

# To understand why this is important and a better idea than all.css?v1231,
# read: github.com/h5bp/html5-boilerplate/wiki/cachebusting

# <IfModule mod_rewrite.c>
#   RewriteCond %{REQUEST_FILENAME} !-f
#   RewriteCond %{REQUEST_FILENAME} !-d
#   RewriteRule ^(.+)\.(\d+)\.(js|css|png|jpg|gif)$ $1.$3 [L]
# </IfModule>

 */

$file = isset($file) ? $file : false;

if($file) {
	if(strpos($file, '/') === 0 || !file_exists(MODX_BASE_PATH . $file)) {
		return $file;
	}
	$mtime = filemtime(MODX_BASE_PATH . $file);
	return preg_replace('{\\.([^./]+)$}', ".$mtime.\$1", $file);
}
?>
