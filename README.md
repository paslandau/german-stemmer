#GermanStemmer
[![Build Status](https://travis-ci.org/paslandau/german-stemmer.svg?branch=master)](https://travis-ci.org/paslandau/german-stemmer)

A German stemmer implementation in PHP that takes a word and reduces it to its German stem using the Porter stemmer algorithm, see:

 - [Porter stemmer Algorithm](http://snowball.tartarus.org/algorithms/porter/stemmer.html)
 - [German Porter stemmer](http://snowball.tartarus.org/algorithms/german/stemmer.html)

The original code was written by [Aris Buzachis](https://github.com/arisro) ([original repo](https://github.com/arisro/german-stemmer)).
Modifications I made include:
 
 - Switch to mb_* string functions 
 - Namespaces, PSR-4 autoloading and composer setup
 - PHPUnit test setup to include original test set on Porter stemmer website
 - Travis setup
 - Semantic versioning

###Basic Usage
```php

$word = "vergnüglich";
echo "$word => ".GermanStemmer::stem($word);

```

**Output**

    vergnüglich => vergnug

###Examples

See `demo*.php` files.

##Requirements

- PHP >= 5.5

##Installation

The recommended way to install GermanStemmer is through [Composer](http://getcomposer.org/).

    curl -sS https://getcomposer.org/installer | php

Next, update your project's composer.json file to include GermanStemmer:

    {
        "repositories": [
            {
                "type": "git",
                "url": "https://github.com/paslandau/german-stemmer.git"
            }
        ],
        "require": {
             "paslandau/german-stemmer": "~1"
        }
    }

After installing, you need to require Composer's autoloader:
```php

require 'vendor/autoload.php';
```

##Frequently searched questions

- How can I get the stem of a German word?
- Where can I find an open source German PHP stemmer?