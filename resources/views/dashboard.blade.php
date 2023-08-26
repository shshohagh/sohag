<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                @auth
                    {{ __("You're logged in!") }}
                @endauth
                </div>
                <div class="card">
                    <div class="card-header">User Import / Export</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="mb-4 d-flex justify-content-between">
                       {{-- @livewire('export')
                        @livewire('import') --}}
                    </div>
                    {{--                    THE "OLD" WAY WITH NO QUEUES/LIVEWIRE     --}}                
                    <div class="mb-4 d-flex justify-content-between">                        
                        <div><a href="{{ route('user_export') }}" class="btn btn-outline-primary">Export</a></div>                        
                        <div>                            
                            <form action="{{ route('user_import') }}" method="POST" enctype="multipart/form-data">                                
                                @csrf                               
                                 <input type="file" name="import_file" id="import_file" class="@error('import_file') is-invalid @enderror">                               
                                  <button class="btn btn-outline-secondary">Import</button>                                
                                 @error('import_file')                                
                                 <span class="invalid-feedback" role="alert">{{ $message }}</span>                                
                                 @enderror                            
                                </form>                        
                        </div>                    
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>name</th>
                                <th>email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $res)
                                <tr>
                                    <td>{{ $res->id }}</td>
                                    <td>{{ $res->name }}</td>  
                                    <td>{{ $res->email }}</td>  
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>{{$users->links()}}</tfoot>
                    </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
