<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class TeacherRegisterController extends Controller
{
  public function create()
  {
      return view('auth.teacher-register');
  }
  public function showType(){
    return view('auth.register-type');

  }

  public function register(Request $request)
  {
      $request->validate([
          'name'         => 'required|string|max:255',
          'email'        => 'required|string|email|max:255|unique:users',
          'password'     => 'required|string|min:8|confirmed',
          'address'      => 'nullable|string|max:255',
          'specialization' => 'nullable|string|max:255',
          'experience'   => 'nullable|string',
          'cv'           => 'nullable|file|mimes:pdf,doc,docx|max:2048',
          'image'        => 'nullable|image|max:2048',
      ]);

      // 1. إنشاء المستخدم
      $user = User::create([
          'name'     => $request->name,
          'email'    => $request->email,
          'password' => Hash::make($request->password),
          'status'   => 'pending', // بانتظار موافقة المشرف
      ]);

      $user->assignRole('teacher');

      // 2. رفع الملفات
      $cvPath = null;
      $imagePath = null;
      if ($request->hasFile('cv'))
      {
        $cvPath = $request->file('cv')->store('teachers/cv', 'public');

      }
      if ($request->hasFile('image'))
      {
        $imagePath = $request->file('image')->store('teachers/images', 'public');

      }

      // 3. إنشاء ملف المدرس
      Teacher::create([
          'user_id'        => $user->id,
          'address'        => $request->address,
          'specialization' => $request->specialization,
          'experience'     => $request->experience,
          'cv'             => $cvPath,
          'image'          => $imagePath
      ]);

      return redirect()->route('login');
  }
}
