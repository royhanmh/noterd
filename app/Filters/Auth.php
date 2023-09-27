<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        // Check if the user is not logged in and is not accessing the 'auth' route
        if (!session()->get('username') && $request->uri->getSegment(1) !== 'auth') {
            // Redirect to the login page
            $session->setFlashdata('failed', 'You Must Login First');
            return redirect()->to('auth');
        }

        // Check if the user is logged in and has a role value of 1 (or any other value you want to allow)
        if (session()->get('role') == "1" && $request->uri->getSegment(1) !== 'user') {
            // Redirect to the 'user' page
            return redirect()->to('user');
        }

        // Check if the user is logged in and has a role value of 0
        if (session()->get('role') == "0" && $request->uri->getSegment(1) === 'auth') {
            // Redirect to some other page or display an error message
            return redirect()->to('admin/dashboard'); // Replace 'user' with the appropriate page or URL
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here

    }
}
