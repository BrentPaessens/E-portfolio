<div>
    {{-- Filter --}}
    <x-tmk.section class="mb-4">
        <div class="items-center flex space-x-4">
            {{-- searchbar--}}
            <div class="flex-1">
                <x-tmk.form.search
                    wire:model.live.debounce.500ms="search"
                    class="block mt-1 w-full"
                    placeholder="search user"/>
            </div>
            {{-- dropdown for how many i need to show per page--}}
            <div class="w-1/6">
                <x-tmk.form.select id="perPage"
                                   wire:model.live="perPage"
                                   class="w-full">
                    @foreach ([5,10,15,20] as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </x-tmk.form.select>
            </div>
        </div>
    </x-tmk.section>
    <div class="my-4">{{ $users->links() }}</div>
    {{-- Table with users --}}
    <x-tmk.section>
        <table class="text-center w-full border border-blue-300 ">
            <colgroup>
                <col class="w-12">
                <col class="w-24">
                <col class="w-12">
                <col class="w-12">
            </colgroup>
            <thead>
                <tr class="bg-blue-300 text-gray-700 [&>th]:p-2">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Active</th>
                    <th>Admin</th>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr wire:key="{{ $user->id }}">
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    {{-- toggle for active user--}}
                    <td>
                        <x-tmk.form.toggle-switch color="success" :checked="$user->active" unchecked
                                                  wire:click="toggleActive({{ $user->id }})"/>
                    </td>
                    {{-- toggle admin --}}
                    <td>
                        <x-tmk.form.toggle-switch color="info" :checked="$user->admin" unchecked
                                                  wire:click="toggleAdmin({{ $user->id }})" />
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-tmk.section>
</div>
