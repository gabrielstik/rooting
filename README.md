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
**$page** will be the name of your **$page.php**. _Note than **$page** can be **$q**._

### MySQL config file

`/config.php` is the config file for database.
Replace host, name, user & pass.

### Languages files rooting

#### In index.php
The **setLang($lang)** function has to root the file in terms of the **$lang** variable.
By default, **$lang** is the language of your browser.
The language is pushed in a session to be kept for all your navigation.

```php
function setLang($lang) {
	$_SESSION['lang'] = $lang;
	switch ($lang) {
	case "en":
		$lang_file = file_get_contents('lang/en.json');
		break;
	case "fr":
		$lang_file = file_get_contents('lang/fr.json');
			break;
	default:
		$lang_file = file_get_contents('lang/en.json');
		break;
	}
	return $lang_file;
}
```

To add a language file, add a **case** in that **switch**, where **$lang_file** is the content of your language _.json_ file.

#### .json file structure
_en.json_ sample
```json
{
  "titles": {
    "home": "Rooting",
    "about": "About",
    "contact": "Contact"
  },
  "home": {
    "h1": "Welcome to my website"
  },
  "about": {
    "h1": "Here is information about the website"
  },
  "contact": {
    "h1": "You can contact me from here"
  },
  "404": {
    "h1": "404, page not found"
  }
}
```
Dynamic textual content must be in these files. One of them will be load with the page according to your current language.

#### Call textual content in HTML

The content is called in HTML this way :
```html
<h1><?php print_r($lang_array['home']['h1']); ?></h1>
```
Use the .json file in your way according to your project.

## Advantages
* Pretty URLs
* PHP textual rooting does not affect SEO
* Don't need a three for each language
* Easy to find and modify textual content
* Easy to deal with a custom CMS

***

Thank you ! :thumbsup:
