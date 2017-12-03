<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Mail\Markdown;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendRegisteredEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
//        $view = 'emails.register';
        $data['user'] = $event->user;
//        $from = 'aufree@yousails.com';
//        $name = 'Aufree';
        $to = $event->user->email;
        $subject = "感谢注册 LaravelLearn！请确认你的邮箱。";
        $message = (new MailMessage())
            ->line('感谢您在 '. config('app.name') .' 网站进行注册！')
            ->line('请点击下面的链接完成注册：')
            ->action('验证邮箱', route('confirm_email', ['confirm_code' => $event->user->email_confirm_code]))
            ->line('如果这不是您本人的操作，请忽略此邮件。');
        $markdown = app()->make(Markdown::class);
        $view = [
            'html' => $markdown->render($message->markdown, $message->data()),
            'text' => $markdown->renderText($message->markdown, $message->data()),
        ];

        Mail::send($view, $data, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });

    }
}
