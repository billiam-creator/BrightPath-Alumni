<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    // ─── Dashboard ────────────────────────────────────────────────────────────

    public function index()
    {
        $members = Member::latest()->get();
        return view('dashboard.members.index', compact('members'));
    }

    public function create()
    {
        return view('dashboard.members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'role'  => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'role']);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('members', 'public');
        }

        Member::create($data);

        return redirect()->route('dashboard.members.index')
            ->with('success', 'Member added successfully.');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('dashboard.members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'role'  => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $member = Member::findOrFail($id);
        $data = $request->only(['name', 'role']);

        if ($request->hasFile('photo')) {
            // Remove old photo from storage
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            $data['photo'] = $request->file('photo')->store('members', 'public');
        }

        $member->update($data);

        return redirect()->route('dashboard.members.index')
            ->with('success', 'Member updated successfully.');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);

        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }

        $member->delete();

        return redirect()->route('dashboard.members.index')
            ->with('success', 'Member deleted successfully.');
    }

    // ─── Public ───────────────────────────────────────────────────────────────

    public function showPublicMembers()
    {
        $members = Member::latest()->get();
        return view('members', compact('members'));
    }
}
