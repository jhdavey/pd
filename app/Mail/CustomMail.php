<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomMail extends Mailable
{
    use Queueable, SerializesModels;

    public $greeting;
    public $introLines;
    public $actionText;
    public $actionUrl;
    public $outroLines;
    public $salutation;
    public $subject;

    public function __construct($subject, $greeting, $introLines, $actionText, $actionUrl, $outroLines, $salutation)
    {
        $this->subject = $subject;
        $this->greeting = $greeting;
        $this->introLines = $introLines;
        $this->actionText = $actionText;
        $this->actionUrl = $actionUrl;
        $this->outroLines = $outroLines;
        $this->salutation = $salutation;
    }

    public function build()
    {
        return $this->view('emails.custom')
            ->subject($this->subject)
            ->with([
                'greeting' => $this->greeting,
                'introLines' => $this->introLines,
                'actionText' => $this->actionText,
                'actionUrl' => $this->actionUrl,
                'outroLines' => $this->outroLines,
                'salutation' => $this->salutation,
            ]);
    }
}
