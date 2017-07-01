@extends('master')

@section('content')
    <h1>View claim</h1>
    <table class="table table-striped">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $claim->id }}</td>
            </tr>
            <tr>
                <th>User</th>
                <td>{{ $claim->user->name }} ({{ $claim->user->email }})</td>
            </tr>
            <tr>
                <th>Company</th>
                <td>{{ $claim->company }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>
                    {{ $claim->address1 }}<br>
                    {{ $claim->address2 ? $claim->address2 . '<br>' : '' }}
                    {{ $claim->city }}<br>
                    {{ $claim->county }}<br>
                    {{ $claim->postcode ? $claim->postcode . '<br>' : '' }}
                    {{ $claim->country }}
                </td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $claim->phone }}</td>
            </tr>
            <tr>
                <th>Part number</th>
                <td>{{ $claim->part_number }}</td>
            </tr>
            <tr>
                <th>Part quantity</th>
                <td>{{ $claim->part_quantity }}</td>
            </tr>
            <tr>
                <th>Preferred reward</th>
                <td>{{ \App\Claim::$reward_preferences[$claim->reward_preference] }}</td>
            </tr>
            <tr>
                <th>Attachments</th>
                <td>
                    <ul>
                        @foreach ($claim->uploads as $upload)
                            <li><a href="#">{{ $upload->filename }}</a></li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Current status</th>
                <td>{{ $claim->status() }}</td>
            </tr>
        </tbody>
    </table>
@endsection
