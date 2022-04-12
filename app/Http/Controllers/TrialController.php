<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use iio\libmergepdf\Merger;
use iio\libmergepdf\Driver\TcpdiDriver;
use iio\libmergepdf\Driver\DriverInterface;
use iio\libmergepdf\Source\FileSource;
use iio\libmergepdf\Source\RawSource;
use Response;

class TrialController extends Controller
{
    public function testmail()
	{
		try {
			// $mail = ['mokhamad.khamdan.khabibi@music.yamaha.com',
			// 'rio.irvansyah@music.yamaha.com',
			// 'muhammad.ikhlas@music.yamaha.com',
			// 'nasiqul.ibat@music.yamaha.com'];

			$mail = [
				'mokhamad.khamdan.khabibi@music.yamaha.com',
				'rio.irvansyah@music.yamaha.com',
				'nasiqul.ibat@music.yamaha.com',
				'muhammad.ikhlas@music.yamaha.com'
			]
			;
			$bodyHtml2 = "MIS Test Mail dari MIRAI Online";

			Mail::raw([], function($message) use($bodyHtml2,$mail) {
				$message->from('mis@ympi.co.id', 'PT. Yamaha Musical Products Indonesia');
				$message->to($mail);
				$message->subject('MIS Test Mail');
				$message->setBody($bodyHtml2, 'text/html' );
			});
		} catch (\Exception $e) {
			if ($e instanceof \Swift_TransportException){
				echo '</script>alert("Email Tidak Terkirim")</script>';
			}
		}
	}

	public function trialPdf()
	{
		$depan = "QA Certificate - QA-CER-00013 (YMPI-QA-I-RCD001).pdf";
		$belakang = "QA Certificate Belakang - QA-CER-00013 (YMPI-QA-I-RCD001).pdf";
		$pdfFile1Path = public_path() . "/data_file/qa/certificate/".$depan;
        $pdfFile2Path = public_path() . "/data_file/qa/certificate/".$belakang;

          $merger = new Merger;
	      $merger->addFile($pdfFile1Path);
	      $merger->addFile($pdfFile2Path);
	      
	      $createdPdf = $merger->merge();



	      $pathForTheMergedPdf = public_path() . "/data_file/qa/certificate_fix/QA-CER-00001.pdf";
	      file_put_contents($pathForTheMergedPdf, $createdPdf);

	      
	      $fileNameFromDb = "trial_pdf";

	      return response()->file($pathForTheMergedPdf,[
	          'Content-Disposition' => 'inline; filename="'. $fileNameFromDb .'"'
	        ]);
	      // return new Response($createdPdf, 200, array('Content-Type' => 'application/pdf'));
	}
}
