<?php

namespace kamran377\sweetalert2;

use Yii;
use yii\base\InvalidConfigException;
use yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * Alert widget renders a message from session flash or custom messages.
 *
 * @package kamran377\sweetalert2
 */
class SweetAlert extends Widget
{
    /**
     * Info type of the alert
     */
    const TYPE_INFO = 'info';

    /**
     * Error type of the alert
     */
    const TYPE_ERROR = 'error';

    /**
     * Success type of the alert
     */
    const TYPE_SUCCESS = 'success';

    /**
     * Warning type of the alert
     */
    const TYPE_WARNING = 'warning';

    /**
     * Input type of the alert
     */
    const TYPE_INPUT = 'input';

    /**
     * @var string the type of the alert to be displayed. One of the `TYPE_` constants.
     * Defaults to `TYPE_SUCCESS`
     */
    public $type = self::TYPE_SUCCESS;

    /**
     * All the flash messages stored for the session are displayed and removed from the session
     * Defaults to true.
     *
     * @var bool
     */
    public $useSessionFlash = true;

    /**
     * @var bool If set to true, the user can dismiss the modal by clicking outside it.
     * Defaults to true.
     */
    public $allowOutsideClick = true;

    /**
     * @var int Auto close timer of the modal. Set in ms (milliseconds).
     * Default - 2,5 second
     */
    public $timer = 2500;

    /**
     * @var string customer alert callback
     */
    public $callback = 'function() {}';

	/**
     * @var string customer alert callback
     */
	public $id = "";
    /**
     * Initializes the widget
     */
    public function init()
    {
        parent::init();

        if ($this->useSessionFlash) {
            $session = Yii::$app->getSession();
            $flashes = $session->getAllFlashes();

            foreach ($flashes as $type => $data) {
                $data = (array) $data;
                foreach ($data as $message) {
                    $this->options['type'] = $type;
                    $this->options['title'] = $message;
                }
                $session->removeFlash($type);
            }
        } else {
            if (!$this->hasTitle()) {
                throw new InvalidConfigException("The 'title' option is required.");
            }
        }
    }
	
	

    /**
     * @return string|void
     */
    public function run()
    {
        $this->registerAssets();
    }

    /**
     * Register client assets
     */
    protected function registerAssets()
    {
        if ($this->hasTitle()) {
            $view = $this->getView();
            SweetAlertAsset::register($view);
			 
			$js = "console.log({$this->getOptions()});Swal.fire({$this->getOptions()}, {$this->callback});";
            $view->registerJs($js, $view::POS_END);
        }
    }

    /**
     * Get plugin options
     *
     * @return string
     */
    protected function getOptions()
    {
        $this->options['allowOutsideClick'] = ArrayHelper::getValue($this->options, 'allowOutsideClick', $this->allowOutsideClick);
        $this->options['timer'] = ArrayHelper::getValue($this->options, 'timer', $this->timer);
        $this->options['type'] = ArrayHelper::getValue($this->options, 'type', $this->type);
		// yii2 widget add id field, which is not required by sweetalert2
		$this->options = array_diff($this->options, array('w0'));
        return Json::encode($this->options);
    }

    /**
     * @return bool
     */
    private function hasTitle()
    {
        $title = ArrayHelper::getValue($this->options, 'title');

        return !empty($title);
    }
}
