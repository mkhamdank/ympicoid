<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $remark;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $remark)
    {
        $this->data = $data;
        $this->remark = $remark;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    
    public function build()
    {
        if($this->remark == 'change_password'){
            return $this->from('mis@ympi.co.id', 'PT. Yamaha Musical Products Indonesia')->subject('Change Password Information (パスワード変更の情報)')->view('mails.change_password');
        }
        if($this->remark == 'vendor'){
            return $this->from('mis@ympi.co.id', 'PT. Yamaha Musical Products Indonesia')->subject('Vendor Covid19 Assessment')->view('mails.vendor_assessment');
        }
        if($this->remark == 'guest'){
            return $this->from('mis@ympi.co.id', 'PT. Yamaha Musical Products Indonesia')
            ->subject('Guest Self Assessment Covid19')
            ->view('mails.guest_assessment')
            ->attach('http://10.109.33.10/ympicoid/public/files/gsa/'.$this->data[0]->file.'');
        }


        if($this->remark == 'send_po_notification'){
            return $this->from('mis@ympi.co.id', 'PT. Yamaha Musical Products Indonesia')
            ->subject($this->data['subject'])
            ->view('raw_material.po_notification');
        }
        if($this->remark == 'send_reminder_notification'){
            return $this->from('mis@ympi.co.id', 'PT. Yamaha Musical Products Indonesia')
            ->subject($this->data['subject'])
            ->view('raw_material.po_reminder_notification');
        }
        if($this->remark == 'send_invoice'){
            $email = $this->from('mis@ympi.co.id', 'PT. Yamaha Musical Products Indonesia')
            ->subject($this->data['subject'])
            ->view('raw_material.send_invoice');
            for ($i=0; $i < count($this->data['ship_doc']); $i++) { 
                $email->attach(public_path('files/raw_material/delivery_order/'.$this->data['ship_doc'][$i]));
            }

            return $email;
        }


        if($this->remark == 'raw_material_send_po'){
            return $this->from('mis@ympi.co.id', 'PT. Yamaha Musical Products Indonesia')
            ->subject($this->data['subject'])
            ->view('materials.mail.po')
            ->attach(public_path('po_list/sap/'.$this->data['attachment']));
        }


        if($this->remark == 'wpos'){
            return $this->from('mis@ympi.co.id', 'PT. Yamaha Musical Products Indonesia')
            ->subject('Work Permit With Enviromental & Safety Analysis')
            ->view('mails.wpos');
            // ->attach('')
        }
    }
}
