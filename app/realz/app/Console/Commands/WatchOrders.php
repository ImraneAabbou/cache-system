<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Events\NewOrder;
use MongoDB\Client;
use MongoDB\Operation\Watch;

class WatchOrders extends Command
{
    protected $signature = 'watch:orders';
    protected $description = 'Watch for new orders in the MongoDB collection';

    public function handle()
    {
        $this->info('let s begin the hunt...');
        $uri = 'mongodb://localhost:27017/';
        $client = new Client($uri);
        
        $this->info('Connected to MongoDB');
        

        $collection = $client->cache->customerOrders;
        $changeStream = $collection->watch();
        $this->info('Watching for new orders...');

        for ($changeStream->rewind(); true; $changeStream->next()) {
            $this->info('Wheeere aaaaare youuuu ? ');
            sleep(3);
            if ( ! $changeStream->valid()) {
                continue;
            }
    
            $event = $changeStream->current();
        
            $ns = sprintf('%s.%s', $event['ns']['db'], $event['ns']['coll']);
            $id = json_encode($event['documentKey']['_id']);
        
            if ($event['operationType'] == 'insert') {
                    $this->info('gottya ! ');
                    echo json_encode($event['fullDocument']), "\n\n";

                    $order = new Order((array) $event['fullDocument']);

                    event(new NewOrder($order));
                    sleep(5); 
            }
        }


      
       

          
                
            
                
                  

      
        }
    }

