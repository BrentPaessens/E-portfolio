<?php

namespace App\Helpers;

use App\Models\Evenement;
use Storage;

class Cart
{
    private static array $cart = [
        'events' => [],
        'totalQty' => 0,
        'totalPrice' => 0
    ];

    // initialize the cart
    public static function init(): void
    {
        self::$cart = session()->get('cart') ?? self::$cart;
    }

    // add event to the cart
    public static function add(Evenement $event): void
    {
        $singlePrice = $event->prijs;
        if (array_key_exists($event->id, self::$cart['events'])) {
            self::$cart['events'][$event->id]['qty']++;
            self::$cart['events'][$event->id]['prijs'] += $singlePrice;
        } else {
            self::$cart['events'][$event->id] = [
                'id' => $event->id,
                'naam' => $event->naam,
                'locatie' => $event->locatie,
                'prijs' => $singlePrice,
                'qty' => 1
            ];
        }
        self::updateTotal();
    }

    // decrease the quantity of an event in the cart
    public static function decrease(Evenement $event)
    {
        if (array_key_exists($event->id, self::$cart['events'])) {
            self::$cart['events'][$event->id]['qty']--;
            self::$cart['events'][$event->id]['prijs'] -= $event->prijs;

            if(self::$cart['events'][$event->id]['qty'] == 0) {
                unset(self::$cart['events'][$event->id]);
            }
            self::updateTotal();
        }
    }

    // re-calculate the total quantity and price of records in the cart
    private static function updateTotal(): void
    {
        $totalQty = 0;
        $totalPrice = 0;
        foreach (self::$cart['events'] as $event) {
            $totalQty += $event['qty'];
            $totalPrice += $event['prijs'];
        }
        self::$cart['totalQty'] = $totalQty;
        self::$cart['totalPrice'] = $totalPrice;
        session()->put('cart', self::$cart);   // store the cart in the session
    }

    // get the complete cart
    public static function getCart(): array
    {
        return self::$cart;
    }

    // get all the events from the cart
    public static function getEvents(): array
    {
        return self::$cart['events'];
    }

    // get one record from the cart
    public static function getOneEvent($key = 0): array
    {
        if (array_key_exists($key, self::$cart['events'])) {
            return self::$cart['events'][$key];
        }
        return [];
    }

    // get all the event keys
    public static function getKeys(): array
    {
        return array_keys(self::$cart['events']);
    }

    // get total quantity of events in the cart
    public static function getTotalQty(): int
    {
        return self::$cart['totalQty'];
    }

    // get total price of events in the cart
    public static function getTotalPrice(): float
    {
        return self::$cart['totalPrice'];
    }

    public  static function empty()
    {
        session()->forget('cart');
    }

}
Cart::init();
