<?php

namespace Codexshaper\WooCommerce;

use Automattic\WooCommerce\Client;
use Codexshaper\WooCommerce\Traits\WooCommerceTrait;

class WooCommerceApi
{
    use WooCommerceTrait;

    /**
     * @var \Automattic\WooCommerce\Client
     */
    protected $client;

    /**
     * @var array
     */
    protected $headers = [];

    protected $options;

    /**
     * Build Woocommerce connection.
     *
     * @return void
     */
    public function __construct(Options $options)
    {
        try {
            $this->headers = [
                'header_total'       => config('woocommerce.header_total') ?? 'X-WP-Total',
                'header_total_pages' => config('woocommerce.header_total_pages') ?? 'X-WP-TotalPages',
            ];

            $this->setOptions($options);

            $this->client = new Client(
                $this->getOptions()->getStoreURL(),
                $this->getOptions()->getConsumerKey(),
                $this->getOptions()->getConsumerSecret(),
                [
                    'version'           => 'wc/'.config('woocommerce.api_version'),
                    'wp_api'            => config('woocommerce.wp_api_integration'),
                    'verify_ssl'        => config('woocommerce.verify_ssl'),
                    'query_string_auth' => config('woocommerce.query_string_auth'),
                    'timeout'           => config('woocommerce.timeout'),
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 1);
        }
    }

    public function setOptions(Options $options)
    {
        $this->options = $options;

    }

    /**
     * {@inheritdoc}
     */
    public function getOptions(): Options
    {
        return $this->options;
    }
}
