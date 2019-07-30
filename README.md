<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii2 Sweet Alert2 Widget</h1>
    <br>
</p>

Alert widget based on [SweetAlert2](https://sweetalert2.github.io/)

[![Latest Stable Version](https://poser.pugx.org/yii2mod/yii2-sweet-alert/v/stable)](https://packagist.org/packages/yii2mod/yii2-sweet-alert) [![Total Downloads](https://poser.pugx.org/yii2mod/yii2-sweet-alert/downloads)](https://packagist.org/packages/yii2mod/yii2-sweet-alert) [![License](https://poser.pugx.org/yii2mod/yii2-sweet-alert/license)](https://packagist.org/packages/yii2mod/yii2-sweet-alert)
[![Build Status](https://travis-ci.org/yii2mod/yii2-sweet-alert.svg?branch=master)](https://travis-ci.org/yii2mod/yii2-sweet-alert)

Installation 
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist kamran377/yii2-sweetalert2 "*"
```

or add

```
"kamran377/yii2-sweetalert2": "*"
```

to the require section of your composer.json.

Usage
-------

**For render the message from session flash you can use the following code:**

1) Set the message in your action, for example:

```php
Yii::$app->session->setFlash('success', 'This is the message');
```

2) Simply add widget to your page as follows:
```php
echo kamran377\sweetalert2\SweetAlert::widget();
```

**For render the custom message you can use the following code:**
```php
// A replacement for the "prompt" function

echo \kamran377\yii2-sweetalert2\SweetAlert::widget([
        'type' => \kamran377\yii2-sweetalert2\SweetAlert::TYPE_WARNING,
        'options' => [
            'title' => 'Oops...',
            'text' => 'Something went wrong!',
            'footer' => '<a href>Why do I have this issue?</a>'
        ]
]);
```

** Javascrip Confrim Dialog Override**

The native javascript confirm dialog is overridden by default, to disable this override, use the following configuration in config.php or web,php(in advanced template):
```php
'assetManager' => [
    'bundles' => [
        'kamran377\yii2-sweetalert2\SweetAlertAsset' => [
            'overrideConfirm' => false
        ]
    ]
]
```

Sweet Alert2 Options 
----------------
You can find them on the [sweetalert2 homepage](https://sweetalert2.github.io/)
