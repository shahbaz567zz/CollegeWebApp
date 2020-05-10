@extends('layouts.admin')

@section('content')

<h1>All Colleges</h1>
<div class="table-responsive">
<table class="table table-bordered">
    <thead class="table-head">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>COLLEGE CODE</th>
            <th>COLLEGE DESCRIPTION</th>
            <th>ELIGIBILITY 10</th>
            <th>ELIGIBILITY 12</th>
            <th>ELIGIBILITY AGE</th>
            <th>ADMISSION MODE</th>
            <th>COLLEGE RANK</th>
            <th>ADDRESS</th>
            <th>SEATS</th>
            <th>FIRST YR FEE</th>
            <th>TOTAL FEE</th>
            <th>HOSTEL FEE</th>
            <th>GOVT/PVT</th>
            <th>PIC URL</th>
            <th>PLACEMENT</th>
            <th>EDIT</th>
            <th>UPDATED AT</th>
        </tr>
        </thead>
        <tbody>
            @if ($colleges)
                @foreach ($colleges as $college)
                <tr>
                    <td scope="row">{{$college->id}}</td>
                    <td scope="row">{{$college->name}}</td>
                    <td scope="row">{{ $college->college_code }}</td>
                    <td scope="row">{{ $college->college_description }}</td>
                    <td scope="row">{{ $college->eligibility_10_perc }}</td>
                    <td scope="row">{{ $college->eligibility_12_perc }}</td>
                    <td scope="row">{{ $college->eligibility_age }}</td>
                    <td scope="row">{{ $college->admission_mode }}</td>
                    <td scope="row">{{ $college->college_rank }}</td>
                    <td scope="row">{{ $college->address }}</td>
                    <td scope="row">{{ $college->seats }}</td>
                    <td scope="row">{{ $college->fee_first_year }}</td>
                    <td scope="row">{{ $college->fee_four_years }}</td>
                    <td scope="row">{{ $college->hostel_fees }}</td>
                    <td scope="row">{{ $college->govt_private }}</td>
                    <td scope="row">{{ $college->pic_url }}</td>
                    <td scope="row">{{ $college->placement }}</td>
                    <td scope="row"><a href="{{ route('admin.collegedetail.edit', $college->id) }}">edit</a></td>
                    <td scope="row">{{$college->updated_at->diffForHumans()}}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
</table>
</div>
{{ $colleges->render() }}
    
@endsection
