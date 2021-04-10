<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <button class="btn btn-primary shadow-md mr-2">Add New User</button>
        <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
            </div>
        </div>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">NAME</th>
                    <th class="whitespace-nowrap">EMAIL</th>
                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="text-center whitespace-nowrap"># ROLES</th>
                    @if(config('laratrust.panel.assign_permissions_to_user'))
                    <th class="text-center whitespace-nowrap"># Permissions</th>
                    @endif
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="intro-x">
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ $user->name ?? 'The model doesn\'t have a `name` attribute'}} </a>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td class="w-40">
                            <div class="flex items-center justify-center {{ $user->active ? 'text-theme-9' : 'text-theme-6' }}">
                                <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ $user->active ? 'Active' : 'Inactive' }}
                            </div>
                        </td>
                        <td class="text-center whitespace-nowrap">{{$user->roles_count}}</td>
                        @if(config('laratrust.panel.assign_permissions_to_user'))
                            <td class="text-center whitespace-nowrap">
                                {{$user->permissions_count}}
                            </td>
                        @endif
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <button wire:click='edit({{$user->id}})' class="flex items-center mr-3">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </button>
                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <ul class="pagination">
            <li>
                <a class="pagination__link" href="">
                    <i class="w-4 h-4" data-feather="chevrons-left"></i>
                </a>
            </li>
            <li>
                <a class="pagination__link" href="">
                    <i class="w-4 h-4" data-feather="chevron-left"></i>
                </a>
            </li>
            <li>
                <a class="pagination__link" href="">...</a>
            </li>
            <li>
                <a class="pagination__link" href="">1</a>
            </li>
            <li>
                <a class="pagination__link pagination__link--active" href="">2</a>
            </li>
            <li>
                <a class="pagination__link" href="">3</a>
            </li>
            <li>
                <a class="pagination__link" href="">...</a>
            </li>
            <li>
                <a class="pagination__link" href="">
                    <i class="w-4 h-4" data-feather="chevron-right"></i>
                </a>
            </li>
            <li>
                <a class="pagination__link" href="">
                    <i class="w-4 h-4" data-feather="chevrons-right"></i>
                </a>
            </li>
        </ul>
        <select class="w-20 form-select box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div>
    <!-- END: Pagination -->
    {{-- {{dd($roles)}} --}}
    <div wire:model='isModalEditRole' class="modal" tabindex="-1" aria-hidden="true">
        <div class="flex flex-col">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-32">
              <form
                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200 p-8"
              >
                <label class="block">
                  <span class="text-gray-700">Name</span>
                  <input
                    class="form-input mt-1 block w-full bg-gray-200 text-gray-600"
                    name="name"
                    placeholder="this-will-be-the-code-name"
                    value="{{$user->name ?? 'The model doesn\'t have a `name` attribute'}}"
                    readonly
                    autocomplete="off"
                  >
                </label>
                <span class="block text-gray-700 mt-4">Roles</span>
                <div class="flex flex-wrap justify-start mb-4">
                    @if ($roles != null)

                    @foreach ($roles as $role)
                      <label class="inline-flex items-center mr-6 my-2 text-sm" style="flex: 1 0 20%;">
                        <input
                          type="checkbox"
                          @if ($role->assigned && !$role->isRemovable)
                          class="form-checkbox focus:shadow-none focus:border-transparent text-gray-500 h-4 w-4"
                          @else
                          class="form-checkbox h-4 w-4"
                          @endif
                          name="roles[]"
                          value="{{$role->id}}"
                          {!! $role->assigned ? 'checked' : '' !!}
                          {!! $role->assigned && !$role->isRemovable ? 'onclick="return false;"' : '' !!}
                        >
                        <span class="ml-2 {!! $role->assigned && !$role->isRemovable ? 'text-gray-600' : '' !!}">
                          {{$role->display_name ?? $role->name}}
                        </span>
                      </label>
                    @endforeach
                    @endif
                </div>
                @if ($permissions)
                  <span class="block text-gray-700 mt-4">Permissions</span>
                  <div class="flex flex-wrap justify-start mb-4">
                    @foreach ($permissions as $permission)
                      <label class="inline-flex items-center mr-6 my-2 text-sm" style="flex: 1 0 20%;">
                        <input
                          type="checkbox"
                          class="form-checkbox h-4 w-4"
                          name="permissions[]"
                          value="{{$permission->id}}"
                          {!! $permission->assigned ? 'checked' : '' !!}
                        >
                        <span class="ml-2">{{$permission->display_name ?? $permission->name}}</span>
                      </label>
                    @endforeach
                  </div>
                @endif
                <div class="flex justify-end">
                  <a
                    class="btn btn-red mr-4"
                  >
                    Cancel
                  </a>
                  <button class="btn btn-blue" type="submit">Save</button>
                </div>
              </form>
            </div>
          </div>
    </div>
</div>
