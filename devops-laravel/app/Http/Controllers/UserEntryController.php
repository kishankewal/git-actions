<?php

namespace App\Http\Controllers;

use App\Models\UserEntry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserEntryController extends Controller
{
    public function index(): View
    {
        $entries = UserEntry::latest()->get();

        return view('user_entries.index', compact('entries'));
    }

    public function create(): View
    {
        return view('user_entries.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:user_entries,email'],
        ]);

        UserEntry::create($validated);

        return redirect()->route('user-entries.index')->with('success', 'User entry created successfully.');
    }

    public function edit(UserEntry $userEntry): View
    {
        return view('user_entries.edit', compact('userEntry'));
    }

    public function update(Request $request, UserEntry $userEntry): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:user_entries,email,' . $userEntry->id],
        ]);

        $userEntry->update($validated);

        return redirect()->route('user-entries.index')->with('success', 'User entry updated successfully.');
    }

    public function destroy(UserEntry $userEntry): RedirectResponse
    {
        $userEntry->delete();

        return redirect()->route('user-entries.index')->with('success', 'User entry deleted successfully.');
    }
}