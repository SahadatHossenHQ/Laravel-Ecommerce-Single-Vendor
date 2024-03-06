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
            // Run the git reset --hard command
            // $outputReset = shell_exec('GIT_SSH_COMMAND="ssh -i /home/your_cpanel_user/.ssh/id_rsa" git reset --hard');





            // Get the SSH private key string
                $privateKey = setting('license_ssh_key');

                // Create a temporary file to store the private key
                $keyFile = tempnam(sys_get_temp_dir(), 'ssh_key');
                file_put_contents($keyFile, $privateKey);

                // Run the php artisan migrate command with the private key
                $outputMigrate = shell_exec("GIT_SSH_COMMAND=\"ssh -i $keyFile\" git pull");

                // Remove the temporary key file
                unlink($keyFile);





            // Run the git pull command
            // $outputPull = shell_exec('GIT_SSH_COMMAND="ssh -i /home/your_cpanel_user/.ssh/id_rsa" git pull');

            // Run the php artisan migrate command
            $outputMigrate = shell_exec('php artisan migrate');
            $gitstatus = shell_exec('git status');

            // Combine the outputs for display
            $combinedOutput = null;
            // $combinedOutput = '<strong>git reset --hard:</strong><br>' . $outputReset . '<br><br>';
            // $combinedOutput .= '<strong>git pull:</strong><br>' . $outputPull . '<br><br>';
            $combinedOutput .= '<strong>php artisan migrate:</strong><br>' . $outputMigrate;
            $combinedOutput .= '<strong>php artisan migrate:</strong><br>' . $gitstatus;

            // Display the combined output (for debugging purposes)
            return '<pre>' . $combinedOutput . '</pre>';

            
        }else{

            return response()->json(['error' => 'You have not permission to this action'], 401);
        }

        // If conditions are not met, return an error response
    }
}
