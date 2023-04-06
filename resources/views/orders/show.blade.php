<?php

?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order summary') }} for {{ $order->user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight underline">Order Details</h2>

                    <div class="mt-2">
                        <p><b>Number:</b> {{ $order->id }} </p>
                        <p><b>Status:</b> {{ $order->processingStatus->description }} </p>
                        <p><b>Currency:</b> {{ $order->currency->description }} </p>
                        <p><b>Shipping Total:</b> R{{ number_format($order->shipping_total, 2) }} </p>
                        <p><b>Shipping Tax:</b> R{{ number_format($order->shipping_tax, 2) }} </p>
                        <p><b>Cart Tax:</b> R{{ number_format($order->cart_tax, 2) }} </p>
                        <p><b>Total:</b> R{{ number_format($order->total, 2) }} </p>
                        <p><b>Total Tax:</b> R{{ number_format($order->total_tax, 2) }} </p>
                        <p><b>pricing Include Tax:</b> {{ $order->price_include_tax }} </p>
                        <p><b>Payment Method:</b> {{ $order->payment_method }} </p>
                        <p><b>Payment Method Title:</b> {{ $order->payment_method_title }} </p>
                        <p><b>Date Paid:</b> {{ $order->date_paid }} </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight underline">Transaction Details</h2>

                    <div class="mt-2">
                        <?php
                            $transactionsArr = $order->transactions;

                             if ($transactionsArr) {
                                foreach ($transactionsArr as $transactions) {
                                    ?>
                                    <p><b>Amount:</b> R{{ number_format($transactions->amount, 2) }} </p>
                                    <p><b>Payment Method:</b> {{ $transactions->payment_method }} </p>
                                    <p><b>Payment Gateway:</b> {{ $transactions->payment_gateway }} </p>
                                    <p><b>Transaction Type:</b> {{ $transactions->transactionType->description }} </p>
                                    <p><b>Transaction Status:</b> {{ $transactions->transactionStatus->description }} </p>
                                    <p><b>Currency:</b> {{ $transactions->currency->description }} </p>
                                    <?php
                                }
                             }
                        ?>
                    </div>
                </div>
            </div>
        </div>

         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight underline">Billing Details</h2>

                    <div class=" mt-2">
                        <?php
                            $billingDetails = $order->addresses()->where(['address_type_id' => 2])->first();

                            if ($billingDetails) {
                            ?>
                                <p><b>User:</b> {{ $billingDetails->first_name . " " . $billingDetails->last_name }} </p>
                                <p><b>Company:</b> {{ $billingDetails->company }} </p>
                                <p><b>Address 1:</b> {{ $billingDetails->address_1 }} </p>
                                <p><b>Address 2:</b> {{ $billingDetails->address_2 }} </p>
                                <p><b>City:</b> {{ $billingDetails->city }} </p>
                                <p><b>State:</b> {{ $billingDetails->state }} </p>
                                <p><b>Country:</b> {{ $billingDetails->country }} </p>
                                <p><b>Post code:</b> {{ $billingDetails->postcode }} </p>
                                <p><b>Email:</b> {{ $billingDetails->email }} </p>
                                <p><b>Phone:</b> {{ $billingDetails->phone }} </p>
                            <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight underline">Shipping Details</h2>

                    <div class=" mt-2">
                        <?php
                            $shippingDetails = $order->addresses()->where(['address_type_id' => 1])->first();

                             if ($shippingDetails) {
                                ?>
                                <p><b>User:</b> {{ $shippingDetails->first_name . " " . $shippingDetails->last_name }} </p>
                                <p><b>Company:</b> {{ $shippingDetails->company }} </p>
                                <p><b>Address 1:</b> {{ $shippingDetails->address_1 }} </p>
                                <p><b>Address 2:</b> {{ $shippingDetails->address_2 }} </p>
                                <p><b>City:</b> {{ $shippingDetails->city }} </p>
                                <p><b>State:</b> {{ $shippingDetails->state }} </p>
                                <p><b>Country:</b> {{ $shippingDetails->country }} </p>
                                <p><b>Post code:</b> {{ $shippingDetails->postcode }} </p>
                                <p><b>Email:</b> {{ $shippingDetails->email }} </p>
                                <p><b>Phone:</b> {{ $shippingDetails->phone }} </p>
                                <?php
                             }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight underline">Order Items</h2>
                    <?php

                    $orderItemsArr = $order->orderItems;

                    if ($orderItemsArr) {
                        foreach ($orderItemsArr as $orderItem) {
                            ?>
                            <div class=" mt-2">
                                <p><b>Name:</b> {{ $orderItem->name }} </p>
                                <p><b>Quantity:</b> {{ $orderItem->quantity }} </p>
                                <p><b>Tax Class:</b> {{ $orderItem->tax_class }} </p>
                                <p><b>Subtotal:</b> R{{ number_format($orderItem->subtotal, 2) }} </p>
                                <p><b>Subtotal tax:</b> R{{ number_format($orderItem->subtotal_tax, 2) }} </p>
                                <p><b>Total:</b> R{{ number_format($orderItem->total, 2) }} </p>
                                <p><b>Total axe:</b> R{{ number_format($orderItem->total_tax, 2) }} </p>
                                <p><b>Price:</b> R{{ number_format($orderItem->price, 2) }} </p>
                                <p><b>Sku:</b> {{ $orderItem->sku }} </p>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight underline">Tax Lines</h2>
                    <?php
                        $taxLines = $order->taxLines;

                        if ($taxLines) {
                            foreach ($taxLines as $taxLine) {

                                $rateItem = $taxLine->rate;

                                ?>
                                <div class=" mt-2">
                                    <p><b>Label:</b> {{ $taxLine->label }} </p>
                                    <p><b>Rate Code:</b> {{ $rateItem->rate_code }} </p>
                                    <p><b>Rate:</b> {{ $rateItem->rate }} </p>
                                    <p><b>Compound:</b> {{ $taxLine->compound }} </p>
                                    <p><b>Tax total:</b> R{{ number_format($taxLine->tax_total, 2) }} </p>
                                    <p><b>Shipping tax total:</b> R{{ number_format($taxLine->shipping_tax_total, 2) }} </p>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight underline">Shipping Lines</h2>
                    <?php
                        $shippingLines = $order->shippingLines;

                        if ($shippingLines) {
                            foreach ($shippingLines as $shippingLine) {

                                $methodItems = App\Models\Method::find(['id' => $shippingLine->method_id])->all();

                                ?>
                                <div class="mt-2">
                                    <p><b>Total:</b> R {{ $shippingLine->total }} </p>
                                    <p><b>Total tax:</b> R {{ $shippingLine->total_tax }} </p>

                                    <div class="mt-2">
                                        <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight underline">Methods</h3>

                                        <?php
                                        if ($methodItems) {
                                            foreach ($methodItems as $methodItem) {
                                                ?>
                                                <p><b>Method description:</b> {{ $methodItem->method_description }} </p>
                                                <p><b>Method rate:</b> R{{ number_format($methodItem->rate, 2) }} </p>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
