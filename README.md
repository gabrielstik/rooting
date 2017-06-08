# rooting
Custom rooting process including language management

## Features
* Clean URL
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

#### SSL Issues
If your website is in https, you might have 2 _.conf_ files :
* mywebsite.conf
* mywebsite-xx-ssl.conf

All you need is do the same changes on the ssl _.conf_ file


Then apply : `sudo service apache2 restart`.

## Usage
Comming soon

Thank you ! :thumbsup:
