<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use File;
use Artisan;

class SetupController extends Controller
{
    public function index(Request $request)
    {
        if(env('SESSION_DRIVER') == "file"){
            return view('setup');
        }else{
            return redirect('/login');
        }
    }

    public function create(Request $request)
    {
        $request->validate([
            'app_url' => 'nullable',
            'db_host' => 'nullable',
            'db_name' => 'required',
            'db_user' => 'required',
            'db_password' => 'required',
            'db_port' => 'nullable',
        ]);

        $envPath = base_path('.env');

        if (File::exists($envPath)) {
            $env = File::get($envPath);

            $env = preg_replace('/APP_URL=.*/', 'APP_URL=' . ($request->app_url ?: 'http://localhost'), $env);
            $env = preg_replace('/DB_HOST=.*/', 'DB_HOST=' . $request->db_host, $env);
            $env = preg_replace('/DB_DATABASE=.*/', 'DB_DATABASE=' . $request->db_name, $env);
            $env = preg_replace('/DB_USERNAME=.*/', 'DB_USERNAME=' . $request->db_user, $env);
            $env = preg_replace('/DB_PASSWORD=.*/', 'DB_PASSWORD=' . $request->db_password, $env);
            $env = preg_replace('/DB_PORT=.*/', 'DB_PORT=' . ($request->db_port ?: '3306'), $env);
            $env = preg_replace('/SESSION_DRIVER=.*/', 'SESSION_DRIVER=database', $env);

            File::put($envPath, $env);

            Artisan::call('key:generate');
            Artisan::call('config:clear');
            Artisan::call('config:cache');
            Artisan::call('migrate', ['--force' => true]);
            Artisan::call('db:seed', ['--force' => true]);
        }

        return redirect()->back()->with('success', 'Environment file updated successfully!');
    }

    public function migrate()
    {
        Artisan::call('migrate');
        echo "Migrated Successfully";
        exit();
    }
}