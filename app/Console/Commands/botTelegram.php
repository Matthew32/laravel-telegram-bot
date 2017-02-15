<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \Telegram;
class botTelegram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:telegram2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      //307598748
      //$this->info('TELEGRAM BOT!');
      //$updates = Telegram::getUpdates();
      //dd($updates);
      //this make to show a message when command execute
      $now = new \DateTime();
      $json= file_get_contents('https://gamerealese.firebaseio.com/games.json?auth=4xFxq1BtXiGhl64mxcb7cmiTtTBQYhwmLO7930oB');
      $games = json_decode($json);
//get all json from server and make the parser to upload them
      foreach($games as $game){
        /*if($game->photo !=null){
          $uploaded_media = Twitter::uploadMedia(['media' =>file_get_contents($game->photo)]);
      }else{
        $uploaded_media = Twitter::uploadMedia(['media' =>null]);

      }*/
// make the operation to countdown
      $future_date = new \DateTime($game->realese_day);

      $interval = $future_date->diff($now);
// make info in terminal
    $photo = file_get_contents($game->photo);
      Telegram::sendPhoto([
                 'chat_id' => 307598748,
                 'photo' => $game->photo,
	                'caption' => $game->name . '-' .$interval->format("%a days, %h hours, %i minutes, %s seconds"),
             ]);
             $this->info('POST TIME');
    }
  }
}
