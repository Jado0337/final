<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Preview\Wireless\CommandList;
use Twilio\Rest\Preview\Wireless\RatePlanList;
use Twilio\Rest\Preview\Wireless\SimList;
use Twilio\Version;

/**
 * @property CommandList $commands
 * @property RatePlanList $ratePlans
 * @property SimList $sims
 * @method \Twilio\Rest\Preview\Wireless\CommandContext commands(string $sid)
 * @method \Twilio\Rest\Preview\Wireless\RatePlanContext ratePlans(string $sid)
 * @method \Twilio\Rest\Preview\Wireless\SimContext sims(string $sid)
 */
class Wireless extends Version {
    protected $_commands;
    protected $_ratePlans;
    protected $_sims;

    /**
     * Construct the Wireless version of Preview
     *
     * @param Domain $domain Domain that contains the version
     */
    public function __construct(Domain $domain) {
        parent::__construct($domain);
        $this->version = 'wireless';
    }

    protected function getCommands(): CommandList {
        if (!$this->_commands) {
            $this->_commands = new CommandList($this);
        }
        return $this->_commands;
    }

    protected function getRatePlans(): RatePlanList {
        if (!$this->_ratePlans) {
            $this->_ratePlans = new RatePlanList($this);
        }
        return $this->_ratePlans;
    }

    protected function getSims(): SimList {
        if (!$this->_sims) {
            $this->_sims = new SimList($this);
        }
        return $this->_sims;
    }

    /**
     * Magic getter to lazy load  resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws TwilioException For unknown resource
     */
    public function __get(string $name) {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown resource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments): InstanceContext {
        $property = $this->$name;
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Preview.Wireless]';
    }
}