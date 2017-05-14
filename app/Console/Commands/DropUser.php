<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

/**
 * ユーザーを追加するコマンド
 *
 * @author 2ndwave.imamura
 * @example php artisan drop:user -u yuki
 */
class DropUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'drop:user {--u|user=} {--e|email=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop user';

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
        $email    = $this->option('email');

        while (empty($name) && empty($email)) {
            $name = $this->ask('ユーザー名を入力してください。');
        }

        if ($name) {
            if ($user = User::where('name', $name)->first()) {
                $user->delete();
                $this->info("[$user->id][$name] ユーザーを削除しました。");
            } else {
                $this->warn("[$name] ユーザー名が存在しません。");
            }
        }

        if ($email) {
            if ($user = User::where('email', $email)->first()) {
                $user->delete();
                $this->info("[$user->id][$email] ユーザーを削除しました。");
            } else {
                $this->warn("[$email] メールアドレスが存在しません。");
            }
        }

        return true;
    }
}
