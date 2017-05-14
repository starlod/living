<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

/**
 * ユーザーを追加するコマンド
 *
 * @author 2ndwave.imamura
 * @example php artisan add:user -u yuki -p secret -e starlod.ggl@gmail.com
 */
class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:user {--u|user=} {--p|password=} {--e|email=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add user';

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
        $name     = $this->option('user');
        $password = $this->option('password');
        $email    = $this->option('email');

        while (empty($name)) {
            $name = $this->ask('ユーザー名を入力してください。');
        }

        while (empty($password)) {
            $password = $this->secret('パスワードを入力してください。');
        }

        while (empty($email)) {
            $email = $this->ask('メールアドレスを入力してください。');
        }

        if (User::isExists(compact('name', 'email'))) {
            $this->error('ユーザー名またはメールアドレスが既に登録されています。');
            return false;
        }

        if ($user = User::add(compact('name', 'password', 'email'))) {
            $this->info("[$user->id] $name<$email> ユーザーを登録しました。");
            logger()->info("[$user->id] $name<$email> ユーザーを登録しました。");
            return true;
        }

        $this->error("$name<$email> ユーザーの登録に失敗しました。");

        return false;
    }
}
