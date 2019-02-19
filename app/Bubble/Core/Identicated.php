<?php

namespace App\Bubble\Core;

trait Identicated
{
     /**
     * Get token id
     *
     * @var string
     */
    protected $token = 'token';

     /**
     * Get user id
     * 
     * @var string
     */
    protected $identify = 'id';

    /**
     * Get bridge connector
     *
     * @var string
     */
    protected $bridge = 'bridge';

    /**
     * Get email repository
     *
     * @var string
     */
    protected $mail = 'email';

    /**
     * Create flash contact success
     * 
     * @var string
     */
    protected $senderFlash = 'sendcontact';

    /**
     * Generate token id
     *
     * @var string
     */
    protected $tokenId = 'token_id';

    /**
     * Force redirect url
     *
     * @var string
     */
    protected $signOut = 'logout';

    /**
     * Generate group interact
     *
     * @var string
     */
    protected $react = 'interact';

    /**
     * Generate title notify
     *
     * @var string
     */
    protected $interact = 'Laravel Interact';

    /**
     * Get sender default
     *
     * @var string
     */
    protected $mailer = 'laravel@interact.com';
}
