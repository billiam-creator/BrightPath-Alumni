@extends('dashboard.layout')
@section('title', 'Members')

@section('content')
<div class="page-header d-flex justify-content-between align-items-start">
    <div>
        <h1>Members</h1>
        <p>Manage alumni members</p>
    </div>
    <a href="{{ route('dashboard.members.create') }}" class="btn-add">
        <i class="fa fa-plus"></i> Add Member
    </a>
</div>

@if(session('success'))
    <div class="alert-success"><i class="fa fa-check-circle"></i> {{ session('success') }}</div>
@endif

<div class="dash-card p-0 overflow-hidden">
    <table class="dash-table">
        <thead>
            <tr>
                <th>Member</th>
                <th>Role</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td style="font-weight:500;">{{ $member->name }}</td>
                    <td>
                        @if($member->role)
                            <span style="background:#dbeafe;color:#1d4ed8;padding:0.2rem 0.6rem;border-radius:99px;font-size:0.775rem;font-weight:500;">
                                {{ $member->role }}
                            </span>
                        @else
                            <span style="color:#94a3b8;font-size:0.8rem;">—</span>
                        @endif
                    </td>
                    <td>
                        @if($member->photo)
                            <img src="{{ asset('storage/' . $member->photo) }}"
                                 class="rounded-circle"
                                 style="width:40px;height:40px;object-fit:cover;border:2px solid #e2e8f0;">
                        @else
                            <div style="width:40px;height:40px;border-radius:50%;background:#ede9fe;display:flex;align-items:center;justify-content:center;font-weight:700;color:#7c3aed;font-size:0.9rem;">
                                {{ strtoupper(substr($member->name, 0, 1)) }}
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('dashboard.members.edit', $member->id) }}" class="btn-edit">
                                <i class="fa fa-pen me-1"></i>Edit
                            </a>
                            <form action="{{ route('dashboard.members.destroy', $member->id) }}" method="POST"
                                  onsubmit="return confirm('Delete this member?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-delete">
                                    <i class="fa fa-trash me-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center;padding:3rem;color:#94a3b8;">
                        <i class="fa fa-users fa-2x mb-2 d-block"></i>
                        No members yet. <a href="{{ route('dashboard.members.create') }}" style="color:#4f46e5;">Add your first member</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
