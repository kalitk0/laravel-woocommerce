<?php
/**
 * laravel-woocommerce
 * Options.php
 *
 * PHP Version 5
 *
 * @category Production
 * @package  Default
 * @date     23.01.25 18:47
 * @license  http://laravel-woocommerce.com/license.txt laravel-woocommerce License
 * @version  GIT: 1.0
 * @link     http://laravel-woocommerce.com/
 */

namespace Codexshaper\WooCommerce;

class Options
{
    protected $store_url;
    protected $consumer_key;
    protected $consumer_secret;

    public function setStoreURL(string $storeUrl): self
    {
        $this->storeUrl = $storeUrl;

        return $this;
    }

    public function getStoreURL()
    {
        return $this->storeUrl;
    }

    public function setConsumerKey(string $consumerKey): self
    {
        $this->consumerKey = $consumerKey;

        return $this;
    }

    public function getConsumerKey()
    {
        return $this->consumerKey;
    }

    public function setConsumerSecret(string $consumerSecret): self
    {
        $this->consumerSecret = $consumerSecret;

        return $this;
    }

    public function getConsumerSecret()
    {
        return $this->consumerSecret;
    }
}