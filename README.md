# modx-file-versioning

A MODX Evo 1.x snippet that appends the filetime to a given filename.<br>
See http://github.com/h5bp/html5-boilerplate/wiki/cachebusting for details.

## Installation
- Create a new snippet named "FileVersioning".
- Fill in the description with the following: `<strong>1.0</strong> Appends filetime to filename for versioning`
- Copy the content of "fileversioning.snippet.php" into the content of the snippet
- Edit .htaccess and insert

```
<IfModule mod_rewrite.c>
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteRule ^(.+)\.(\d+)\.(js|css|png|jpg|gif)$ $1.$3 [L]
</IfModule>
```

## Usage

```
<link rel="stylesheet" href="[!FileVersioning? &file=`main.css`!]">
```

will become

```
<link rel="stylesheet" href="main.1234567890.css">
```
