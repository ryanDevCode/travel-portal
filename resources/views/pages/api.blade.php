@if (count($travelData) > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Destination</th>
                <th>Project Title</th>
                <th>Track No</th>
                <th>Noted</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($travelData as $travel)
                <tr>
                    <td>{{ $travel['travel_request_id'] }}</td>
                    <td>{{ $travel['destination'] }}</td>
                    <td>{{ $travel['project_title'] }}</td>
                    <td>{{ $travel['tr_track_no'] }}</td>
                    <td>{{ $travel['notes'] }}</td>
                    <td>
                        <a href="{{ route('api-edit', $travel['travel_request_id']) }}"
                            class="btn btn-primary btn-sm">Edit</a>
                        <form method="POST" action="{{ route('api-delete', $travel['travel_request_id']) }}"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No travel data found.</p>
@endif



<h1>MAGUPDATE NG DATA</h1>
<h2>MAGLAGAY NG ROUTES SA WEB.PHP NA PAGDADAANAN NG PUT REQUEST NYO GALING SA UPDATE FORM</h2>
<p>EX: Route::put('/travel-requests/{id}/update', [HomeController::class, 'updateTravel'])->name('update.travel');
</p>



{{-- <form id="" method="PUT" action="{{ route('update.travel', ['id' => $travel->id]) }}">
    @csrf
    <div class="form-group">
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" class="form-control"
            value="{{ $travel->destination }}" required>
    </div>

    <div class="form-group">
        <label for="project_title">Project Title:</label>
        <input type="text" id="project_title" name="project_title" class="form-control"
            value="{{ $travel->project_title }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Travel Request</button>
</form> --}}
