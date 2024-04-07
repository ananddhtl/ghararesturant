<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Carbon\Carbon;

class DeleteDeliveredOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    
    protected $signature = 'app:delete-delivered-orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete delivered orders older than a day';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Delete orders with 'delivered' status and created more than a day ago
        Order::where('food_status', 'delivered')
            ->where('created_at', '<', Carbon::now()->subDay())
            ->delete();

        $this->info('Delivered orders older than a day have been deleted.');
    }
}
