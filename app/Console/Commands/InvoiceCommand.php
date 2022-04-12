<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\DB;

class InvoiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:invoice';

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

        $datas = DB::SELECT("
            SELECT
                count( id ) AS jumlah,
                supplier_name,
                sum( CASE WHEN STATUS = 'Open' THEN 1 ELSE 0 END ) AS 'open_invoice'
            FROM
                acc_invoice_vendors 
            WHERE
                deleted_at IS NULL 
            GROUP BY
                supplier_name 
            ORDER BY
                jumlah DESC
        ");

        $bcc = [];
        $bcc[1] = 'rio.irvansyah@music.yamaha.com';

        // $cc = [];
        // $cc[0] = 'shega.erik.wicaksono@music.yamaha.com';

        $mail_to = [];
        $mail_to[0] = 'shega.erik.wicaksono@music.yamaha.com';
        $mail_to[1] = 'erlangga.kharisma@music.yamaha.com';

        if (count($datas) > 0) {
            Mail::to($mail_to)->bcc($bcc,'BCC')->send(new SendEmail($datas, 'invoice_command'));
        }
    }
}
