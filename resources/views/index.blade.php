@extends('master')

@section('main')
    <div class="container">
        <form method="get" action="/filter">
            <div class="mb-3">
                <label for="start" class="form-label">Start Date</label>
                <input type="text" class="form-control" id="start" name="start">
            </div>
            <div class="mb-3">
                <label for="start" class="form-label">End Date</label>
                <input type="text" class="form-control" id="end" name="end">
            </div>
            <div class="mb-3">
                <label for="start" class="form-label">Branch</label>
                <select class="form-select" name="branch">
                    <option selected>-- Pilih Branch --</option>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Salesman Name</th>
                    <th scope="col">Total Customer</th>
                    <th scope="col">Total Varian Customer</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr>
                        @php $date = \Carbon\Carbon::parse($item->transaction_date)->locale('id_ID'); @endphp
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $date->format('Y')}} {{$date->monthName}}</td>
                        <td>{{ $item->salesman->name }}</td>
                        <td>{{ $item->customer->count() }}</td>
                        <td></td>
                    @empty
                    <tr>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {!! $data->links() !!}
        </div>
    </div>
@endsection
