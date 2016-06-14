<?php

use Illuminate\Database\Seeder;

class SalesDailyReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptions = \Laravel\Cashier\Subscription::all();
        $totals = array();
        foreach ($subscriptions as $index => $subscription) {
            $day = $subscription->created_at->format('Y-m-D');
            $quantity = $subscription->quantity;
            if(array_key_exists($day, $totals)){
                $totals[$day] = $totals[$day] + $quantity;
            } else {
                $totals[$day] = $quantity;
            }
        }
        foreach ($totals as $day => $total) {
            $repdaily = new \App\SaleReportsDaily();
            $repdaily->day = $day;
            $repdaily->total = $total;
            $repdaily->save();
        }
    }
}