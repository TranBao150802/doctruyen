<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Chapter;
use App\Models\Truyen;

class laydulieu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:text';

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
     * @return int
     */
    public function handle()
    {
        $dom = file_get_html('https://www.truyenngan.com.vn/tieu-thuyet/kiem-hiep/925-y-thien-do-long-ky/35833-c1.html');
        $post = $dom->find('.maincontent p');
        $noichuoi = "";
        $getpost = array();
        foreach ($post as $key => $value) {
            $getpost['textpost'] = $noichuoi = $noichuoi . " " . $value ->innertext;
        }
        // luu vao db
         // foreach ($getpost as $key => $value) {
         //             Post::create(['post_content'=>$value]);
         //         }        
        print_r($getpost);
    }
}
