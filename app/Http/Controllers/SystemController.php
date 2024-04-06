<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SystemController extends Controller
{


    public function updateIndex(){
        return view('admin.system.updateIndex');
    }



    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'password' => 'required|string',
        ]);

        $user = Auth::user();
        // Check conditions: user password, role_id, and desig
        if ($user && password_verify($request->password, $user->password) && $user->role_id == 1 && $user->desig == 1) {
            chdir(base_path());

            // Get the SSH private key string
            $privateKey = setting('license_ssh_key');
            
            
            $pwd = shell_exec('pwd');
            // $gitstatus = shell_exec('git status');
            // $git_reset_hard = shell_exec('git reset --hard');
            // $gitstatus_after_reset = shell_exec('git status');
            // $keyFile = tempnam(sys_get_temp_dir(), 'ssh_key'); // Create a temporary file to store the private key
            // file_put_contents($keyFile, $privateKey); // File putting to $keyFile
            // $git_pull = shell_exec("GIT_SSH_COMMAND=\"ssh -i $keyFile\" git pull"); // Run the php artisan migrate command with the private key
            // unlink($keyFile); // Remove the temporary key file
            // $gitstatus_after_pull = shell_exec('git status');
            // $db_migrate = shell_exec('php artisan migrate');
            // $lara_optimize = shell_exec('php artisan optimize');

            // Combine the outputs for display
            $combinedOutput = null;
            $combinedOutput .= '<strong>Location:</strong><br>' . $pwd . '<br><br>';
            // $combinedOutput .= '<strong>Git status:</strong><br>' . $gitstatus . '<br><br>';
            // $combinedOutput .= '<strong>Git reset hard:</strong><br>' . $git_reset_hard . '<br><br>';
            // $combinedOutput .= '<strong>Git status after reset:</strong><br>' . $gitstatus_after_reset . '<br><br>';
            // $combinedOutput .= '<strong>Git pull:</strong><br>' . $git_pull . '<br><br>';
            // $combinedOutput .= '<strong>Git status after pull:</strong><br>' . $gitstatus_after_pull . '<br><br>';
            // $combinedOutput .= '<strong>DB Migrate:</strong><br>' . $db_migrate . '<br><br>';
            // $combinedOutput .= '<strong>Optimize:</strong><br>' . $lara_optimize . '<br><br>';

            // Display the combined output (for debugging purposes)
            return '<pre>' . $combinedOutput . '</pre>';

        }else{

            return response()->json(['error' => 'You have not permission to this action'], 401);
        }

        // If conditions are not met, return an error response
    }
}
