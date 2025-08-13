<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // 🔒 Dashboard: list all members
    public function index()
    {
        $members = Member::latest()->get();
        return view('dashboard.members.index', compact('members'));
    }

    // 🔒 Dashboard: show form to create a member
    public function create()
    {
        return view('dashboard.members.create');
    }

    // 🔒 Dashboard: store new member
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'role']);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('members', 'public');
        }

        Member::create($data);

        return redirect()->route('dashboard.members.index')->with('success', 'Member added successfully.');
    }

    // 🔒 Dashboard: show form to edit a member
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('dashboard.members.edit', compact('member'));
    }

    // 🔒 Dashboard: update member info
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $member = Member::findOrFail($id);
        $data = $request->only(['name', 'role']);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('members', 'public');
        }

        $member->update($data);

        return redirect()->route('dashboard.members.index')->with('success', 'Member updated successfully.');
    }

    // 🔒 Dashboard: delete a member
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('dashboard.members.index')->with('success', 'Member deleted successfully.');
    }

    // 🌐 Public page: show all members
    public function showPublicMembers()
    {
        $members = Member::latest()->get();
        return view('members', compact('members'));
    }
}
