<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
{
    $roles = Role::all();
    return view('roles.index', compact('roles'));
}

public function create()
{
    return view('roles.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:roles',
    ]);

    Role::create([
        'name' => $request->name,
    ]);

    return redirect()->route('roles.index')->with('success', 'Role created successfully.');
}

public function show(Role $role)
{
    return view('roles.show', compact('role'));
}

public function edit(Role $role)
{
    return view('roles.edit', compact('role'));
}

public function update(Request $request, Role $role)
{
    $request->validate([
        'name' => 'required|unique:roles,name,' . $role->id,
    ]);

    $role->update([
        'name' => $request->name,
    ]);

    return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
}

public function destroy(Role $role)
{
    $role->delete();
    return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
}







public function index2()
{
    $stores = Store::all();
    return view('roles.index2', compact('stores'));
}


public function acceptStore($id)
{
    $store = Store::findOrFail($id);
    // Assign the "store" role to the user associated with the store
    $user = User::findOrFail($store->user_id);
    $role = Role::where('name', 'store')->first();
    $role->assignToUser($user);

    // Redirect to the liststores page
    return redirect()->route('roles.listStores')->with('success', 'Store accepted successfully.');
}

public function rejectStore($id)
{
    // Delete the store
    Store::where('id', $id)->delete();

    return redirect()->route('roles.index2')->with('success', 'Store rejected successfully.');
}







public function listStores()
{
    $stores = Store::all();
    return view('list-stores', compact('stores'));
}
public function editStore(Store $store)
{
    return view('edit-store', compact('store'));
}

public function updateStore(Request $request, Store $store)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
    ]);

    $store->name = $request->name;
    $store->description = $request->description;
    $store->save();

    return redirect()->route('roles.index2')->with('success', 'Store updated successfully.');
}

public function destroyStore(Store $store)
{
    $store->delete();

    return redirect()->route('roles.index2')->with('success', 'Store deleted successfully.');
}
public function createStore()
{
    return view('create-store');
}

public function storeStore(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        // Add validation rules for other fields if necessary
    ]);
    
    // Create a new store
    $store = new Store();
    $store->user_id = $request->user_id;
    $store->name = $request->name;
    $store->location_id = $request->location_id;
    $store->description = $request->description;
    $store->cuisine_id = $request->cuisine_id;
    $store->is_accepted = $request->is_accepted ?? null; // Set it as nullable if the value is not provided
    $store->save();
    
    return redirect()->route('roles.index2')->with('success', 'Store created successfully.');

}






public function assignRole(Request $request)
{
    $request->validate([
        'role_id' => 'required|exists:roles,id',
        'user_id' => 'required|exists:users,id',
    ]);

    $role = Role::findOrFail($request->role_id);
    $user = User::findOrFail($request->user_id);

    $role->assignToUser($user); // Assuming you have a method to assign the role to a user in your Role model

    return redirect()->route('roles.index')->with('success', 'Role assigned successfully.');
}

public function showAssignForm()
{
    $roles = Role::all();
    $users = User::all();

    return view('assign-role', compact('roles', 'users'));

}



public function indexUsers()
{
    $users = User::with('roles')->get();
    return view('index-users', compact('users'));
}



public function editUser($id)
{
    $user = User::findOrFail($id);
    $roles = Role::all();

    return view('edit-user', compact('user', 'roles'));
}


public function deleteUserRole($id)
{
    $user = User::findOrFail($id);
    $user->roles()->detach();

    return redirect()->route('roles.indexUsers')->with('success', 'User role deleted successfully.');
}

public function updateUser(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->roles()->sync($request->roles);

    return redirect()->route('roles.indexUsers')->with('success', 'User roles updated successfully.');
}


}
