<?php

namespace App\Http\Controllers;

use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserInfoRequest;
use App\Interfaces\UserInterface;

class UserInfoController extends Controller
{
    
    public function index(UserInterface $userInterface)
    {
      
         self::createXml();
       abort_if(Auth::user()->roles->permissions->manageUser!==1,403);
         $userinfo = $userInterface->findAll();
         return view('user.index',compact('userinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function show($id,UserInterface $userInterface)
    {
        abort_if(Auth::user()->roles->permissions->manageUser!==1,403);
        $userinfo= $userInterface->find($id);
        return view('user.show',compact('userinfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function edit($id,UserInterface $userInterface)
    {
        abort_if(Auth::user()->roles->permissions->manageUser!==1,403);
        $userinfo = $userInterface->find($id);
        return view('user.edit',compact('userinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function update( $id,UserInfoRequest $request,UserInterface $userInterface)
    {
        abort_if(Auth::user()->roles->permissions->manageUser!==1,403);
         $userinfo= $userInterface->find($id);
         $user = $userinfo->users;
         $userinfo->birth_date = $request->birthdate;
         $userinfo->address = $request->address;
         $userinfo->gender = $request->gender;
         $userinfo->contact_no = $request->contactno;
         $userinfo->update();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->roles_id = $request->role;
         $user->update();
         return redirect('/userinfo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createXml(){
        $users = \App\UserInfo::all();
        $xml = new \DOMDocument("1.0");
        $xslt = $xml->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="users.xsl"');
        $xml->appendChild($xslt);
        $root = $xml->createElement("Users");
        $xml->appendChild($root);

        foreach ($users as &$tempUser) {
            
        $id = $xml->createElement("id");
        $idText = $xml->createTextNode($tempUser->users->id);
        $id->appendChild($idText);

        $name = $xml->createElement("name");
        $nameText = $xml->createTextNode($tempUser->users->name);
        $name->appendChild($nameText);

        $email = $xml->createElement("email");
        $emailText = $xml->createTextNode($tempUser->users->email);
        $email->appendChild($emailText);

        $contact = $xml->createElement("contact");
        $contactText = $xml->createTextNode($tempUser->contact_no);
        $contact->appendChild($contactText);

            $gender = $xml->createElement("gender");
            $genderText = $xml->createTextNode($tempUser->gender);
            $gender->appendChild($genderText);

            $address = $xml->createElement("address");
            $addressText = $xml->createTextNode($tempUser->address);
            $address->appendChild($addressText);

            $birthdate = $xml->createElement("birthdate");

            $year = $xml->createElement("year");
            $yearText = $xml->createTextNode(date('Y',strtotime($tempUser->birth_date)));
            $year->appendChild($yearText);

            $month = $xml->createElement("month");
            $monthText = $xml->createTextNode(date('m',strtotime($tempUser->birth_date)));
            $month->appendChild($monthText);

            $day = $xml->createElement("day");
            $dayText = $xml->createTextNode(date('d',strtotime($tempUser->birth_date)));
            $day->appendChild($dayText);

            $birthdate->appendChild($year);
            $birthdate->appendChild($month);
            $birthdate->appendChild($day);

            $role = $xml->createElement("role");

            $roleid = $xml->createElement("id");
            $roleidText = $xml->createTextNode($tempUser->users->roles->id);
            $roleid->appendChild($roleidText);

            $roleTitle = $xml->createElement("title");
            $roleTitleText = $xml->createTextNode($tempUser->users->roles->title);
            $roleTitle->appendChild($roleTitleText);

            $roleDesc = $xml->createElement("description");
            $roleDescText = $xml->createTextNode($tempUser->users->roles->description);
            $roleDesc->appendChild($roleDescText);

            $role->appendChild($roleid);
            $role->appendChild($roleTitle);
            $role->appendChild($roleDesc);



        $user = $xml->createElement("user");
        $user->appendChild($id);
        $user->appendChild($name);
        $user->appendChild($email);
        $user->appendChild($contact);
        $user->appendChild($gender);
        $user->appendChild($address);
        $user->appendChild($birthdate);
        $user->appendChild($role);

        $root->appendChild($user);
        }
        $xml->formatOutput = True;
         // echo  $xml->saveXML();
        $xml->save("users.xml") or die("Error");
    }
}
