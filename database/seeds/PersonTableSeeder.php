<?php

//use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;
use App\Person;
use Illuminate\Support\Facades\DB;

class PersonTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'person';
        $this->filename = base_path().'/database/seeds/csvs/first_batch.csv';
        $this->csv_delimiter = ',';
        $this->should_trim = true;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recommended when importing larger CSVs
        // DB::disableQueryLog();

        // Uncomment the below to wipe the table clean before populating
        DB::table($this->table)->truncate();

        parent::run();
    }
}
