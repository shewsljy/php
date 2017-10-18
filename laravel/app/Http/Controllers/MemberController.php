<?php

namespace App\Http\Controllers;

use App\Member;

class MemberController extends Controller
{
    public function info_one ()
    {
        return 'Member info_one!';
    }

    public function info_two ()
    {
        return 'Member info_two!';
    }

    public function info_alias ()
    {
        return route('memberinfo');
    }

    public function info_id ($id)
    {
        return 'Member info_id is ' . $id;
    }

    public function info_view ()
    {
        return view('member/member-info');
    }

    public function info_view_blade ()
    {
        return view('member/info', ['name' => 'jiayu', 'age' => 18]);
    }

    public function model ()
    {
        return Member::getMember();
    }
}
