<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    // here i show the  form to create a new user, and return it
        public function show()
        {
            $country = Country::get();
            return view('users/signup', compact('country'));
        }
    
    // here i validate the fields and  save the data of the new user in the database
        public function signup(Request $request)
    { 
        //  validate the input fields
        $validationRules = [
            "firstname" => "required|regex:/^[a-zA-Z\s]+$/",
            "lastname" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:8|max:12",
            "country" => "required",
            "gender" => "required",
            "hobbies" => "required",
        ];
        
        // here i add a loop on field that it will show error step by step 
        foreach($validationRules as $field => $rules){
            $validator= Validator::make($request->all(), [$field=>$rules]);
    
            if($validator->fails()){
                $error= $validator->errors()->first($field);
                return back()->withErrors([$field=>$error])->withInput(); 
            }
        }
        
        //    concatinate the firstname and lastname before saving them into database   
        $fullName = $request->firstname . ' ' . $request->lastname;
        // sending data in database 
        $user = new User();
   
        $user->name = $fullName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->country = $request->country;
        $user->gender = $request->gender;
        $user->hobbies = json_encode($request->hobbies);
        $user->save();
       
        $request->session()->flash('status', 'Your account has been created. Please proceed to login.');
        return redirect('/login');
    }

    // login functionality
        public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $loginvalidation = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        
        foreach($loginvalidation as  $key => $value){
            $validator = Validator::make($request->all(),[$key=>$value]);

            if($validator->fails()){
                $error = $validator->errors()->first($key);
                return back()->withErrors([$key => $error])->withInput();
            }
        }
        $credentials = $request->only('email', 'password');
       
        if (Auth::attempt($credentials)) {
            
            return redirect()->intended('profile'); 
        }   
        return back()->withErrors(['email' => 'Invalid email or password']);
    }


    // here i add logout functionality 
        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/'); // Redirect to the home page after logout
        }

        // here i add the functionality of profile page
        public function showProfile()
    {
        
        $user = auth()->user();
        // dd($user);
        // here i explode the  user data and pass it in view 
        $nameParts = explode(' ', $user->name);
        $firstName = $nameParts[0];
        $lastName = isset($nameParts[1]) ? $nameParts[1] :'';
        //  dd($nameParts );

        // here i join the country and users table for visibility of country at  frontend side.
        $userWithCountry = User::join('country', 'users.country','=','country.id')
                                ->where('users.id',$user->id)
                                ->first();

                                // dd($userWithCountry);
        return view('pages.profile', compact('user', 'userWithCountry' , 'firstName', 'lastName'));
        
    }
    

    
            public function editProfile()
        {
            $user = auth()->user();
            $nameParts = explode(' ', $user->name);
            $firstName = $nameParts[0];
            $lastName = isset($nameParts[1]) ? $nameParts[1] : '' ;
            $userWithCountry = User::join('country', 'users.country','=','country.id')
                                        ->where('users.id',$user->id)
                                        ->first();
            
            return view('pages/profileedit', compact('user' ,'firstName','lastName','userWithCountry' ));
        }
        
            public function updateProfile(Request $request)
            {
                $user = auth()->user();
               
        
                $validatedData = $request->validate([
                    'firstname' => 'required|string',
                    'lastname' => 'required|string', // Allow empty password or change
                    'country' => 'required',
                    'gender' => 'required',
                ]);
            
                // // Update user data
                $user->name = $request->firstname . ' ' . $request->lastname;
                $user->country = $request->country;
                $user->gender = $request->gender;
                $user->hobbies = json_encode($request->hobbies); 
                $user->save();
                dd($user);
                
                return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
            }
    
    

        // UserController.php



public function Profile(Request $request)
{
    $user = auth()->user();
    if ($request->hasFile('profileimage')){
        $filename = time() . "carsafe." . $request->file('profileimage')->getClientOriginalExtension();
        $filePath = $request->file('profileimage')->storeAs('public/uploads', $filename);
        $user->profileimage = $filePath;
        $user->save(); 
        // dd($user);
    }
    
    return redirect()->route('profile')->with('success', 'Profile updated successfully.');
}
}