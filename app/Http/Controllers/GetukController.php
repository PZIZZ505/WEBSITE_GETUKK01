<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetukController extends Controller
{
    // Halaman utama
    public function index()
    {
        return view('getuk.index');
    }

    // Halaman produk
    public function produk()
    {
        return view('getuk.produk');
    }

    // Halaman detail produk
    public function detail($id)
    {
        return view('getuk.detail', ['productId' => $id]);
    }

    // Login page
    public function login()
    {
        return view('auth.login');
    }

    // Process login
    public function loginProcess(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // TODO: Implement authentication with database
        $localPart = explode('@', $validated['email'])[0];
        $firstName = ucfirst($localPart);

        $userSession = array_merge(
            [
                'email' => $validated['email'],
                'name' => $firstName,
                'first_name' => $firstName,
                'last_name' => '',
                'phone' => '0812-3456-7890',
                'address' => 'Jl. Contoh No. 123',
                'city' => 'Jakarta',
                'postal_code' => '12345',
            ],
            session('user', [])
        );

        session(['user' => $userSession]);

        return redirect()->route('getuk.index')->with('success', 'Login berhasil!');
    }

    // Register page
    public function register()
    {
        return view('auth.register');
    }

    // Process register
    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'password' => 'required|min:8|confirmed',
            'terms' => 'required',
        ]);

        session(['user' => [
            'email' => $validated['email'],
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'phone' => $validated['phone'] ?? '',
            'address' => $validated['address'] ?? '',
            'city' => $validated['city'] ?? '',
            'postal_code' => $validated['postal_code'] ?? '',
        ]]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Logout
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('getuk.index')->with('success', 'Logout berhasil!');
    }

    // Profile page
    public function profile()
    {
        if (!session('user')) {
            return redirect()->route('login');
        }

        return view('auth.profile', ['user' => session('user')]);
    }

    // Update profile
    public function profileUpdate(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
        ]);

        session(['user' => [
            'email' => session('user')['email'] ?? '',
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'postal_code' => $validated['postal_code'],
        ]]);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}