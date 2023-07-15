<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Voice\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class ByocTrunkContext extends InstanceContext {
    /**
     * Initialize the ByocTrunkContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The unique string that identifies the resource
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['sid' => $sid, ];

        $this->uri = '/ByocTrunks/' . \rawurlencode($sid) . '';
    }

    /**
     * Fetch the ByocTrunkInstance
     *
     * @return ByocTrunkInstance Fetched ByocTrunkInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): ByocTrunkInstance {
        $payload = $this->version->fetch('GET', $this->uri);

        return new ByocTrunkInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Update the ByocTrunkInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ByocTrunkInstance Updated ByocTrunkInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): ByocTrunkInstance {
        $options = new Values($options);

        $data = Values::of([
            'FriendlyName' => $options['friendlyName'],
            'VoiceUrl' => $options['voiceUrl'],
            'VoiceMethod' => $options['voiceMethod'],
            'VoiceFallbackUrl' => $options['voiceFallbackUrl'],
            'VoiceFallbackMethod' => $options['voiceFallbackMethod'],
            'StatusCallbackUrl' => $options['statusCallbackUrl'],
            'StatusCallbackMethod' => $options['statusCallbackMethod'],
            'CnamLookupEnabled' => Serialize::booleanToString($options['cnamLookupEnabled']),
            'ConnectionPolicySid' => $options['connectionPolicySid'],
            'FromDomainSid' => $options['fromDomainSid'],
        ]);

        $payload = $this->version->update('POST', $this->uri, [], $data);

        return new ByocTrunkInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Delete the ByocTrunkInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool {
        return $this->version->delete('DELETE', $this->uri);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Voice.V1.ByocTrunkContext ' . \implode(' ', $context) . ']';
    }
}