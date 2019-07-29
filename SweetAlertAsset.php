<?php

namespace kamran377\sweetalert2;

use yii\web\AssetBundle;

/**
 * Class AlertAsset
 *
 * @package kamran377\sweetalert2
 */
class SweetAlertAsset extends AssetBundle
{
    /**
     * @var string the directory that contains the source asset files for this asset bundle
     */
    public $sourcePath = '@npm/sweetalert2';

    /**
     * @var array list of JavaScript files that this bundle contains
     */
    public $js = [
        'dist/sweetalert2.min.js',
    ];

    /**
     * @var array list of CSS files that this bundle contains
     */
    public $css = [
        'dist/sweetalert2.min.css',
    ];
}
