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
                    <div class="mb-4">
                        <label for="recordsPerPage">Records per page:</label>
                        <select id="recordsPerPage">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="250">250</option>
                            <option value="500">500</option>
                            <option value="1000">1000</option>
                        </select>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Import / Export</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
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

                    <div id="userTableContainer">
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
                            <tfoot><tr><td id="pagination" colspan="3"> {{$users->links()}} </td></tr></tfoot>
                        </table>
                    </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initial load of the table
            //loadTable(10); // Default to 10 records per page
        });
            // Handle dropdown change event
            $('#recordsPerPage').on('change', function () {
                const recordsPerPage = $(this).val();
                loadTable(recordsPerPage);
            });

            function loadTable(recordsPerPage) {
                $.ajax({
                    url: "{{route('get_users')}}", // Replace with your route
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        'records': recordsPerPage
                    },
                    beforeSend: function() {
                        $('#userTableContainer').html('<div class="text-center mt-3"><div class="text-center spinner-border text-dark mb-5" role="status"><span class="sr-only"></span></div></div>');
                    },
                    success: function (data) {
                        $('#userTableContainer').html(data);
                    },
                    error: function (error) {
                        console.error(error);
                    },
                });
            }
        
    </script>



</x-app-layout>
