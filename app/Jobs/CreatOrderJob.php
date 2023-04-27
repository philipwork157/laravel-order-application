<?php

namespace App\Jobs;

use App\Models\Address;
use App\Models\MetaData;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingLine;
use App\Models\Taxe;
use App\Models\TaxLine;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CreatOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $payload;

    /**
     * Create a new job instance.
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Log::info('Process Order from Job');

            /**
             * Queue Payload
             */
            $orderData = $this->payload;

            $order = Order::where(['number' => $orderData['number']])->first();
            if ($order) {
                throw new Exception("Skip Order. Order number: {$orderData['number']} already exists");
            }

            /**
             * Process Order
             */
            $order = Order::create($orderData);
            $order_id = $order->id;

            /**
             * Process Order Meta Data
             */
            if (isset($orderData['meta_data']) && !empty($orderData['meta_data'])) {
                foreach ($orderData['meta_data'] as $meta_data) {
                    $meta_data['meta_data_type_id'] = 1;
                    $meta_data['order_id'] = $order_id;
                    MetaData::create($meta_data);
                }
            }

            /**
             * Process Billing
             */
            $billingData = $this->payload['billing'] ?? [];
            if (!empty($billingData)) {
                $this->saveAddress($order_id, 2, $billingData);
            }

            /**
             * Process Shipping
             */
            $shippingData = $this->payload['shipping'] ?? [];
            if (!empty($shippingData)) {
                $this->saveAddress($order_id, 1, $shippingData);
            }

            /**
             * Process Line Items
             */
            $line_items = $this->payload['line_items'] ?? [];
            if (!empty($line_items)) {
                foreach ($line_items as $line_item) {
                    $line_item['order_id'] = $order_id;
                    $orderItem = OrderItem::create($line_item);

                    $order_item_id = $orderItem->id;

                    /**
                     * Process Line Items Meta Data
                     */
                    if (isset($line_item['meta_data']) && !empty($line_item['meta_data'])) {
                        foreach ($line_item['meta_data'] as $meta_data) {
                            $meta_data['meta_data_type_id'] = 3;
                            $meta_data['order_id'] = $order_id;
                            $meta_data['order_item_id'] = $order_item_id;
                            MetaData::create($meta_data);
                        }
                    }

                    /**
                     * Process Line Items Taxes
                     */
                    if (isset($line_item['taxes']) && !empty($line_item['taxes'])) {
                        foreach ($line_item['taxes'] as $taxe) {
                            $taxe['tax_type_id'] = 1;
                            $taxe['order_id'] = $order_id;
                            $taxe['order_item_id'] = $order_item_id;
                            Taxe::create($taxe);
                        }
                    }

                }
            }

            /**
             * Process Tax Lines
             */
            $tax_lines = $this->payload['tax_lines'] ?? [];
            if (!empty($tax_lines)) {
                foreach ($tax_lines as $tax_line) {
                    $tax_line['order_id'] = $order_id;
                    $taxLine = TaxLine::create($tax_line);

                    $tax_line_id = $taxLine->id;

                    /**
                     * Process Tax Lines Meta Data
                     */
                    if (isset($tax_line['meta_data']) && (!empty($tax_line['meta_data']))) {
                        foreach ($tax_line['meta_data'] as $meta_data) {
                            $meta_data['meta_data_type_id'] = 2;
                            $meta_data['order_id'] = $order_id;
                            $meta_data['tax_line_id'] = $tax_line_id;
                            MetaData::create($meta_data);
                        }
                    }
                }
            }

            /**
             * Process Shipping Lines
             */
            $shipping_lines = $this->payload['shipping_lines'] ?? [];
            if (!empty($shipping_lines)) {
                foreach ($shipping_lines as $shipping_line) {
                    $shipping_line['order_id'] = $order_id;
                    $shippingLine = ShippingLine::create($shipping_line);

                    $shipping_line_id = $shippingLine->id;

                    /**
                     * Process Shipping Lines Meta Data
                     */
                    if (isset($shippingLine['meta_data']) && (!empty($shippingLine['meta_data']))) {
                        foreach ($shippingLine['meta_data'] as $meta_data) {
                            $meta_data['meta_data_type_id'] = 4;
                            $meta_data['order_id'] = $order_id;
                            $meta_data['shipping_line_id'] = $shipping_line_id;
                            MetaData::create($meta_data);
                        }
                    }
                }
            }
        } catch (Exception $e) {
            $this->fail($e);
        }
    }

    private function saveAddress($order_id, $address_type_id, $address)
    {
        $address['address_type_id'] = $address_type_id;
        $address['order_id'] = $order_id;
        Address::create($address);
    }

}
