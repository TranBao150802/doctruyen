<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Chapter;
use App\Models\Truyen;
use App\Models\ChapterTruyenTranhModel;
use App\Models\TruyenTranhModel;

class laydulieu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'crawler data using htmldom';

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
        $dom = file_get_html('https://toptruyen.net/truyen-tranh/dao-hai-tac/chapter-1/144571');
        $post = $dom->find('.list-image-detail .page-chapter img');
        $noi_chuoi = "";
        $array_data = array();
        foreach ($post as $key => $value)
        {
            $data_img = $value->src;
            $array_data[] = $data_img;
        }
        $array_data_img = json_encode($array_data, JSON_FORCE_OBJECT);
        //luu vao db
        $insert_data = new ChapterTruyenTranhModel;
        $insert_data->truyen_tranh_id =1;
        $insert_data->img_chapter = $array_data_img;
        $insert_data->save();

        echo "<pre>";   
        print_r($array_data_img);
        echo "<pre>"; 
    }
}
