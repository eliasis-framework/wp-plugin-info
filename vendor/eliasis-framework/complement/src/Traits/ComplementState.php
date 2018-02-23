<?php
/**
 * PHP library for adding addition of complements for Eliasis Framework.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2017 - 2018 (c) Josantonius - Eliasis Complement
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Eliasis-Framework/Complement
 * @since     1.0.9
 */
namespace Eliasis\Complement\Traits;

use Eliasis\Framework\App;
use Josantonius\Hook\Hook;
use Josantonius\Json\Json;

/**
 * Complement states handler.
 */
trait ComplementState
{
    /**
     * List of complements (status indicators).
     *
     * @var array
     */
    protected $states;

    /**
     * States/actions that will be executed when a complement changes state.
     *
     * @var array
     */
    protected static $statesHandler = [
        'active' => [
            'action' => 'deactivation',
            'state' => 'inactive'
        ],
        'inactive' => [
            'action' => 'activation',
            'state' => 'active'
        ],
        'uninstall' => [
            'action' => 'uninstallation',
            'state' => 'uninstalled'
        ],
        'uninstalled' => [
            'action' => '',
            'state' => 'installed'
        ],
        'installed' => [
            'action' => 'installation',
            'state' => 'inactive'
        ],
        'outdated' => [
            'action' => 'installation',
            'state' => 'updated'
        ],
        'updated' => [
            'action' => 'activation',
            'state' => 'active'
        ],
    ];

    /**
     * Default states.
     *
     * @var array
     */
    protected static $defaultStates = [
        'component' => 'inactive',
        'plugin' => 'inactive',
        'module' => 'inactive',
        'template' => 'inactive',
    ];

    /**
     * Set complement state.
     *
     * @param string $state → complement state
     *
     * @return string → state
     */
    public function setState($state)
    {
        $this->complement['state'] = $state;
        $this->states['state'] = $state;
        $this->setStates();

        return $state;
    }

    /**
     * Change complement state.
     *
     * @uses \Eliasis\Complement\Traits\ComplementAction::doAction()
     *
     * @return string → new state
     */
    public function changeState()
    {
        $this->getStates();

        $actualState = $this->getState();
        $newState = self::$statesHandler[$actualState]['state'];
        $action = self::$statesHandler[$actualState]['action'];

        $this->setState($newState);
        $this->doAction($action);

        return $newState;
    }

    /**
     * Get complement state.
     *
     * @uses \Eliasis\Framework\App::complements()
     * @uses \Eliasis\Complement\Traits\ComplementHandler::getType()
     *
     * @return string → complement state
     */
    public function getState()
    {
        if (isset($this->states['state'])) {
            return $this->states['state'];
        } elseif (isset($this->complement['state'])) {
            return $this->complement['state'];
        }

        $type = self::getType();

        return self::$defaultStates[$type];
    }

    /**
     * Get complements states.
     *
     * @uses \Eliasis\Framework\App::getCurrentID()
     * @uses \Eliasis\Complement\Complement::getCurrentID()
     *
     * @return array → complements states
     */
    public function getStates()
    {
        $appID = App::getCurrentID();
        $complementID = self::getCurrentID();
        $states = $this->getStatesFromFile();

        if (isset($states[$appID][$complementID])) {
            return $this->states = $states[$appID][$complementID];
        }

        return $this->states = [];
    }

    /**
     * Set complements states.
     *
     * @uses \Eliasis\Framework\App::getCurrentID()
     * @uses \Eliasis\Complement\Complement::getCurrentID()
     * @uses \Josantonius\Json\Json::arrayToFile()
     * @uses \Josantonius\Hook\Hook::doAction()
     */
    private function setStates()
    {
        $appID = App::getCurrentID();
        $complementID = self::getCurrentID();

        if (! is_null($this->states)) {
            $states = $this->getStatesFromFile();

            if ($this->stateChanged($states)) {
                $file = $this->getStatesFilePath();
                $states[$appID][$complementID] = $this->states;
                Json::arrayToFile($states, $file);
                Hook::doAction('Eliasis/Complement/after_set_states', $states);
            }
        }
    }

    /**
     * Check if complement state has changed.
     *
     * @param string $states → complement states
     *
     * @uses \Eliasis\Framework\App::getCurrentID()
     * @uses \Eliasis\Complement\Complement::getCurrentID()
     *
     * @return bool
     */
    private function stateChanged($states)
    {
        $appID = App::getCurrentID();
        $complementID = self::getCurrentID();

        if (isset($states[$appID][$complementID])) {
            $actualStates = $states[$appID][$complementID];

            if (! count(array_diff_assoc($actualStates, $this->states))) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get states from json file.
     *
     * @uses \Josantonius\Json\Json::fileToArray()
     *
     * @return array → complements states
     */
    private function getStatesFromFile()
    {
        return Json::fileToArray($this->getStatesFilePath());
    }

    /**
     * Get complements file path.
     *
     * @uses \Eliasis\Framework\App::COMPLEMENT()
     * @uses \Eliasis\Complement\Traits\ComplementHandler::getType()
     *
     * @return string → complements file path
     */
    private function getStatesFilePath()
    {
        $type = self::getType();
        $complementType = self::getType('strtoupper');

        return App::$complementType() . '.' . $type . '-states.jsond';
    }
}
