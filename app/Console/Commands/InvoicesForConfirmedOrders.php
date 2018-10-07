<?php

namespace App\Console\Commands;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\SupplierPayment;
use Illuminate\Console\Command;

class InvoicesForConfirmedOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoices-for-confirmed-orders:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Invoices for confirmed orders with out invocies';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $orders=Order::where('status','confirmed')->get();
        foreach ($orders as $order)
        {
            //check if order has an invoice
            if (!Invoice::where('order_id', '=', $order->id)->exists()) {
                $invoice=new Invoice();
                $invoice->amount=$order->total_price_after_tax;
                $invoice->order_id=$order->id;
                $invoice->company_id=$order->supplier->company->id;
                $invoice->paid_amount = 0;
                $invoice->remaining_amount = $order->total_price_after_tax;
                $invoice->save();
            }
        }
        $this->info('Create Invoices for confirmed orders with out invocies Successfully!');
    }


}
