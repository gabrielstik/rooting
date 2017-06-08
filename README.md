# rooting
Custom rooting process including language management

## Features
* Clean URLs
* Language management

## Requirements
* PHP 5.4.0+

## Installation

### Local
No installation required, just use your favorite AMP software

### Server
_The **.htaccess** file need to be allowed to rewrite your host's one and as a result make your website rootable._

On Apache, find your website's _.conf_ file and find these lines :
```xml
<Directory>
  Options Indexes FollowSymLinks
  AllowOverride None
  Require all granted
</Directory>
```

and change `AllowOverride None` into `AllowOverride All`.

You might have :
```xml
<Directory>
  Options Indexes FollowSymLinks
  AllowOverride All
  Require all granted
</Directory>
```

_Note that if you want to make this parameter as default for all your virtual hosts, you have to do this changes on_ `/etc/apache2/apache2.conf` _file._

Then apply : `sudo service apache2 restart`.

#### SSL Issues
If your website is in https, you might have 2 _.conf_ files :
* mywebsite.conf
* mywebsite-xx-ssl.conf

All you need is do the same changes on the ssl _.conf_ file and don't forget to apply.

## Usage

`index.php` in your root directory is the file that contains rooting datas.

### URL rooting
```php
switch($q) {
case '':
	$page = 'home';
	break;
case 'about':
	$page = 'about';
	break;
case 'contact':
	$page = 'contact';
	break;
default:
	$page = '404';
	break;
}
```

**$q** is the string after the first slash in your URL.

_**Example :** 'mywebsite.com/about', **$q** is 'about'._

You can also cumulate slashes.

_**Example :** 'mywebsite.com/articles/make-our-planet-great-again', $q is 'articles/make-our-planet-great-again'._

To add a rooting page, add a **case** in that **switch**.
**$page** will be the name of your **$page.php**. _Note than $page can be **$q**._



Thank you ! :thumbsup:
